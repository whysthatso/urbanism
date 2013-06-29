<?php

namespace Fuel\Migrations;

class Add_publicationdate_to_issue
{
	public function up()
	{
		\DBUtil::add_fields('issues', array(
			'publication_date' => array('type' => 'date', 'null' => true),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('issues', array(
			'publication_date'
    
		));
	}
}