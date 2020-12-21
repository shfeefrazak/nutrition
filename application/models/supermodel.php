<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserInfo
 *
 * @author Jaleel
 */
class supermodel extends CI_Model {

    

    public function __construct() {

        $this->load->database();
         $this->load->helper('keygen');
          $this->load->library("Tbl");
         //$this->load->library(array('login'));
         
    }
    
    
    
    protected function isValidKey($key, $type){
        
        return ((isset($key) && trim($key) != "" && $key != null) );
    }
    
    
   protected function getPaginationCountry($filter = array()){
       
        $config = array();
        $config["base_url"] = base_url() . "countries";
        $per_page = 25;
        $total_row = $this->countryRecordCount($filter);
        $config["total_rows"] = $total_row;
        $config["per_page"] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;

        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        
       
        return $config;
       
   }
   
   protected function countryRecordCount($filter = null) {
        return $this->db->count_all(Tbl::table_countries);
    }
    
    
    
  
    
    
    
    
    
    
}