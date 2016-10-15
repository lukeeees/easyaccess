<?php
class accountsdb extends CI_Model {

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

        public function checktype($values)
        {
              $this->db->where('name', $values['un']);
              $this->db->where('password', $values['pass']);
              $query = $this->db->get('user');

              foreach ($query->result() as $row)
                {       
                      $data = array('id'        =>     $row->id ,
                                    'type'      =>     $row->type,
                                    'department'=>     $row->department,
                                    'name'      =>     $row->name);
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
          $this->addtologs("successfully added user(".$user['idnumber'].").");
        }

        public function deleteUser($x)
        {
          $tmp = $this->solouser($x)->result();

          $this->db->where('id', $x);          

          $this->db->delete('user');

          $this->addtologs("successfully deleted user(".$tmp[0]->idnumber.").");
        }

        public function addLab($values)
        {
          $lab = array('name'       =>  $values['lab'] ,
                        'room'      =>  $values['room']);
                        //'status'    =>  $values['status'] );

          $this->db->insert('laboratory', $lab);
          echo "add laboratory is successful";
          $this->addtologs("successfully added laboratory(".$lab['name'].").");
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

        public function showusers($name,$ref)
        {
          $data=array();

          if ($this->session->userdata('type')=="head")
          {

            $this->db->where('department',$this->session->userdata('lab'));
            $this->db->where('type','staff');
          }
         
          $this->db->like($ref,$name);
          $query = $this->db->order_by($ref,'asc')->get('user');          
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

          public function headandlab($values)
          {
            $this->db->where('id',$values);
            $query = $this->db->get('user');
            $result['user'] = $query->result();

            $query = $this->db->get('laboratory');
            $result['lab'] = $query->result();

            return $result;
          } 

          public function g_item() 
          {
          
            $query = $this->db->get('item');
            return $query;
          }

         public function get_laboratory()
          {
            $query = $this->db->get('laboratory');
            return $query;
          }


          public function get_labs()
          {
            $query = $this->db->get('laboratory');
            $result['laboratory'] = $query->result();
            return $result;
          }
          public function get_search($value, $ref)
          {
            $ref1=$ref;
            $this->db->like($ref1,$value);
            $query = $this->db->order_by($ref,'asc')->get('laboratory');
            return $query->result();

          }

          public function solLab($x){
            $this->db->where('code', $x);
            $query = $this->db->get('laboratory');
            return $query->result();
          }
          public function upLab($values)
          {
            $item = array('name' => $values['labname'],
                          'room'  =>  $values['labroom']);

            $this->db->where('code',$values['code']);
            $this->db->update('laboratory', $item);
            $this->addtologs("successfully updated laboratory(".$lab['name'].").");
          }

          public function updateuser($arr)
          {
            $item = array('idnumber' => $arr['idnum'],
                          'firstname'  =>  $arr['fname'],
                          'middlename'  =>  $arr['mname'],
                          'lastname'  =>  $arr['lname'],
                          'department'  =>  $arr['dept'],
                          'name'  =>  $arr['name'],
                          'password'  =>  md5($arr['pass']),
                    );
            $this->db->where('id',$arr['id']);
            $this->db->update('user', $item); 

            $this->addtologs("successfully updated user(".$item['idnumber'].").");
          }

  }?>