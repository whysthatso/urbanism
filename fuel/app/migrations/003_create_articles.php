<?php

namespace Fuel\Migrations;

class Create_articles
{
	public function up()
	{
		\DBUtil::create_table('articles', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'issue_id' => array('constraint' => 11, 'type' => 'int', 'null' => false),
			'locale' => array('constraint' => 2, 'type' => 'varchar', 'null' => false, 'default' => 'ee'),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'subtitle' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),			
			'body' => array('type' => 'text', 'null' => true),
			'sortorder' => array('type' => 'float'),
			'byline' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'author_bio' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),			
			'published' => array('type' => 'boolean', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('articles');
	}
}