<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "main";
$route['main/(:any)'] = 'main/index/$1';

$route['about'] = 'home/about';
$route['news-updates'] = 'home/news';
$route['news-updates/(:any)'] = 'home/content/$1';
$route['tips-tricks'] = 'home/tips';
$route['tips-tricks/(:any)'] = 'home/content/$1';
$route['tips-tricks'] = 'home/tips';
$route['products/(:any)'] = 'home/products/$1';
$route['search'] = 'home/search';

$route['csr'] = 'home/csr';
$route['csr/(:num)'] = 'home/csr/$1';
$route['csr/(:any)'] = 'home/content/$1';

$route['commercials'] = 'home/commercials';
$route['career'] = 'home/career';
$route['career/(:any)'] = 'home/content/$1';

$route['directory'] = 'home/directory';
$route['openings'] = 'home/openings';
$route['contact'] = 'home/contact';
$route['promos'] = 'home/promos';

$route['environmental-policy'] = 'home/environmental_policy';



$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */