<?php

class Model_categories extends CI_Model{
    public function data_akungame()
    {
       return $this->db->get_where("barang", array('categories' => 'akun game'));
    }

    public function data_skingame()
    {
       return $this->db->get_where("barang", array('categories' => 'skin game'));
       
    }

    public function data_itemgame()
    {
       return $this->db->get_where("barang", array('categories' => 'item game'));
    }

    public function data_battlepast()
    {
       return $this->db->get_where("barang", array('categories' => 'battlepast'));
    }
}