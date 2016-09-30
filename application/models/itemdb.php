<?php
class itemdb extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
           
        }

      
        public function addItem($values)
        {
          $item  = array('name'                     =>      $values['itemName'],
                       'description'                =>      $values['description'] ,
                       'previousstatus'             =>      $values['previousStatus'],
                       'currentstatus'              =>      $values['currentStatus'],
                       'serialnumber'               =>      $values['serialNumber'],
                       'partnumber'                 =>      $values['partNumber'],
                       'manufacturenumber'         =>      $values['manufactureNumber'],
                       'dateacquired'               =>      $values['dateAcquired'],
                       'remarks'                    =>      $values['remarks'],
                       'totalquantity'              =>      $values['totalQuantity'],
                       'availablequantity'          =>      $values['availableQuantity'],
                       'damagedquantity'            =>      $values['damagedQuantity'],
                       'owner'                      =>      $values['owner']);

          $this->db->insert('item',$item);
        }


        public function showItem()
        {
          $data=array();
          $query = $this->db->get('item');
          $data = $query->result_array();
          return $data;
        }

        public function get_search($value)
        {
          
          $this->db->like('name',$value);
          $query = $this->db->get('item');
          
         return $query->result();
        }

        public function solItem($x){
          $this->db->where('code', $x);
          $query = $this->db->get('item');
          return $query;
          }

        public function upItem($values)
          {
            $item  = array('name'                   =>      $values['itemName'],
                       'description'                =>      $values['description'] ,
                       'previousstatus'             =>      $values['previousStatus'],
                       'currentstatus'              =>      $values['currentStatus'],
                       'serialnumber'               =>      $values['serialNumber'],
                       'partnumber'                 =>      $values['partNumber'],
                       'manufacturenumber'          =>      $values['manufactureNumber'],
                       'dateacquired'               =>      $values['dateAcquired'],
                       'remarks'                    =>      $values['remarks'],
                       'totalquantity'              =>      $values['totalQuantity'],
                       'availablequantity'          =>      $values['availableQuantity'],
                       'damagedquantity'            =>      $values['damagedQuantity'],
                       'owner'                      =>      $values['owner']);

             $this->db->where('code', $values['itemCode']);
             $this->db->update('item',$item);
          }


  }?>