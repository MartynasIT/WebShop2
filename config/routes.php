<?php

$route['user'] = 'user';
$route['user/register'] = 'user/register';

$route['news'] = 'news';
$route['news/create'] = 'news/create';

$route['news/edit/(:any)'] = 'news/edit/$1';

$route['news/view/(:any)'] = 'news/view/$1';
$route['news/(:any)'] = 'news/view/$1';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['/'] = '/index';

$route['default_controller'] = 'shop';
$route['send-email'] = 'email controller';
$route['email'] = 'email controller/send';
$route['email'] = 'Sendingemail_Controller';
?>
