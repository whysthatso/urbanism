<?php
class Controller_Carouselimage extends Controller_Template 
{

	public function action_index()
	{
		$data['carouselimages'] = Model_Carouselimage::find('all');
		$this->template->title = "Carouselimages";
		$this->template->content = View::forge('carouselimage/index', $data);

	}

	public function action_view($id = null)
	{
		$data['carouselimage'] = Model_Carouselimage::find($id);

		is_null($id) and Response::redirect('Carouselimage');

		$this->template->title = "Carouselimage";
		$this->template->content = View::forge('carouselimage/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Carouselimage::validate('create');
			
			if ($val->run())
			{
				$carouselimage = Model_Carouselimage::forge(array(
					'filename' => Input::post('filename'),
					'sortorder' => Input::post('sortorder'),
					'article_id' => Input::post('article_id'),
					'caption' => Input::post('caption'),
				));

				if ($carouselimage and $carouselimage->save())
				{
					Session::set_flash('success', 'Added carouselimage #'.$carouselimage->id.'.');

					Response::redirect('carouselimage');
				}

				else
				{
					Session::set_flash('error', 'Could not save carouselimage.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Carouselimages";
		$this->template->content = View::forge('carouselimage/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Carouselimage');

		$carouselimage = Model_Carouselimage::find($id);

		$val = Model_Carouselimage::validate('edit');

		if ($val->run())
		{
			$carouselimage->filename = Input::post('filename');
			$carouselimage->sortorder = Input::post('sortorder');
			$carouselimage->article_id = Input::post('article_id');
			$carouselimage->caption = Input::post('caption');

			if ($carouselimage->save())
			{
				Session::set_flash('success', 'Updated carouselimage #' . $id);

				Response::redirect('carouselimage');
			}

			else
			{
				Session::set_flash('error', 'Could not update carouselimage #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$carouselimage->filename = $val->validated('filename');
				$carouselimage->sortorder = $val->validated('sortorder');
				$carouselimage->article_id = $val->validated('article_id');
				$carouselimage->caption = $val->validated('caption');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('carouselimage', $carouselimage, false);
		}

		$this->template->title = "Carouselimages";
		$this->template->content = View::forge('carouselimage/edit');

	}

	public function action_delete($id = null)
	{
		if ($carouselimage = Model_Carouselimage::find($id))
		{
			$carouselimage->delete();

			Session::set_flash('success', 'Deleted carouselimage #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete carouselimage #'.$id);
		}

		Response::redirect('carouselimage');

	}


}