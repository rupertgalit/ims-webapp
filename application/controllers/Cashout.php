<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'services/MyServices.php');

class Cashout extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();


		$this->myServices = new MyServices();
	}

	public function cashout_form()
	{
		$this->load->view('form/cashoutform.php');
	}

	public function do_cashout()
	{
		header('Content-Type: application/json');

		try {

			
			$name        = trim($this->input->post('name', TRUE));
			$email       = trim($this->input->post('email', TRUE));
			$account_no  = trim($this->input->post('acc-no', TRUE));
			$amount      = trim($this->input->post('amount', TRUE));
			$channel_code = trim($this->input->post('cashout_method', TRUE));

	

			if (empty($name) || empty($email) || empty($account_no) || empty($amount) || empty($channel_code)) {

				echo json_encode([
					'status' => false,
					'message' => 'All fields are required.'
				]);
				return;
			}

			// Name validation
			if (!preg_match("/^[a-zA-Z\s.'-]+$/", $name)) {
				echo json_encode([
					'status' => false,
					'message' => 'Invalid name format.'
				]);
				return;
			}

			// Email validation
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo json_encode([
					'status' => false,
					'message' => 'Invalid email address.'
				]);
				return;
			}

			// Account number validation
			if (!preg_match('/^[0-9]{6,20}$/', $account_no)) {
				echo json_encode([
					'status' => false,
					'message' => 'Invalid account number.'
				]);
				return;
			}

			// Amount validation
			if (!is_numeric($amount) || $amount <= 0) {
				echo json_encode([
					'status' => false,
					'message' => 'Invalid amount.'
				]);
				return;
			}

			
			// if ($amount < 10) {
			// 	echo json_encode([
			// 		'status' => false,
			// 		'message' => 'Minimum cashout amount is 10.'
			// 	]);
			// 	return;
			// }

		

			$reference_number = strtoupper(uniqid());

			$endpoint_url = '/ngsi/v1/cashout';

			$param = [
				"reference_number" => $reference_number,
				"method" => "dynamic",
				"callback_url" => "https://api.ngsi-pgw-uat.netglobalsolutions.net/motify/service_requests",
				"merchant_details" => [
					"txn_amount" => $amount,
					"name" => $name,
					"bank_code" => $channel_code,
					"account_number" => $account_no,
					"txn_type" => "2"
				],
				"email_confirmation" => [
					"email" => $email,
					"auto" => "off"
				]
			];

	

			$response = $this->myServices->payment($param, $endpoint_url);

			if (!$response) {
				echo json_encode([
					'status' => false,
					'message' => 'Payment gateway not responding.'
				]);
				return;
			}

			$response_decoded = json_decode($response, true);

			if (!$response_decoded) {
				echo json_encode([
					'status' => false,
					'message' => 'Invalid gateway response.'
				]);
				return;
			}



			if (isset($response_decoded['status']) && $response_decoded['status'] === true) {

				echo json_encode([
					'status' => true,
					'message' => $response_decoded['message'],
					'data' => $response_decoded['data']
				]);
			} else {

				echo json_encode([
					'status' => false,
					'message' => $response_decoded['message'] ?? 'Transaction failed.'
				]);
			}
		} catch (Exception $e) {

			echo json_encode([
				'status' => false,
				'message' => 'Server error occurred.'
			]);
		}
	}

	public function channel_list()
	{
		$cmd = $this->input->post('payment-channel', TRUE);

		$endpoint_url = '/channel-list';

		$param = [
			'cmd' => $cmd
		];

		$response = $this->myServices->payment($param, $endpoint_url);
		$response_decoded = json_decode($response, true);

		$result = [];

		if (!empty($response_decoded['data'])) {

			foreach ($response_decoded['data'] as $row) {
				$result[] = [
					'value' => $row['channel_code'],
					'text'  => $row['name']
				];
			}

			$output = [
				'status' => true,
				'data' => $result
			];
		} else {

			$output = [
				'status' => false,
				'message' => 'No banks available'
			];
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($output));
	}
}
