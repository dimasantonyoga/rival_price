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

// User Interface
$route['default_controller'] = 'HomeControllerUser';

    // User Auth
    $route['auth/login'] = 'user/AuthControllerUser';
    // User Produk
    $route['produk'] = 'user/ProdukControllerUser';
    // user Detail Lelang
    $route['produk/detail'] = 'user/DetailControllerUser';
    $route['produk/detail/(:any)/(:any)'] = 'user/DetailControllerUser/Detail/$1/$2';
    // user pemenang lelang
    $route['pemenang-lelang'] = 'user/PemenangControllerUser';
    $route['pembayaran'] = 'user/PembayaranControllerUser';
    // dashboard user
    $route['dashboard'] = 'user/HomeDashboardControllerUser';
    $route['account-setting'] = 'user/AccountDashboardControllerUser';
    $route['dashboard/diikuti'] = 'user/LelangDashboardControllerUser/diikuti';
    $route['dashboard/dimenangkan'] = 'user/LelangDashboardControllerUser/dimenangkan';
    $route['dashboard/dimiliki'] = 'user/LelangDashboardControllerUser/dimiliki';

    $route['dashboard/transaksi'] = 'user/TransaksiDashboardControllerUser';
    $route['dashboard/dimenangkan/bayar/(:any)/(:any)'] = 'user/BayarDashboardControllerUser/detail/$1/$2';



// Admin
$route['admin/login'] = 'admin/AuthControllerAdmin';
$route['admin/dashboard'] = 'admin/DashboardControllerAdmin';
$route['admin/user'] = 'admin/UserControllerAdmin';
$route['admin/officer'] = 'admin/OfficerControllerAdmin';
$route['admin/category'] = 'admin/CategoryControllerAdmin';
$route['admin/product'] = 'admin/ProductControllerAdmin';
$route['admin/account-setting'] = 'admin/AccountSettingControllerAdmin';
$route['admin/payment-method'] = 'admin/PaymentMethodControllerAdmin';
$route['admin/payment'] = 'admin/ConfirmationControllerAdmin';
$route['admin/recapitulation'] = 'admin/RecapitulationControllerAdmin';
$route['admin/payment/detail/(:any)/(:any)/(:any)'] = 'admin/DetailPaymentControllerAdmin/detail/$1/$2/$3';







$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
