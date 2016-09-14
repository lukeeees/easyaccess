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
        }
	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$un = $_POST['name'];
		$pass = $_POST['password'];

		$data = array('un' =>	$un ,
					  'pass' =>	$pass );

		@$x = $this->accountsdb->checktype($data);

		@$sesh = array('id' 	=>	$x['id'] ,
					  'type'	=>	$x['type'] );

		if ($x['type']=='admin') {
			$this->session->set_userdata('user',$sesh);
			$this->load->view('admin/splash');

		}elseif ($x['type'] == 'head') {
			$this->session->set_userdata('user',$sesh);
			$this->load->view('labhead/splash');
		}elseif ($x['type'] =='staff') {
			$this->session->set_userdata('user',$sesh);
			$this->load->view('staff/splash');
			
		}else{
			$this->load->view('index');
		}
	}



}
