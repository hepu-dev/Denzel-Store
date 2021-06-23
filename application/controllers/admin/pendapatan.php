<?php
class Pendapatan extends CI_Controller{
    public function _construct(){
        parent::_construct();

        if($this->session->userdata('role_id')!='1'){
            $this->session->set_flashdata ('pesan','<div 
            class="alert alert-warning 
            alert-dismissible fade show" 
            role="alert">
        belum login anda yaa
        <button type="button" class="close" 
        data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>') ; 
      redirect('auth/login'); 
        }
    } 
    public function index(){
        $data['pendapatan'] = $this->model_pendapatan->tampil_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/footer');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/pendapatan', $data);
    }

    public function detail($id_pendapatan)
    {
        $data['pendapatan'] = $this->model_pendapatan->ambil_id_pendapatan($id_pendapatan);
        $data['pesanan'] = $this->model_pendapatan->ambil_id_pesanan($id_pendapatan);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/footer');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_pendapatan', $data);
    }
}