<?php
class Model_Issue extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'number',
		'title',
		'publication_date',
		'subtitle',
		'short_description',
		'short_description_en',
		'smallimage',
		'largeimage',
		'pdf',
		'pdfen',
		'published',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('number', 'Number', 'required');
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('subtitle', 'Subtitle', 'max_length[255]');
		$val->add_field('publication_date', 'Publication date', 'trim|valid_string[numeric,dashes]');
		// $val->add_field('short_description', 'Short Description', '');
		// $val->add_field('published', 'Published', '');

		return $val;
	}

}
