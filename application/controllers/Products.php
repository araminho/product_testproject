<?php
/**
 * Created by PhpStorm.
 * User: Aram
 * Date: 02.12.2015
 * Time: 22:05
 */

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['products'] = $this->products_model->get_products();
        $data['title'] = 'All products';

        //echo "<pre>"; print_r($data); exit;
        $this->load->view('templates/header', $data);
        $this->load->view('products/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($categoryId = 0)
    {
        $data['products'] = $this->products_model->get_products($categoryId);
    }
}