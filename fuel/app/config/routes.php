<?php
return array(
	'_root_'  => 'issues/index', // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
  'admin/articles/create/:issue' => 'admin/articles/create',
    'issue/:locale/:id' => 'issues/view',
    'admin/issue/:locale/:id' => 'admin/issues/view',
  'issues/:locale' => 'issues/index'

);