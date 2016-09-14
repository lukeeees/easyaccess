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

  }?>