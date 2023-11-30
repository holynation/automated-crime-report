<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// The route for the application web API is here
$routes->group('api', ['filter' => 'apiValidation'], function ($routes) {
    $routes->add('(:any)', 'Api::webApi/$1');
    $routes->add('(:any)/(:any)', 'Api::webApi/$1/$2');
    $routes->add('(:any)/(:any)', 'Api::webApi/$1/$2/$3');
});

// The route for normal operations for the backend
$routes->group('vc/create', function ($routes) {
    $routes->add('(:any)', 'Viewcontroller::create/$1');
    $routes->add('(:any)/(:any)', 'Viewcontroller::create/$1/$2');
    $routes->add('(:any)/(:any)/(:any)', 'Viewcontroller::create/$1/$2/$3');
    $routes->add('(:any)/(:any)/(:any)/(:any)', 'Viewcontroller::create/$1/$2/$3/$4');
});

$routes->group('vc', function ($routes) {
    $routes->add('resetPassword/(:any)', 'Viewcontroller::resetPassword/$1');
    $routes->add('changePassword', 'Viewcontroller::changePassword');
    $routes->add('changePassword/(:any)', 'Viewcontroller::changePassword/$1');
    $routes->add('(:any)', 'Viewcontroller::view/$1');
    $routes->add('(:any)/(:any)', 'Viewcontroller::view/$1/$2');
    $routes->add('(:any)/(:any)/(:any)', 'Viewcontroller::view/$1/$2/$3');
});

$routes->add('edit/(:any)/(:any)', 'Viewcontroller::edit/$1/$2');

$routes->group('ajaxData', function($routes) {
    $routes->post('savePermission', 'Ajaxdata::savePermission');
    $routes->post('approvePayment', 'Ajaxdata::approvePayment');
    $routes->add('refreshBankList', 'Ajaxdata::refreshBankList');
    $routes->add('updateAccountWallet/(:any)', 'Ajaxdata::updateAccountWallet/$1');
    $routes->add('validateBvnByMono', 'Ajaxdata::validateBvnByMono/$1');
    $routes->add('withdrawalRequest', 'Ajaxdata::withdrawalRequest/$1');
    $routes->post('createAccountHolder', 'Ajaxdata::createAccountHolder');
    $routes->post('app_settings', 'Ajaxdata::appSettings');
});

$routes->group('mc', function ($routes) {
    $routes->add('add/(:any)/(:any)', 'Modelcontroller::add/$1/$2');
    $routes->add('add/(:any)/(:any)/(:any)/(:any)', 'Modelcontroller::add/$1/$2/$3/$4');
    $routes->add('update/(:any)/(:any)/(:any)', 'Modelcontroller::update/$1/$2/$3');
    $routes->add('update/(:any)/(:any)/(:any)/(:any)', 'Modelcontroller::update/$1/$2/$3/$4');
    $routes->add('delete/(:any)/(:any)', 'Modelcontroller::delete/$1/$2');
    $routes->add('template/(:any)', 'Modelcontroller::template/$1');
    $routes->add('export/(:any)', 'Modelcontroller::export/$1');
    $routes->add('sFile/(:any)', 'Modelcontroller::modelFileUpload/$1');
    $routes->add('upload_timestamp', 'Modelcontroller::upload_timestamp');
});

$routes->group('ac', function ($routes) {
    $routes->add('disable/(:any)/(:any)', 'Actioncontroller::disable/$1/$2');
    $routes->add('enable/(:any)/(:any)', 'Actioncontroller::enable/$1/$2');
});

$routes->add('delete/(:any)/(:any)', 'Actioncontroller::delete/$1/$2');
$routes->add('delete/(:any)/(:any)/(:any)', 'Actioncontroller::delete/$1/$2/$3');
$routes->add('truncate/(:any)', 'Actioncontroller::truncate/$1');
$routes->add('mail/(:any)/(:any)', 'Actioncontroller::mail/$1/$2');
$routes->add('changestatus/(:any)/(:any)/(:any)', 'Actioncontroller::changeStatus/$1/$2/$3');

$routes->add('account/verify/(:any)/(:any)/(:any)', 'Auth::verify/$1/$2/$3');
$routes->add('account/verifyTransaction/(:any)', 'Auth::verifyTransaction/$1');
$routes->add('register', 'Auth::signup');
$routes->add('login', 'Auth::login');
$routes->add('logout', 'Auth::logout');
$routes->add('forget_password', 'Auth::forget');
$routes->add('auth/web', 'Auth::web');

$routes->add('admin/dashboard', 'Viewcontroller::view/admin/dashboard');
$routes->add('uploaded/(:any)/(:any)', 'Api::accessFiles/$1/$2');

