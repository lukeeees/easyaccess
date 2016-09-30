<?php
class clearancedb extends CI_Model {

		public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
           
        }

        public function checktype($values)
        {
              $this->db->where('name', $values['un']);
              $this->db->where('password', $values['pass']);
              //$query = $this->db->get('student');
               $query = $this->db->get('user');

              foreach ($query->result() as $row)
                {       
                      $data = array('id'        =>     $row->id ,
                                    'type'      =>     $row->type     );
                }
                return $data;

        }


          public function addvio($values) //add violation
        {
          $student  = array('u_id'      =>    $values['idnumber'],
                           'lastname'   =>    $values['lastname'] ,
                           'name'       =>    $values['name'],
                           'middlename' =>    $values['middlename'],
                           'year'       =>    $values['yearlevel'],
                           'course'     =>    $values['course'],
                           'department' =>    $values['department'],
                           'violation'  =>    $values['violation'],
                           'laboratory' =>    $values['laboratory'],
                           'status'     =>    $values['status']);

          $this->db->insert('student',$student);
                 }

        public function showvio() //show violation
        {
          $data=array();
          $query=$this->db->get('student');
          $data = $query->result_array();
          return $data;
        }
}
?>