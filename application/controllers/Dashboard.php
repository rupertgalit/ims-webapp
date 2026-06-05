<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . 'libraries/REST_Controller.php';

// require APPPATH . 'libraries/Format.php';

require_once(APPPATH . 'services/MyServices.php');

class Dashboard extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      //   $this->apiService = new ApiService();
      date_default_timezone_set('Asia/Manila');

      $this->myServices = new MyServices();
      $this->load->library('form_validation');

      $this->check_sess();

      if ($this->session->userdata('logged_in') === TRUE) {
      } else {
         redirect();
      }

      $this->output
         ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
         ->set_header("Cache-Control: post-check=0, pre-check=0", false)
         ->set_header("Pragma: no-cache");
   }



   private function generate_id_with_datetime()
   {
      $datetime = date('His');
      $random_number = mt_rand(1000, 9999);
      $unique_id = $datetime . $random_number;
      $unique_id = substr($unique_id, 0, 10);

      return $unique_id;
   }


   public function check_sess()
   {

      $session_id = $this->session->userdata('session_id');
      //  $session_id = "12312313";

      $endpoint_url = "/chk-session";
      $param = array(
         'sess_id' => $session_id

      );

      $response = $this->myServices->admin_external_api_key($param, $endpoint_url);
      $response_body = json_encode($response['body']);
      $response_decoded = json_decode($response_body, true);

      if (!isset($response_decoded['status']) || !$response_decoded['status']) {
         redirect('auth-logout');
      }

      if (empty($response_decoded['is_active'])) {
         redirect('auth-logout');
      }
   }

   public function dashboard()
   {


      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'ACCOUNTING', 'SUPERADMIN', 'TECH', 'CSR', 'MANAGER'];



      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         $session_id = $this->session->userdata('session_id');
         //  $session_id = "12312313";

         $endpoint_url = "/dashboard-data";
         $param = array(
            'sess_id' => $session_id

         );

         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);
         $response_body = json_encode($response['body']);
         $response_decoded = json_decode($response_body, true);

         // if ($response_decoded['status_code'] == 200)
         // {
         //    $result['status'] = true;  
         //    $result['status_code'] =$response_decoded['status_code'];  
         //    $result['message'] = "success"; 
         //    $result['data']  = json_decode($response_body, true);
         // }
         // else
         // {
         //    $result['status'] = false;  
         //    $result['status_code'] =$response_decoded['status_code'];  
         //    $result['message'] = "failed"; 
         //    $result['data']  = json_decode($response_body, true);
         // }


         $this->load->view('dashboard/dashboard.php', $response_decoded);
      } else {
         redirect();
      }
   }

   // public function dashboard_data()
   // {
   //    $session_id = $this->input->post('session-id');
   //    // $session_id = "12312313";

   //    $endpoint_url = "/dashboard-data";
   //    $param = array(
   //       'sess_id' => $session_id

   //    );

   //    $response = $this->myServices->admin_external_api_key($param, $endpoint_url);
   //    $response_body = json_encode($response['body']);
   //    $response_decoded = json_decode($response_body, true);

   //    // if ($response_decoded['status_code'] == 200)
   //    // {
   //    //    $result['status'] = true;  
   //    //    $result['status_code'] =$response_decoded['status_code'];  
   //    //    $result['message'] = "success"; 
   //    //    $result['data']  = json_decode($response_body, true);
   //    // }
   //    // else
   //    // {
   //    //    $result['status'] = false;  
   //    //    $result['status_code'] =$response_decoded['status_code'];  
   //    //    $result['message'] = "failed"; 
   //    //    $result['data']  = json_decode($response_body, true);
   //    // }

   //    echo json_encode($response_decoded);
   // }

   // public function transaction_table()
   // {
   //    $input_date_from = $this->input->post('date-from', true) ?? date('Y-m-d');
   //    $input_date_to = $this->input->post('date-to', true) ?? date('Y-m-d');
   //    $status = $this->input->post('status', true) ?? 'all';
   //    $client = $this->input->post('client', true);

   //    $client = ($this->session->userdata('user_type') == 'CLIENT') ? $this->session->userdata('company_id') : ($client ?? 'all');


   //    $endpoint_url = '/transaction-data';
   //    $param = array(
   //       'sess_id' => $this->session->userdata('session_id'),
   //       'date_from' => $input_date_from,
   //       'date_to' => $input_date_to,
   //       'trans_type' => 'transaction',
   //       'status' => $status,
   //       'company_code' => $client
   //    );


   //    // Pass the $param array to the service method
   //    $response = $this->myServices->admin_external_api_key($param, $endpoint_url);
   //    // var_dump($response);

   //    // echo json_encode($response);
   //    $resp = json_decode($response, true);
   //    $data['status'] = $resp['status'];
   //    $data['date_from'] = $resp['date_from'] ?? $input_date_from;
   //    $data['date_to'] = $resp['date_to'] ?? $input_date_to;
   //    // $data['messege'] = $resp['message'];
   //    $data['records'] = isset($resp['data']) ? $resp['data'] : [];


   //    $client = $this->myServices->company_list($param);
   //    $clients = json_decode($client, true);
   //    $data['clients'] = $clients['data'];

   //    //   echo json_encode($resp);
   //    $this->load->view('dashboard/transaction.php', $data);
   // }


   public function cashin_table()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN', 'CLIENT'];
      $allowedSubUserTypes = ['ADMIN', 'ACCOUNTING', 'SUPERADMIN', 'TECH', 'CSR', 'MANAGER'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {


         $input_date_from = $this->input->post('date-from', true) ?? date('Y-m-d');
         $input_date_to = $this->input->post('date-to', true) ?? date('Y-m-d');
         $status = $this->input->post('status', true) ?? 'all';
         $client = $this->input->post('client', true);

         $client = ($this->session->userdata('usertype') == 'CLIENT') ? $this->session->userdata('company_id') : ($client ?? 'all');

         $endpoint_url = '/transaction-data';

         $param = array(
            'sess_id'      => $this->session->userdata('session_id'),
            'date_from'    => $input_date_from,
            'date_to'      => $input_date_to,
            'trans_type'   => 'cashin_vlpay',
            'status'       => $status,
            'company_code' => $client
         );

         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);
         $response_body = json_encode($response['body']);

         $resp = json_decode($response_body, true);



         // $data['status_code'] = $resp;
         $data['status'] = $resp['status'];
         $data['message'] = $resp['messege']; // Note: it's "messege" in the original JSON
         $data['date_from'] = $resp['date_from'] ?? $input_date_from;
         $data['date_to'] = $resp['date_to'] ?? $input_date_to;

         // $data['records'] = isset($resp['data']) ? $resp['data'] : [];


         $companylist_enpoint = '/company-list';
         $companylist_param = array(
            'sess_id' => $this->session->userdata('session_id')
         );

         $client = $this->myServices->admin_external_api_key($companylist_param, $companylist_enpoint);

         $response_body = json_encode($client['body']);

         $clients = json_decode($response_body, true);

         $data['selected_status'] = $status;
         $data['clients'] = $clients['data'];

         $companyMap = [];
         foreach ($data['clients'] as $client) {
            $companyMap[$client['company_id']] = $client['company_name'];
         }

         if (!empty($resp['data'])) {


            $filtered_records = [];

            foreach ($resp['data'] as $R) {
               $filtered_records[] = [
                  'ci_id'            => $R['ci_id'],
                  'company_id'       => $R['company_id'],
                  'company_name'     => isset($companyMap[$R['company_id']]) ? $companyMap[$R['company_id']] : 'Unknown',
                  'reference_number' => $R['reference_number'],
                  'trans_reference'  => $R['trans_reference'],
                  'merchant_ref'     => $R['merchant_ref'],
                  'txn_amount'       => $R['txn_amount'],
                  'total_amount'     => $R['total_amount'],
                  'deducted_amount'  => $R['deducted_amount'],
                  'status'           => $R['status'],
                  'date_requested'   => $R['date_requested'],
                  'date_modified'    => $R['date_modified'],
                  'type'             => $R['type'],
                  'bank_reference'   => $R['bank_reference'],
                  'name'             => $R['name']

               ];
            }
         } else {
            $filtered_records = [];
         }
         $data['records'] = $filtered_records;

         // echo json_encode($data);

         $this->load->view('dashboard/cashin.php', $data);
      } else {
         redirect();
      }
   }

   public function search()
   {

      $search_data = $this->input->post('search_data', true);

      $endpoint_url = '/cashin-search';

      $param = array(
         'session_id' => $this->session->userdata('session_id'),
         'search_data' => $search_data,

      );

      $response = $this->myServices->admin_external_api_key($param, $endpoint_url);
      $response_body = json_encode($response['body']);

      $resp = json_decode($response_body, true);

      $data['status'] = $resp['status'];
      $data['date_from'] = date('Y-m-d');
      $data['date_to'] = date('Y-m-d');
      $data['selected_status'] = 'ALL';

      if ($resp['status']) {
         // $data['records'] = isset($resp['data']) ? $resp['data'] : [];


         $companylist_enpoint = '/company-list';
         $companylist_param = array(
            'sess_id' => $this->session->userdata('session_id')
         );

         $client = $this->myServices->admin_external_api_key($companylist_param, $companylist_enpoint);

         $response_body = json_encode($client['body']);

         $clients = json_decode($response_body, true);

         $data['clients'] = $clients['data'];

         $companyMap = [];
         foreach ($data['clients'] as $client) {
            $companyMap[$client['company_id']] = $client['company_name'];
         }

         if (!empty($resp['data'])) {


            $filtered_records = [];

            foreach ($resp['data'] as $R) {
               $filtered_records[] = [
                  'ci_id'            => $R['ci_id'],
                  'company_id'       => $R['company_id'],
                  'company_name'     => isset($companyMap[$R['company_id']]) ? $companyMap[$R['company_id']] : 'Unknown',
                  'reference_number' => $R['reference_number'],
                  'trans_reference'  => $R['trans_reference'],
                  'merchant_ref'     => $R['merchant_ref'],
                  'txn_amount'       => $R['txn_amount'],
                  'total_amount'     => $R['total_amount'],
                  'deducted_amount'  => $R['deducted_amount'],
                  'status'           => $R['status'],
                  'date_requested'   => $R['date_requested'],
                  'date_modified'    => $R['date_modified'],
                  'type'             => $R['type'],
                  'bank_reference'   => $R['bank_reference'],
                  'name'             => $R['name']

               ];
            }
         } else {
            $filtered_records = [];
         }
         $data['records'] = $filtered_records;

         // echo json_encode($data);
         $this->load->view('dashboard/cashin.php', $data);
      } else {
         redirect('cashin');
      }
   }

   public function cashout_table()
   {
      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN', 'CLIENT'];
      $allowedSubUserTypes = ['ADMIN', 'ACCOUNTING', 'SUPERADMIN', 'TECH', 'CSR', 'MANAGER'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {


         $input_date_from = $this->input->post('date-from', true) ?? date('Y-m-d');
         $input_date_to = $this->input->post('date-to', true) ?? date('Y-m-d');
         $status = $this->input->post('status', true) ?? 'all';
         $client = $this->input->post('client', true);

         $client = ($this->session->userdata('usertype') == 'CLIENT') ? $this->session->userdata('company_id') : ($client ?? 'all');

         $endpoint_url = '/transaction-data';

         $param = array(
            'sess_id'      => $this->session->userdata('session_id'),
            'date_from'    => $input_date_from,
            'date_to'      => $input_date_to,
            'trans_type'   => 'cashout',
            'status'       => $status,
            'company_code' => $client
         );

         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);
         $response_body = json_encode($response['body']);

         $resp = json_decode($response_body, true);



         // $data['status_code'] = $resp;
         $data['status'] = $resp['status'];
         $data['message'] = $resp['messege']; // Note: it's "messege" in the original JSON
         $data['date_from'] = $resp['date_from'] ?? $input_date_from;
         $data['date_to'] = $resp['date_to'] ?? $input_date_to;

         // $data['records'] = isset($resp['data']) ? $resp['data'] : [];


         $companylist_enpoint = '/company-list';
         $companylist_param = array(
            'sess_id' => $this->session->userdata('session_id')
         );

         $client = $this->myServices->admin_external_api_key($companylist_param, $companylist_enpoint);

         $response_body = json_encode($client['body']);

         $clients = json_decode($response_body, true);

         $data['selected_status'] = $status;
         $data['clients'] = $clients['data'];

         $companyMap = [];
         foreach ($data['clients'] as $client) {
            $companyMap[$client['company_id']] = $client['company_name'];
         }

         if (!empty($resp['data'])) {


            $filtered_records = [];

            foreach ($resp['data'] as $R) {
               $filtered_records[] = [
                  'ci_id'            => $R['co_id'],
                  'company_id'       => $R['company_id'],
                  'company_name'     => isset($companyMap[$R['company_id']]) ? $companyMap[$R['company_id']] : 'Unknown',
                  'reference_number' => $R['reference_number'],
                  'trans_reference'  => $R['trans_reference'],
                  'merchant_ref'     => $R['merchant_ref'],
                  'firstname'        => $R['firstname'],
                  'txn_amount'       => $R['txn_amount'],
                  'total_amount'     => $R['total_amount'],
                  'deducted_amount'  => $R['deducted_amount'],
                  'status'           => $R['status'],
                  'date_requested'   => $R['date_requested'],
                  'date_modified'    => $R['date_modified'],
                  'type'             => $R['type'],
                  'bank_reference'   => $R['bank_reference']

               ];
            }
         } else {
            $filtered_records = [];
         }
         $data['records'] = $filtered_records;

         // echo json_encode($data);

         $this->load->view('dashboard/cashout.php', $data);
      } else {
         redirect();
      }
   }


    public function cashin_2c2p_table()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN', 'CLIENT'];
      $allowedSubUserTypes = ['ADMIN', 'ACCOUNTING', 'SUPERADMIN', 'TECH', 'CSR', 'MANAGER'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {


         $input_date_from = $this->input->post('date-from', true) ?? date('Y-m-d');
         $input_date_to = $this->input->post('date-to', true) ?? date('Y-m-d');
         $status = $this->input->post('status', true) ?? 'all';
         $client = $this->input->post('client', true);

         $client = ($this->session->userdata('usertype') == 'CLIENT') ? $this->session->userdata('company_id') : ($client ?? 'all');

         $endpoint_url = '/transaction-data';

         $param = array(
            'sess_id'      => $this->session->userdata('session_id'),
            'date_from'    => $input_date_from,
            'date_to'      => $input_date_to,
            'trans_type'   => 'cashin_2c2p',
            'status'       => $status,
            'company_code' => $client
         );

         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);
         $response_body = json_encode($response['body']);

         $resp = json_decode($response_body, true);

         // $data['status_code'] = $resp;
         $data['status'] = $resp['status'];
         $data['message'] = $resp['messege']; // Note: it's "messege" in the original JSON
         $data['date_from'] = $resp['date_from'] ?? $input_date_from;
         $data['date_to'] = $resp['date_to'] ?? $input_date_to;

         // $data['records'] = isset($resp['data']) ? $resp['data'] : [];


         $companylist_enpoint = '/company-list';
         $companylist_param = array(
            'sess_id' => $this->session->userdata('session_id')
         );

         $client = $this->myServices->admin_external_api_key($companylist_param, $companylist_enpoint);

         $response_body = json_encode($client['body']);

         $clients = json_decode($response_body, true);

         $data['selected_status'] = $status;
         $data['clients'] = $clients['data'];

         $companyMap = [];
         foreach ($data['clients'] as $client) {
            $companyMap[$client['company_id']] = $client['company_name'];
         }

         if (!empty($resp['data'])) {


            $filtered_records = [];

            foreach ($resp['data'] as $R) {
               $filtered_records[] = [
                  'ci_id'            => $R['ci_id'],
                  'company_id'       => $R['company_id'],
                  'company_name'     => isset($companyMap[$R['company_id']]) ? $companyMap[$R['company_id']] : 'Unknown',
                  'reference_number' => $R['reference_number'],
                  'trans_reference'  => $R['trans_reference'],
                  'merchant_ref'     => $R['merchant_ref'],
                  'txn_amount'       => $R['txn_amount'],
                  'total_amount'     => $R['total_amount'],
                  'deducted_amount'  => $R['deducted_amount'],
                  'status'           => $R['status'],
                  'date_requested'   => $R['date_requested'],
                  'date_modified'    => $R['date_modified'],
                  'type'             => $R['type'],
                  'bank_reference'   => $R['bank_reference'],
                  'name'             => $R['name']

               ];
            }
         } else {
            $filtered_records = [];
         }
         $data['records'] = $filtered_records;

      $this->load->view('dashboard/2c2p.php', $data);
      } else {
         redirect();
      }
   }



   public function client_settle_table()
   {

      //    $input_date_from = $this->input->post('date-from', true) ?? date('Y-m-d');
      //    $input_date_to = $this->input->post('date-to', true) ?? date('Y-m-d');
      //    $status = $this->input->post('status', true) ?? 'all';
      //    $client = $this->input->post('client', true);

      //    $client = ($this->session->userdata('user_type') == 'CLIENT') ? $this->session->userdata('company_id') : ($client ?? 'all');

      //    $param = array(
      //       'sess_id' => $this->session->userdata('session_id'),
      //       'date_from' => $input_date_from,
      //       'date_to' => $input_date_to,
      //       'trans_type' => 'deposit',
      //       'status' => $status,
      //       'company_code' => $client
      //   );


      //    // Pass the $param array to the service method
      //    $response = $this->myServices->transaction_data($param);


      //    // echo json_encode($response);
      //    $resp = json_decode($response, true);
      //    $data['status'] = $resp['status'];
      //    $data['messege'] = $resp['messege'];
      //    $data['date_from'] = $resp['date_from'] ?? $input_date_from;
      //    $data['date_to'] = $resp['date_to'] ?? $input_date_to;
      //    $data['records'] = isset($resp['data']) ? $resp['data'] : [];


      //    $client = $this->myServices->company_list($param);
      //    $clients = json_decode($client,true);
      //    $data['selected_status'] = $status; 
      //    $data['clients'] = $clients['data'];

      //       // echo json_encode($data);

      $this->load->view('dashboard/client_settle_table.php');
   }

   public function account_list_table()
   {
      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'TECH', 'CSR'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {


         $endpoint_url = 'api-user-list';

         $param = array(
            'sess_id' => $this->session->userdata('session_id')

         );


         $account = $this->myServices->admin_external_api_key($param, $endpoint_url);


         $response_body = json_encode($account['body']);

         $resp = json_decode($response_body, true);

         $response['records'] = $resp['data'];

         $this->load->view('dashboard/list_acc.php', $response);
      } else {
         redirect();
      }
   }

   public function user_list_table()
   {


      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'TECH', 'CSR'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         $endpoint_url = 'user-account-list';

         $param = array(
            'sess_id' => $this->session->userdata('session_id')

         );


         $client = $this->myServices->admin_external_api_key($param, $endpoint_url);

         $response_body = json_encode($client['body']);

         $resp = json_decode($response_body, true);

         $response['records'] = $resp['data'];

         // var_dump($response);

         $this->load->view('dashboard/list_user.php', $response);
      } else {
         redirect();
      }
   }

   public function create_api_user()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'TECH', 'CSR'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         header('Content-Type: application/json');


         if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405); // Method Not Allowed
            echo json_encode([
               'status' => false,
               'message' => 'Method not allowed. Use POST.'
            ]);
            return;
         }


         $client_name = $this->input->post('client-name', TRUE);
         $company_name = $this->input->post('company-name', TRUE);
         $merchant_name = $this->input->post('merchant-name', TRUE);

         // Validate required fields
         if (empty($client_name) || empty($company_name) || empty($merchant_name)) {
            http_response_code(400); // Bad Request
            echo json_encode([
               'status' => false,
               'message' => 'Missing required fields: client-name, company-name, or merchant-name.'
            ]);
            return;
         }


         $param = [
            'sess_id'      => $this->session->userdata('session_id'),
            'client_name'  => $client_name,
            'company_name' => $company_name,
            'merch_id'     => $merchant_name,
            'image_name'   => 'test.png' // You can make this dynamic if needed
         ];


         $endpoint = 'api/create_api_access';
         $response = $this->myServices->admin_external_api_key($param, $endpoint);

         $response_body = json_encode($response['body']);

         $decoded = json_decode($response_body, true);

         if (json_last_error() !== JSON_ERROR_NONE || !isset($decoded['status'])) {
            http_response_code(502); // Bad Gateway
            echo json_encode([
               'status' => false,
               'message' => 'Invalid response from API.'
            ]);
            return;
         }

         // Return the decoded response
         echo json_encode($decoded);
      } else {
         redirect();
      }
   }


   public function create_acc_user()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'TECH', 'CSR'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         $endpoint_url = 'admin/create_user';

         $company_name = $this->input->post('company-name');
         $account_type = $this->input->post('user-type');
         $sub_account_type = $this->input->post('sub-user-type');
         $account_name = $this->input->post('user-name');
         // $sess_id = $this->input->post('sess-id');



         $param = array(
            // 'sess_id' => $sess_id,
            'sess_id' => $this->session->userdata('session_id'),
            'company_name' => $company_name,
            'account_type' => $account_type,
            'sub_account_type' => $sub_account_type,
            'account_name' => $account_name
         );

         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);
         $response_body = json_encode($response['body']);
         $resp = json_decode($response_body, true);
         //   echo $resp['message'];


         $this->session->set_flashdata('message', $resp['message']);


         redirect('create_user');
      } else {
         redirect();
      }
   }



   public function merchant_settle_table()
   {
      $this->load->view('dashboard/merchant_settle_table.php');
   }

   public function comingsoon()
   {
      $this->load->view('dashboard/comingsoon.php');
   }
   public function create_client()
   {
      $this->load->view('dashboard/create_account.php');
   }
   public function list_account()
   {
      $this->load->view('dashboard/list_acc.php');
   }



   public function create_user()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'TECH', 'CSR'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         $company_endpoint_url = 'company-list';
         $sub_usertype_endpoint_url = 'sub-account-list';

         $param = array(

            'sess_id' => $this->session->userdata('session_id'),

         );

         $sub_usertype = $this->myServices->admin_external_api_key($param, $sub_usertype_endpoint_url);

         $sub_usertype_body = json_encode($sub_usertype['body']);

         $resp_subtype = json_decode($sub_usertype_body, true);

         if ($resp_subtype['status']) {

            $company_list = $this->myServices->admin_external_api_key($param, $company_endpoint_url);

            $company_list_body = json_encode($company_list['body']);
            $resp_comp = json_decode($company_list_body, true);

            $data['data_subtype'] = $resp_subtype['data'];
            $data['data_company_list'] = $resp_comp['data'];
         }
         $this->load->view('dashboard/create_user.php', $data);
         // echo json_encode($data);

      } else {
         redirect();
      }
   }

   public function switch()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'TECH', 'CSR'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            show_error('Invalid request method.', 405);
            return;
         }


         // Sanitize input
         $toggle_status = $this->input->post('toggle_status', TRUE);
         $uid = $this->input->post('uid', TRUE);
         $user_set = $this->input->post('user-set', TRUE);

         // Basic validation
         $this->form_validation->set_rules('uid', 'User ID', 'required|numeric');
         $this->form_validation->set_rules('user-set', 'User Set', 'required|in_list[user,api]');

         if ($this->form_validation->run() === FALSE) {

            $errors = validation_errors();
            $this->session->set_flashdata('error', $errors);
            redirect($_SERVER['HTTP_REFERER'] ?? 'dashboard');
            return;
         }

         // Determine status from checkbox
         $status = ($toggle_status == 1) ? '1' : '0';


         $param = [
            'sess_id' => $this->session->userdata('session_id'),
            'status' => $status,
            'uid' => $uid,
            'user_set' => $user_set,
         ];


         $switch_endpoint_url = 'admin/set_status';


         $response = $this->myServices->admin_external_api_key($param, $switch_endpoint_url);

         // Check and redirect
         switch ($user_set) {
            case 'user':
               redirect('list_user');
               break;
            case 'api':
               redirect('list_account');
               break;
            default:
               show_error('Invalid user-set value.', 400);
               break;
         }
      } else {
         redirect();
      }
   }


   public function acc_details()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'TECH', 'CSR'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         $param = array(
            'sess_id' => $this->session->userdata('session_id'),
            'uid' => $this->input->post('uid'),
            'user_set' => $this->input->post('user_set')

         );

         $response = $this->myServices->api_user_details($param);
         $response_body = json_encode($response['body']);


         echo $response_body;
      } else {
         redirect();
      }
   }

   public function user_details()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'TECH', 'CSR'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         $endpoint_url = "user/user-account-data";
         $param = array(
            // 'sess_id' => '2406081303',
            'sess_id' => $this->session->userdata('session_id'),
            'uid' => $this->input->post('uid'),
            'user_set' => $this->input->post('user_set')
            // 'sess_id' => $this->input->post('sess_id'),
            // 'uid' => '1',
            // 'user_set' =>'user'

         );

         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);
         $response_body = json_encode($response['body']);

         echo $response_body;
      } else {
         redirect();
      }
   }

   // public function update_account()
   // {

   //    $param = array(
   //       'sess_id' => $this->session->userdata('session_id'),
   //       'user_id' => $this->session->userdata('user_id'),
   //       'password' => '1234',
   //       'company_name' => $this->input->post('company-name'),
   //       'image_name' => 'asd',
   //       'cashin_min_amount' => $this->input->post('ci-min-amount'),
   //       'cashin_max_amount' => $this->input->post('ci-max-amount'),
   //       'cashin_rate' => $this->input->post('ci-rate'),
   //       'cashout_rate' => $this->input->post('co-rate'),
   //       'cashout_min_amount' => '10',
   //       'cashout_max_amount' => '100',
   //       'client_id' => '11',

   //    );

   //    $response = $this->myServices->update_account($param);

   //    // echo $response;
   //    redirect('list_account');
   // }

   public function api_logs()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'TECH', 'CSR'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         $start_id = $this->input->post('start-id', true) ?? '1';
         $end_id = $this->input->post('end-id', true) ?? '10';

         $endpoint_url = "/api-log-details";
         $param = array(
            // 'sess_id' => '2406081303',
            'sess_id' => $this->session->userdata('session_id'),
            'id_from' => $start_id,
            'id_to' =>  $end_id

         );

         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);


         $response_body = json_encode($response['body']);

         $decoded_response = json_decode($response_body, true);

         if ($decoded_response['status']) {
            $result['records'] = $decoded_response['data'];
         } else {
            $result['status'] =   $decoded_response['status'];
            $result['message'] =   $decoded_response['message'];
            // echo json_encode($result);
         }


         $this->load->view('dash-partial/header.php');
         $this->load->view('dash-partial/sidebar.php');
         $this->load->view('dash-partial/nav.php');
         $this->load->view('dashboard/api_logs.php', $result);
      } else {
         redirect();
      }
   }
   public function user_logs()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'TECH', 'CSR'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         $start_id = $this->input->post('start-id', true) ?? '1';
         $end_id = $this->input->post('end-id', true) ?? '10';



         $endpoint_url = "/user-log-details";
         $param = array(
            // 'sess_id' => '2406081303',
            'sess_id' => $this->session->userdata('session_id'),
            'id_from' => $start_id,
            'id_to' =>  $end_id

         );

         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);

         $response_body = json_encode($response['body']);

         $decoded_response = json_decode($response_body, true);



         if ($decoded_response['status']) {
            $result['records'] = $decoded_response['data'];
         } else {
            $result['status'] =   $decoded_response['status'];
            $result['message'] =   $decoded_response['message'];
            // echo json_encode($result);
         }

         $this->load->view('dash-partial/header.php');
         $this->load->view('dash-partial/sidebar.php');
         $this->load->view('dash-partial/nav.php');
         $this->load->view('dashboard/user_logs.php', $result);
      } else {
         redirect();
      }
   }

   public function soa_cashin_bank()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'ACCOUNTING', 'TECH', 'CSR', 'MANAGER'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         $today = date('m/d/Y');

         $startdate = $this->input->post("start-date") ?: $today;
         $enddate   = $this->input->post("end-date") ?: $today;

         $startdate_formatted = date('m/d/Y', strtotime($startdate));
         $enddate_formatted = date('m/d/Y', strtotime($enddate));

         // echo $startdate_formatted . ' ' . $enddate_formatted.' '; 
         // echo $startdate_formatted . ' ' . $enddate_formatted; 
         // echo '<br>';
         //  echo $startdate . ' ' . $enddate.' ';
         //  echo $startdate . ' ' . $enddate;

         $endpoint_url = "/soa-details";
         $param = array(
            // 'sess_id' => '2406081303',
            'sess_id' => $this->session->userdata('session_id'),
            'ds' => $startdate_formatted,
            'de' => $enddate_formatted
            // 'ds' => '05/19/2025',
            // 'de' => '05/19/2025'

         );
         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);

         $response_body = json_encode($response['body']);



         $data = json_decode($response_body, true);

         $keys = [];
         $values = [];

         if ($data && isset($data['status']) && $data['status'] === true && isset($data['data'])) {
            foreach ($data['data'] as $entry) {
               if (isset($entry['@attributes'])) {
                  if (empty($keys)) {
                     $keys = array_keys($entry['@attributes']);
                  }
                  $values[] = array_values($entry['@attributes']);
               }
            }
         }

         // echo json_encode([
         //    'keys' => $keys,
         //    'values' => $values
         // ], JSON_PRETTY_PRINT);



         $this->load->view('dash-partial/header.php');
         $this->load->view('dash-partial/sidebar.php');
         $this->load->view('dash-partial/nav.php');
         $this->load->view('dashboard/soa_cashin_bank.php', ['keys' => $keys, 'values' => $values]);
      } else {
         redirect();
      }
   }

   public function check_payment_details()
   {

      $this->load->helper('security');


      $ref_num = $this->input->post('refnum', TRUE);


      if (empty($ref_num) || !preg_match('/^\S+$/', $ref_num)) {
         return $this->json_response(false, 'Invalid reference number.');
      }

      $endpoint_url = 'cashin/get_reference_number';
      $param = [
         'reference_number' => $ref_num
      ];


      $response = $this->myServices->admin_external_api_key($param, $endpoint_url);

      if (!isset($response['body'])) {
         return $this->json_response(false, 'No response from service.');
      }

      // Return API response body as JSON
      return $this->json_response(true, 'Data retrieved successfully.', $response['body']);
   }

   private function json_response($status, $message, $data = [])
   {
      $output = [
         'status'  => $status,
         'message' => $message,
         'data'    => $data
      ];

      // Output JSON
      header('Content-Type: application/json');
      echo json_encode($output);
      exit;
   }

   public function check_ref_bank()
   {

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'ACCOUNTING', 'TECH', 'CSR', 'MANAGER'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         $merch_ref = $this->input->post('merch-ref');
         $sess_id = $this->input->post('sess-id');
         // $merch_ref = "5294813725301608";

         $endpoint_url = "/allbank-trans-status";
         $param = array(
            'sess_id' => $sess_id,
            // 'sess_id' => $this->session->userdata('session_id'),
            'merch_reference' => $merch_ref
         );

         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);

         $data = is_array($response['body']) ? $response['body'] : json_decode($response['body'], true);


         // Send JSON response
         $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));

         // echo json_encode($data);

      } else {
         redirect();
      }
   }

   // public function add_prefund_client()
   // {

   //    $amount = $this->input->post('amount');
   //    $companyname = $this->input->post('companyname');


   //    $userType = $this->session->userdata('usertype');
   //    $subUserType = $this->session->userdata('sub_usertype');
   //    $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
   //    $allowedSubUserTypes = ['ADMIN', 'ACCOUNTING', 'TECH', 'CSR', 'MANAGER'];

   //    if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {


   //       $endpoint_url = "/admin/pre_fund";
   //       $param = array(
   //          'sess_id' => $this->session->userdata('session_id'),
   //          // 'sess_id' => $this->session->userdata('session_id'),
   //          'reference_number' => 'NGSI'.$this->generate_id_with_datetime(),
   //          'amount' => $amount,
   //          'company_name' => $companyname
   //       );

   //       $response = $this->myServices->admin_external_api_key($param, $endpoint_url);

   //       $data = is_array($response['body']) ? $response['body'] : json_decode($response['body'], true);


   //       echo json_encode($response['body']);
   //       // $response_body = json_encode($response['body']);

   //       // $decoded_response = json_decode($response_body, true);

   //    } else {
   //       redirect();
   //    }
   // }
   public function add_prefund_client()
   {
      header('Content-Type: application/json');


      $this->form_validation->set_rules('amount', 'Amount', 'required|numeric|greater_than[0]');
      $this->form_validation->set_rules('companyname', 'Company Name', 'required|min_length[2]|max_length[150]');
      $this->form_validation->set_rules('bank_reference', 'Bank Reference', 'required|min_length[3]|max_length[100]');

      if ($this->form_validation->run() == FALSE) {

         echo json_encode([
            'status'  => false,
            'message' => validation_errors()
         ]);
         return;
      }

      $amount         = $this->input->post('amount', TRUE);
      $companyname    = $this->input->post('companyname', TRUE);
      $bank_reference = $this->input->post('bank_reference', TRUE);

      // Clean filename & prevent collisions
      $original_name = pathinfo($_FILES['proof_image']['name'], PATHINFO_FILENAME);
      $extension     = pathinfo($_FILES['proof_image']['name'], PATHINFO_EXTENSION);
      $filename      = time() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '', $original_name) . '.' . $extension;

      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');

      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'ACCOUNTING', 'TECH', 'CSR', 'MANAGER'];



      // Check permissions
      if (
         !in_array($userType, $allowedUserTypes) ||
         !in_array($subUserType, $allowedSubUserTypes)
      ) {

         echo json_encode([
            'status' => false,
            'message' => 'Unauthorized access.'
         ]);
         return;
      }

      // Prepare API call params
      $endpoint_url = "/admin/pre_fund";

      // Prepare API params
      $param = [
         'sess_id'          => $this->session->userdata('session_id'),
         'reference_number' => 'PF' . $this->generate_id_with_datetime(),
         'amount'           => $amount,
         'company_name'     => $companyname,
         'bank_reference'   => $bank_reference,
         'image_name'       => $filename
      ];

      // Call admin API
      $response = $this->myServices->admin_external_api_key($param, $endpoint_url);

      // Decode response safely
      $data = is_array($response['body'])
         ? $response['body']
         : json_decode($response['body'], true);

      if (empty($data) || !isset($data['status'])) {
         echo json_encode([
            'status'  => false,
            'message' => 'Error uploading pre-fund data.'
         ]);
         return;
      }

      if ($data['status'] !== true) {
         echo json_encode([
            'status'  => false,
            'message' => $data['message']
         ]);
         return;
      }

      // ====== File Upload Section ======

      // Ensure upload folder exists
      $upload_path = FCPATH . 'uploads/prefundref/';
      if (!is_dir($upload_path)) {
         mkdir($upload_path, 0755, true);
      }

      // Check if file is selected
      if (empty($_FILES['proof_image']['name'])) {
         echo json_encode([
            'status'  => false,
            'message' => 'Proof image is required.'
         ]);
         return;
      }

      // Configure upload
      $config = [
         'upload_path'   => $upload_path,
         'allowed_types' => 'jpg|jpeg|png',
         'file_name'     => $filename,
         'overwrite'     => false,
         'max_size'      => 2048 //limit 2mb
      ];

      $this->load->library('upload', $config);

      // Attempt upload
      if (!$this->upload->do_upload('proof_image')) {
         echo json_encode([
            'status'  => false,
            'message' => strip_tags($this->upload->display_errors())
         ]);
         return;
      }

      // Get uploaded file info
      $uploaded_file = $this->upload->data();
      $stored_file_name = $uploaded_file['file_name'];

      echo json_encode([
         'status'  => true,
         'message' => 'Prefund successful!',
         'file'    => $stored_file_name
      ]);
   }



   public function check_password()
   {
      $userType = $this->session->userdata('usertype');
      $subUserType = $this->session->userdata('sub_usertype');
      $allowedUserTypes = ['ADMIN', 'SUPERADMIN'];
      $allowedSubUserTypes = ['ADMIN', 'ACCOUNTING', 'TECH', 'CSR', 'MANAGER'];

      if (in_array($userType, $allowedUserTypes) && in_array($subUserType, $allowedSubUserTypes)) {

         // Get posted password from frontend form
         $password = $this->input->post('password', true);

         $endpoint_url = "/check-login";
         $param = array(
            'sess_id'  => $this->session->userdata('session_id'),
            'username' => $this->session->userdata('username'),
            'password' => $password
         );

         $response = $this->myServices->admin_external_api_key($param, $endpoint_url);

         $data = is_array($response['body'])
            ? $response['body']
            : json_decode($response['body'], true);

         // Always respond with JSON
         $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
      } else {

         redirect();
         //   $this->output
         //       ->set_status_header(403)
         //       ->set_content_type('application/json')
         //       ->set_output(json_encode([
         //           'status'  => 'error',
         //           'message' => 'Unauthorized access'
         //       ]));
      }
   }

   public function prefund()
   {

      $endpoint_url = "company-detials";
      $param = array(
         'sess_id'  => $this->session->userdata('session_id'),
      );

      $response = $this->myServices->admin_external_api_key($param, $endpoint_url);

      // echo json_encode($response);
      $data['companies'] = isset($response['body']['data']) ? $response['body']['data'] : array();
      // var_dump($data);

      $companylist_endpoint = '/company-list';
      $companylist_param = array(
         'sess_id' => $this->session->userdata('session_id')
      );

      $client = $this->myServices->admin_external_api_key($companylist_param, $companylist_endpoint);

      $response_body = json_encode($client['body']);

      $clients = json_decode($response_body, true);

      $data['clients'] = $clients['data'];
      $this->load->view('dashboard/prefund.php', $data);
   }



   public function prefund_history()
   {

      $datefrom = $this->input->post('date-from') ?? date('Y-m-d');
      $dateto = $this->input->post('date-to') ?? date('Y-m-d');
      $company_id = $this->input->post('client');
      $sess_id = $this->session->userdata('session_id');

      $usertype = $this->session->userdata('usertype');

      switch ($usertype) {

         case 'SUPERADMIN':
         case 'ADMIN':
            $company_id = $this->input->post('client') ?? 'all';
            break;

         case 'CLIENT':
            $company_id = $this->session->userdata('company_id');
            break;

         default:
            echo "<script>alert('Invalid user type');</script>";
            return;
      }

      $endpoint_url = "fund-history";
      $param = array(
         'sess_id'  => $sess_id,
         'data_from' => "prefund",
         'date_from' => $datefrom,
         'date_to' => $dateto,
         'company_id' => $company_id
      );

      $response = $this->myServices->admin_external_api_key($param, $endpoint_url);

      // echo json_encode($response);
      $data['prefund_data'] = isset($response['body']['data']) ? $response['body']['data'] : array();


      $companylist_endpoint = '/company-list';
      $companylist_param = array(
         'sess_id' => $sess_id
      );

      $client = $this->myServices->admin_external_api_key($companylist_param, $companylist_endpoint);

      $response_body = json_encode($client['body']);

      $clients = json_decode($response_body, true);

      $data['clients'] = $clients['data'];

      // echo "<pre>";
      // var_dump($data);
      // echo "</pre>";
      $this->load->view('dashboard/prefund_history.php', $data);
   }



   public function prefund_approval()
   {
      $ref_num = $this->input->post('reference_number');
      $sess_id = $this->input->post('sess_id') ?: $this->session->userdata('session_id');

      if (empty($ref_num)) {
         echo json_encode(['status' => false, 'message' => 'The reference_number field is required']);
         return;
      }

      $endpoint_url = "prefund-approved";

      $param = [
         'sess_id'  => $sess_id,
         'reference_number' => $ref_num,
         "img" => "asd"
      ];

      $response = $this->myServices->admin_external_api_key($param, $endpoint_url);

      echo json_encode($response);
   }


   public function bank_deposit()
   {
      $this->load->view('dashboard/bank_deposit.php');
   }
   public function bank_deposit_history()
   {
      $this->load->view('dashboard/bank_deposit_history.php');
   }

   public function cashin_static()
   {
      $this->load->view('dashboard/cashin_static.php');
   }
   public function soa_cashout_bank()
   {
      $this->load->view('dashboard/soa_cashout_bank.php');
   }

   public function upload_image_test()
   {

      $this->load->view('dashboard/upload_image.php');
   }

   public function upload_image()
   {
      $config['upload_path'] = str_replace('\\', '/', realpath(FCPATH . 'uploads')) . '/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['max_size']      = 2048;
      $config['encrypt_name']  = TRUE;

      if (!is_dir(FCPATH . 'uploads/')) {
         echo "Folder does NOT exist";
         exit;
      }

      // if (!is_writable(FCPATH . 'uploads/')) {
      //    echo "Folder is NOT writable";
      //    exit;
      // }

      // echo "Folder exists and writable";
      // exit;

      // var_dump($config['upload_path']);
      // exit;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('userfile')) {
         echo $this->upload->display_errors();
      } else {
         $data = $this->upload->data();
         echo "Upload Success!";
      }
   }
   public function tcp_page()
   {
      
   }
}
