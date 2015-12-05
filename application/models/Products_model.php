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
            $this->db->join('categories', 'categories.cat_id = products.product_category_id');
            $query = $this->db->get();
            return $query->result_array();
        }

        $query = $this->db->get_where('products', array('product_category_id' => $categoryId));
        $res = $query->row_array();
        return $res;
    }

    public function set_products()
    {
        $this->load->helper('url');

        //$slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'product_description' => $this->input->post('description'),
            'product_title' => $this->input->post('title')
        );

        return $this->db->insert('products', $data);
    }
}