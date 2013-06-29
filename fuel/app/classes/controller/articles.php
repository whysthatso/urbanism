<?php
class Controller_Articles extends Controller_Template 
{

	public function action_index() {
		$data['articles'] = Model_Article::find('all');
		$this->template->title = "Articles";
		$this->template->content = View::forge('article/index', $data);

	}

	public function action_view($id = null) {
		$data['article'] = Model_Article::find($id);

		is_null($id) and Response::redirect('Article');

		$this->template->title = "Article";
		$this->template->content = View::forge('article/view', $data);

	}


}