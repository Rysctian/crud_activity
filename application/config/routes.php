<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'MainController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// authentication
$route['login'] = 'AuthController/login_view';
$route['register'] = 'AuthController/register_view';
$route['logout'] = 'AuthController/logout';


// pages
$route['home'] = 'PageController/home'; 
$route['profile'] = 'PageController/profile';
$route['image_upload'] = 'PageController/image_upload';


// admin

$route['admin_dashboard'] = 'AdminController/index';


 





