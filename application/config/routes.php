<?php

defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'PublicCtrl';
//-----------public--------------
$route['app-name/(:any)/(:any)'] = 'PublicCtrl/product_page';
$route['app-name/product-detail/(:any)/(:num)'] = 'PublicCtrl/detail_page';
$route['app-name/add-to-cart'] = 'PublicCtrl/add_to_cart';
$route['app-name/cart'] = 'PublicCtrl/cart';
$route['check-out'] = 'PublicCtrl/check_out';


//------------Admin-------------




$route['adminlogin'] = 'Adminctrl/auth';
$route['admin'] = 'Adminctrl/auth';

$route['adl-home'] = 'Adminctrl/adminhome';
$route['logout'] = 'Adminctrl/logout';
$route['passwordchange'] = 'Adminctrl/passwordchange';

//--------------------------------------------

$route['admin/add_edit_data'] = 'Adminctrl/add_edit_data';  // Common url, for future updation

$route['admin/add_edit_cat'] = 'Adminctrl/add_edit_cat';
$route['change_cat_status/(:any)/(:any)'] = 'Adminctrl/change_cat_status';


$route['admin/delete_data/(:num)'] = 'Adminctrl/delete_data';

$route['admin/product_list'] = 'Adminctrl/product_list';
$route['admin/add_edit_product'] = 'Adminctrl/add_edit_product';

$route['change_post_status/(:any)/(:any)'] = 'Adminctrl/change_post_status'; // to change publish/unpulish posts common use




$route['404_override'] = 'index.php/DrecgSuperctrl/errorlink';
$route['translate_uri_dashes'] = FALSE;
