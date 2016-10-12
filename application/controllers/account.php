<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
        {
                parent::__construct();
                // Your own constructor codein!
                $this->load->model('accountsdb');
                $this->load->model('clearancedb');
                $this->load->view('templates/header');
                
                
        }
	public function index()
	{

		if($this->session->has_userdata('type')==null){
			$this->session->has_userdata('type');
			$this->load->view('login');

		}else{
				if ($this->session->userdata('type')=='admin') {
					$this->load->view('admin/head');
					$this->load->view('admin/splash');

				}elseif ($this->session->userdata('type')=='head') {
					$this->load->view('admin/head');
					$this->load->view('admin/splash');
					// $this->load->view('labhead/head');
					// $this->load->view('labhead/splash');
				}elseif ($this->session->userdata('type') =='staff') {
					$this->load->view('admin/head');
					$this->load->view('admin/splash');
					// $this->load->view('staff/splash');
			
				}else{

					redirect('account/index/error');
				}
		}

		
	}
	public function login()
	{
		$un = $_POST['name'];
		$pass = $_POST['password'];

		$data = array('un' =>	$un ,
					  'pass' =>	do_hash($pass,'md5') );

			@$x = $this->accountsdb->checktype($data);

			@$sesh = array('id' 	=>	$x['id'] ,
					  		'type'	=>	$x['type'],
					  		'lab' 	=>  $x['department'],
					  		'name'	=>  $x['name']);

				if ($x['type']=='admin') {
					$this->session->set_userdata($sesh);
					$this->load->view('admin/head');
					$this->load->view('admin/splash');

				}elseif ($x['type'] == 'head') {
					$this->session->set_userdata($sesh);
					$this->load->view('admin/head');
					$this->load->view('admin/splash');
					// $this->load->view('labhead/head');
					// $this->load->view('labhead/splash');
				}elseif ($x['type'] =='staff') {
					$this->session->set_userdata($sesh);
					$this->load->view('admin/head');
					$this->load->view('admin/splash');
					// $this->load->view('staff/head');
					// $this->load->view('staff/splash');
			
				}else{

					redirect('account/index/error');
				}
			
	}

		public function logout()
	{
		$this->session->sess_destroy();
		redirect('account/index');	
	}
	

	
}
	