<?php
class accountsdb extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
           
        }

        public function checktype($values)
        {
              $this->db->where('name', $values['un']);
              $this->db->where('password', $values['pass']);
              $query = $this->db->get('user');
              $query = $this->db->get('student');

              foreach ($query->result() as $row)
                {       
                      $data = array('id'        =>     $row->id ,
                                    'type'      =>     $row->type     );
                }
                return $data;

        }
        public function addAdmin($values)
        {
          $user  = array('idnumber'     =>    $values['id'],
                        'name'          =>    $values['user'] ,
                        'lastname'      =>    $values['lname'],
                        'firstname'     =>    $values['fname'],
                        'middlename'    =>    $values['mname'],
                        'password'      =>    $values['password'],
                        'type'          =>    $values['type'],
                        'department'    =>    $values['dept']);

          $this->db->insert('user',$user);
                 }

        public function addLH($values)
        {
            $fac = array( 'name'        => $values['name'],
                          'rank'        => $values['rank'],
                          'department'  => $values['dept']);
            $query = $this->db->get('faculty');

            $this->db->insert('faculty', $fac);
            foreach ($query->result() as $row)
            {
                $x = $row->id;              
            }
        
            $user = array( 'id' => $x,
                           'name' => $values['name'] ,
                           'password' =>  $values['password'],
                           'type'  => 'Head');


            $this->db->insert('user',$user);
        }

        public function deleteUser($x)
        {

          $this->db->where('id', $x);
          $this->db->delete('user');

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
        public function showusers()
        {
          $data=array();
          $query = $this->db->get('user');
          $data = $query->result_array();
          return $data;
        }

        public function solouser($x){
          $this->db->where('id', $x);
          $query = $this->db->get('user');
          return $query;
          }

          public function upuser($values)
          {
            $data = array('idnumber'      => $values['idnum'] ,
                           'name'         => $values['user'],
                           'password'     => $values['password'],
                           'lastname'     => $values['lname'],
                           'firstname'    => $values['fname'],
                           'middlename'   => $values['mname'],
                           'type'         => $values['type'],
                           'department'   => $values['dept'] );

             $this->db->where('id', $values['id']);
             $this->db->update('user',$data);
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

  }?>