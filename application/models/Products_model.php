<?php
class Products_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_products($categoryId = 0)
    {
        if ($categoryId === 0)
        {
            //$query = $this->db->get('products');
            $this->db->select('*');
            $this->db->from('products');
            $this->db->join('categories', 'categories.cat_id = products.product_category_id', 'left');
            $this->db->order_by('product_id ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        /*$query = $this->db->get_where('products', array('product_category_id' => $categoryId));
        $res = $query->row_array();*/
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories', 'categories.cat_id = products.product_category_id', 'left');
        $this->db->where('product_category_id', $categoryId);
        $this->db->order_by('product_id ASC');
        $query = $this->db->get();
        return $query->result_array();
        return $res;
    }

    public function get_product($productId = 0)
    {
        if (!$productId)
        {
            return false;
        }

        //$query = $this->db->get('products');
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories', 'categories.cat_id = products.product_category_id', 'left');
        $this->db->where('product_id', $productId);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row;
    }

    public function add_product()
    {
        $this->load->helper('url');

        //$slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'product_description' => $this->input->post('description'),
            'product_title' => $this->input->post('title'),
            'product_category_id' => $this->input->post('category'),
        );

        return $this->db->insert('products', $data);
    }

    public function update_product()
    {
        $this->load->helper('url');

        //$slug = url_title($this->input->post('title'), 'dash', TRUE);
        //echo "<pre>"; print_r($_POST); exit;
        $data = array(
            'product_description' => $this->input->post('description'),
            'product_title' => $this->input->post('title'),
            'product_category_id' => $this->input->post('category'),
        );
        $this->db->where('product_id', $this->input->post('id'));

        return $this->db->update('products', $data);
    }
}