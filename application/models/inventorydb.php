<?php
class inventorydb extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
           
        }

        public function addtologs($msg)
        {
          if ($this->session->userdata('type')=="staff") {
            $msg = "Staff ".$this->session->userdata('name')." has ".$msg;
          }
            $item  = array('action'  => $msg,
                       'laboratory' => $this->session->userdata('lab'));

            $this->db->insert('logs',$item);
        }

        public function createReport($values)
        {
          $item  = array('department'           =>      $values['department'],
                       'departmenthead'         =>      $values['departmenthead'] ,
                       'laboratory'             =>      $values['laboratory'],
                       'laboratoryhead'         =>      $values['laboratory'],
                       'buildingname'           =>      $values['buildingname'],
                       'floor'                  =>      $values['floor'],
                       'custodian'              =>      $values['custodian'],
                       'campus'                 =>      $values['campus'],
                       'inventorydate'          =>      $values['inventorydate'],
                       'position'               =>      $values['position'],
                       'preparedby'             =>      $values['preparedby'],
                       'csvFilename'            =>      $values['csvFilename'],
                       'createdby_id'           =>      $values['createdby_id']);

          $this->db->insert('inventory',$item);

          $this->addtologs("successfully added report.");
        }

        public function getUserName($values)
        {
          $this->db->like('name',$value);
          $query = $this->db->get('user');
        }

        public function get_search($value,$ref,$lab="")
        {
          if(!$lab)
          {
            $lab = $this->session->userdata('lab');
          }

          $this->db->like($ref,$value);
          

          if($this->session->userdata('type')=="staff")
            $this->db->where('createdby_id',$this->session->userdata('id'));
          else if($this->session->userdata('type')=="head")
            $this->db->like('laboratory',$this->session->userdata('lab'));
          else if($this->session->userdata('type')=="admin")
            $this->db->like('laboratory',$lab);

          if($ref == 'inventorydate'){
              $query = $this->db->order_by($ref,'DESC')->get('inventory');
          }else{
              $query = $this->db->order_by($ref,'ASC')->get('inventory');
          }

          return $query->result();
        }

        public function solItem($x){
          $this->db->where('inventoryid',$x);
          $query = $this->db->get('inventory');
          return $query;
        }

        public function updateReport($values)
        {
            $report  = array('inventoryid'          =>      $values['inventoryid'],
            		   'department'           		=>      $values['department'],
                       'departmenthead'         	=>      $values['departmenthead'] ,
                       'laboratory'             	=>      $values['laboratory'],
                       'laboratoryhead'         	=>      $values['laboratory'],
                       'buildingname'           	=>      $values['buildingname'],
                       'floor'                  	=>      $values['floor'],
                       'custodian'              	=>      $values['custodian'],
                       'campus'                 	=>      $values['campus'],
                       'inventorydate'          	=>      $values['inventorydate'],
                       'position'               	=>      $values['position'],
                       'preparedby'             	=>      $values['preparedby'],
                       'approvedby'             	=>      $values['approvedby'],
                       'csvFilename'            	=>      $values['csvFilename']);

             $this->db->where('inventoryid', $values['inventoryid']);
             $this->db->update('inventory',$report);
             $this->addtologs("successfully updated report.");
        }

}
?>