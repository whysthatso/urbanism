<?php

namespace Fuel\Migrations;

class Add_pdfen_to_issues
{
	public function up()
	{
		\DBUtil::add_fields('issues', array(
			'pdfen' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('issues', array(
			'pdfen'
    
		));
	}
}