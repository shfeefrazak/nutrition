<?php

require_once ('supermodel.php');

class PublicModel extends supermodel {

    public function __construct() {
        parent::__construct();
        $this->load->library("Tbl");
    }

    public function getDataBy($filter = array()) {
        $this->db->select('*');
        $this->db->from(Tbl::table_data);
        $this->db->where('data_status', Cons::STATUS_ACTIVE);

        if (isset($filter['data_region']) && trim($filter['data_region']) != '') {
            $this->db->like('data_region', $filter['data_region'], 'both');
        }
        if (isset($filter['data_lang']) && trim($filter['data_lang']) != '') {
            $this->db->like('data_lang', $filter['data_lang'], 'both');
        }

        if (isset($filter['data_id_pk']) && intval($filter['data_id_pk']) > 0) {
            $this->db->where('data_id_pk', $filter['data_id_pk']);
        }
        if (isset($filter['limit']) && intval($filter['limit']) > 0) {
            $this->db->limit($filter['limit']);
        }

        if (isset($filter['data_head']) && trim($filter['data_head']) != '') {
            $this->db->like('data_head', $filter['data_head'], 'both');
        }

        if (isset($filter['data_type']) && intval($filter['data_type']) > 0) {
            $this->db->where('data_type', $filter['data_type']);
        }
        if (isset($filter['join']) && intval($filter['join']) > 0) {
            $this->db->join(Tbl::table_cat, Tbl::table_cat . '.cat_id_pk=' . Tbl::table_data . '.data_cat_id', 'left');
        }


        $newsevetlist = $this->db->get()->result_array();
        $res[Cons::errorindex_code] = (isset($newsevetlist) && sizeof($newsevetlist) > 0 ) ? Cons::errorcode_success : 8;
        $res[Cons::errorindex_message] = $res[Cons::errorindex_code] == Cons::errorcode_success ? Cons::errormessage_success : "No record found.";
        if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
            $res[Cons::res_value] = $newsevetlist;
        }
        return $res;
    }

}
