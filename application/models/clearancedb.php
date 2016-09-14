<?php
class clearancedb extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
           
        }

        public function addLab($values)
        {
          $lab = array('name'       =>  $values['lab'] ,
                        'room'      =>  $values['room'],
                        'status'    =>  $values['status'] );

          $this->db->insert('laboratory', $lab);
          echo "add laboratory is successful";
        }

        public function editLab($values)
        {
          $lab = array('name'     =>  $values['name'],
                        'room'    =>  $values['room'],
                        'status'  =>  $values['status'] );

    	  $this->db->set($lab);
    	  $this->db->where('code',$values['code']);
    	  $this->db->update('laboratory');

        }

        public function viewLab($id)
        {
           $this->db->where('code', $id);
           $query = $this->db->get('laboratory');
        	return $query;
        }


}
?>