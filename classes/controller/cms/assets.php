<?php defined('SYSPATH') or die('No direct script access.');

/**
* Asset controller
* Contains methods for adding / replacing an asset etc.
* @package Controller
* @author Hoop Associates	www.thisishoop.com	mail@hoopassociates.co.uk
* @copyright 2011, Hoop Associates
*/

class Controller_Cms_Assets extends Controller_Cms
{
	
	public function action_upload()
	{
		
	}
	
	
	public function action_replace()
	{

	}

	public function action_edit()
	{
		
		
	}
	
	public function action_index()
	{
		$this->template->subtpl_main = View::factory( 'cms/pages/assets/index' );
		
	}
	
}

?>
