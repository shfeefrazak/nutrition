<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SuperCtrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'apputil', 'appdate', 'emailer', 'templatecreator'));
        $this->load->library(array('Cons', 'Pages', 'Seos', 'session', 'pagination'));
            $this->load->model("ModelAdmin");
        
    }
    
    public function setActiveMenu($menuName = null){
        if($menuName != null && trim($menuName) != ""){
          $this->session->set_userdata(Cons::currenPage_KEY, $menuName); 
        }
    }
    public function pageLoadPublic( $page, $data = array()) {

        $this->load->pageLoadBy(Pages::page_category_public, 'pages' . DIRECTORY_SEPARATOR . Pages::page_category_public . DIRECTORY_SEPARATOR . $page, $data);
    }
    public function pageLoadBy($category, $page, $data = array()) {

        $session = $this->getSession();
        if($session != null){
        $data['data']['session'] = $session;
        //printv($data);
        printv($category . '/pages' . DIRECTORY_SEPARATOR . $category . DIRECTORY_SEPARATOR . $page, 'Path', '#800080');
        
        $this->load->pageLoadBy($category, 'pages' . DIRECTORY_SEPARATOR . $category . DIRECTORY_SEPARATOR . $page, $data);
        }
    }
    protected function isPost($requestinput) {
        if ($this->input->server('REQUEST_METHOD') == 'GET') {
            return false;
        } else if ($this->input->server('REQUEST_METHOD') == 'POST') {
            return true;
        }
    }
      protected function setSession($profile) {
        // printv($profile, 'in session');
        $this->session->set_userdata(Cons::session_key, $profile);
    }

    protected function getSession($showNosessionmessage = true) {
        $session = $this->session->userdata(Cons::session_key);
        if ($session == null) {
            if ($showNosessionmessage) {
                $this->login();
            } else {
                $this->login("");
            }
        }
        return $session;
    }
protected function login($message = Cons::errormessage_nosession, $isSuccess = false) {
        $this->session->unset_userdata(Cons::session_key);
        $datatopage = array();
        if ($isSuccess) {
            $datatopage['data'][Cons::feedbackmessageKey] = '<b><font color="green">' . $message . '</font></b>';
        } else {
           // $datatopage['data'][Cons::feedbackmessageKey] = '<font color="red">' . $message . '</font>';
        }

        $this->load->view('login', $datatopage);
    }

    
    
    public function goPageNotFound($message = "Invalid Request"){
        echo $message;
    }
    
    protected function setFeedbackmessage($message, $issuccess, $key = Cons::feedbackmessageKey) {
       if ($message != null && trim($message) != "") {
           if ($issuccess == true) {
               $message =  $message ;
           } else {
               $message = "<b>" . $message . '</b>';
           }
           $this->session->set_userdata($key, $message);
       }
   }
}