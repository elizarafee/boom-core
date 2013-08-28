<?php defined('SYSPATH') OR die('No direct script access.');

/**
* @package BoomCMS
* @category Chunks
*/
abstract class Boom_Chunk
{
	const ASSET = 1;
	const FEATURE = 2;
	const LINKSET = 3;
	const SLIDESHOW = 4;
	const TEXT = 5;
	const TIMESTAMP = 6;

	/**
	 * Holds the chunk data retrieved from the database
	 * Object type will depend on slottype, e.g. Model_Chunk_Text for text chunk, Model_Chunk_Feature for feature etc.
	 */
	protected $_chunk;

	/**
	 * The name of the default template if no template is set.
	 */
	protected $_default_template = NULL;

	/**
	 * Whether the chunk should be editable.
	 *
	 * This can be changed by calling [Chunk::editable()]
	 *
	 * @var	boolean
	 */
	protected $_editable = TRUE;

	/**
	 * The page that the chunk belongs to.
	 *
	 * @var Model_Page
	 */
	protected $_page;

	/**
	 * An array of parameters which will be passed to the chunk template
	 *
	 * @var array
	 */
	protected $_params = array();

	/**
	 * The slotname used to find the chunk.
	 * This has to be stored seperately to $this->_chunk so that for default chunks where $this->_chunk isn't loaded we know the slotname where the chunk belongs.
	 *
	 * @var string
	 */
	protected $_slotname;

	/**
	 * The name of the template to display
	 *
	 * @var string
	 */
	protected $_template;

	/**
	 * The type of slot; text, feature, etc.
	 *
	 * @var string
	 */
	protected $_type;

	/**
	 * Array of available chunk types.
	 *
	 * @var array
	 */
	public static $types = array('asset', 'text', 'feature', 'linkset', 'slideshow', 'timestamp');

	public function __construct(Model_Page $page, $chunk, $slotname)
	{
		$this->_page = $page;
		$this->_chunk = $chunk;
		$this->_slotname = $slotname;
	}

	/**
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->execute();
	}

	/**
	 * Displays the chunk when chunk data has been set.
	 *
	 * @return View
	 */
	abstract protected function _show();

	/**
	 * Displays default chunk HTML
	 *
	 * @return View
	 */
	abstract protected function _show_default();

	/**
	 * This adds the necessary classes to chunk HTML for them to be picked up by the JS editor.
	 * i.e. it makes chunks editable.
	 *
	 * @param	string	$html		HTML to add classes to.
	 * @param	string	$type		The type of chunk to identify this as. This is picked up by the JS to determine which kind of editor to run
	 * @param	mixed	$template		The name of the template used to display this chunk. When editing this chunk this is submitted to the controller to generate a preview of the chunk.
	 * @param	integer	$page		ID of the page that the chunk belongs to.
	 * @return 	string
	 */
	public function add_attributes($html, $type, $slotname, $template, $page_id)
	{
		$html = trim( (string) $html);

		return preg_replace("|<(.*?)>|", "<$1 data-boom-chunk='$type' data-boom-slot-name='$slotname' data-boom-slot-template='$template' data-boom-page='$page_id'>", $html, 1);
	}

	/**
	 * Sets wether the chunk should be editable.
	 *
	 * @param bool $value
	 */
	public function editable($value)
	{
		// Set the value of $_editable.
		$this->_editable = $value;

		return $this;
	}

	/**
	 * Attempts to get the chunk data from the cache, otherwise calls _execute to generate the cache.
	 */
	public function execute()
	{
		// If profiling is enabled then record how long it takes to generate this chunk.
		if (Kohana::$profiling === TRUE)
		{
			$benchmark = Profiler::start("Chunks", $this->_chunk->slotname);
		}

		// Generate the HTML.
		// Don't allow an error displaying the chunk to bring down the whole page.
		try
		{
			/** Should the chunk be editable?
			 * This can be changed to calling editable(), for instance if we want to make a chunk read only.
			 *
			 * @todo Multiple chunks will be inserted on a single page - need to remove duplicate calles to Auth::instance()->logged_in()
			 */
			$this->_editable = ($this->_editable === TRUE AND Editor::instance()->state_is(Editor::EDIT) AND ($this->_page->was_created_by(Auth::instance()->get_user()) OR Auth::instance()->logged_in("edit_page_content", $this->_page)));

			// Get the chunk HTML.
			$html = $this->html();

			if ($this->_editable === TRUE)
			{
				$html = $this->add_attributes($html, $this->_type, $this->_slotname, $this->_template, $this->_page->id);
			}
		}
		catch (Exception $e)
		{
			// Log the error.
			Kohana_Exception::log($e);
			return;
		}

		if (isset($benchmark))
		{
			Profiler::stop($benchmark);
		}

		return $html;
	}

	/**
	 * Chunk object factory.
	 * Returns a chunk object of the required type.
	 *
	 * @param	string	$type		Chunk type, e.g. text, feature, etc.
	 * @param	string	$slotname		The name of the slot to retrieve a chunk from.
	 * @param	mixed	$page		The page the chunk belongs to. If not given then the page from the current request will be used.
	 * @param	boolean	$inherit		Whether the chunk should be inherited down the page tree.
	 * @return 	Chunk
	 */
	public static function factory($type, $slotname, $page = NULL)
	{
		// Set the class name.
		$class = "Chunk_" . ucfirst($type);

		// Set the page that the chunk belongs to.
		// This is used for permissions check, and quite importantly, for finding the chunk.
		if ($page === NULL)
		{
			// No page was given so use the page from the current request.
			$page = Request::current()->param('page');
		}
		elseif ($page === 0)
		{
			// 0 was given as the page - this signifies a 'global' chunk not assigned to any page.
			$page = new Model_Page;
		}

		// Load the chunk
		$chunk = Chunk::find($type, $slotname, $page->version());

		return new $class($page, $chunk, $slotname);
	}

	/**
	 * Finds a chunk model depending on the type, slotname, page version.
	 * This is a helper function which can be called statically anywhere we need to find a chunk.
	 *
	 * @param	string		$type		Type of chunk, e.g. text, feature.
	 * @param	string		$slotname	The name of the slot that the chunk belongs to.
	 * @param	Model_Page_Version	$page_version	The page version that the chunk belongs to.
	 * @return 	Chunk
	 */
	public static function find($type, $slotname, Model_Page_Version $version)
	{
		// Get the name of the model that we're looking.
		// e.g. if type is text we want a chunk_text model
		$model = (strpos($type, "Chunk_") === 0)? ucfirst($type) : "Chunk_" . ucfirst($type);

		// Find the chunk in the database.
		return ORM::factory($model)
			->join('page_chunks')
			->on('page_chunks.chunk_id', '=', 'id')
			->with('target')
			->where('slotname', '=', $slotname)
			->where("page_chunks.type", '=', constant('Chunk::'.strtoupper($type)))
			->where('page_chunks.page_vid', '=', $version->id)
			->find();
	}

	/**
	 * Returns whether the chunk has any content.
	 *
	 * @return	bool
	 */
	abstract public function has_content();

	/**
	 * Generate the HTML to display the chunk
	 *
	 * @return 	string
	 */
	public function html()
	{
		if ($this->_template === NULL)
		{
			$this->_template = $this->_default_template;
		}

		if ($this->has_content())
		{
			// Display the chunk.
			$return = $this->_show();
		}
		elseif ($this->_editable === TRUE)
		{
			// Show the defult chunk.
			$return = $this->_show_default();
		}
		else
		{
			// Chunk has no content and the user isn't allowed to add any.
			// Don't display anything.
			return "";
		}

		// If the return data is a View then assign any parameters to it.
		if ($return instanceof View AND ! empty($this->_params))
		{
			foreach ($this->_params as $key => $value)
			{
				$return->$key = $value;
			}
		}

		return (string) $return;
	}

	/**
	 * Getter / setter method for template parameters.
	 */
	public function params($params = NULL)
	{
		if ($params === NULL)
		{
			return $this->_params;
		}
		else
		{
			$this->_params = $params;
			return $this;
		}
	}

	/**
	 * Set the template to display the chunk
	 *
	 * @param	string	$template	The name of a view file.
	 * @return	Chunk
	 */
	public function template($template = NULL)
	{
		// Set the template filename.
		$this->_template = $template;

		return $this;
	}
}
