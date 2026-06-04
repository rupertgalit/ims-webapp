<?php



defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'services/MyServices.php');

class Cashin extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      // $this->apiService = new ApiService();
      // $this->load->model('Trans_model', 'repo');
      $this->myServices = new MyServices();
      $this->load->helper('url');
      $this->load->helper('security');
      $this->load->library('form_validation');
   }

   function generateRandomString_get($length = 16)
   {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
   }

   function generate_id_with_datetime()
   {

      $datetime = date('ymdHis');

      $random_number = mt_rand(1000, 9999);

      $unique_id = $datetime . $random_number;

      $unique_id = substr($unique_id, 0, 10);

      return $unique_id;
   }

   // public function cashin(){
   //    $this->load->view('form/qr.php');

   // }


   // public function cashin()
   // {

   //    $client_name = $this->input->post('company-name');
   //    $payment_option = $this->input->post('paymentoption');;
   //    $amount = $this->input->post('amount');
   //    $formatted_amount = number_format((float)$amount, 2, '.', '');

   //    $param = array(
   //       'amount' => $formatted_amount,
   //       'reference_number' => $this->generate_id_with_datetime(),
   //       'payment_type' => $payment_option,
   //       'name' => $client_name,
   //       'phone_number' => "09123456782",
   //       'email' => "test@gmail.com",
   //       'return_url' => "http://demo-webapp.test/success",
   //       'callback_url' => "http://demo-api.test/payment/callback",
   //       'notify_url' => "test.com"

   //    );

   //    $response = $this->myServices->cashin($param);

   //    $json_response = json_decode($response, true);

   //    if ($payment_option === "2") {

   //       if ($json_response['status'] === true) {

   //          $redirect_uri = $json_response['data']['redirect_url'];

   //          redirect($redirect_uri);
   //       } else {

   //          show_error('Invalid response or status.');
   //          show_error($json_response['message']);
   //       }
   //    } else if ($payment_option === "3") {

   //       if ($json_response['status'] === true) {


   //          $response_data['data'] = $json_response;
   //          $response_data['ref_num'] =  $param['reference_number'];

   //          $this->load->view('form/qr.php', $response_data);
   //       } else {

   //          show_error('Invalid response or status.');
   //          show_error($json_response['message']);
   //       }
   //    }
   // }

   // sample cashin
   public function cashin_v2()
   {

      $this->form_validation->set_rules('amount', 'Amount', 'required|numeric|greater_than[0]');
      $this->form_validation->set_rules('mobile-number', 'Mobile Number', 'required|regex_match[/^[0-9]{10,15}$/]');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[2]|max_length[100]|xss_clean');

      if ($this->form_validation->run() === FALSE) {

         $response = [
            'status' => false,
            'message' => validation_errors()
         ];
         $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode($response));
         return;
      }


      $amount = $this->security->xss_clean($this->input->post('amount', TRUE));
      $phone_number = $this->security->xss_clean($this->input->post('mobile-number', TRUE));
      $email = $this->security->xss_clean($this->input->post('email', TRUE));
      $name = $this->security->xss_clean($this->input->post('name', TRUE));

      $endpoint_url = 'v1/cashin';

      $param = [
         "endpoint" => "p2m-generateQR",
         "reference_number" => $this->generate_id_with_datetime(),
         "return_url" => "https://www.goglogo.com/s.asp?lo=MERCHANT%20PAGE",
         "callback_url" => "http://demo-api.test/payment/postback",
         "merchant_details" => [
            "txn_amount" => $amount,
            "method" => "dynamic",
            "txn_type" => "1",
            "name" => $name,
            "mobile_number" => $phone_number
         ],
         "email_confirmation" => [
            "email" => $email,
            "auto" => "on"
         ],
         "other_details" => [
            [
               "item" => "test1",
               "amount" => 10
            ],
            [
               "item" => "test2",
               "amount" => 10
            ]
         ]
      ];


      $response = $this->myServices->payment($param, $endpoint_url);
      $decoded = json_decode($response, true);
      // echo $response;

      if (is_array($decoded) && isset($decoded['status']) && $decoded['status'] === true) {
         if (!empty($decoded['data']['url']) && filter_var($decoded['data']['url'], FILTER_VALIDATE_URL)) {
            redirect($decoded['data']['url']);
            return;
         }
      }
      show_404();
   }


// =================================CASHIN FOR 2C2P=========================================
      public function cashin_2c2p()
   {

      $this->form_validation->set_rules('amount', 'Amount', 'required|numeric|greater_than[0]');
      $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|regex_match[/^[0-9]{10,15}$/]');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      // $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[2]|max_length[100]|xss_clean');

      if ($this->form_validation->run() === FALSE) {

         $response = [
            'status' => false,
            'message' => validation_errors()
         ];
         $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode($response));
         return;
      }


      $amount = $this->input->post('amount', TRUE);
      $phone_number = $this->input->post('phone_number', TRUE);
      $email = $this->input->post('email', TRUE);
      // $name = $this->input->post('name', TRUE);


      // echo $amount; echo $phone_number; echo  $email ;

      //  $amount = "100";
      // $phone_number = "09511223438";
      // $email = "devs@netglobalsolutions.net";
      // $name = "TEST";

      $endpoint_url = 'api/v1/webpay';

      $param = [
         "endpoint" => "p2m-generateQR",
         "reference_number" => $this->generate_id_with_datetime(),
         "return_url" => "https://www.goglogo.com/s.asp?lo=MERCHANT%20PAGE",
         "callback_url" => "https://api.ngsi-pgw-uat.netglobalsolutions.net/notify/postback",
         "merchant_details" => [
            "txn_amount" => $amount,
            "method" => "dynamic",
            "txn_type" => "2",
            "name" => "John Jones",
            "mobile_number" => $phone_number
         ],
         "email_confirmation" => [
            "email" => $email,
            "auto" => "on"
         ],

      ];


      $response = $this->myServices->payment($param, $endpoint_url);
      $decoded = json_decode($response, true);
      // echo $response;

      if (is_array($decoded) && isset($decoded['status']) && $decoded['status'] === true) {
         if (!empty($decoded['data']['url']) && filter_var($decoded['data']['url'], FILTER_VALIDATE_URL)) {
            redirect($decoded['data']['url']);
            return;
         }
      }
      show_404();
   }

   // =================================CASHIN FOR VLPAY=========================================
      public function cashin_vlpay()
   {

      // $this->form_validation->set_rules('amount', 'Amount', 'required|numeric|greater_than[0]');
      // $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|regex_match[/^[0-9]{10,15}$/]');
      // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      // // $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[2]|max_length[100]|xss_clean');

      // if ($this->form_validation->run() === FALSE) {

      //    $response = [
      //       'status' => false,
      //       'message' => validation_errors()
      //    ];
      //    $this->output
      //       ->set_content_type('application/json')
      //       ->set_status_header(400)
      //       ->set_output(json_encode($response));
      //    return;
      // }


      $amount = $this->input->post('amount', TRUE);
      $amount = (float) str_replace(',', '', $this->input->post('amount', TRUE));
      $amount_final = $amount * 100;
      $phone_number = $this->input->post('phone_number', TRUE);
      $email = $this->input->post('email', TRUE);
      $name = $this->input->post('name', TRUE);
      $payment_channel = $this->input->post('payment_method', TRUE);
      $description = $this->input->post('description', TRUE);


      // echo $amount; echo $phone_number; echo  $email ; echo $name ; echo $payment_channel; echo $description;

      //  $amount = "100";
      // $phone_number = "09511223438";
      // $email = "devs@netglobalsolutions.net";
      // $name = "TEST";

      $endpoint_url = 'cashin_vlpay/payment';

      $param = [
        
         "reference_number" => $this->generate_id_with_datetime(),
         "return_url" => "https://www.goglogo.com/s.asp?lo=MERCHANT%20PAGE",
         "callback_url" => "https://api.ngsi-pgw-uat.netglobalsolutions.net/notify/postback",
         "description" => $description,
         "merchant_details" => [
            "txn_amount" => $amount_final,
            "txn_type" => "3",
            "payment_channel" => $payment_channel,
            "payment_method" => "QR",
            "name" => $name,
            "mobile_number" => $phone_number
         ],
         "email_confirmation" => [
            "email" => $email,
            "auto" => "on"
         ],

      ];


      $response = $this->myServices->payment($param, $endpoint_url);
      $decoded = json_decode($response, true);
      echo $response;

      if (is_array($decoded) && isset($decoded['status']) && $decoded['status'] === true) {
         if (!empty($decoded['data']['url']) && filter_var($decoded['data']['url'], FILTER_VALIDATE_URL)) {
            redirect($decoded['data']['url']);
            return;
         }
      }
      show_404();
   }




   // ======================================PAYMENT FOR BICT===================================================================

   public function cashin_bict()
   {

      $this->form_validation->set_rules('amount', 'Amount', 'required|numeric|greater_than[0]');
      $this->form_validation->set_rules('mobile-number', 'Mobile Number', 'required|regex_match[/^[0-9]{10,15}$/]');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[2]|max_length[100]|xss_clean');

      if ($this->form_validation->run() === FALSE) {

         $response = [
            'status' => false,
            'message' => validation_errors()
         ];
         $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode($response));
         return;
      }


      $amount = $this->security->xss_clean($this->input->post('amount', TRUE));
      $phone_number = $this->security->xss_clean($this->input->post('mobile-number', TRUE));
      $email = $this->security->xss_clean($this->input->post('email', TRUE));
      $name = $this->security->xss_clean($this->input->post('name', TRUE));

      $club = $this->security->xss_clean($this->input->post('club-name', TRUE));
      $custom_club = ($club === 'others')
         ? $this->security->xss_clean($this->input->post('custom-club', TRUE))
         : $club;

      $region = $this->security->xss_clean($this->input->post('region', TRUE));
      $custom_region = ($region === 'others')
         ? $this->security->xss_clean($this->input->post('custom-region', TRUE))
         : $region;

      $paymentdesc = $this->security->xss_clean($this->input->post('purpose', TRUE));
      $custom_paymentdesc= ($paymentdesc === 'others')
         ? $this->security->xss_clean($this->input->post('custom-purpose', TRUE))
         : $paymentdesc;

      $fee = 20;

      $txnamount = $amount + $fee;

      $endpoint_url = 'v1/cashin';

      $param = [
         "endpoint" => "p2m-generateQR",
         "reference_number" => 'TFOE' . $this->generate_id_with_datetime(),
         "return_url" => "https://google.com",
         "callback_url" => $_ENV['ENDPOINT_BASE_URL'] . "/payment/postback",
         "merchant_details" => [
            "txn_amount" => $txnamount,
            "method" => "dynamic",
            "txn_type" => "1",
            "name" => $name,
            "mobile_number" => $phone_number
         ],
         "email_confirmation" => [
            "email" => $email,
            "auto" => "on"
         ],
         "other_details" => [
            [
               "item" => "Region",
               "amount" => $custom_region
            ],
            [
               "item" => "Club",
               "amount" => $custom_club
            ],
            [
               "item" => "Payment Description",
               "amount" => $custom_paymentdesc
            ],

            [
               "item" => "Amount",
               "amount" => $amount
            ],
            [
               "item" => "Fee",
               "amount" => $fee
            ]

         ]
      ];


      $response = $this->myServices->payment_bict($param, $endpoint_url);
      $decoded = json_decode($response, true);
      // echo $response;

      if (is_array($decoded) && isset($decoded['status']) && $decoded['status'] === true) {
         if (!empty($decoded['data']['url']) && filter_var($decoded['data']['url'], FILTER_VALIDATE_URL)) {
            redirect($decoded['data']['url']);
            return;
         }
      }
      show_404();
   }


   public function generate_qr()
   {


      $ref_num = $this->input->get('ref', TRUE);


      if (empty($ref_num) || !preg_match('/^\S+$/', $ref_num)) {
         $response = [
            'status' => false,
            'message' => 'Invalid or missing reference number.'
         ];
         $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode($response));
         return;
      }


      $endpoint_url = 'cashin/get_reference_number';

      $param = [
         'reference_number' => $ref_num
      ];


      $response = $this->myServices->payment($param, $endpoint_url);


      $response_decoded = json_decode($response, true);


      if (
         is_array($response_decoded) &&
         isset($response_decoded['status']) &&
         $response_decoded['status'] === true &&
         isset($response_decoded['data'])
      ) {

         $data['records'] = $response_decoded['data'];
         $this->load->view('form/newform.php', $data);
      } else {

         $this->output->set_status_header(404);
         show_404(); // or use redirect('main/page_not_found');
      }
   }

   public function check_ref()
   {

      //  sanitize 
      $ref_num = $this->input->post('refnum', TRUE);


      if (empty($ref_num) || !preg_match('/^\S+$/', $ref_num)) {
         $response = [
            'status' => false,
            'message' => 'Invalid reference number.'
         ];
         header('Content-Type: application/json');
         echo json_encode($response);
         return;
      }


      $endpoint_url = 'cashin/get_reference_number';
      $param = [
         'reference_number' => $ref_num
         //   'reference_number' => 'PGW1112144'
      ];

      $response = $this->myServices->payment($param, $endpoint_url);
      $response_decoded = json_decode($response, true);
      // echo $response;
      // check API response structure
      if (!is_array($response_decoded) || !isset($response_decoded['status'])) {
         $response = [
            'status' => false,
            'message' => 'Invalid API response.'
         ];
         header('Content-Type: application/json');
         echo json_encode($response);
         return;
      }


      $record_status = $response_decoded['data']['cashin_status'] ?? null;
      $redirect_url = null;

      if ($response_decoded['status']) {
         if ($record_status === "SUCCESS") {
            $payment_status = "SUCCESS";
            $redirect_url = base_url('pc-success') . '?refnum=' . urlencode($ref_num);
         } elseif ($record_status === "FAILED") {
            $payment_status = "FAILED";
            $redirect_url = base_url('pc-failed') . '?refnum=' . urlencode($ref_num);
         } else {
            $payment_status = "CREATED";
         }

         $result = [
            'status' => true,
            'message' => 'success',
            'payment_status' => $payment_status,
            'redirect_url' => $redirect_url,
            'data' => $response_decoded['data']
         ];
      } else {
         $result = [
            'status' => false,
            'message' => $response_decoded['message'] ?? 'Unknown error'
         ];
      }

      // Output JSON
      header('Content-Type: application/json');
      echo json_encode($result);
   }

   public function pc_success()
   {

      $ref_num = $this->input->get('refnum', TRUE);


      if (empty($ref_num) || !preg_match('/^\S+$/', $ref_num)) {
         $response = [
            'status' => false,
            'message' => 'Invalid reference number.'
         ];
         header('Content-Type: application/json');
         echo json_encode($response);
         return;
      }


      $endpoint_url = 'cashin/get_reference_number';
      $param = [
         'reference_number' => $ref_num
         //   'reference_number' => 'PGW1112144'
      ];

      $response = $this->myServices->payment($param, $endpoint_url);
      $response_decoded = json_decode($response, true);

      if (!is_null($response_decoded) && $response_decoded['status']) {
         $this->load->view('payment_confirmation/success.php', $response_decoded);
      } else {
         redirect();
      }
   }


   // public function generate_token()
   // {

   //    $response = $this->myServices->generate_token();
   //    echo $response;
   //    // // echo json_encode($response);     

   // }

   // public function test_env()
   // {
   //    echo $_ENV['ENDPOINT_BASE_URL'] . 'generate-token';
   // }
}
