<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyServices
{
   protected $CI;
   protected $secret_key;
   protected $endpoint_base_url;

   public function __construct()
   {
      $this->CI = &get_instance();
      $this->CI->load->database();

      // Key for encryption ( must be the same on both ends )
      // $this->secret_key = $_ENV[ 'SECRET_KEY' ];
      $this->endpoint_base_url = $_ENV['ENDPOINT_BASE_URL'];
   }

   // Generation of Token were developed here as well to lessen the steps
   // This will ommit the step of getting token from the External API

   // public function generate_token()
   // {



   //    $curl = curl_init();

   //    curl_setopt_array($curl, array(
   //       CURLOPT_URL => $_ENV['ENDPOINT_BASE_URL'] . 'generate-token',
   //       CURLOPT_RETURNTRANSFER => true,
   //       CURLOPT_ENCODING => '',
   //       CURLOPT_MAXREDIRS => 10,
   //       CURLOPT_TIMEOUT => 0,
   //       CURLOPT_FOLLOWLOCATION => true,
   //       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   //       CURLOPT_CUSTOMREQUEST => 'GET',
   //       CURLOPT_HTTPHEADER => array(
   //          'X-API-KEY: ' . $_ENV['API_KEY'],
   //          'X-API-USERNAME: ' . $_ENV['API_USERNAME'],
   //          'X-API-PASSWORD: ' . $_ENV['API_PASSWORD']

   //       ),

   //    ));

   //    $response = curl_exec($curl);

   //    curl_close($curl);
   //    // echo $response;

   //    $token = json_decode($response, true);

   //    $token_data = $token['data']['token'];

   //    return $token_data;
   // }

public function generate_token()
{
    $CI =& get_instance();
    $CI->load->library('session');

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => rtrim($_ENV['ENDPOINT_BASE_URL'], '/') . '/generate-token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => [
            'X-API-KEY: ' . $_ENV['API_KEY'],
            'X-API-USERNAME: ' . $_ENV['API_USERNAME'],
            'X-API-PASSWORD: ' . $_ENV['API_PASSWORD']
        ],
    ]);

    $response = curl_exec($curl);
    $curl_error = curl_error($curl);
    curl_close($curl);

    if ($curl_error || !$response) {
        $error_message = 'Token generation failed. cURL error: ' . ($curl_error ?: 'No response from server.');
        log_message('error', $error_message);
        $CI->session->set_flashdata('error', $error_message);
        redirect();
        exit;
    }
    $message = json_decode($response, true);
    $token = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE || !isset($token['data']['token'])) {
        $error_message = 'Token generation failed. Invalid JSON or missing token. Response: ' .  $message['message'];
        log_message('error', $error_message);
        $CI->session->set_flashdata('error', $error_message);
        redirect();
        exit;
    }

    return $token['data']['token'];
}





   public function admin_external_api_key($param, $endpoint_url)
   {

      $generated_token = $this->generate_token();

      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => $_ENV['ENDPOINT_BASE_URL'] . $endpoint_url,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS => json_encode($param),
         CURLOPT_HTTPHEADER => array(
            'X-API-KEY: ' . $_ENV['API_KEY'],
            'X-API-USERNAME: ' . $_ENV['API_USERNAME'],
            'X-API-PASSWORD: ' . $_ENV['API_PASSWORD'],
            'Authorization: Bearer ' . $generated_token,
            'Content-Type: application/json'
         ),
      ));

      $response = curl_exec($curl);

      $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      $curl_error = curl_error($curl);

      curl_close($curl);


      $result['body'] = json_decode($response, true);
      $result['body']['status_code'] =  $http_code ;
      // Return as JSON
      return $result;
   }



   public function payment($param, $endpoint_url)
   {

      $generated_token = $this->generate_token();

      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => $_ENV['ENDPOINT_BASE_URL'] . $endpoint_url,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS => json_encode($param),
         CURLOPT_HTTPHEADER => array(
            'X-API-KEY: ' . $_ENV['API_KEY'],
            'X-API-USERNAME: ' . $_ENV['API_USERNAME'],
            'X-API-PASSWORD: ' . $_ENV['API_PASSWORD'],
            'Authorization: Bearer ' . $generated_token,
            'Content-Type: application/json'
         ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return $response;
   }

   public function auth($param, $endpoint_url)
   {

      $generated_token = $this->generate_token();

      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => $_ENV['ENDPOINT_BASE_URL'] . $endpoint_url,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS => json_encode($param),
         CURLOPT_HTTPHEADER => array(
            'X-API-KEY: ' . $_ENV['API_KEY'],
            'X-API-USERNAME: ' . $_ENV['API_USERNAME'],
            'X-API-PASSWORD: ' . $_ENV['API_PASSWORD'],
            'Authorization: Bearer ' . $generated_token,
            'Content-Type: application/json'
         ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return $response;
   }

// =====================================FOR BICT SERVICES ========================================================================


public function generate_token_bict()
{
    $CI =& get_instance();
    $CI->load->library('session');

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => rtrim($_ENV['ENDPOINT_BASE_URL'], '/') . '/generate-token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => [
            'X-API-KEY: ' . $_ENV['API_KEY_BICT'],
            'X-API-USERNAME: ' . $_ENV['API_USERNAME_BICT'],
            'X-API-PASSWORD: ' . $_ENV['API_PASSWORD_BICT']
        ],
    ]);

    $response = curl_exec($curl);
    $curl_error = curl_error($curl);
    curl_close($curl);

    if ($curl_error || !$response) {
        $error_message = 'Token generation failed. cURL error: ' . ($curl_error ?: 'No response from server.');
        log_message('error', $error_message);
        $CI->session->set_flashdata('error', $error_message);
        redirect();
        exit;
    }
    $message = json_decode($response, true);
    $token = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE || !isset($token['data']['token'])) {
        $error_message = 'Token generation failed. Invalid JSON or missing token. Response: ' .  $message['message'];
        log_message('error', $error_message);
        $CI->session->set_flashdata('error', $error_message);
        redirect();
        exit;
    }

    return $token['data']['token'];
}

  public function payment_bict($param, $endpoint_url)
   {

      $generated_token = $this->generate_token_bict();

      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => $_ENV['ENDPOINT_BASE_URL'] . $endpoint_url,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS => json_encode($param),
         CURLOPT_HTTPHEADER => array(
            'X-API-KEY: ' . $_ENV['API_KEY_BICT'],
            'X-API-USERNAME: ' . $_ENV['API_USERNAME_BICT'],
            'X-API-PASSWORD: ' . $_ENV['API_PASSWORD_BICT'],
            'Authorization: Bearer ' . $generated_token,
            'Content-Type: application/json'
         ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      return $response;
   }




}
