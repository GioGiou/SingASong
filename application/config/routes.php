<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method


*/
$route['event/signup'] = 'event/signup';
$route['event/login'] = 'event/login';
$route['user_authentication/admin'] = 'user_authentication/admin';
$route['user_authentication/update_user'] = 'user_authentication/update_user';
$route['user_authentication'] = 'user_authentication/index';
$route['user_authentication/show'] = 'user_authentication/show';
$route['user_authentication/delete_user'] = 'user_authentication/delete_user/$1';
$route['user_authentication/signup'] = 'user_authentication/signup';
$route['user_authentication/signin'] = 'user_authentication/signin';
$route['user_authentication/logout'] = 'user_authentication/logout';

$route['event/create'] = 'event/create';
$route['event/create'] = 'event/create';
$route['event/alf'] = 'event/alf';
$route['event/date'] = 'event/date';
$route['event/old'] = 'event/old';
$route['event/all'] = 'event/all';
$route['event'] = 'event/index';
$route['event/(:any)'] = 'event/view/$1';
$route['(:any)'] = 'welcome/index';
$route['default_controller'] = 'welcome/index';
