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
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['main/create_topstorytile'] = 'main/create_topstorytile';
$route['main/create_mainarticle'] = 'main/create_mainarticle';
$route['main/create_galler'] = 'main/create_galler';
$route['main/create_slider'] = 'main/create_slider';
$route['main/view_mainarticles'] = 'main/view_mainarticles';
$route['main/view_sliders'] = 'main/view_sliders';
$route['article/upload_main_comment'] = 'article/upload_main_comment';
$route['main/view_photogaller'] = 'main/view_photogaller';
$route['main/view_topstories'] = 'main/view_topstories';
$route['main/panel'] = 'main/panel';
$route['main/logout'] = 'main/logout';
$route['main/(:any)'] = 'main/view/$1';
$route['top/(:any)'] = 'top/view/$1';
$route['news/(:any)'] = 'news/view/$1';
$route['editmain/(:any)'] = 'editmain/view/$1';
$route['deletemain/(:any)'] = 'deletemain/delete/$1';
$route['editslider/(:any)'] = 'editslider/view/$1';
$route['deleteslider/(:any)'] = 'deleteslider/delete/$1';
$route['edittopstory/(:any)'] = 'edittopstory/view/$1';
$route['deletetopstory/(:any)'] = 'deletetopstory/delete/$1';
$route['editphotogaller/(:any)'] = 'editphotogaller/view/$1';
$route['deletephotogaller/(:any)'] = 'deletephotogaller/delete/$1';
$route['photography/(:any)'] = 'photography/view/$1';
$route['article/(:any)'] = 'article/view/$1';
$route['article/upload_main_comment'] = 'article/upload_main_comment';
$route['search/article_search'] = 'search/article_search';
$route['news'] = 'news';
$route['default_controller'] = 'news';


