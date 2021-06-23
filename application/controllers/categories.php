<?php

class Categories extends CI_Controller{
    public function akungame()
    {
        $data['akungame'] = $this->model_categories->data_akungame()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('akungame', $data);
        $this->load->view('templates/footer');
    }

    public function skingame()
    {
        $data['skingame'] = $this->model_categories->data_skingame()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('skingame', $data);
        $this->load->view('templates/footer');
    }

    public function itemgame()
    {
        $data['itemgame'] = $this->model_categories->data_itemgame()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('itemgame', $data);
        $this->load->view('templates/footer');
    }

    public function battlepast()
    {
        $data['battlepast'] = $this->model_categories->data_battlepast()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('battlepast', $data);
        $this->load->view('templates/footer');
    }
}