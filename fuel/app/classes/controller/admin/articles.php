<?php
class Controller_Admin_Articles extends Controller_Admin
{

  public function action_index()
  {
    $data['articles'] = Model_Article::find('all');
    $this->template->title = "Articles";
    $this->template->content = View::forge('admin/articles/index', $data);

  }


  public function action_create()  {
    if (Input::method() == 'POST') {
      $val = Model_Article::validate('create');
      
      if ($val->run()) {
        $config = array(
          'path' => DOCROOT.DS.'images/carousels',
          'randomize' => true,
          'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
        );

        Upload::process($config);
        if (Upload::is_valid()) {
          Upload::save();         
        } 
        else {
          foreach (Upload::get_errors() as $key => $file) {
            Debug::dump($key, $file);
          }
       
        } 

        $article = Model_Article::forge(array(
          'issue_id' => Input::post('issue_id'),
          'locale' => Input::post('locale'),
          'title' => Input::post('title'),
          'body' => Input::post('body'),
          'sortorder' => Input::post('sortorder'),
          'chapter_id' => Input::post('chapter_id'),
          'byline' => Input::post('byline'),
          'author_bio' => Input::post('author_bio'),
          'published' => Input::post('published'),
        ));
        $value = Upload::get_files();

        if ($article and $article->save()) {
          foreach ($value as $v) { 
            if (!isset($v['saved_as'])) {
              continue;
            }
            preg_match('/carouselimages:(\d+):/', $v['field'], $form_index);
            $t = "carouselimages.".$form_index[1].".caption";
            $i = Model_Carouselimage::forge(array('filename' => $v['saved_as'],
                            'caption' => Input::post('carouselimages.'.$form_index[1].'.caption'),
                            'sortorder' => Input::post('carouselimages.'.$form_index[1].'.sortorder'),
                            'article_id' => $article['id']));
            $i->save();
          }
          Session::set_flash('success', 'Added article #'.$article->id.'.');

          Response::redirect('admin/issues#'. $article->issue_id);
        }

        else {
          Session::set_flash('error', 'Could not save article.');
        }
      }
      else {
        Session::set_flash('error', $val->error());
      }
    }
    if ($this->param('issue')) {
      $this->template->set_global('issue_id', $this->param('issue'));
    }
    $issue_options = \DB::select('id', 'title')->from('issues')->execute()->as_array('id', 'title');
    $chapter_options = \DB::select('id', 'name_ee')->from('chapters')->execute()->as_array('id', 'name_ee');
    array_unshift($chapter_options, '');
    $this->template->set_global('chapter_options', $chapter_options, false);
    $this->template->set_global('issue_options', $issue_options, false);

    $this->template->title = "Articles";
    $this->template->content = View::forge('admin/articles/create');

  }




  public function action_edit($id = null) {

    is_null($id) and Response::redirect('Article');

    $article = Model_Article::find($id);

    $val = Model_Article::validate('edit');
    if ($val->run()) {
      $config = array(
        'path' => DOCROOT.DS.'images/carousels',
        'randomize' => true,
        'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png', 'pdf'),
      );

      Upload::process($config);
      
      if (Upload::is_valid()) {
        Upload::save();         
      } 
      else {

        foreach (Upload::get_errors() as $key => $file) {
   		Debug::dump($file['errors']); 
        }
      }
      $article->issue_id = Input::post('issue_id');
      $article->locale = Input::post('locale');
      $article->title = Input::post('title');
      $article->body = Input::post('body');
      $article->sortorder = Input::post('sortorder');
      $article->byline = Input::post('byline');
      $article->published = Input::post('published');
      $article->author_bio = Input::post('author_bio');
      $article->chapter_id = Input::post('chapter_id');
      $value = Upload::get_files();
      


      foreach(array_keys($value) as $key) {
     
        if (!isset($value[$key]['field'])) {
          continue;
        }
        if ($value[$key]['field'] == 'pdf') {
          $newpdfname = 'U' . $article['issue']->number . '-' . $article->sortorder . '-' . $article->locale . '.pdf';

          if (!file_exists(DOCROOT.DS.'/pdf/'.$article['issue']->number)) {
            mkdir(DOCROOT.DS.'/pdf/'.$article['issue']->number);
          }
          $new = preg_replace('/\/images\/carousels\/$/', '/pdf/'.$article['issue']->number.'/', $value[$key]['saved_to']); 
          if (copy($value[$key]['saved_to'].$value[$key]['saved_as'], $new.$newpdfname)) {
            unlink($value[$key]['saved_to'].$value[$key]['saved_as']);
            $article->pdf = $newpdfname;
          }
          continue; 
        }

        preg_match('/carouselimages:(\d+):/', $value[$key]['field'], $form_index);
        $value[$key]['sysid'] = $form_index[1];
  
      }


      
   
      $cc = $article['carouselimages'];
      usort($cc, function($a, $b) {
        return $a['sortorder'] - $b['sortorder'];
      });
      foreach($cc as $ci) {
        if (Input::post("carouselimages." . $ci['id'])) {

          $c = Model_Carouselimage::find($ci['id']);
          // update
            $c->caption = Input::post('carouselimages.' . $ci['id'] . ".caption");
            $c->sortorder = Input::post('carouselimages.' . $ci['id'] . ".sortorder");
            $ii = -1;

            foreach(array_keys($value) as $key) {
              $ii++;
              if (isset($value[$key]['sysid'])) {
                if ($value[$key]['sysid'] == $ci['id']) {

                  $c->filename = $value[$key]['saved_as'];
                  unset($value[$key]);

                }
             
              }
            }
            $c->save();
       
   
        }
      } 


        if ($article->save()) {
        Session::set_flash('success', 'Updated article #' . $id);
        if ($id != null || $value == null)  {
          if (sizeof($cc) > 0 ) {
            $lid = end($cc);

            $highest_so_in_db = $lid['sortorder'];
          }
          else {
            $highest_so_in_db = 0;
          }


      
          foreach (array_keys($value) as $key) { 
            if (!isset($value[$key]['saved_as'])) {
              continue;
            }
            if ($value[$key]['field'] == 'pdf')
              continue;
            $t = "carouselimages.".$form_index[1].".caption";
            $i = Model_Carouselimage::forge(array('filename' => $value[$key]['saved_as'],
                            'caption' => Input::post('carouselimages.'.$form_index[1].'.caption'),
                            'sortorder' => 
                            $highest_so_in_db + 1,
                            'article_id' => $id));
                  $highest_so_in_db++;
            $i->save();
          }
        }
       // delete if ticked
        foreach($article['carouselimages'] as $ci) {
          $c = Model_Carouselimage::find($ci['id']);

          if (Input::post('carouselimages.' . $ci['id'] . "._delete") == "1") {
            try {
              unlink(DOCROOT.DS.'images/carousels/'.$c->filename);
            } catch(Exception $e) { }
            $c->delete();

          }
        }        
        Response::redirect('admin/issues#' . $article->issue_id);
      }

      else {
        Session::set_flash('error', 'Could not update article #' . $id);
      }
    }

    else {
      if (Input::method() == 'POST') {

        $article->issue_id = $val->validated('issue_id');
        $article->locale = $val->validated('locale');
        $article->title = $val->validated('title');
        $article->body = $val->validated('body');
        $article->sortorder = $val->validated('sortorder');
        $article->byline = $val->validated('byline');
        $article->published = $val->validated('published');
        $article->author_bio = $val->validated('author_bio');
        $article->chapter_id = $val->validated('chapter_id');

        Session::set_flash('error', $val->error());
      }

      $this->template->set_global('article', $article, false);
    }
    $issue_options = \DB::select('id', 'title')->from('issues')->execute()->as_array('id', 'title');
    $this->template->set_global('issue_options', $issue_options, false);
    $chapter_options = \DB::select('id', 'name_ee')->from('chapters')->execute()->as_array('id', 'name_ee');


    $chapter_options = array("0" => '') + $chapter_options;
    $this->template->set_global('chapter_options', $chapter_options, false);
    $this->template->title = "Articles";
    $this->template->content = View::forge('admin/articles/edit');

  }



  public function action_delete($id = null) {
    if ($article = Model_Article::find($id)) {
      $article->delete();

      Session::set_flash('success', 'Deleted article #'.$id);
    }

    else {
      Session::set_flash('error', 'Could not delete article #'.$id);
    }

    Response::redirect('admin/articles');

  }


}
