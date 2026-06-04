<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Load the model
	
		// $expiration_time = $this->session->userdata('expiration_time');
		// if ($expiration_time && time() > $expiration_time) {
		// 	// Session has expired, unset userdata and redirect to login
		// 	$this->session->unset_userdata('accountNumber');
		// 	redirect('welcome');
		// }
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') === TRUE){
			if ($this->session->userdata('usertype') == 'SUPERADMIN' || $this->session->userdata('usertype') == 'ADMIN')
				{
					redirect('dashboard');
				}
				else
				{
					redirect('cashin');
				}
		}
		else{
			$this->session->sess_destroy();
			$this->load->view('login/login.php');
		}
		
	}
	public function redirect()
	{
		$this->load->view('redirect/redirect.php');
	}
	public function error()
	{
		$this->load->view('error_massage.php');
	}
	public function test_error()
	{
		$this->load->view('test.php');
	}

	public function form()
	{
		$this->load->view('form/amount.php');
	}
	public function qr()
	{
		$this->load->view('form/qr.php');
	}
	public function success()
	{
		$this->load->view('form/success.php');
	}
	public function failed()
	{
		$this->load->view('form/failed.php');
	}
	public function deposit()
	{
		$this->load->view('dashboard/client_settle_table.php');
	}

	public function newform(){
		$this->load->view('form/newform.php');

	}
	public function checkout(){
		$this->load->view('form/checkout.php');

	}
	// public function amount(){
	// 	$this->load->view('form/amount.php');

	// }
	public function pc_success(){
		$this->load->view('payment_confirmation/success.php');

	}
	public function pc_failed(){
		$this->load->view('payment_confirmation/failed.php');

	}
	public function page_not_found(){
		$this->load->view('404/404.php');

	}
	public function bict_form(){
	    $this->load->view('form/bictform.php');

	}
	public function bict_qr(){
	    $this->load->view('form/bictqr.php');

	}
	public function bict_form2(){
	    $this->load->view('form/bictform2.php');

	}
	public function tcp_form(){
		$this->load->view('form/2c2p_form.php');
	}
	public function native_form()
	{
		$this->load->view('form/native_form.php');
	}




}
