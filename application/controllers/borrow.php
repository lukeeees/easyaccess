<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class borrow extends CI_Controller {

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
		public function __construct(){
                parent::__construct();
                // Your own constructor codein!
 			  $user = $this->session->userdata('user');

                if ($this->session->userdata('type')!='staff'){

                	redirect('account/index');
                }

              	$this->load->view('admin/head');
                $this->load->view('templates/header');
        }

        public function userlist() //show borrowed items
        {
        	$tmp = $this->itemdb->show_all_borrowed('')->result();

        	$data['item'] = array();

        	foreach ($tmp as $value) {
        		$data['item'][$value->borrowers_idnumber] = $value;
        	}

	      	$this->load->view('borrow_items/userlist',$data);
        }

        public function searchlist() //search borrowed items
        {
        	if($this->input->post('btn_search')!==null)
			{
			$data['x'] = $this->itemdb->show_all_borrowed($this->input->post('name_search'),$this->input->post('searchBy'),'');			
			}
			$this->load->view('borrow_items/userlist', $data);
		}

         public function returnitems()//show return items
        {
        	$tmp = $this->itemdb->borrowers_idnumber('')->result();

        	$data['item'] = array();

        	foreach ($tmp as $value) {
        		$data['item'][$value->borrowers_idnumber] = $value;
        	}

        	$this->load->view('borrow_items/items_return',$data);
        }

		public function ItemSearch(){		

			$item = $this->input->post('name_search');
			$ref = $this->input->post('searchBy');		
			if(!$ref)
				$ref = 'name';
			$x = $this->itemdb->get_search($item,$ref);
			
			$y = $this->itemdb->get_borrowers();
			$z = array('x' => $x, 'y' =>$y);

			$this->load->view('borrow_items/search_items',$z);	
		}

		public function ItemSearchReturn(){
			$item = $this->input->post('name_search');
			$x = $this->itemdb->get_search($item);
			$y = $this->itemdb->get_borrowers();
			$z = array('x' => $x, 'y' =>$y);
			$this->load->view('borrow_items/items_return',$z);
			//$this->load->view('borrow_items/return_items',$z);	
		}



		public function list_borrowed(){
			if(isset($_GET['idnum']))
				$id=$_GET['idnum'];
			else
				redirect('borrow/userlist');

			$data['item'] = $this->itemdb->show_all_borrowed($id)->result();
			
			if($data['item']==null)
			{
				redirect('borrow/userlist');
			}

			$this->load->view('borrow_items/borrowed',$data);
		}

		public function list_returned(){
			$other['id'] = $this->session->userdata('id');
			// $other['type'] = $this->session->userdata('type');
			$status='ok';
			// $status='borrowed';
			$data = $this->itemdb->get_status($status);
			$info = array('other' => $other,'data' => $data);
			// die(json_encode($m));

			$this->load->view('borrow_items/status_items',$info);
		}

		public function borrowedItems(){
			if($this->input->post('borrowbtn')!==null)
			{
				foreach ($_POST['quantity'] as $key => $value) {					

					if($value[0]!=0)
					{
						$tmp = explode('---',$key);

						$borrowers_info['borrowers_idnumber'] = $_POST['borrowers_idnumber'];
						$borrowers_info['borrowers_fname'] = $_POST['borrowers_fname'];
						$borrowers_info['borrowers_mname'] = $_POST['borrowers_mname'];
						$borrowers_info['borrowers_lname'] = $_POST['borrowers_lname'];
						$borrweres_info['yearlevel']	   = $_POST['yearlevel'];
					   	$borrowers_info['course']		   = $_POST['course'];
					   	$borrowers_info ['department']	   = $_POST['department'];
						$borrowers_info['subject'] = $_POST['subject'];
						$borrowers_info['tablenumber'] = $_POST['tablenumber'];
						$borrowers_info['schedule'] = $_POST['schedule'];
						$borrowers_info['instructor'] = $_POST['instructor'];
						$borrowers_info['item_code'] = $tmp[0];
						$borrowers_info['item_name'] = $tmp[1];
						$borrowers_info['quantity'] = $value[0];
						$borrowers_info['laboratory'] = $this->session->userdata('lab');
						$borrowers_info['custodian'] = $this->session->userdata('name');
						$this->db->insert('borrowers_info', $borrowers_info);						

						$student[$_POST['borrowers_idnumber']]  = array(
					   'lastname'	=>		$_POST['borrowers_lname'],
					   'name'		=>		$_POST['borrowers_fname'],
					   'middlename'	=>		$_POST['borrowers_mname'],
					   'yearlevel'	=>		$_POST['yearlevel'],
					   'course'		=>		$_POST['course'],
					   'department'	=>		$_POST['department'],
					   'violation'	=>		"Unreturned Item",
					   'laboratory'	=>		$this->session->userdata('lab'),
					   'status'		=>		'Pending');

						$code = $key;
						$quantity = $this->itemdb->get_item($code);	

						if($quantity != 0){
						//	$sql = "update item set availablequantity = availablequantity-'".$borrowers_info['quantity']."' where code = '".$borrowers_info['item_code']."'";
						//	$this->db->query($sql);
						//	$borrowers_id = $this->db->insert_id();
							
							$return_transaction['borrowers_id'] = $_POST['borrowers_idnumber'];
							$return_transaction['laboratory_id'] = $this->session->userdata('lab');
							$return_transaction['item_code'] = $_POST['code'];
							$return_transaction['date_borrowed'] = date('Y-m-d H:i:s',time());
							$return_transaction['releasedby'] = $this->session->userdata('name');

							$this->itemdb-> insert_return_trans($return_transaction);
						}else{
							echo "<script>alert('Not Available!')</script>";		
						}
					}					
				}		

				foreach ($student as $key => $value) {
					$student  = array('idnumber'=>		$key,
					   'lastname'	=>		$value['lastname'],
					   'name'		=>		$value['name'],
					   'middlename'	=>		$value['middlename'],
					   'yearlevel'	=>		$value['yearlevel'],
					   'course'		=>		$value['course'],
					   'department'	=>		$value['department'],
					   'violation'	=>		"Unreturned Item",
					   'laboratory'	=>		$this->session->userdata('lab'),
					   'status'		=>		'Pending');
	
					$this->clearancedb->addvio($student);
				}				
			}

			redirect('borrow/list_borrowed?idnum='.$_POST['borrowers_idnumber']);

		}

		public function returnedItems(){
			if(!isset($_POST['idnumber']))
			{
				redirect('borrow/userlist');
			}

			for ($i=0; $i < count($_POST["borrowedquantity"]); $i++) { 
				if(isset($_POST['damage'][$i]))
				{					
					$damage = $_POST['damage'][$i];
				}
				else
				{
					$damage = 0;
				}

				$data['code'] = $_POST['itemcode'][$i];
				$data['quantity'] = $_POST['quantity'][$i];
				$data['borrowedquantity'] = $_POST['borrowedquantity'][$i];
				$data['damage'] = $damage;
				$data['borrowers_id'] = $_POST['borrowers_id'][$i];
				$data['idnumber'] = $_POST['idnumber'];

				$calc = $_POST['borrowedquantity'][$i] - $_POST['quantity'][$i];
				if($calc == 0)
				{
					
					$this->itemdb->clearborrow($data);
				}
				else
				{					
					$this->itemdb->updateborrow($data);	
				}
			}
			redirect('borrow/userlist');
			exit;

			if(!isset($_POST['idnumber']))
			{
				redirect('borrow/returnitems');
			}

		//	redirect('/borrow/ItemSearchReturn');
		//	redirect('/borrow/list_borrow?idnum='.$_POST['idnumber']);
			
			// $id = $_POST['borrowers_id'];
			// $status = $_POST['status'];

			// $borrowers_info['borrowers_idnumber'] = $_POST['borrowers_idnumber'];
			// $borrowers_info['borrowers_id'] = $_POST['borrowers_id'];
			// $borrowers_info['borrowers_fname'] = $_POST['borrowers_fname'];
			// $borrowers_info['borrowers_mname'] = $_POST['borrowers_mname'];
			// $borrowers_info['borrowers_lname'] = $_POST['borrowers_lname'];
			// $borrowers_info['subject'] = $_POST['subject'];
			// $borrowers_info['schedule'] = $_POST['schedule'];
			// $borrowers_info['instructor'] = $_POST['instructor'];
			// $borrowers_info['tablenumber'] = $_POST['tablenumber'];
			// $borrowers_info['quantity'] = $_POST['quantity'];
			// $borrowers_info['item_code'] = $_POST['item_code'];
			// $data['createdDate'] = date('Y-m-d H:i:s',time());

			// if($status == "defective"){
			// 	$sql = "update borrowers_info set quantity = quantity-'".$borrowers_info['quantity']."' where borrowers_id = '".$borrowers_info['borrowers_id']."'";
			// 	$this->db->query($sql);
			// 	$sql1 = "update item set damagedquantity = damagedquantity+'".$borrowers_info['quantity']."' where code= '".$borrowers_info['item_code']."'";
			// 	$this->db->query($sql1);
			// }elseif($status == "ok"){
			// 	$sql = "update borrowers_info set quantity = quantity-'".$borrowers_info['quantity']."' where borrowers_id = '".$borrowers_info['borrowers_id']."'";
			// 	$this->db->query($sql);
			// 	$sql1 = "update item set availablequantity = availablequantity+'".$borrowers_info['quantity']."' where code= '".$borrowers_info['item_code']."'";
			// 	$this->db->query($sql1);
			// }

			// $borrowers_transaction['item_code'] = $_POST['item_code'];
			// $borrowers_transaction['returned_date'] = date('Y-m-d H:i:s',time());
			// $borrowers_transaction['returnedby'] = $this->session->userdata('id');
			// $this->db-> insert('borrowers_transaction', $borrowers_transaction);
			// echo "<script>alert('Successful!')</script>";
			// echo "<script>setTimeout(\"borrow/ItemSearch';\",0);</script>";
		}
	}
?>