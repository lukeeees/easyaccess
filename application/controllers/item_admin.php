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
		$data['start'] = $this->uri->segment(3);
		$this->load->library('pagination');	
		$pi = 10;

		$item = $this->input->post('name_search');
		$ref = $this->input->post('searchBy');
		
		if(!$ref)
			$ref = 'name';
		
		$data['x'] = $this->itemdb->get_search($item,$ref,$data['start'],$pi);
		$total = $this->itemdb->get_search($item,$ref,$data['start'],"");

		$config['base_url'] = 'http://localhost:8080/easyaccess/index.php/item_admin/ItemSearch';
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
					   'itemType'				    =>		$_POST['itemType'],
					   'serialNumber'				=>		$_POST['serialNumber'],
					   'partNumber'					=>		$_POST['partNumber'],
					   'manufactureNumber'			=>		$_POST['manufactureNumber'],
					   'dateAcquired'				=>		$_POST['dateAcquired'],
					   'expirationDate'				=>		$_POST['expirationDate'],
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
					   'itemName'					=>		$_POST['itemName'],
					   'description'				=>		$_POST['description'] ,
					   'previousStatus'				=>		$_POST['previousStatus'],
					   'currentStatus'				=>		$_POST['currentStatus'],
					   'itemType'				    =>		$_POST['itemType'],
					   'serialNumber'				=>		$_POST['serialNumber'],
					   'partNumber'					=>		$_POST['partNumber'],
					   'manufactureNumber'			=>		$_POST['manufactureNumber'],
					   'dateAcquired'				=>		$_POST['dateAcquired'],
					   'expirationDate'				=>		$_POST['expirationDate'],
					   'remarks'					=>		$_POST['remarks'],
					   'totalQuantity'				=>		$_POST['totalQuantity'],
					   'availableQuantity'			=>		$_POST['availableQuantity'],
					   'damagedQuantity'			=>		$_POST['damagedQuantity'],
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