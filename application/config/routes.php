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
$route['default_controller'] = 'home';
$route['search'] = 'home/search'; /* SearchBox */
$route['lowongan/(:any)/(:any)'] = 'home/post/$1/$2';
$route['page/(:any)'] = 'home/page/$1';
$route['kategori'] = 'home/category';
$route['kategori/(:any)'] = 'home/category/$1';
$route['kategori/(:any)/(:num)'] = 'home/category/$1/$2';
$route['perusahaan'] = 'home/perusahaan';
$route['perusahaan/(:any)'] = 'home/perusahaan/$1';
$route['perusahaan/(:any)/(:num)'] = 'home/perusahaan/$1/$2';
$route['lokasi'] = 'home/lokasi';
$route['lokasi/(:any)'] = 'home/lokasi/$1';
$route['lokasi/(:any)/(:num)'] = 'home/lokasi/$1/$2';
$route['job'] = 'pencarian/index';
$route['job/(:num)'] = 'pencarian/index/$1';
$route['job'] = 'pencarian/index';
$route['sitemap.xml'] = 'sitemap/index';
$route['sitemap/sitemap-index.xml'] = 'sitemap/page';
$route['sitemap/(:num)/sitemap-post.xml'] = 'sitemap/post/$1';
$route['sitemap/sitemap-kategori.xml'] = 'sitemap/kategori';
$route['sitemap/(:num)/sitemap-company.xml'] = 'sitemap/perusahaan/$1';
$route['404_override'] = 'errorpage';
$route['translate_uri_dashes'] = FALSE;
