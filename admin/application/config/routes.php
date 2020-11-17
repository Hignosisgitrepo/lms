<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//trainers
$route['trainers'] = 'trainer/trainer';
$route['trainer-schedule'] = 'trainer/schedule';
$route['view-courses/(:any)'] = 'trainer/trainer/getCourseList/$1';
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

//commission
$route['commission/(:any)'] = 'commission/Commission/getCommissionList/$1';
$route['add-commission/(:any)'] = 'commission/Commission/add/$1';
$route['edit-commission/(:any)'] = 'commission/Commission/edit/$1';
//commission

//General
$route['profile'] = 'common/profile';
$route['default_controller'] = 'login';
$route['logout'] = 'dashboard/logout';
$route['dashboard'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
