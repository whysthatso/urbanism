<?php

namespace Fuel\Migrations;

class Add_chapter_id_to_articles
{
	public function up()
	{
		\DBUtil::add_fields('articles', array(
			'chapter_id' => array('constraint' => 11, 'type' => 'int'),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('articles', array(
			'chapter_id'
    
		));
	}
}