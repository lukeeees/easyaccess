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

                if ($this->session->has_userdata('user')!=$user['type']){
                	redirect('account/index');
                }
                $this->load->view('admin/head');
                $this->load->view('templates/header');

        }
	public function index()
	{
		$this->load->view('admin/adduser');
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

	public function addLH()
	{
		$user = array('name' 		=>		$_POST['name'] ,
					   'password' 	=>		do_hash($_POST['pass']),
					   'rank'		=>		$_POST['rank'],
					   'type'		=>		$_POST['type'],
					   'dept'		=>		$_POST['department'],
					   'firstname'	=>		$_POST['firstname'],
					   'lastname'	=>		$_POST['lastname'],
					   'idnum'		=>		$_POST['idnum'],
					   );
		
		$this->accountsdb->addLH($user);

	}

	public function editLH($id)
	{
		//edit users

		$user  = array('id'			=>		$id,
					   'name'		=>		$_POST['name'] ,
					   'password'	=>		$_POST['password'],
					   'rank'		=>		$_POST['rank'],
					   'dept'		=>		$_POST['dept']);
		//$this->accountsdb->editLH();


	}
	public function deleteLH($id)
	{
		//delete labhead
		$this->accountsdb->deleteLH($id);

	}

	public function addStaff()
	{
		//add staff
	

	}

	public function editStaff()
	{
		//edit Staff

	}

	public function deleteStaff()
	{
		//delete Staff

	}
	public function showStat()
	{

	}

	public function addLaboratory()
	{
		$lab = array('lab'		=>	$_POST['lab'],
					'room'		=>	$_POST['room'],
					'status'	=>	$_POST['status'] );
		$this->clearancedb->addLab($lab);
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

	

}
