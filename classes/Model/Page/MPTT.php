<?php

/**
* We use a 3rd party Kohana module to handle mptt trees.
* @link https://github.com/evopix/orm-mptt
*
*
*/
class Model_Page_MPTT extends \ORM_MPTT
{
	protected $_table_name = 'page_mptt';
	protected $_belongs_to = array('page' => array('foreign_key' => 'id'));
	protected $_table_columns = array(
		'id'			=>	'',
		'lft'			=>	'',
		'rgt'			=>	'',
		'parent_id'	=>	'',
		'lvl'			=>	'',
		'scope'		=>	'',
	);
	protected $_reload_on_wakeup = true;
}