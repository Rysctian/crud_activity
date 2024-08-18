<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'MainController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['unauthorized'] = 'AdminController/unauthorized';



// authentication
$route['login'] = 'AuthController/login_view';
$route['register'] = 'AuthController/register_view';
$route['logout'] = 'AuthController/logout';


// pages
$route['home'] = 'PageController/home'; 
$route['profile'] = 'PageController/profile';


// admin
$route['admin_dashboard'] = 'AdminController/index'; 

// admin/schedule
$route['set_schedule'] = 'ScheduleController/index';

// employees
$route['employees'] = 'EmployeeController/index';
$route['employee_log'] = 'TimeLogController/index';


// schedule
$route['schedule'] = 'ScheduleController/index';


 





