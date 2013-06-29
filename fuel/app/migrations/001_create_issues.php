<?php

namespace Fuel\Migrations;

class Create_issues
{
	public function up()
	{
		\DBUtil::create_table('issues', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'number' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'subtitle' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'smallimage' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'largeimage' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'short_description' => array('type' => 'text', 'null' => true),
			'short_description_en' => array('type' => 'text', 'null' => true),			
			'published' => array('type' => 'boolean', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('issues');
	}
}