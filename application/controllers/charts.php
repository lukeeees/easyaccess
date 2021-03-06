<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class charts extends CI_Controller {

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

 /*               $user = $this->session->userdata('user');

                if ($this->session->userdata('type')!='admin'){
                	redirect('account/index');
                }*/
              //$this->load->view('admin/head');
                $this->load->view('templates/header');

        }
	public function index()
	{
		$this->load->view('admin/stat');
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

	public function graph_clearanceVio()
	{

		$results = $this->ChartModel->chart_VClearance();

		$this->load->view('stat_clearance',$results);	
	}

	public function graph_clearanceLia()
	{

		$results = $this->ChartModel->chart_LClearance();
		$this->load->view('stat_clearance',$results);	
	}


}
