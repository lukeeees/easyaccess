<?php
class itemdb extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
           
        }

        public function get_labs()
        {
          $query = $this->db->get('laboratory');
          return $query->result();
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

      
        public function addItem($values)
        {
          $item  = array('name'                     =>      $values['itemName'],
                       'description'                =>      $values['description'] ,
                       'previousstatus'             =>      $values['previousStatus'],
                       'currentstatus'              =>      $values['currentStatus'],
                       'itemtype'                   =>      $values['itemType'],
                       'serialnumber'               =>      $values['serialNumber'],
                       'partnumber'                 =>      $values['partNumber'],
                       'manufacturenumber'          =>      $values['manufactureNumber'],
                       'dateacquired'               =>      $values['dateAcquired'],
                       'expirationdate'             =>      $values['expirationDate'],
                       'remarks'                    =>      $values['remarks'],
                       'totalquantity'              =>      $values['totalQuantity'],
                       'availablequantity'          =>      $values['availableQuantity'],
                       'damagedquantity'            =>      $values['damagedQuantity'],
                       'custodian'                  =>      $values['custodian'],
                       'owner'                      =>      $values['owner']);

          $this->db->insert('item',$item);
          $this->addtologs("successfully added item(".$item['name'].").");
          
        }


        public function showItem()
        {
          $data=array();
          $query = $this->db->get('item');
          $data = $query->result_array();
          return $data;
        }

        public function get_search($value,$ref,$start=0,$limit)
        {        

          $this->db->like($ref,$value);

          if ($this->session->userdata('type')!="admin")
          {
              $this->db->where('owner',$this->session->userdata('lab'));
          }

          $this->db->limit($limit, $start);
          $query = $this->db->order_by($ref,'asc')->get('item');
          
         return $query->result();
        }

        public function solItem($x){
          $this->db->where('code', $x);
          $query = $this->db->get('item');
          return $query;
          }

        public function upItem($values)
          {
            $item  = array('code'                   =>      $values['itemCode'],
                       'name'                       =>      $values['itemName'],
                       'description'                =>      $values['description'] ,
                       'previousstatus'             =>      $values['previousStatus'],
                       'currentstatus'              =>      $values['currentStatus'],
                       'itemtype'                   =>      $values['itemType'],
                       'serialnumber'               =>      $values['serialNumber'],
                       'partnumber'                 =>      $values['partNumber'],
                       'manufacturenumber'          =>      $values['manufactureNumber'],
                       'dateacquired'               =>      $values['dateAcquired'],
                       'expirationdate'             =>      $values['expirationDate'],
                       'remarks'                    =>      $values['remarks'],
                       'totalquantity'              =>      $values['totalQuantity'],
                       'availablequantity'          =>      $values['availableQuantity'],
                       'damagedquantity'            =>      $values['damagedQuantity'],
                       'custodian'                  =>      $values['custodian'],
                       'owner'                      =>      $values['owner']);

             $this->db->where('code', $values['itemCode']);
             $this->db->update('item',$item);
             $this->addtologs("successfully updated item(".$item['name'].").");
          }

        public function sorting($value,$ref1)
        {                
          if($value=="")
            $this->db->like($ref1,$value);
          else
            $this->db->where($ref1,$value);

            $this->db->where('owner',$this->session->userdata('lab'));
            $query = $this->db->order_by('name','ASC')->get('item');          
            return $query->result();
        }

        public function get_borrowers(){
          $res = $this->db->get('borrowers_info');
          return $res->result();    
        }

        public function get_item($value){
          $sql = "select * from item where code = '" . $value . "'";
          $res = $this -> db -> query($sql);
          foreach($res->result() as $row){}
            $quantity = $row->availablequantity;

          return $quantity;
        }

        public function get_status($value){
          
          $this->db->like('currentstatus',$value);
          $query = $this->db->get('item');
          return $query->result();
        }
        
        public function show_all_returned($id,$value="",$ref="u_id",$labo=""){

          if($id)
          {
            $this->db->where('returnees_idnumber',$id);
          }
          else
          {
            if($this->session->userdata('type')=="admin" && $labo!="")
            {
              $lab = $labo;
            }
            else
            {
              $lab = $this->session->userdata('lab');
            } 

            if($value!="")
            {
                if($ref=="name")
                {                    
                    $where = "laboratory LIKE '$lab' AND (returnees_fname LIKE '%$value%' OR returnees_mname LIKE '%$value%' OR returnees_lname LIKE '%$value%')";   
                    $this->db->where($where);                      
                }                  
                else
                {
                    $this->db->like($ref,$value);                  
                    $this->db->where('laboratory',$lab);                  
                }
            }
            else
            {
              $this->db->where('laboratory',$lab);
            }
          }

          $this->db->order_by("returnees_id", "DESC"); 
          $query = $this->db->get('returnees_info');
          return $query;
        }

        public function show_all_borrowed($id,$value="",$ref="u_id",$labo=""){

          if($id)
          {
            $this->db->where('borrowers_idnumber',$id);
          }
          else
          {

            if($this->session->userdata('type')=="admin" && $labo!="")
            {
              $lab = $labo;
            }
            else
            {
              $lab = $this->session->userdata('lab');
            }  

            if($value!="")
            {
                if($ref=="name")
                {                                                        
                    $where = "laboratory LIKE '$lab' AND (borrowers_fname LIKE '%$value%' OR borrowers_mname LIKE '%$value%' OR borrowers_lname LIKE '%$value%')";   
                    $this->db->where($where);                      
                }                  
                else
                {
                    $this->db->like($ref,$value);                  
                    $this->db->where('laboratory',$lab);                  
                }
            }
            else
            {
              $this->db->where('laboratory',$lab);
            }
          }

          $this->db->order_by("borrowers_id", "DESC"); 
          $query = $this->db->get('borrowers_info');
          return $query;
        }

        public function insert_return_trans($arr)
        {
          $this->db->insert('return_transaction', 'borrowers_id');

          $query = $this->db->get('return_transaction');
           return $query->result_array();
        }
        public function get_return($id= FALSE)
        {
          $query = $this->db->get_where('borrowers_info', array('borrowers_id'=>$id));
          return $query->result_array();
        }

        public function clearborrow($arr)
        {
          $this->db->delete('borrowers_info', array('borrowers_id' => $arr['borrowers_id']));    

          $query = $this->db->get_where('item', array('code' => $arr['code']));
          $x = $query->result();          

          $data = array(
               'availablequantity' => $x[0]->availablequantity + $arr['quantity'],
               'damagedquantity' => $x[0]->damagedquantity + $arr['damage']
            );

          $this->db->where('code', $arr['code']);
          $this->db->update('item', $data); 


          $y = $this->show_all_borrowed($arr['idnumber'])->result();
          if($y==null)
          {
              $data = array(
               'violation' => '',
               'status' => 'Cleared'
            );

            $this->db->where('u_id', $arr['idnumber']);
            $this->db->update('student', $data); 
          }

        }

        public function updateborrow($arr)
        {
          $query = $this->db->get_where('item', array('code' => $arr['code']));
          $x = $query->result();          

          $data = array(
               'availablequantity' => $x[0]->availablequantity + $arr['quantity'],
               'damagedquantity' => $x[0]->damagedquantity + $arr['damage']
            );

          $this->db->where('code', $arr['code']);
          $this->db->update('item', $data); 


          $query = $this->db->get_where('borrowers_info', array('borrowers_id' => $arr['borrowers_id']));
          $x = $query->result();          

          $data = array(
               'quantity' => $x[0]->quantity - $arr['quantity'],
               'damaged_item' => $x[0]->damaged_item + $arr['damage']
            );

          $this->db->where('borrowers_id', $arr['borrowers_id']);
          $this->db->update('borrowers_info', $data); 

          $y = $this->show_all_borrowed($arr['idnumber'])->result();
          if($y==null)
          {
              $data = array(
               'violation' => '',
               'status' => 'Cleared'
            );

            $this->db->where('u_id', $arr['idnumber']);
            $this->db->update('student', $data); 
          }

        }

        public function updatequantity($code,$quan)
        {
          $data['availablequantity'] = $quan;
          $this->db->where('code', $code);
          $this->db->update('item', $data); 
        }

        public function addreturn($arr)
        {         

          $x = $this->show_all_borrowed($arr['idnumber'])->result();

          $data = array(
              "returnees_idnumber" => $x[0]->borrowers_idnumber,
              "returnees_fname" => $x[0]->borrowers_fname,
              "returnees_mname" => $x[0]->borrowers_mname,
              "returnees_lname" => $x[0]->borrowers_lname,
              "subject" => $x[0]->subject,
              "schedule" => $x[0]->schedule,
              "tablenumber" => $x[0]->tablenumber,
              "instructor" => $x[0]->instructor,
              "received_by" => $this->session->userdata('name'),
              "item_code" => $arr['code'],
              "item_name" => $arr['itemname'],
              "laboratory" => $this->session->userdata('lab'),
              "return_quantity" => $arr['quantity']
            );

          $this->db->insert('returnees_info', $data); 
        }

  }?>