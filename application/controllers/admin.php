<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

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

                if ($this->session->userdata('type')=="staff"){
					redirect('account/index');
				}
		
              	$this->load->view('admin/head');

                $this->load->view('templates/header');

        }
	public function index()
	{
		$this->load->view('admin/stat');
	}
	public function aLab()
	{
		if ($this->session->userdata('type')=="admin") {
			$this->load->view('admin/addlab');
		}
		else
		{
			redirect("account/index");
		}
	}
	public function sUser()
	{
		$data['start'] = $this->uri->segment(3);
		$this->load->library('pagination');	
		$pi = 15;		

		if($this->session->userdata('type')!="staff")
		{
			$name = $this->input->post('name_search');
			$ref = $this->input->post('searchBy');
			
			if(!$ref)
				$ref = 'name';
			
			$data['x'] = $this->accountsdb->showusers($name,$ref,$data['start'],$pi);
			$total = $this->accountsdb->showusers($name,$ref,$data['start'],"");

			$config['base_url'] = 'http://localhost:8080/easyaccess/index.php/admin/sUser';
			$config['total_rows'] = count($total);
			$config['per_page'] = $pi; 
			$config['cur_tag_open'] = '<li class="page-item active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = "</li>";
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['first_url'] = '';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';
			$config['first_url'] = '';

			$this->pagination->initialize($config); 	

			$this->load->view('admin/showusers',$data);
		}		
		else
		{
			redirect("account/index");
		}

	}
	public function aUser(){

		$this->load->view('admin/addUser');
	}
	public function LUser(){

		$result = $this->accountsdb->get_labs();
		$this->load->view('admin/addLH',$result);
	}

	public function stUser(){
		$result = $this->accountsdb->get_labs();
		$this->load->view('admin/addstaff',$result);
	}

	public function addLH()
	{
		$user  = array('id'			=>		$_POST['idnum'],
					   'lname'		=>		$_POST['lname'],
					   'fname'		=>		$_POST['fname'],
					   'mname'		=>		$_POST['mname'],
					   'dept'		=>		$_POST['dept'],
					   'user'		=>		$_POST['name'],
					   'password'	=>		do_hash($_POST['pass'],'md5'),
					   'type'		=>		'head');

		$data = $this->accountsdb->showusers("","");

		foreach ($data as $key) {
			if($_POST['idnum']==$key['idnumber'] || $_POST['name']==$key['name']){
				$flag=1;
				}
			}//end foreach
		if($flag == 1 ){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Duplicate Data</div>');
            redirect('admin/LUser/');
		}else{
			$this->accountsdb->addAdmin($user);
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Record is successfully added!</div>');
			redirect('admin/sUser');
		}

	}

	public function addStaff()
	{
		$user  = array('id'			=>		$_POST['idnum'],
					   'user'		=>		$_POST['name'],
					   'lname'		=>		$_POST['lname'] ,
					   'fname'		=>		$_POST['fname'],
					   'mname'		=>		$_POST['mname'],
					   'password'	=>		do_hash($_POST['pass'],'md5'),
					   'type'		=>		'staff',
					   'dept'		=>		$_POST['department'],
					   'lab'		=>		'ceac');

				$data = $this->accountsdb->showusers("","");

		foreach ($data as $key) {
			if($_POST['idnum']==$key['idnumber'] || $_POST['name']==$key['name']){
				$flag=1;
				}
			}//end foreach
		if($flag == 1 ){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Duplicate Data</div>');
            redirect('admin/stUser/');
		}else{
			$this->accountsdb->addAdmin($user);
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Record is successfully added!</div>');
			redirect('admin/sUser');
		}	

	}

	public function addUser()
	{


		$user  = array('id'			=>		$_POST['idnum'],
					   'user'		=>		$_POST['name'],
					   'lname'		=>		$_POST['lname'] ,
					   'fname'		=>		$_POST['fname'],
					   'mname'		=>		$_POST['mname'],
					   'password'	=>		do_hash($_POST['pass'],'md5'),
					   'type'		=>		'admin',
					   'dept'		=>		$_POST['owner']);
		$data = $this->accountsdb->showusers("","");

		foreach ($data as $key) {
			if($_POST['idnum']==$key['idnumber'] || $_POST['name']==$key['name']){
				$flag=1;
				}
			}//end foreach
		if($flag == 1 ){
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Duplicate Data</div>');
            redirect('admin/aUser/');
		}else{
			$this->accountsdb->addAdmin($user);
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Record is successfully added!</div>');
			redirect('admin/sUser');
		}
	}
	
	public function deleteuser($id)
	{
		$this->accountsdb->deleteUser($id);
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Table has been updated.!</div>');
		redirect('admin/sUser');

	}

	public function updateuser($values)
	{
		if($this->input->post('submit'))
		{			
			$this->accountsdb->updateuser($this->input->post());
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Record is successfully added!</div>');
			redirect('admin/sUser');
		}

		$data = $this->accountsdb->headandlab($values);
		$data['userinfo'] = $data['user'][0];
		$r = $this->accountsdb->get_labs();
		$data['laboratory'] = $r['laboratory'];
		$this->load->view('admin/edituser',$data);
	}



	public function addLaboratory()
	{
		$lab = array('lab'		=>	$_POST['lab'],
					 'room'		=>	$_POST['room']);
					//'status'	=>	$_POST['status'] 
		$this->accountsdb->addLab($lab);
		redirect("admin/aLab");
	}

	public function labSearch()
	{
		$data['start'] = $this->uri->segment(3);
		$this->load->library('pagination');	
		$pi = 15;	

		if($this->session->userdata('type')=="admin")
		{
			$labname = $this->input->post('name_search');
			$ref = $this->input->post('searchBy');
			
			if(!$ref)
				$ref = 'name';
			
			$data['x'] = $this->accountsdb->get_search($labname,$ref,$data['start'],$pi);
			$total = $this->accountsdb->get_search($labname,$ref,$data['start'],"");

			$config['base_url'] = 'http://localhost:8080/easyaccess/index.php/admin/labSearch';
			$config['total_rows'] = count($total);
			$config['per_page'] = $pi; 
			$config['cur_tag_open'] = '<li class="page-item active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = "</li>";
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';
			$config['first_url'] = '';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';
			$config['first_url'] = '';

			$this->pagination->initialize($config); 	

			$this->load->view('admin/searchlab',$data);
		}		
		else
		{
			redirect("account/index");
		}
	}
 	
	public function updateLab($values)
	{

		$data['x'] = $this->accountsdb->solLab($values);		
		$this->load->view('admin/updatLab',$data);
	}

	public function LabUpdate()
	{
	$item  = array('code'						=>		$_POST['code'],
					'labname'					=>		$_POST['name'],
					'labroom'					=>		$_POST['room']);
	

	
		$this->accountsdb->upLab($item);
		$msg="Successful";
		redirect('admin/labSearch');
	}

	public function editLab($id)
	{
		//edit laboratory
		$data = $this->clearancedb->viewLab($id);
		foreach ($data->result() as $row) {
			$data = array( 'code'	=>		$row->code,
						   'name' 	=>		$row->name ,
						   'room'	=>		$row->room,
						   'status'	=>		$row->status );
		}
		$this->load->view('admin/editlab',$data);

	}

	public function C_editLab()
	{
		$data = array('code'	=>		$_POST['code'] ,
					  'name'	=>		$_POST['lab'],
					  'room'	=>		$_POST['room'],
					  'status'	=>		$_POST['status'] );

	$this->clearancedb->editlab($data);
	
	}

	public function dupdateuser()
	{
		$user  = array('id'			=>		$_POST['id'],
					   'idnum'		=>		$_POST['idnum'],
					   'user'		=>		$_POST['name'],
					   'lname'		=>		$_POST['lname'] ,
					   'fname'		=>		$_POST['fname'],
					   'mname'		=>		$_POST['mname'],
					   'password'	=>		do_hash($_POST['pass'],'md5'),
					   'type'		=>		$_POST['type'],
					   'dept'		=>		$_POST['dept']);

	
		$this->accountsdb->upuser($user);
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Table has been updated!</div>');
		redirect('admin/sUser');
	}

	public function graph_Sitem($values)
	{

		$results = $this->ChartModel->get_chart_data($values);
		$this->session->set_flashdata('name',$values);
		$this->load->view('admin/statitem',$results);	



	}
	public function graph_item()
	{
		$result = $this->ChartModel->sum_Chart();
	

		$this->load->view('admin/stat',$result);
	}


}

