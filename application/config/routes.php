<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['pages'] = 'pages/details';
//$route['pages/(:any)'] = 'pages/details/$1';

#default controller
$route['default_controller'] = 'secure/pages';
$route['(:any)'] = 'secure/pages/$1';

#error detected
$route['404_override'] = 'Errors/error404';
$route['translate_uri_dashes'] = FALSE;
