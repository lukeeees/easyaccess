	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {

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

	public function addItem_admin()
	{
		 $this->load->view('admin/addItem');
	}

	public function addInventory()
	{

	}

}
?>