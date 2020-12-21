<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once ('SuperCtrl.php');

class PublicCtrl extends SuperCtrl {

    public function __construct() {
        parent::__construct();
        $this->load->model("PublicModel"); // loading model on top, one time load to this ctrl
    }

    public function index() {
        redirect('app-name/ae/en'); // first hit to this index funtion, default redirect to the page
    }

    public function product_page() {

        $region = $this->uri->segment(2);  // taking url segament to identify the page
        $lang = $this->uri->segment(3);


        if ($region && $lang != null) {
            $_SESSION["region"] = $region;   // storimg that uri segment to session
            $_SESSION["language"] = $lang;
        }

        // setcookie('cookie', serialize($info), time()+10600);  // $info array use to set cookie
        // $data = unserialize($_COOKIE['cookie'], ["allowed_classes" => false]);  // to retriev cookie data
        // printv($_SESSION); /* printv is  basically print_r but only visible in localhost


        $filter['data_region'] = $region;
        $filter['data_lang'] = $lang;

        $filter['data_type'] = Cons::DATA_TYPE_PRODUCT;
        $res3 = $this->PublicModel->getDataBy($filter);
        if ($res3[Cons::errorindex_code] == Cons::errorcode_success) {
            $dataToPage['data']['productlist'] = $res3[Cons::res_value];
        }

        $dataToPage['data']['tittle'] = "Test";
        $dataToPage['data']['description'] = "des";
        $dataToPage['data'][Cons::currenPage_KEY] = Pages::page_public_home;
        $this->pageLoadPublic(Pages::page_public_home, $dataToPage);
    }

    public function detail_page() {
        $product_id = $this->uri->segment(4); // taking url segament to identify the page
        $product_id = isset($product_id) ? intval($product_id) : 0;
        if ($product_id > 0) {
            $filter['data_id_pk'] = $product_id;
            $res = $this->PublicModel->getDataBy($filter);
            if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                $dataToPage['data']['product'] = $res[Cons::res_value][0];
                $dataToPage['data']['tittle'] = substr($res[Cons::res_value][0]['data_head'], 0, 60);
                $dataToPage['data']['description'] = "Descroiption goes here......";
            }
        } else {
            redirect($_SERVER["HTTP_REFERER"]); // redrect previous page.
        }

        $dataToPage['data'][Cons::currenPage_KEY] = Pages::page_public_detail_page;
        $this->pageLoadPublic(Pages::page_public_detail_page, $dataToPage);
    }

    public function add_to_cart() {

        if ($this->isPost($this->input)) {
            $cart = $this->input->post();

            $cart_products = $this->session->userdata('cart_products'); // Whenever a user adds an item to their cart, pull out any they already have in there

            $cart_products[] = $cart;   // Add the new item

            $this->session->set_userdata('cart_products', $cart_products); // And put it back into the session


            redirect('app-name/' . $_SESSION["region"] . '/' . $_SESSION["language"]); // Return to same page depend on lang and region by user
        }
    }

    public function cart() {
        $cart_products = $this->session->userdata('cart_products');
        $cart_items = array();
        if ($cart_products != null) {
            foreach ($cart_products as $product) {
                $filter['data_id_pk'] = $product['product_id'];
                $res = $this->PublicModel->getDataBy($filter);
                if ($res[Cons::errorindex_code] == Cons::errorcode_success) {
                    $res[Cons::res_value][0]['qty'] = $product['quantity'];
                    array_push($cart_items, $res[Cons::res_value][0]);
                }
            }
        }
        $dataToPage['data']['cartitems'] = $cart_items;

        $dataToPage['data'][Cons::currenPage_KEY] = Pages::page_public_cart;
        $this->pageLoadPublic(Pages::page_public_cart, $dataToPage);
    }

    public function check_out() {
        $this->session->unset_userdata('cart_products');
        redirect($_SERVER["HTTP_REFERER"]); // redrect previous page.
    }

}

// session_destroy();  to clear session after check out