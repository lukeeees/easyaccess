<?php
class clearancedb extends CI_Model {

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

        public function add2logs($msg)
        {
          if ($this->session->userdata('type')=="admin" || $this->session->userdata('type')=="head") {
            $msg = "".$this->session->userdata('type')." ".$this->session->userdata('name')." has ".$msg;
          }
            $item  = array('action'  => $msg,
                       'laboratory' => $this->session->userdata('lab'));

            $this->db->insert('logs',$item);
        }


        public function seennotifications($id)
        {
            $data = array(
               'seen' => 1
            );

            $this->db->where('id', $id);
            $this->db->update('logs', $data);
        }

        public function unseennotif()
        {
          $this->db->where('seen',0);
          $this->db->where('laboratory',$this->session->userdata('lab'));
          $query = $this->db->get('logs');
          $query = $query->result();

          return count($query);
        }

        public function shownotifications()
        {
          $this->db->order_by("date_added", "DESC");
          $this->db->where('laboratory',$this->session->userdata('lab'));
          $query = $this->db->get('logs');
          $query = $query->result();
          foreach ($query as $key => $value) {
            $this->seennotifications($value->id);
          }
          return $query;
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

        public function updatemessage($id)
        {
            $data = array(
               'status' => "Cleared"
            );

            $this->addtologs("successfully added violation(".$student['u_id'].")");

            $this->db->where('id', $id);
            $this->db->update('student', $data); 
        }

        public function clearedvio($id)
        {
            if ($this->session->userdata('type')=="admin" || $this->session->userdata('type')=="head")
            {
            $data = array(
               'status' => "Cleared"
            );
            }
            $this->add2logs( "successfully updated violation(".$student['u_id'].")");
            $this->db->where('id', $id);
            $this->db->update('student', $data); 
            
        }
/*
        public function updatelia($id)
          {
            if ($this->session->userdate('type')=="staff"){
              $data = array ('status' = 
                "Cleared");
            }

            $this->addloglia("successfully updated liabiilities(".$student['u_id'].").");

          }*/

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

            $this->add2logs("successfully added violation(".$student['u_id'].").");
          
            $this->db->insert('student',$student);
        }

        public function showvio($status) //show violation
        {
          $data=array();
          $lab = $this->session->userdata('lab');
          if ($this->session->userdata('type')=="head" || $this->session->userdata('type')=="staff")
          {
            echo $lab;
              $this->db->where('laboratory',$lab);
          }

          if($status==""){          
              $this->db->where('violation !=','Unreturned Item');
              $query = $this->db->get('student');   
          }else{
              $this->db->where('status',$status);
              $query = $this->db->get('student');
          }

          $data = $query->result_array();
        return $data;
        }

        public function showlia($status) //show liabilities
        {
          $data=array();

          if ($this->session->userdata('type')=="head" || $this->session->userdata('type')=="staff")
          {
              $this->db->where('laboratory',$this->session->userdata('lab'));
          }
          $lia = array('status'     =>  $status,
                        'violation'  =>  'Unreturned Item');
          if($status==""){  
              $this->db->where('violation','Unreturned Item');        
              $query = $this->db->get('student');
          }else{
           
              $this->db->where($lia);
              $query = $this->db->get('student');
          }
          $data = $query->result_array();
          return $data;
        }

        public function searchstudent($value,$ref,$status) //show violation
        {     
        $lab = $this->session->userdata('lab');               
          if($ref == "name")
          {            
              if($value!="")
              {                 
                
                if ($this->session->userdata('type')=="head")
                {                  
                    
                         $where = "laboratory LIKE '$lab' AND 
                        (name LIKE '%$value%' OR middlename LIKE '%$value%' 
                        OR lastname LIKE '%$value%') AND violation !='Unreturned Item'";
                    $this->db->where($where);
                    exit;
                }elseif ($this->session->userdata('admin')) {
                    $where = "violation !='Unreturned Item' and (name like '%$value%' or lastname like '%$value%' or middlename 
                              like '%$value%')";
                    $this->db->where($where);
                    exit;
                }

                else
                {                             
                    $where = "violation != 'Unreturned Item' AND 
                        (name LIKE '%$value%' OR middlename LIKE '%$value%' 
                        OR lastname LIKE '%$value%')";
                    $this->db->where($where);
                }                  
              }
              else{
                $this->db->where('violation !=','Unreturned Item');
                $this->db->where('laboratory',$this->session->userdata('lab'));
              }      
          }          
          else
          {
            $this->db->where('laboratory = ',$lab);
            $this->db->where('violation !=','Unreturned Item');         
            $this->db->like($ref,$value);
          }        

          if($status != ""){
            $this->db->where('status',$status);                     
           
          }
          if ($this->session->userdata('type')=="head") {
            
            $this->db->where('laboratory',$this->session->userdata('lab'));
          }
          
          
          $query = $this->db->get('student');
          $data = $query->result_array();
          
          return $data;
        }

      public function searchViolate($value,$ref,$status) //show violation
        {                    
          if($ref == "name")
          {            
              if($value!="")
              {                 
                
                if ($this->session->userdata('type')=="head")
                {                  
                    $lab = $this->session->userdata('lab');
                    echo $where = "laboratory LIKE '$lab' AND 
                        (name LIKE '%$value%' OR middlename LIKE '%$value%' 
                        OR lastname LIKE '%$value%') AND status LIKE '$status'";
                      
                    $this->db->where($where);
                    exit;
                }
                else
                {                             
                    $where = "status LIKE '$status' AND 
                        (name LIKE '%$value%' OR middlename LIKE '%$value%' 
                        OR lastname LIKE '%$value%') AND status LIKE '$status'";
                    $this->db->where($where);
                }                  
              }
              else{
                $this->db->where('laboratory',$this->session->userdata('lab'));
              }      
          }          
          else
          {            
            $this->db->like($ref,$value);
          }        

          if($status != "")
            $this->db->where('status',$status);                     

          if ($this->session->userdata('type')=="head") {
            $this->db->where('laboratory',$this->session->userdata('lab'));
          }
          $this->db->or_where_not_in('violation','Unreturned Item');
          $query = $this->db->get('student');
          $data = $query->result_array();
          
          return $data;
        }


        public function get_search($value,$ref)
        {                              

          if($value!="")
          {            
              if ($this->session->userdata('type')!="admin")
              {                
                  if($ref=="name")
                  {                    
                      $lab = $this->session->userdata('lab');
                      $where = "laboratory LIKE '$lab' AND (name LIKE '%$value%' OR middlename LIKE '%$value%' OR lastname LIKE '%$value%')";   
                      $this->db->where($where);                      
                  }                  
                  else
                  {
                      $this->db->like($ref,$value);
                      $this->db->where('laboratory',$this->session->userdata('lab'));
                  }
              }
              else
              {                
                  $arr = array('name'=>$value,'middlename'=>$value,'lastname'=>$value);
                  $this->db->or_like($arr);                
              }  
          }   
          else
          {
              if ($this->session->userdata('type')!="admin")
              {
                  $this->db->where('laboratory',$this->session->userdata('lab'));
              }
          }       

          $query = $this->db->get('student');
          
         return $query->result(); 
        }

         public function solItem($x){
          $this->db->where('id', $x);
          $query = $this->db->get('student');
          return $query;
          }

        public function upVio($values) //update violation
          {
            $student  = array('u_id'     =>    $values['idnumber'],
                           'lastname'   =>    $values['lastname'] ,
                           'name'       =>    $values['name'],
                           'middlename' =>    $values['middlename'],
                           'year'       =>    $values['yearlevel'],
                           'course'     =>    $values['course'],
                           'department' =>    $values['department'],
                           'violation'  =>    $values['violation'],
                           'laboratory' =>    $values['laboratory'],
                           'status'     =>    $values['status']);

             $this->db->where('id', $values['id']);
             $this->db->update('student', $student);

             $this->add2logs("successfully updated violation(".$student['u_id'].").");
          }

          
}
?>