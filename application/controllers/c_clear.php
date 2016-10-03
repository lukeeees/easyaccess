<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_clear extends CI_Controller {

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

				$user = $this->session->userdata('user');

				if ($this->session->has_userdata('user')!=$user['type']){
					redirect('account/index');
				}
				$this->load->view('admin/head');
				$this->load->view('templates/header');
			  //  $this->load->view('violation/head');
			  //  $this->load->view('clearance/head');

		}

	public function index()
	{
		$this->load->view('');
	}

	// clearance - show violation
	public function clearance()
	{
		$data['x'] = $this->clearancedb->showvio();
		$this->load->view('clearance/v_clear',$data);
		//$this->load->view('admin/clearance');
	}
	//end clearance

	//show violation
	public function aVio()
	{
		$this->load->view('violaton/v_vio');
	}

	public function violation()
	{

	$this->load->view('violation/v_vio');
	
	}

	public function addvio()//add violation
	{
		/*$this->accountsdb->where('id', $id);
		$query = $this->accountsdb->get('student');*/

		$student  = array('idnumber'=>		$_POST['idnumber'],
					   'lastname'	=>		$_POST['lastname'],
					   'name'		=>		$_POST['name'],
					   'middlename'	=>		$_POST['middlename'],
					   'yearlevel'	=>		$_POST['yearlevel'],
					   'course'		=>		$_POST['course'],
					   'department'	=>		$_POST['department'],
					   'violation'	=>		$_POST['violation'],
					   'laboratory'	=>		$_POST['laboratory'],
					   'status'		=>		$_POST['status']);

	
		$this->clearancedb->addvio($student);
		$msg="Successful";
		redirect('c_clear/violation');
	}

	public function sVio() //show violation search
	{
		$student = $this->input->post('name_search');
		$ref = $this->input->post('searchBy');
		
		if(!$ref)
			$ref = 'id';
		//$ref = 'owner';
		$data['x'] = $this->clearancedb->get_search($student,$ref);
		$this->load->view('clearance/vs_clear',$data);
	}
	
	public function upVio($values)//view update vioalation
	{
		$data['x'] = $this->clearancedb->solItem($values);
		$this->load->view('violation/up_vio',$data);
	}

	

	public function VioUpdate()
	{
	$student  = array(     'idnumber'	=>		$_POST['idnumber'],
						   'lastname'	=>		$_POST['lastname'],
						   'name'		=>		$_POST['name'],
						   'middlename'	=>		$_POST['middlename'],
						   'yearlevel'	=>		$_POST['yearlevel'],
						   'course'		=>		$_POST['course'],
						   'department'	=>		$_POST['department'],
						   'violation'	=>		$_POST['violation'],
						   'laboratory'	=>		$_POST['laboratory'],
						   'status'		=>		$_POST['status']);

	
		$this->clearancedb->upVio($student);
		$msg="Successful";
		redirect('violation/sVio');
	}
}
?>
	
  