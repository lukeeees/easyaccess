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

        function chart_VClearance()
    {
        $this->db->where('violation!=','Unreturned Item');
        $this->db->where('status','Pending');
        $query = $this->db->count_all_results('student');
        $results['pending'] = $query;

        $this->db->where('violation!=','Unreturned Item');
        $this->db->where('status','Cleared');
        $query = $this->db->count_all_results('student');
        $results['cleared'] = $query;

        $this->db->where('violation!=','Unreturned Item');
        $query = $this->db->count_all_results('student');
        $results['total'] = $query;

        return $results;
    }

      function chart_LClearance()
    {
        $this->db->where('violation','Unreturned Item');
        $this->db->where('status','Pending');
        $query = $this->db->count_all_results('student');
        $results['pending'] = $query;

        $this->db->where('violation','Unreturned Item');
        $this->db->where('status','Cleared');
        $query = $this->db->count_all_results('student');
        $results['cleared'] = $query;

        $this->db->where('violation','Unreturned Item');
        $query = $this->db->count_all_results('student');
        $results['total'] = $query;

        return $results;
    }

}

/* End of file chartmodel.php */
/* Location: ./application/models/chartmodel.php */