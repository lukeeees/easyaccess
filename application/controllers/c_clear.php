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

				//if ($this->session->has_userdata('user')!=$user['type']){
				//	redirect('account/index');
				//}

			//	if ($this->session->userdata('type')=="staff"){
			//		redirect('account/index');
			//	}

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
	

		if($this->input->post('clear')!==null)		
		{		
			$this->clearancedb->updatemessage($this->input->post('id'));
			$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Violation table updated.
        </div>');
		}

		$data['x'] = $this->clearancedb->showvio("Pending");

		if($this->input->post('btn_search')!==null)
		{
			$data['x'] = $this->clearancedb->searchstudent($this->input->post('name_search'),$this->input->post('searchBy'),'Pending');			
		}

		$this->load->view('clearance/v_clear',$data);
	}

	public function viewall()
	{
		$data['x'] = $this->clearancedb->showvio('');

		if($this->input->post('btn_search')!==null)
		{
			$data['x'] = $this->clearancedb->searchstudent($this->input->post('name_search'),$this->input->post('searchBy'),'');			
		}

		$this->load->view('clearance/v_viewall',$data);
	}
	//end clearance

	public function notif()
	{
		echo $this->clearancedb->unseennotif();
		exit;
	}

	public function notifications()
	{
		$data['x'] = $this->clearancedb->shownotifications();

		$this->load->view('clearance/notifications',$data);
	}


	//show violation
	public function aVio()
	{
				
		$this->load->view('violaton/v_vio',$data);
	}

	public function violation()
	{
	$data['laboratory'] = $this->accountsdb->get_laboratory();
	$this->load->view('violation/v_vio',$data);
	
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
					   'status'		=>		'Pending');

		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Violation is successfully added!</div>');
		$this->clearancedb->addvio($student);	
		redirect('c_clear/sVio');
	}

	public function sVio() //show violation search
	{
		$data['x'] = $this->clearancedb->showvio('');

		if($this->input->post('btn_search')!==null)
		{
			$data['x'] = $this->clearancedb->searchstudent($this->input->post('name_search'),$this->input->post('searchBy'),'');			
		}
		
		$this->load->view('clearance/vs_clear',$data);

/*
		$student = $this->input->post('name_search');
		$ref = $this->input->post('searchBy');
		
		if(!$ref)
			$ref = 'id';
		
		$data['x'] = $this->clearancedb->get_search($student,$ref);
		//$this->session->set_flashdata('msg', '<div class=alert-success text-center">Violation is successfully added!</div>');
		$this->load->view('clearance/vs_clear',$data);*/
	}

	public function sLia() //show liabilities
	{
		$data['x'] = $this->clearancedb->showlia('');

		if($this->input->post('btn_search')!==null)
		{
			$data['x'] = $this->clearancedb->showlia($this->input->post('name_search'),$this->input->post('searchBy'),'');			
		}
		
		$this->load->view('clearance/vlia',$data);

/*
		$student = $this->input->post('name_search');
		$ref = $this->input->post('searchBy');
		
		if(!$ref)
			$ref = 'id';
		
		$data['x'] = $this->clearancedb->get_search($student,$ref);
		//$this->session->set_flashdata('msg', '<div class=alert-success text-center">Violation is successfully added!</div>');
		$this->load->view('clearance/vs_clear',$data);*/
	}
	 
	public function upVio($values)//view update vioalation
	{
		$data['x'] = $this->clearancedb->solItem($values);
		$this->load->view('violation/up_vio',$data);
	}

	public function VioUpdate()
	{
	$student  = array(     'id'			=>		$_POST['id'],
						   'idnumber'	=>		$_POST['idnumber'],
						   'lastname'	=>		$_POST['lastname'],
						   'name'		=>		$_POST['name'],
						   'middlename'	=>		$_POST['middlename'],
						   'yearlevel'	=>		$_POST['yearlevel'],
						   'course'		=>		$_POST['course'],
						   'department'	=>		$_POST['department'],
						   'violation'	=>		$_POST['violation'],
						   'laboratory'	=>		$_POST['laboratory'],
						   'status'		=>		$_POST['status']);
		
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Record has been updated!</div>');
		$this->clearancedb->upVio($student);
		redirect('c_clear/sVio');
	}

	public function clearedvio($id)
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Violation has been updated.!</div>');
		$this->clearancedb->clearedvio($id);
		redirect('c_clear/sVio');

	}
}
?>
	
  