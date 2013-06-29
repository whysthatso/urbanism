<?php

namespace Fuel\Migrations;

class Create_carouselimages
{
	public function up()
	{
		\DBUtil::create_table('carouselimages', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'filename' => array('constraint' => 255, 'type' => 'varchar'),
			'sortorder' => array('type' => 'float', 'null' => true),
			'article_id' => array('constraint' => 11, 'type' => 'int'),
			'caption' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('carouselimages');
	}
}