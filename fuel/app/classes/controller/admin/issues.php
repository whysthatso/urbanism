<?php
class Controller_Admin_Issues extends Controller_Admin 
{

	public function action_index() {

		$data['issues'] = Model_Issue::find('all', array(
															'related' => array(
																'articles' => array(
																		'order_by' => array('sortorder' => 'asc', 'locale' => 'asc'),
																)
															),
														'order_by' => array('publication_date' => 'desc')
														));

		$this->template->title = "Issues";
		$this->template->content = View::forge('admin/issues/index', $data);

	}

	public function action_view($id = null)	{
		$data['issue'] = Model_Issue::query()->where('number', '=', $this->param('id'))
											->related('articles', array(
																								'related' => array('chapter'),
																								'order_by' => array('articles.sortorder')
																								 )
															 )
											->get_one();
		
		$data['locale'] = $this->param('locale');
		$this->template->title = "Issue";
		return new Response(View::forge('issues/view.haml', $data));

	}

	public function action_create()	{
		if (Input::method() == 'POST')
		{
			$val = Model_Issue::validate('create');

			if ($val->run())
			{
				$issue = Model_Issue::forge(array(
					'number' => Input::post('number'),
					'title' => Input::post('title'),
					'publication_date' => Input::post('publication_date'),
					'subtitle' => Input::post('subtitle'),
					'short_description' => Input::post('short_description'),
					'short_description_en' => Input::post('short_description_en'),
					'published' => Input::post('published'),
				));
			$config = array(
			    'path' => DOCROOT.DS.'images/covers',
			    'randomize' => true,
			    'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
			);
			Upload::process($config);
			if (Upload::is_valid()) {
			    // save them according to the config
			    Upload::save();

			  	$value = Upload::get_files();  
					foreach ($value as $v) {
						if ($v['field'] == 'largeimage') {
							$issue->largeimage = $v['saved_as'];
						} else {
							$issue->smallimage = $v['saved_as'];
						}
					}
			}

				if ($issue and $issue->save()){
					Session::set_flash('success', e('Added issue #'.$issue->id.'.'));

					Response::redirect('admin/issues');
				}

				else {
					Session::set_flash('error', e('Could not save issue.'));
				}
			}
			else {
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Issues";
		$this->template->content = View::forge('admin/issues/create');

	}

	public function action_edit($id = null) {

		$issue = Model_Issue::find($id);
		$val = Model_Issue::validate('edit');
	
	
		if ($val->run()) {

			$config = array(
	    	'path' => DOCROOT.DS.'images/covers',
	    	'randomize' => true,
	    	'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png', 'pdf'),
			);

			Upload::process($config);

			if (Upload::is_valid()) {
		
				Upload::save();
	
			} 
			else {
		
        foreach (Upload::get_errors() as $key => $file) {
    
        }

    	}

			$issue->number = Input::post('number');
			$issue->title = Input::post('title');
			$issue->publication_date = Input::post('publication_date');
			$issue->subtitle = Input::post('subtitle');
			$issue->short_description = Input::post('short_description');
			$issue->short_description_en =  Input::post('short_description_en');
			$issue->published = Input::post('published');
			$value = Upload::get_files();
			

		
			foreach ($value as $v) {

			
				if ($v['field'] == 'largeimage') {
					$issue->largeimage = $v['saved_as'];
				} 
				else if ($v['field'] == 'pdf') {
					if (!file_exists(DOCROOT.DS.'/pdf/'.$issue->number)) {
						mkdir(DOCROOT.DS.'/pdf/'.$issue->number);
					}
					$new = preg_replace('/\/images\/covers\/$/', '/pdf/'.$issue->number.'/', $v['saved_to']);		
					if (copy($v['saved_to'].$v['saved_as'], $new.'U-'.$issue->number.'-complete.pdf')) {
					 	unlink($v['saved_to'].$v['saved_as']);
					 	$issue->pdf = 'U-'.$issue->number.'-complete.pdf';
					}
				}
				else if ($v['field'] == 'pdfen') {
					if (!file_exists(DOCROOT.DS.'/pdf/'.$issue->number)) {
						mkdir(DOCROOT.DS.'/pdf/'.$issue->number);
					}
					$new = preg_replace('/\/images\/covers\/$/', '/pdf/'.$issue->number.'/', $v['saved_to']);		
					if (copy($v['saved_to'].$v['saved_as'], $new.'U-'.$issue->number.'-en-complete.pdf')) {
					 	unlink($v['saved_to'].$v['saved_as']);
					 	$issue->pdfen = 'U-'.$issue->number.'-en-complete.pdf';
					}
				}				
				else {
					$issue->smallimage = $v['saved_as'];
				}
			}
			// $issue->smallimage = $value[0]['saved_as'];
			// $issue->largeimage = $value[1]['saved_as'];
			if ($issue->save()) {
		
				Session::set_flash('success', e('Updated issue #' . $issue->number));

				 Response::redirect('admin/issues');
			}

			else {
				Session::set_flash('error', e('Could not update issue #' . $issue->number));
			}
		}

		else {
			if (Input::method() == 'POST')
			{
				$issue->number = $val->validated('number');
				$issue->title = $val->validated('title');
				$issue->publication_date = $val->validated('publication_date');
				$issue->subtitle = $val->validated('subtitle');
				$issue->short_description = $val->validated('short_description');
				$issue->published = $val->validated('published');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('issue', $issue, false);
		}

		$this->template->set_global('issue', $issue, false);
		$this->template->title = "Issues";
		$this->template->content = View::forge('admin/issues/edit');

	}



	public function action_delete($id = null) {
		if ($issue = Model_Issue::find($id))
		{
			$issue->delete();

			Session::set_flash('success', e('Deleted issue #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete issue #'.$id));
		}

		Response::redirect('admin/issues');

	}


}