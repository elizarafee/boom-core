<?php defined('SYSPATH') OR die('No direct script access.');
/**
 *
 * @package	BoomCMS
 * @category	Chunks
 * @category	Models
 * @author	Rob Taylor
 * @copyright	Hoop Associates
 *
 */
class Boom_Model_Chunk_Linkset extends ORM
{
	protected $_has_many = array(
		'links' => array('model' => 'Chunk_Linkset_Link', 'foreign_key' => 'chunk_linkset_id'),
	);

	protected $_links;

	protected $_table_columns = array(
		'id'		=>	'',
		'title'		=>	'',
		'slotname'	=>	'',
	);

	protected $_table_name = 'chunk_linksets';

	/**
	 * Sets or gets the linkset's links
	 *
	 */
	public function links($links = NULL)
	{
		if ($links === NULL)
		{
			// Act as getter.

			if ($this->_links === NULL)
			{
				$this->_links = $this
					->links
					->find_all()
					->as_array();
			}

			return $this->_links;
		}
		else
		{
			// If the links are arrays of data then turn them into Chunk_Linkset_Links objects.
			foreach ($links as & $link)
			{
				if ( ! $link instanceof Model_Chunk_Linkset_Link)
				{
					$link = ORM::factory('Chunk_Linkset_Link')
						->values( (array) $link);
				}
			}

			$this->_links = $links;

			return $this;
		}
	}
}