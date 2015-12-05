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

        //echo "<pre>"; print_r($data); exit;
        $this->load->view('templates/header', $data);
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');
    }

    /*public function view($categoryId = 0)
    {
        $data['categories'] = $this->categories_model->get_categories($categoryId);
    }*/

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a category';

        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('categories/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->categories_model->set_categories();
            $this->load->view('categories/success');
        }
    }
}