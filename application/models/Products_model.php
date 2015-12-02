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
            $query = $this->db->get('products');
            return $query->result_array();
        }

        $query = $this->db->get_where('products', array('category_id' => $categoryId));
        $res = $query->row_array();
        return $res;
    }
}