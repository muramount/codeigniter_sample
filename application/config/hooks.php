<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook = array(
	'pre_system' => array(
		'class'    => 'App_System_Filter',
		'function' => 'pre_system',
		'filename' => 'App_System_Filter.php',
		'filepath' => 'hooks',
		'params'   => array(),
	),
	'pre_controller' => array(
		'class'    => 'App_System_Filter',
		'function' => 'pre_controller',
		'filename' => 'App_System_Filter.php',
		'filepath' => 'hooks',
		'params'   => array(),
	),
	'post_controller_constructor' => array(
		'class'    => 'App_System_Filter',
		'function' => 'post_controller_constructor',
		'filename' => 'App_System_Filter.php',
		'filepath' => 'hooks',
		'params'   => array(),
	),
	'post_controller' => array(
		'class'    => 'App_System_Filter',
		'function' => 'post_controller',
		'filename' => 'App_System_Filter.php',
		'filepath' => 'hooks',
		'params'   => array(),
	),
//	'display_override' => array(
//		'class'    => 'App_System_Filter',
//		'function' => 'display_override',
//		'filename' => 'App_System_Filter.php',
//		'filepath' => 'hooks',
//		'params'   => array(),
//	),
//	'cache_override' => array(
//		'class'    => 'App_System_Filter',
//		'function' => 'cache_override',
//		'filename' => 'App_System_Filter.php',
//		'filepath' => 'hooks',
//		'params'   => array(),
//	),
	'post_system' => array(
		'class'    => 'App_System_Filter',
		'function' => 'cache_override',
		'filename' => 'App_System_Filter.php',
		'filepath' => 'hooks',
		'params'   => array(),
	),
);

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */