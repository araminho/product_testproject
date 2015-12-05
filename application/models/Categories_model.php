<?php
class Categories_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_categories()
    {
        //$query = $this->db->get('categories');
        $this->db->select('*');
        $this->db->from('categories');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function set_categories()
    {
        $this->load->helper('url');

        //$slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'cat_title' => $this->input->post('title')
        );

        return $this->db->insert('categories', $data);
    }
}