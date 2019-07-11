<?php
namespace Model;

class Model_Chapter extends \Orm\Model {

	protected static $_properties = array(
		'id',
		'name_ee',
		'name_en',
		'created_at',
		'updated_at',
	);

	protected static $_has_many = array('articles');

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public function name() {
		return $name_en . " / " . $name_en;
	}

	public static function validate($factory) {
		$val = Validation::forge($factory);
		$val->add_field('name_ee', 'Eestikeelne nimi', 'required|max_length[255]');
		$val->add_field('name_en', 'Name in English', 'required|max_length[255]');

		return $val;
	}
}
