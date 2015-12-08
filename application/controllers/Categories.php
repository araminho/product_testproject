<?php
/**
 * Created by PhpStorm.
 * User: Aram
 * Date: 02.12.2015
 * Time: 22:05
 */

class Categories extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('categories_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['categories'] = $this->categories_model->get_categories();
        $data['title'] = 'All categories';

        $this->load->view('templates/header', $data);
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');
    }

    public function json($categoryId = 0)
    {
        $products = $this->products_model->get_products($categoryId);
        echo json_encode($products);
    }


    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a category';
        //echo "<pre>"; print_r($this->categories_model->get_categories()); exit;

        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('categories/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->categories_model->add_category();
            $data['title'] = 'Congratulations';
            $this->load->view('templates/header', $data);
            $this->load->view('categories/success');
            $this->load->view('templates/footer');
        }
    }

    public function edit($categorytId = 0)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Edit category';
        $data['category'] = $this->categories_model->get_category($categorytId);

        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('categories/edit');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->categories_model->update_category();
            $data['title'] = 'Edit category';
            $data['category'] = $this->categories_model->get_category($categorytId);
            $data['message'] = "Category updated";
            $this->load->view('templates/header', $data);
            $this->load->view('categories/edit');
            $this->load->view('templates/footer');
        }
    }

    public function delete($categoryId){
        if (!$categoryId){
            return false;
        }
        $this->categories_model->delete_product($categoryId);
        redirect(base_url('categories'));
    }
}