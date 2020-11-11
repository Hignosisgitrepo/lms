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

//trainer
$route['map-trainings'] = 'training/training_mapping';
$route['add-map-training'] = 'training/training_mapping/add';
$route['edit-map-training/(:any)'] = 'training/training_mapping/edit/$1';
$route['assigned-trainings'] = 'training/assigned_training';
$route['training-list'] = 'Trainer_Add_Courses/list_training/list_training_data';
$route['add-trainings'] = 'Trainer_Add_Courses/training_form';
$route['add_trainer_basic_details'] = 'Trainer_Add_Courses/training_add_basic/add_trainer_basic_details';
$route['add_trainer_section_info'] = 'Trainer_Add_Courses/training_section/add_trainer_section_info';
$route['add_trainer_section_details_info'] = 'Trainer_Add_Courses/training_section_details/add_trainer_section_details_info';
//trainer

//User
$route['users'] = 'user/user';
$route['add-user'] = 'user/user/add';
$route['edit-user/(:any)'] = 'user/user/edit/$1';
//User//

//Users
$route['roles'] = 'user/role_management';
$route['add-roles'] = 'user/role_management/add';
$route['edit-roles/(:any)'] = 'user/role_management/edit/$1';
//Users

//Maintainance
$route['maintainance'] = 'common/maintainance';
$route['add_maintainance'] = 'common/maintainance/add';
$route['view_maintainance/(:any)'] = 'common/maintainance/view/$1';
$route['edit_maintainance/(:any)'] = 'common/maintainance/edit/$1';
//Maintainance

//Designation
$route['designations'] = 'designation/designation';
$route['add-designation'] = 'designation/designation/add';
$route['edit-designation/(:any)'] = 'designation/designation/edit/$1';
//Designation

$route['setting'] = 'setting/setting';
$route['profile'] = 'common/profile';
$route['profile'] = 'common/profile';
$route['logout'] = 'dashboard/logout';
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
