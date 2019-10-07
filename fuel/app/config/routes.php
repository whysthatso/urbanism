<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

return array(
	'_root_'  => 'issues/index',
	'_404_'   => 'welcome/404',
  'admin/articles/create/:issue' => 'admin/articles/create',
  'issue/:locale/:id' => 'issues/view',
  'admin/issue/:locale/:id' => 'admin/issues/view',
  'issues/:locale' => 'issues/index'
);
