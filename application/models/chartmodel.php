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

        $this->db->where('code',$values);
        $query = $this->db->get('item');
        $results['name'] = $query->row()->name;



        //get min year
/*        $this->db->select_min('performance_year');
        $this->db->limit(1);
        $query = $this->db->get($this->performance);
        $results['min_year'] = $query->row()->performance_year;
        
        //get max year
        $this->db->select_max('performance_year');
        $this->db->limit(1);
        $query = $this->db->get($this->performance);
        $results['max_year'] = $query->row()->performance_year;*/

        return $results;
    }

}

/* End of file chartmodel.php */
/* Location: ./application/models/chartmodel.php */