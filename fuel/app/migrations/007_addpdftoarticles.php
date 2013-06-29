<?php

namespace Fuel\Migrations;

class Addpdftoarticles
{
	public function up()
	{
		\DBUtil::add_fields('articles', array(
			'pdf' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),

		));	
		\DBUtil::add_fields('issues', array(
			'pdf' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),

		));			
	}

	public function down()
	{
		\DBUtil::drop_fields('articles', array(
			'pdf'
    
		));
		\DBUtil::drop_fields('issues', array(
			'pdf'
    
		));
	}
}