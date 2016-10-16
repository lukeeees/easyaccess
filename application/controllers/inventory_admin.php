	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventory_admin extends CI_Controller {

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

	public function viewInventory()
	{
			$x = $this->itemdb->get_labs(); 
			$report = $this->input->post('name_search');
			$ref = $this->input->post('searchBy');
			$lab = $this->input->post('lab');
			
			if(!$ref)
				$ref = 'inventorydate';

			$data['lab']=$x;
			$data['x'] = $this->inventorydb->get_search($report,$ref,$lab);
			$this->load->view('admin/manageReport',$data);
	}

	public function addInventory()
	{
		if(isset($_POST['con']))
		{
			$con=$_POST['con'];
		}
		else
		{
			$con='';
		}

		if ($this->session->userdata('type')!="admin") {
			$data['x'] = $this->itemdb->sorting($con,'itemtype');
			$data['con'] = $con;
			$this->load->view('admin/createReport',$data);
		}
		else
		{
			redirect('account/index');
		}
	}

	public function AddInventoryToDB()
	{
		$item  = array('department'             =>      $_POST['department'],
                       'departmenthead'         =>      $_POST['departmenthead'] ,
                       'laboratory'             =>      $_POST['laboratory'],
                       'laboratoryhead'         =>      $_POST['laboratory'],
                       'buildingname'           =>      $_POST['buildingname'],
                       'floor'                  =>      $_POST['floor'],
                       'custodian'              =>      $_POST['custodian'],
                       'campus'                 =>      $_POST['campus'],
                       'inventorydate'          =>      $_POST['inventorydate'],
                       'position'               =>      $_POST['position'],
                       'preparedby'             =>      $_POST['preparedby'],
                       'csvFilename'            =>      $_POST['laboratory'].'_'.$_POST['csvFilename'],
                       'createdby_id'			=>		$this->session->userdata('id'));

	
		$this->inventorydb->createReport($item);
		echo "alert('Successful')";
		$msg="Successful";
		$this->toCSV($_POST['laboratory'].'_'.$_POST['csvFilename']);
		redirect('inventory_admin/viewInventory');

	}

	public function toCSV($filename)
	{
		$data = $this->itemdb->sorting($_POST['con'],'remarks');

		$csv = "Item Code,Available Quantity,Item Name,Description,Serial Number, Date Acquired,Custodian,Remarks \n";//Column headers
		
		foreach ($data as $value) {
			$csv.=$value->code.",".$value->availablequantity.",".$value->name.",".$value->description.",".$value->serialnumber.",".$value->dateacquired.",".$value->custodian.",".$value->currentstatus."\n";	
		}
             
		date_default_timezone_set("Asia/Manila");
		$csv_handler = fopen ('csv/'.$filename.'.csv','w');
		fwrite ($csv_handler,$csv);
		fclose ($csv_handler);
	}


	public function updateReport($values)
	{
		$data['x'] = $this->inventorydb->solItem($values);
		$this->load->view('admin/updateReport',$data);
	}

	public function UpdateInventoryToDB()
	{
		$item  = array('inventoryid'            =>      $_POST['inventoryid'],
					   'department'             =>      $_POST['department'],
                       'departmenthead'         =>      $_POST['departmenthead'] ,
                       'laboratory'             =>      $_POST['laboratory'],
                       'laboratoryhead'         =>      $_POST['laboratory'],
                       'buildingname'           =>      $_POST['buildingname'],
                       'floor'                  =>      $_POST['floor'],
                       'custodian'              =>      $_POST['custodian'],
                       'campus'                 =>      $_POST['campus'],
                       'inventorydate'          =>      $_POST['inventorydate'],
                       'position'               =>      $_POST['position'],
                       'preparedby'             =>      $_POST['preparedby'],
                       'approvedby'             =>      $_POST['approvedby'],
                       'csvFilename'            =>      $_POST['laboratory'].'_'.$_POST['csvFilename']);


		$this->inventorydb->updateReport($item);
		echo "alert('Successful')";
		$msg="Successful";
		$this->toCSV($_POST['laboratory'].'_'.$_POST['csvFilename']);
		redirect('inventory_admin/viewInventory');

	}

	public function printReport($values)
	{
		$data['x'] = $this->inventorydb->solItem($values);
		$this->load->view('admin/printReport',$data);
	}

}
?>