<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of ChartModel
 *
 * @author Luke Laylo
 */
class ChartModel extends CI_Model {

    function __construct() {
        
    }

    function get_chart_data($values) {
        //results data
        $this->db->where('code',$values);
        $query = $this->db->get('item');
        $results['chart_data'] = $query->result();

/*        $this->db->select_sum('totalquantity');
        $query = $this->db->get('item');
        $results['sum_of_qty'] = $query->result();

        $this->db->select_sum('availablequantity');
        $query = $this->db->get('item');
        $results['sum_of_aqty'] = $query->result();

        $this->db->select_sum('damagedquantity');
        $query = $this->db->get('item');
        $results['sum_of_dmg'] = $query->result();*/

        return $results;
    }

    function sum_Chart()
    {
        $this->db->select_sum('totalquantity');
        $query = $this->db->get('item');
        $results['sqty'] = $query->row()->totalquantity;

        $this->db->select_sum('availablequantity');
        $query = $this->db->get('item');
        $results['saq'] = $query->row()->availablequantity;

        $this->db->select_sum('damagedquantity');
        $query = $this->db->get('item');
        $results['sdq'] = $query->row()->damagedquantity;
        
        return $results;
    }

}

/* End of file chartmodel.php */
/* Location: ./application/models/chartmodel.php */