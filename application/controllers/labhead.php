<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class labhead extends CI_Controller {

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

                if ($this->session->userdata('user')!=$user['type']){
                	redirect('account/index');
                }
             	$this->load->view('labhead/head');
                $this->load->view('templates/header');

        }
	public function index()
	{
		$this->load->view('labhead/adduser');
	}
		public function sUser()
	{
		$data['x'] = $this->accountsdb->showusers();
		$this->load->view('labhead/showusers',$data);
	}

	public function stUser(){

		$this->load->view('labhead/addstaff');
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
					   'dept'		=>		$_POST['department']);

	
		$this->accountsdb->addAdmin($user);
		$msg="Successful";
		$this->load->view('staff/adduser',$msg);

	}
	
	public function deleteuser($id)
	{
		//delete labhead
		$this->accountsdb->deleteUser($id);
		redirect('staff/sUser');

	}

	public function updateuser($values)
	{
		$data['x'] = $this->accountsdb->solouser($values);
		$this->load->view('staff/update',$data);
	}

	public function showStat()
	{

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
					   'dept'		=>		$_POST['department'],
					   'lab'		=>		$_POST['lab']);

	
		$this->accountsdb->upuser($user);
		$msg="Successful";
		redirect('staff/sUser');
	}

	

}
