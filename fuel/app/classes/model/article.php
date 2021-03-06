<?php
class Model_Article extends Orm\Model {
	protected static $_properties = array(
		'id',
		'issue_id',
		'locale',
		'title',
		'subtitle',
		'body',
		'sortorder',
		'byline',
		'author_bio',
		'published',
		'chapter_id',
		'pdf',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array('issue', 'chapter');

	protected static $_has_many = array('carouselimages' => array('order_by' => 'carouselimages.sortorder'));

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
		$val->add_field('issue_id', 'Issue Id', 'required');
		$val->add_field('locale', 'Locale', 'required|max_length[255]');
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('body', 'Body', 'required');
		$val->add_field('sortorder', 'Sortorder', 'required');

		return $val;
	}
}
