<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'services/MyServices.php');

class Auth extends CI_Controller
{
	public $apiService;

	public function __construct()
	{
		parent::__construct();

		$this->myServices = new MyServices();
		$this->load->library('session');


		// if($this->session->userdata('user_id') !== TRUE){
		//     redirect('login');

	}


	public function login()
	{
		try {

			$this->load->library('form_validation');


			$this->form_validation->set_rules('username', 'Username', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');


			if ($this->form_validation->run() == FALSE) {

				$this->session->set_flashdata('error_message', validation_errors());
				redirect();
			}


			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);



			$endpoint_url = '/login';

			$param = array(
				'username' 	=> $username,
				'password' 	=> $password,
				// 'username' 	=> 'admin',
				// 'password' 	=> '1234',
				'ip'         => $this->input->ip_address(),
				'user_agent'  => $this->input->user_agent()
			);


			$response = $this->myServices->admin_external_api_key($param, $endpoint_url);
			$response_body = json_encode($response['body']);
			$decoded_response = json_decode($response_body, true);


			if ($decoded_response['status']) {

				$usertype = $this->usertype($decoded_response['data']['user_type']);
				$sub_usertype = $this->sub_usertype($decoded_response['data']['sub_usertype']);

				$user_data = [
					'username'      => $decoded_response['data']['username'],
					'logged_in'     => $decoded_response['data']['logged_in'],
					'session_id'    => $decoded_response['data']['session_id'],
					'uid'     		=> $decoded_response['data']['user_id'],
					'usertype'     => $usertype,
					'sub_usertype' => $sub_usertype,
					'company_name'  => $decoded_response['data']['company_name'],
					'company_id'  => $decoded_response['data']['company_id'],
					'name'  => $decoded_response['data']['name']
				];

				// echo json_encode($user_data);

				$this->session->set_userdata($user_data);

				if ($this->session->userdata('usertype') == 'SUPERADMIN' || $this->session->userdata('usertype') == 'ADMIN') {
					redirect('dashboard');
				} else {
					redirect('cashin');
				}
			} else {

				$this->session->set_flashdata('error_message', $decoded_response['message']);
				log_message('error', 'Failed login attempt: Username not found: ' . $username);
				redirect();
			}
		} catch (Exception $e) {

			log_message('error', 'Error during login: ' . $e->getMessage());
			$this->session->set_flashdata('error_message', 'An unexpected error occurred. Please try again.');
			redirect();
		}
	}


public function logout()
{
    
    $param = [
        'uid'         => $this->session->userdata('uid'),
        'session_id'  => $this->session->userdata('session_id')
    ];

  
    $endpoint_url = '/logout';
    $response     = $this->myServices->admin_external_api_key($param, $endpoint_url);
    
  
    $decoded_response = isset($response['body']) ? json_decode(json_encode($response['body']), true) : null;

	
   
    $this->session->sess_destroy();

   
    redirect();
}





	public function info()
	{

		echo phpinfo();

		// echo rand(000, 999).date('Ymd'). date('His');
	}

	function generate_id_with_datetime()
	{

		$datetime = date('ymdHis');

		$random_number = mt_rand(1000, 9999);

		$unique_id = $datetime . $random_number;

		$unique_id = substr($unique_id, 0, 10);

		return $unique_id;
	}


	private function usertype($type)
	{
		$result = '';
		$map = [
			'1' => 'SUPERADMIN',
			'2' => 'ADMIN',
			'3' => 'CLIENT'
		];

		$result = $map[$type];
		return $result;
	}

	private function sub_usertype($type)
	{
		$result = '';
		$map = [
			'1' => 'ADMIN',
			'2' => 'ACCOUNTING',
			'3' => 'TECH',
			'4' => 'CSR',
			'5' => 'MANAGER'
		];

		$result = $map[$type];
		return $result;
	}
}
