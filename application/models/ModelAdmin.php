<?php

/*
 *  Model to admin Setion
 */

require_once ('supermodel.php');

class ModelAdmin extends supermodel {

    public function __construct() {
        parent::__construct();
        $this->load->library("Tbl");
        $this->load->helper(array('fileupload'));
    }

  
// login setion
    public function authenticateBy($username, $password, $commingFrom = null) {
        $res = array();
        $this->db->select('*');

        $this->db->from(Tbl::table_user . ' as login');
        $this->db->where('password', $password);
        $this->db->where('username', $username);
        $this->db->where('userType', 'Admin');
        $this->db->limit(1);
        $query = $this->db->get();

        $resultArray = $query->result_array();
        // lastqry($this->db);
        if ($resultArray != null && isset($resultArray) && count($resultArray) > 0) {

            $res[Cons::errorindex_code] = Cons::errorcode_success;
            $res[Cons::errorindex_message] = Cons::errormessage_success;
            $res[Cons::res_value] = $resultArray[0];
        } else {
            $res[Cons::errorindex_code] = 1;
            $res[Cons::errorindex_message] = "Invalid username/password.";
        }

        return $res;
    }

    

   // user managment

    public function getUsersBy($filter = array()) {
        $this->db->select('*');
        $this->db->from(Tbl::table_user);
        $this->db->where('userType', 'user');
        if (isset($filter['userIdPk']) && intval($filter['userIdPk']) > 0) {
            $this->db->where('userIdPk', $filter['userIdPk']);
        }

        if (isset($filter['stdate'])) {
            $this->db->where('regDate>=', $filter['stdate']);
        }
        if (isset($filter['endate'])) {
            $this->db->where('regDate<=', $filter['endate']);
        } if (isset($filter['name']) && trim($filter['name'] != "")) {
            $this->db->where('name', $filter['name']);
        }

        if (isset($filter['mobile']) && trim($filter['mobile'] != "")) {
            $this->db->where('mobile', $filter['mobile']);
        }
        if (isset($filter['email']) && trim($filter['email'] != "")) {
            $this->db->where('email', $filter['email']);
        }
        if (isset($filter['userStatus']) && intval($filter['userStatus']) > 0) {
            $this->db->where('userStatus', $filter['userStatus']);
        }
        $userlist = $this->db->get()->result_array();
        $res[Cons::errorindex_code] = (isset($userlist) && sizeof($userlist) > 0 ) ? Cons::errorcode_success : 8;
        $res[Cons::errorindex_message] = $res[Cons::errorindex_code] == Cons::errorcode_success ? Cons::errormessage_success : "No record found.";
        if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
            $res[Cons::res_value] = $userlist;
        }
        return $res;
    }

    
   // I used Data as common entity for all product or same variable, reusable and a flag to diffrentiat all data, dont need to many tables
    public function getDataBy($filter = array()) {
        $this->db->select('*');
        $this->db->from(Tbl::table_data);
        $this->db->order_by("data_added", "desc");

        if (isset($filter['data_id_pk']) && intval($filter['data_id_pk']) > 0) {
            $this->db->where('data_id_pk', $filter['data_id_pk']);
        }
        if (isset($filter['data_status']) && intval($filter['data_status']) > 0) {
            $this->db->where('data_status', $filter['data_status']);
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

    public function addEditData($dataTomodel = array()) {

        $post_id_pk = isset($dataTomodel['data_id_pk']) ? intval($dataTomodel['data_id_pk']) : 0;
        $dataTomodel['data_style'] = isset($dataTomodel['data_style']) ? intval($dataTomodel['data_style']) : 0;
        $dataTodb['data_cat_id'] = isset($dataTomodel['data_cat_id']) ? intval($dataTomodel['data_cat_id']) : 0;


        $dataTomodel['uploadfileIndex'] = 'updateimage';

        $imgUploadRes = uploadbookImage($dataTomodel, Cons::upload_folder_post_image);
        $imageUploadError = null;
        if ($imgUploadRes[Cons::errorindex_code] == Cons::errorcode_success) {
            $dataTodb['data_img'] = $imgUploadRes[Cons::res_value];
        } else {
            $imageUploadError = $imgUploadRes[Cons::errorindex_message];
            $dataTodb['data_img'] = "";
        }
        $dataTodb['data_lang'] = $dataTomodel['data_lang'];
        $dataTodb['data_region'] = $dataTomodel['data_region'];
        $dataTodb['data_type'] = $dataTomodel['data_type'];

        $dataTodb['data_avail'] = $dataTomodel['data_avail'];
        $dataTodb['data_head'] = $dataTomodel['data_head'];
        $dataTodb['data_price'] = $dataTomodel['data_price'];
        $dataTodb['data_date'] = $dataTomodel['data_date'];
        $dataTodb['data_updated'] = uiDate2DBdate(getCurrentDateWithTime(), TRUE);
        $dataTodb['data_status'] = Cons::STATUS_ACTIVE;
        if ($post_id_pk > 0) {
            if ($dataTodb['data_img'] == "") {
                $dataTodb['data_img'] = $dataTomodel['data_img'];
            }
            $this->db->where('data_id_pk', $post_id_pk);
            $this->db->update(Tbl::table_data, $dataTodb);
            $uid = ($this->db->affected_rows() > 0 ) ? $post_id_pk : 0;
        } else {


            $dataTodb['data_added'] = uiDate2DBdate(getCurrentDateWithTime(), TRUE);
            $this->db->insert(Tbl::table_data, $dataTodb);
            $uid = $this->db->insert_id();
        }
        $res = array();
        $res[Cons::errorindex_code] = ($uid > 0 ) ? Cons::errorcode_success : 8;
        $res[Cons::errorindex_message] = $res[Cons::errorindex_code] == Cons::errorcode_success ?
                Cons::errorMessage_db_general_success : Cons::errorMessage_db_general_error;

        return $res;
    }

    public function changePostStatusBy($dataTomodel = array()) {
        $dataTomodel['data_id_pk'] = isset($dataTomodel['data_id_pk']) ? intval($dataTomodel['data_id_pk']) : 0;
        if ($dataTomodel['data_id_pk'] > 0) {
            $status = intval($dataTomodel['data_status']);
            $dataTodb = array('data_status' => $status);
            $this->db->where('data_id_pk', $dataTomodel['data_id_pk']);
            $this->db->update(Tbl::table_data, $dataTodb);
            $userid = ($this->db->affected_rows() > 0 ) ? $dataTomodel['data_id_pk'] : 0;
        }
        $res = array();
        $res[Cons::errorindex_code] = ($userid > 0 ) ? Cons::errorcode_success : 8;
        $res[Cons::errorindex_message] = $res[Cons::errorindex_code] == Cons::errorcode_success ?
                Cons::errorMessage_db_general_success : Cons::errorMessage_db_general_error;
        $res[Cons::res_value] = $userid;
        return $res;
    }

    public function deleteDataById($dataTomodel = array()) {
        $dataTomodel['data_id_pk'] = isset($dataTomodel['data_id_pk']) ? intval($dataTomodel['data_id_pk']) : 0;
        if ($dataTomodel['data_id_pk'] > 0) {
            $this->db->where('data_id_pk', $dataTomodel['data_id_pk']);
            $this->db->delete(Tbl::table_data);
            $id = ($this->db->affected_rows() > 0 ) ? $dataTomodel['data_id_pk'] : 0;
        }
        $res = array();
        $res[Cons::errorindex_code] = ($id > 0 ) ? Cons::errorcode_success : 8;
        $res[Cons::errorindex_message] = $res[Cons::errorindex_code] == Cons::errorcode_success ?
                Cons::errorMessage_db_general_success : Cons::errorMessage_db_general_error;
        $res[Cons::res_value] = $id;
        return $res;
    }

  

    //---------------------------------------------------------

   
    public function AddEditCat($dataTomodel = array()) {

        $home_id = isset($dataTomodel['cat_id_pk']) ? intval($dataTomodel['cat_id_pk']) : 0;
        $dataTodb['cat_name'] = $dataTomodel['cat_name'];
        $dataTodb['cat_updated'] = uiDate2DBdate(getCurrentDateWithTime(), TRUE);
        $dataTodb['cat_status'] = Cons::STATUS_ACTIVE;

        if ($home_id > 0) {
            $this->db->where('cat_id_pk', $home_id);
            $this->db->update(Tbl::table_cat, $dataTodb);
            $uid = ($this->db->affected_rows() > 0 ) ? $home_id : 0;
        } else {
            $dataTodb['cat_added'] = uiDate2DBdate(getCurrentDateWithTime(), TRUE);
            $this->db->insert(Tbl::table_cat, $dataTodb);
            $uid = $this->db->insert_id();
        }
        $res = array();
        $res[Cons::errorindex_code] = ($uid > 0 ) ? Cons::errorcode_success : 8;
        $res[Cons::errorindex_message] = $res[Cons::errorindex_code] == Cons::errorcode_success ?
                Cons::errorMessage_db_general_success : Cons::errorMessage_db_general_error;

        return $res;
    }

    public function getCatBy($filter = array()) {
        $this->db->select('*');
        $this->db->from(Tbl::table_cat);
        $this->db->order_by("cat_added", "asec");
        if (isset($filter['cat_id_pk']) && intval($filter['cat_id_pk']) > 0) {
            $this->db->where('cat_id_pk', $filter['cat_id_pk']);
        }
        if (isset($filter['cat_status']) && intval($filter['cat_status']) > 0) {
            $this->db->where('cat_status', $filter['cat_status']);
        }
        // $this->db->join(Tbl::table_result8, Tbl::table_result8 . '.result_id=' . Tbl::table_results . '.result_id_pk', 'left');
        $newsevetlist = $this->db->get()->result_array();
        $res[Cons::errorindex_code] = (isset($newsevetlist) && sizeof($newsevetlist) > 0 ) ? Cons::errorcode_success : 8;
        $res[Cons::errorindex_message] = $res[Cons::errorindex_code] == Cons::errorcode_success ? Cons::errormessage_success : "No record found.";
        if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
            $res[Cons::res_value] = $newsevetlist;
        }
        return $res;
    }

    public function changeCatStatusBy($dataTomodel = array()) {
        $dataTomodel['cat_id_pk'] = isset($dataTomodel['cat_id_pk']) ? intval($dataTomodel['cat_id_pk']) : 0;
        if ($dataTomodel['cat_id_pk'] > 0) {
            $status = intval($dataTomodel['cat_status']);
            $dataTodb = array('cat_status' => $status);
            $this->db->where('cat_id_pk', $dataTomodel['cat_id_pk']);
            $this->db->update(Tbl::table_cat, $dataTodb);
            $userid = ($this->db->affected_rows() > 0 ) ? $dataTomodel['cat_id_pk'] : 0;
        }
        $res = array();
        $res[Cons::errorindex_code] = ($userid > 0 ) ? Cons::errorcode_success : 8;
        $res[Cons::errorindex_message] = $res[Cons::errorindex_code] == Cons::errorcode_success ?
                Cons::errorMessage_db_general_success : Cons::errorMessage_db_general_error;
        $res[Cons::res_value] = $userid;
        return $res;
    }

    //-------------------------------------------------

   

}
