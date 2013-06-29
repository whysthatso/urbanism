<?php
use Orm\Model;

class Model_Carouselimage extends Model
{
	protected static $_properties = array(
		'id',
		'filename',
		'sortorder',
		'article_id',
		'caption',
		'created_at',
		'updated_at',
	);
protected static $_belongs_to = array('article');
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('filename', 'Filename', 'required|max_length[255]');
		$val->add_field('sortorder', 'Sortorder', 'required');
		$val->add_field('article_id', 'Article Id', 'required');
		$val->add_field('caption', 'Caption', 'required|max_length[255]');

		return $val;
	}

}
