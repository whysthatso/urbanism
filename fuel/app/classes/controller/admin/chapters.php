<?php
class Controller_Admin_Chapters extends Controller_Admin
{

  public function action_index() {
    $data['chapters'] = Model_Chapter::find('all');
    $this->template->title = "Chapters";
    $this->template->content = View::forge('admin/chapters/index', $data);

  }

  public function action_view($id = null) {
    $data['chapter'] = Model_Chapter::find($id);

    is_null($id) and Response::redirect('Chapter');

    $this->template->title = "Chapter";
    $this->template->content = View::forge('admin/chapters/view', $data);

  }

  public function action_create() {
    if (Input::method() == 'POST')
    {
      $val = Model_Chapter::validate('create');
      
      if ($val->run())
      {
        $chapter = Model_Chapter::forge(array(
          'name_ee' => Input::post('name_ee'),
          'name_en' => Input::post('name_en')
        ));

        if ($chapter and $chapter->save())
        {
          Session::set_flash('success', 'Added chapter #'.$chapter->id.'.');

          Response::redirect('admin/chapters');
        }

        else
        {
          Session::set_flash('error', 'Could not save chapter.');
        }
      }
      else
      {
        Session::set_flash('error', $val->error());
      }
    }
    if ($this->param('issue')) {
      $this->template->set_global('issue_id', $this->param('issue'));
    }
    $issue_options = \DB::select('id', 'title')->from('issues')->execute()->as_array('id', 'title');
    $this->template->set_global('issue_options', $issue_options, false);
    $this->template->title = "Chapters";
    $this->template->content = View::forge('admin/chapters/create');

  }

  public function action_edit($id = null) {
    is_null($id) and Response::redirect('Chapter');

    $chapter = Model_Chapter::find($id);

    $val = Model_Chapter::validate('edit');

    if ($val->run())
    {
      $chapter->name_en = Input::post('name_en');
      $chapter->name_ee = Input::post('name_ee');

      if ($chapter->save())
      {
        Session::set_flash('success', 'Updated chapter #' . $id);

        Response::redirect('admin/issues#' . $chapter->issue_id);
      }

      else
      {
        Session::set_flash('error', 'Could not update chapter #' . $id);
      }
    }

    else
    {
      if (Input::method() == 'POST') {
      $chapter->name_en = Input::post('name_en');
      $chapter->name_ee = Input::post('name_ee');

        Session::set_flash('error', $val->error());
      }

      $this->template->set_global('chapter', $chapter, false);
    }
    $issue_options = \DB::select('id', 'title')->from('issues')->execute()->as_array('id', 'title');
    $this->template->set_global('issue_options', $issue_options, false);
    $this->template->title = "Chapters";
    $this->template->content = View::forge('admin/chapters/edit');

  }

  public function action_delete($id = null) {
    if ($chapter = Model_Chapter::find($id)) {
      $chapter->delete();

      Session::set_flash('success', 'Deleted chapter #'.$id);
    }
    else {
      Session::set_flash('error', 'Could not delete chapter #'.$id);
    }

    Response::redirect('admin/chapters');

  }


}