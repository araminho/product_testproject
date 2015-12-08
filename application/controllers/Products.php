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
        $this->load->model('categories_model');
        $this->load->helper('url_helper');
    }

    public function index($categoryId = 0)
    {
        $data['products'] = $this->products_model->get_products($categoryId);
        $data['categories'] = $this->categories_model->get_categories();
        $data['title'] = 'All products';

        //echo "<pre>"; print_r($data); exit;
        $this->load->view('templates/header', $data);
        $this->load->view('products/index', $data);
        $this->load->view('templates/footer');
    }

    /*public function view($categoryId = 0)
    {
        $data['products'] = $this->products_model->get_products($categoryId);
    }*/

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a product';
        //echo "<pre>"; print_r($this->categories_model->get_categories()); exit;
        $data['categories'] = $this->categories_model->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        //$this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('products/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->products_model->add_product();
            $data['title'] = 'Congratulations';
            $this->load->view('templates/header', $data);
            $this->load->view('products/success');
            $this->load->view('templates/footer');
        }
    }

    public function edit($productId = 0)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        if ($productId){
            //var_dump($productId); exit;
        }

        $data['title'] = 'Edit product';
        $data['categories'] = $this->categories_model->get_categories();
        $data['product'] = $this->products_model->get_product($productId);
        //echo "<pre>"; print_r($this->products_model->get_product($productId)); exit;


        $this->form_validation->set_rules('title', 'Title', 'required');
        //$this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('products/edit');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->products_model->update_product();
            $data['title'] = 'Edit product';
            $data['categories'] = $this->categories_model->get_categories();
            $data['product'] = $this->products_model->get_product($productId);
            $data['message'] = "Product updated";
            $this->load->view('templates/header', $data);
            $this->load->view('products/edit');
            $this->load->view('templates/footer');
        }
    }
}