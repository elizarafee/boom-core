<?php

class Migration_Boom_20130123140000 extends Minion_Migration_Base
{
	/**
	 * Run queries needed to apply this migration
	 *
	 * @param Kohana_Database Database connection
	 */
	public function up(Kohana_Database $db)
	{
		$db->query(null, "insert into roles (name, description) values ('manage_pages', 'Page manager - view and edit')");
	}

	public function down(Kohana_Database $db) {}
}