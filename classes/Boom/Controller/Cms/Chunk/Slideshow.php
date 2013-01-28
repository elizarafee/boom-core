<?php defined('SYSPATH') OR die('No direct script access.');

/**
 *
 * @package	BoomCMS
 * @category	Chunks
 * @category	Controllers
 * @author	Rob Taylor
 * @copyright	Hoop Associates
 */
class Boom_Controller_Cms_Chunk_Slideshow extends Boom_Controller_Cms_Chunk
{
	public function action_edit()
	{
		$this->template = View::factory('boom/editor/slot/slideshow', array(
			'page'	=>	$this->page,
		));
	}

	public function action_preview()
	{
		$model = new Model_Chunk_Slideshow;

		$post = $this->request->post();
		if (isset($post['data']['slides']))
		{
			$model->slides($post['data']['slides']);
		}

		$chunk = new Chunk_Slideshow($this->page, $model, $data[ 'slotname' ], TRUE);
		$chunk->template($data[ 'template' ]);

		$this->response->body($chunk->execute());
	}
}