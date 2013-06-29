<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'username' => array('constraint' => 50, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'group' => array('contraint' => 11, 'type' => 'int'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'real_name' => array('constraint' => 255, 'type' => 'varchar'),
			'profile_fields' => array('type' => 'text'),
			'last_login' => array('constraint' => 11, 'type' => 'int'),
			'login_hash' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
		$query = \DB::insert('users')->set(array(
			"username" => "andra", 
			"password" => "qC0L4yy/UXB0Am6EwSAZ+K2CbKSUwoFcgPndceLKsqg=", 
			"group" => 100,
			"email" =>  "andra@ptarmigan.fi", 
			"real_name" => "Andra Aaloe", 
			"profile_fields" => "a:0:{}", 
			"last_login" => 0))->execute();;
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}