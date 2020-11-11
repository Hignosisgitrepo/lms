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

//trainers
$route['trainers'] = 'trainer/trainer';
$route['trainer-schedule'] = 'trainer/schedule';
//trainers

//category
$route['categories'] = 'category/category';
$route['add-category'] = 'category/category/add';
$route['edit-category/(:any)'] = 'category/category/edit/$1';
//category

//client
$route['corporates'] = 'client/client';
$route['corporates-add'] = 'client/client/addCorporate';
$route['corporate-enquiry'] = 'client/enquiries';
$route['view-corporate-enquiry/(:any)'] = 'client/enquiries/view/$1';
//client

//User
$route['users'] = 'user/user';
$route['add-user'] = 'user/user/add';
$route['edit-user/(:any)'] = 'user/user/edit/$1';
//User

//Maintainance
$route['maintainance'] = 'common/maintainance';
$route['add_maintainance'] = 'common/maintainance/add';
$route['view_maintainance/(:any)'] = 'common/maintainance/view/$1';
$route['edit_maintainance/(:any)'] = 'common/maintainance/edit/$1';
//Maintainance

//Users
$route['roles'] = 'user/role_management';
$route['add-roles'] = 'user/role_management/add';
$route['edit-roles/(:any)'] = 'user/role_management/edit/$1';
//Users

//Settings
$route['setting'] = 'setting/setting';
$route['save-setting'] = 'setting/setting/save';
//Settings

//General
$route['profile'] = 'common/profile';
$route['default_controller'] = 'login';
$route['logout'] = 'dashboard/logout';
$route['dashboard'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
