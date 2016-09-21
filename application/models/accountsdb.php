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

              foreach ($query->result() as $row)
                {       
                      $data = array('id'        =>     $row->id ,
                                    'type'      =>     $row->type     );
                }
                return $data;

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
        public function deleteLH()
        {

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

  }?>