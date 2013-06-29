<?php 
class Controller_Issues extends Controller_Template 
{



	public function action_index() {
		if ($this->params('locale')) {
			$data['locale'] = $this->params('locale');
			$data['locale'] = $data['locale']['locale'];
		} else { 
			$data['locale'] =  'ee';
		}
		$data['issues'] = Model_Issue::find('all', array(
    																						'where' => array('published' => true),
    																						'order_by' => array('publication_date' => 'desc'),
    																						));
		$this->template->title = "Issues";
		$this->template->content = View::forge('issues/index.haml', $data);

	}

	public function action_view($id = null)	{
		
		$data['issue'] = Model_Issue::query()->where('number', '=', $this->param('id'))
											->related('articles', array(
																								'related' => array('chapter'),
																							
																								 'order_by' => array('articles.sortorder')
																								 )
															 )->where('articles.locale' , '=', $this->param('locale'))
											->get_one();

		$data['locale'] = $this->param('locale');
		is_null($this->params('id')) and Response::redirect('Issues');

		$this->template->title = "Issue";
		$this->template->content = View::forge('issues/view.haml', $data);

	}

	
}