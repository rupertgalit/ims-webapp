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
|	https://codeigniter.com/userguide3/general/routing.html
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

$route['404_override'] = 'main/page_not_found';

$route['default_controller'] = 'main';
$route['login-form'] = 'main/login';
$route['redirect'] = 'main/redirect';
$route['form'] = 'main/form';

$route['checkout'] = 'main/checkout';
$route['qr'] = 'main/qr';
$route['success'] = 'main/success';
$route['failed'] = 'main/failed';
$route['amount'] = 'main/amount';
// $route['pc-success'] = 'main/pc_success';
$route['pc-failed'] = 'main/pc_failed';

/*dashboard pages*/
$route['dashboard'] = 'dashboard/dashboard';
$route['transaction'] = 'dashboard/transaction_table';
$route['cashin'] = 'dashboard/cashin_table';
$route['cashout'] = 'dashboard/cashout_table';
$route['comingsoon'] = 'dashboard/comingsoon';
$route['client-settle-table'] = 'dashboard/client_settle_table';
$route['merchant-settle-table'] = 'dashboard/merchant_settle_table';
$route['create_client'] = 'dashboard/create_client';
$route['list_account'] = 'dashboard/account_list_table';
$route['create_user'] = 'dashboard/create_user';
$route['list_user'] = 'dashboard/user_list_table';
$route['create_acc_user'] = 'dashboard/create_acc_user';
$route['api-logs'] = 'dashboard/api_logs';
$route['user-logs'] = 'dashboard/user_logs';
$route['soa-cashin'] ='dashboard/soa_cashin_bank';
$route['check_ref_bank'] = 'dashboard/check_ref_bank';
$route['check-payment-details'] = 'dashboard/check_payment_details';
$route['search'] = 'dashboard/search';
$route['cashin-static'] = 'dashboard/cashin_static';
$route['soa-cashout'] ='dashboard/soa_cashout_bank';
$route['2c2p-transactions'] ='dashboard/cashin_2c2p_table';

$route['cashin-v2'] = 'cashin/cashin_v2';
$route['check-reference'] = 'cashin/check_ref';
$route['generate-qr'] = 'cashin/generate_qr';
$route['pc-success'] = 'cashin/pc_success';

$route['cashin-form'] = 'cashin/cashin';
$route['auth-login'] = 'auth/login';
$route['auth-logout'] = 'auth/logout';


$route['dep'] = 'main/deposit';
$route['prefund'] = 'dashboard/prefund';
$route['prefund-history'] = 'dashboard/prefund_history';
$route['bank-deposit'] = 'dashboard/bank_deposit';
$route['bank-deposit-history'] = 'dashboard/bank_deposit_history';

$route['cashout-form'] = 'cashout/cashout_form';

$route['bict-form'] = 'main/bict_form';
$route['bict-form2'] = 'main/bict_form2';
$route['bict-qr'] = 'main/bict_qr';
$route['cashin-bict'] = 'cashin/cashin_bict';


$route['cashin-2c2p'] = 'dashboard/cashin_2c2p_table';
$route['2c2p-form'] = 'main/tcp_form';
$route['payment-2c2p'] = "cashin/cashin_2c2p";
$route['native-form'] ='main/native_form';

$route['payment-vlpay'] ='cashin/cashin_vlpay';


