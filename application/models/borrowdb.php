<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class borrowdb extends CI_Controller {

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

                //if ($this->session->userdata('type')!='staff'){
                //	redirect('account/index');
                //}
                $this->load->view('borrow_items/head');
                $this->load->view('templates/header');

        }
	public function index()
	{
		$this->load->view('borrow_items/borrow_items');
	}

    public function get_search($value)
    {
      
      $this->db->like('name',$value);
      $query = $this->db->get('item');
      
     return $query->result();
    }
    
    public function borrowedItems($value)
    {
    	$borrowers_info = array('borrowers_idnumber' 	 => $_POST['borrowers_idnumber'],
								'borrowers_fname'		 => $_POST['borrowers_fname'],
								'borrowers_mname'		 => $_POST['borrowers_mname'],
								'borrowers_lname'		 => $_POST['borrowers_lname'],
								'subject' 				 => $_POST['subject'],
								'schedule' 				 => $_POST['subject'],
								'table_number' 			 => $_POST['table_number']);

    	$this->db->insert('borrowers_info',$borrowers_info);
    	redirect('borrow/ItemSearch');
    }


	public function search_borrower($id){
		$query = $this -> db -> get('borrowers_info');
		return $query;
	}

    public function returnedItems($value)
    {
    	// $borrowers_info = array('borrowers_idnumber' 	 => $_POST['borrowers_idnumber'],
					// 			'borrowers_fname'		 => $_POST['borrowers_fname'],
					// 			'borrowers_mname'		 => $_POST['borrowers_mname'],
					// 			'borrowers_lname'		 => $_POST['borrowers_lname'],
					// 			'subject' 				 => $_POST['subject'],
					// 			'schedule' 				 => $_POST['subject'],
					// 			'table_number' 			 => $_POST['table_number']);

    	$this->db->insert('borrowers_info',$borrowers_info);
    	redirect('borrow/ItemSearch');

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
		$this->load->view('admin/adduser',$msg);

	}

	public function borrowItems($value)
	{
	
		
		$items_itemlist = array('borrow_id' => $value['borrow_id'],
						'borrowers_id' => $value['borrowers_id'],
						'borrowers_name' => $value['borrowers_name'],
						'item_code' => $value['item_code'],
						'quantity' => $value['quantity'],
						'item_status' => $value['item_status'],
						'subject' => $value['subject'],
						'schedule' => $value['subject'],
						'purpose' => $value['purpose'],
						'table_number' => $value['table_number'],
						'laboratory' => $value['laboratory'],
						'instructor' => $value['instructor'],
						'custodian'	=> $value['custodian']);

		$this->db->insert('borrow_test',$items_itemlist);
		
		/*
		$items_itemlist = array('transactionid' => $_POST['borrowers_id'],
						'itemcode' => $_POST['borrowers_id'],
						'quantity' => $_POST['quantity'],
						'releasedby' => $user,
						'returntime' => '0',
						'status' => $_POST['status'],
						'remarks' => $_POST['remarks'],
						'receivedby' => $user,
						'rentperhour' => "100",
						'totalrent' => "1000",
						'datepaid' => date('Y-m-d H:i:s')
		$items_transaction = array('id' => $_POST['borrowers_id'],
									'date' => date('Y-m-d H:i:s'),
									'subject' => $_POST['subject'],
									'schedule' => $_POST['schedule'],
									'purpose' => $_POST['purpose'],
									'tabelnumber' => $_POST['tablenumber'],
									'totalamount' => "100",
									'status' => $_POST['status'],
									'laboratory' => "test",
									'instructure' => $_POST['instructor'],
	$this->db->insert('borroweditemlist',$items_itemlist);
	$this ->db->insert('borrowtransaction', $items_transaction);
									)
									*/
	}
}
