<?php
class Categories_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_categories()
    {
        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_category($categoryId = 0)
    {
        if (!$categoryId)
        {
            return false;
        }

        $this->db->select('*');
        $this->db->from('categories');
        $this->db->where('cat_id', $categoryId);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row;
    }

    public function add_category()
    {
        $this->load->helper('url');

        $data = array(
            'cat_title' => $this->input->post('title')
        );

        return $this->db->insert('categories', $data);
    }

    public function update_category()
    {
        $this->load->helper('url');

        $data = array(
            'cat_title' => $this->input->post('title'),
        );
        $this->db->where('cat_id', $this->input->post('id'));

        return $this->db->update('categories', $data);
    }

    public function delete_product($categoryId)
    {
        $this->load->helper('url');
        $this->db->where('cat_id', $categoryId);
        return $this->db->delete('categories');
    }
}