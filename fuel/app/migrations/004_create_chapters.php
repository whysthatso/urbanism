<?php

namespace Fuel\Migrations;

class Create_chapters
{
	public function up()
	{
		\DBUtil::create_table('chapters', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name_ee' => array('constraint' => 255, 'type' => 'varchar'),
			'name_en' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('chapters');
	}
}