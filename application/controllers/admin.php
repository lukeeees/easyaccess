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

                if ($this->session->userdata('type')!='admin'){
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
		$this->load->view('admin/addlab');
	}
	public function sUser()
	{
		$data['x'] = $this->accountsdb->showusers();
		$this->load->view('admin/showusers',$data);
	}
	public function aUser(){

		$this->load->view('admin/addUser');
	}
	public function LUser(){

		$this->load->view('admin/addLH');
	}

	public function stUser(){

		$this->load->view('admin/addstaff');
	}

	public function addLH()
	{
		$user  = array('id'			=>		$_POST['idnum'],
					   'lname'		=>		$_POST['lname'],
					   'fname'		=>		$_POST['fname'],
					   'mname'		=>		$_POST['mname'],
					   'dept'		=>		$_POST['department'],
					   'user'		=>		$_POST['name'],
					   'password'	=>		do_hash($_POST['pass'],'md5'),
					   'type'		=>		'head');
					 //  'lab'		=>		'ceac');


		$data = $this->accountsdb->showusers();

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

				$data = $this->accountsdb->showusers();

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
					   'dept'		=>		$_POST['department'],
					   'lab'		=>		'department');
		$data = $this->accountsdb->showusers();

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
		//delete labhead
		//$this->load->view('delete');
		$this->accountsdb->deleteUser($id);
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Table has been updated.!</div>');
		redirect('admin/sUser');

	}

	public function updateuser($values)
	{
		$data['x'] = $this->accountsdb->solouser($values);
		$this->load->view('admin/update',$data);


	}

	public function showStat()
	{

	}

	public function addLaboratory()
	{
		$lab = array('labname'	=>	$_POST['labname'],
					'room'		=>	$_POST['room']);
					//'status'	=>	$_POST['status'] 
		$this->accountsdb->addLab($lab);
		redirect("admin/aLab");
	}

	public function labSearch()
	{
		$labname = $this->input->post('name_search');
		$ref = $this->input->post('searchBy');
		
		if(!$ref)
			$ref = 'name';
		//$ref = 'owner';
		$data['x'] = $this->accountsdb->get_search($labname,$ref);
		$this->load->view('admin/searchlab',$data);
	}
 	
	public function updateLab($values)
	{

		$data['x'] = $this->accountsdb->solLab($values);
		$this->load->view('admin/updateLab',$data);
	}

	public function LabUpdate()
	{
	$item  = array('code'						=>		$_POST['code'],
					'labname'					=>		$_POST['labname'],
					'labroom'					=>		$_POST['room']);
	

	
		$this->accountsdb->upItem($item);
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
					   'dept'		=>		$_POST['department']);

	
		$this->accountsdb->upuser($user);
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Table has been updated!</div>');
		redirect('admin/sUser');
	}

	
}?>
