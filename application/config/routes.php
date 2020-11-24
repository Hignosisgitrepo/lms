<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//trainer
$route['trainer'] = 'trainer/trainer';
$route['trainer-login'] = 'trainer/trainer/login';
$route['trainer-dashboard'] = 'trainer/dashboard';
$route['training-schedules/(:any)'] = 'trainer/training_schedules/schedules/$1';
//trainer

//Customer
$route['dashboard'] = 'customer/dashboard';
//Customer

//trainer
$route['training-list'] = 'Trainer_Add_Courses/list_training/list_training_data';
$route['add_training'] = 'Trainer_Add_Courses/training_form';
$route['add_trainer_basic_details'] = 'Trainer_Add_Courses/training_add_basic/add_trainer_basic_details';
$route['add_trainer_section_info'] = 'Trainer_Add_Courses/training_section/add_trainer_section_info';
$route['add_trainer_section_details_info'] = 'Trainer_Add_Courses/training_section_details/add_trainer_section_details_info';

//trainer courses
$route['course-list'] = 'Trainer_Manage_Courses/Manage_courses/my_courses';

//trainer online classes
$route['online-class-list'] = 'Online_Class/list_online/list_online_classes';
$route['create_meeting'] = 'Online_Class/Create_online/create_online_meeting';
$route['meeting_details'] = 'Trainer_Meeting_Details/Meeting_details/get_meeting_details';

//meeting attendees online classes
$route['online-meeting-attendees-list'] = 'Online_class_attendees/list_meeting_online/list_online_meeting';
$route['create_attendees'] = 'Online_class_attendees/Create_meeting_attendees/create_online_attendees';
$route['attendee_details'] = 'Online_class_attendees/Attendee_details/get_attendee_details';

//View Course
$route['view_course_details/(:any)'] = 'Trainer_View_Courses/View_courses/view_my_course/$1';
$route['view_meeting_course/(:any)/(:any)/(:any)/(:any)'] = 'Online_class_attendees/View_meeting_course/view_my_course/$1/$2/$3/$4';

// Start Meeting
$route['start_trainer_meeting/(:any)/(:any)/(:any)/(:any)'] = 'Start_meeting/Start_meeting/create_trainer_meeting_session/$1/$2/$3/$4';
$route['start_meeting/(:any)/(:any)/(:any)/(:any)'] = 'Start_meeting/Start_meeting/create_meeting_session/$1/$2/$3/$4';

$route['search/(:any)'] = 'common/search/index/$1';
$route['search-training/(:any)'] = 'common/search/searchTraining/$1';
$route['shopping-cart'] = 'common/cart';
$route['checkout'] = 'common/checkout';
$route['paypal-order-summary'] = 'payment/paypal/express_checkout';
$route['express_checkout'] = 'payment/express_checkout';
$route['paypal/express_checkout/SetExpressCheckout'] = 'payment/paypal/express_checkout/SetExpressCheckout';

$route['paypal/express_checkout/GetExpressCheckoutDetails'] = 'payment/paypal/express_checkout/GetExpressCheckoutDetails';
$route['paypal/express_checkout/DoExpressCheckoutPayment'] = 'payment/paypal/express_checkout/DoExpressCheckoutPayment';
$route['paypal/express_checkout/OrderComplete'] = 'payment/paypal/express_checkout/OrderComplete';
$route['paypal/express_checkout/OrderCancelled'] = 'payment/paypal/express_checkout/OrderCancelled';

$route['course-view/(:any)'] = 'customer/mycourses/view/$1';
$route['mycourses'] = 'customer/mycourses';
$route['corporate-request'] = 'corporate';
$route['general-setup'] = 'home/setup';
$route['logout'] = 'home/logout';
$route['login'] = 'login';
$route['register'] = 'login/registration';
$route['default_controller'] = 'home';
$route['coming-soon'] = 'home/coming_soon';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
