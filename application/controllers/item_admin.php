	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item_admin extends CI_Controller {

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

                // if ($this->session->userdata('type')!='admin'){
                // 	redirect('account/index');
                // }
                $this->load->view('admin/head');
                $this->load->view('templates/header');
        }

	public function addItem()
	{
		 $this->load->view('admin/addItem');
	}

	public function ItemSearch()
	{
		$item = $this->input->post('name_search');
		$ref = $this->input->post('searchBy');
		
		if(!$ref)
			$ref = 'name';
		
		$data['x'] = $this->itemdb->get_search($item,$ref);
		$this->load->view('admin/searchItem',$data);
	}

	public function editItem()
	{

	}

	public function ItemAdd()
	{

		$item  = array('itemName'					=>		$_POST['itemName'],
					   'description'				=>		$_POST['description'] ,
					   'previousStatus'				=>		$_POST['previousStatus'],
					   'currentStatus'				=>		$_POST['currentStatus'],
					   'serialNumber'				=>		$_POST['serialNumber'],
					   'partNumber'					=>		$_POST['partNumber'],
					   'manufactureNumber'			=>		$_POST['manufactureNumber'],
					   'dateAcquired'				=>		$_POST['dateAcquired'],
					   'remarks'					=>		$_POST['remarks'],
					   'totalQuantity'				=>		$_POST['totalQuantity'],
					   'availableQuantity'			=>		$_POST['availableQuantity'],
					   'damagedQuantity'			=>		$_POST['damagedQuantity'],
					   'custodian'					=>		$_POST['custodian'],
					   'owner'						=>		$_POST['owner']);


			$this->itemdb->addItem($item);
			$this->session->set_flashdata('msg','<div class="alert-success text-center">Item has been recorded!</div>');
			redirect('item_admin/addItem',$msg);

	}


	public function updateItem($values)
	{		
		$data['x'] = $this->itemdb->solItem($values);		
		$this->load->view('admin/updateItem',$data);		
	}

	public function ItemUpdate()
	{
	$item  = array(	   'itemCode'					=>		$_POST['code'],
					   'itemName'					=>		$_POST['itemname'],
					   'description'				=>		$_POST['description'] ,
					   'previousStatus'				=>		$_POST['previousstatus'],
					   'currentStatus'				=>		$_POST['currentstatus'],
					   'serialNumber'				=>		$_POST['serialnumber'],
					   'partNumber'					=>		$_POST['partnumber'],
					   'manufactureNumber'			=>		$_POST['manufacturenumber'],
					   'dateAcquired'				=>		$_POST['dateacquired'],
					   'remarks'					=>		$_POST['remarks'],
					   'totalQuantity'				=>		$_POST['totalquantity'],
					   'availableQuantity'			=>		$_POST['availablequantity'],
					   'damagedQuantity'			=>		$_POST['damagedquantity'],
					   'custodian'					=>		$_POST['custodian'],
					   'owner'						=>		$_POST['owner']);

	
		$this->itemdb->upItem($item);
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Data updated.
        </div>');
		$msg="Successful";
		redirect('item_admin/ItemSearch');
	}

}
?>