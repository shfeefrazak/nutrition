<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once ('SuperCtrl.php');

class Adminctrl extends SuperCtrl {

    public function __construct() {
        parent::__construct();
        $this->load->model("ModelAdmin");
    }

    public function index() {
        $session = $this->getSession("");
        if ($session != null) {
            redirect("adl-home");
        }
    }


    public function forgotpassword() {
        if ($this->isPost($this->input)) {
            $user = $this->input->post();

            $res = $this->ModelAdmin->addUser($user);
            if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                $this->setFeedbackmessage('Successfully registered', TRUE);
                $this->load->view('login');
            }
        } else {
            $this->load->view('forgotpassword');
        }
    }

    public function auth() {
        if ($this->isPost($this->input)) {

            $this->load->library('form_validation');
            $this->form_validation->set_rules('password_of', 'Password', 'required');
            $this->form_validation->set_rules('username_of', 'Username', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login', $this->input->post());
            } else {
                $username = $this->input->post("username_of");
                $password = $this->input->post("password_of");
                $res = $this->ModelAdmin->authenticateBy($username, $password, "WEB");
                if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                    printv($res[Cons::res_value]);
                    $this->setSession($res[Cons::res_value]);
                    redirect('adl-home');
                } else {
                    $this->setFeedbackmessage('Invalid User/Password !!', TRUE);
                    $this->login($res[Cons::errorindex_message]);
                }
            }
        } else {
            $this->adminHome();
        }
    }

    public function adminhome() {
        $session = $this->getSession();
        if ($session != null) {
            $dataToPage = array();

            $filter = array();
            $filter['data_type'] = Cons::DATA_TYPE_PRODUCT;
            $filter['join'] = Cons::DATA_TYPE_PRODUCT;
            $res = $this->ModelAdmin->getDataBy($filter);
            if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                $dataToPage['data']['list'] = $res[Cons::res_value];
            }
            $res = $this->ModelAdmin->getCatBy();
            if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                $dataToPage['data']['category'] = $res[Cons::res_value];
            }

            $dataToPage ['data']['session'] = $session;
            $this->setActiveMenu(Pages::page_admin_home);
            $dataToPage['data'][Cons::currenPage_KEY] = Pages::page_admin_home;
            $this->pageLoadBy(Pages::page_category_admin, Pages::page_admin_home, $dataToPage);
        }
    }

    public function product_list() {
        $session = $this->getSession();
        if ($session != null) {
            $dataToPage = array();
            $dataToPage ['data']['session'] = $session;

            $filter = array();
            $filter['data_type'] = Cons::DATA_TYPE_PRODUCT;
            $filter['join'] = Cons::DATA_TYPE_PRODUCT;
            $res = $this->ModelAdmin->getDataBy($filter);
            if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                $dataToPage['data']['list'] = $res[Cons::res_value];
            }
            $res = $this->ModelAdmin->getCatBy();
            if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                $dataToPage['data']['category'] = $res[Cons::res_value];
            }

            $this->setActiveMenu(Pages::page_admin_productlist);
            $dataToPage['data'][Cons::currenPage_KEY] = Pages::page_admin_productlist;
            $this->pageLoadBy(Pages::page_category_admin, Pages::page_admin_productlist, $dataToPage);
        }
    }

    public function add_edit_product() {

        $session = $this->getSession();
        if ($session != null) {
            $dataToPage = array();
            $dataToPage ['data']['session'] = $session;

            if ($this->isPost($this->input)) {
                $post = $this->input->post();
                $res = $this->ModelAdmin->addEditData($post);
                if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                    $productid = $res[Cons::res_value];
                    $this->setFeedbackmessage('Successfully Added/Updated', TRUE);
                    redirect('adl-home');
                }
            } else {
                $catId = $this->input->get('postid');
                $catId = isset($catId) ? intval($catId) : 0;
                if ($catId > 0) {
                    $filter['data_id_pk'] = $catId;

                    $res = $this->ModelAdmin->getDataBy($filter);
                    if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                        $dataToPage['data']['filter'] = $res[Cons::res_value][0];
                    } else {
                        $this->setFeedbackmessage('Error please try again later', FALSE);
                        redirect('adl-home');
                    }
                }
            }
            $res = $this->ModelAdmin->getCatBy();
            if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                $dataToPage['data']['category'] = $res[Cons::res_value];
            }


            $this->setActiveMenu(Pages::page_admin_home);
            $dataToPage['data'][Cons::currenPage_KEY] = Pages::page_admin_add_edit_product;
            $this->pageLoadBy(Pages::page_category_admin, Pages::page_admin_add_edit_product, $dataToPage);
        }
    }

    public function delete_data() {
        $session = $this->getSession();
        if ($session != null) {
            $dataToPage = array();
            $dataToPage ['data']['session'] = $session;
            $product_id = $this->uri->segment(3);
            $product_id = isset($product_id) ? intval($product_id) : 0;

            if ($product_id > 0) {
                $filter['data_id_pk'] = $product_id;

                $res = $this->ModelAdmin->deleteDataById($filter);
                if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                    $this->setFeedbackmessage("Successfully Updated", TRUE);
                } else {
                    $this->setFeedbackmessage("Updation Failed ,model fail", FALSE);
                }
            } else {
                $this->setFeedbackmessage("Updation Failed, no id", FALSE);
            }

            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function logout() {
        $this->session->unset_userdata('USER_SESSION_FLUEUP');
        $this->login("Successfully logged out.", true);
    }

}
