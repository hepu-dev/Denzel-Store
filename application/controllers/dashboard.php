<?php

class Dashboard extends CI_Controller{

    public function _construct(){
        parent:: _construct();

        if($this->session->userdata('role_id')!='2'
             ){ 
            $this->session->set_flashdata ('pesan','<div 
                        class="alert alert-danger 
                        alert-dismissible fade show" 
                        role="alert">
                    anda belum login  
                    <button type="button" class="close" 
                    data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                    </button>
                </div>');
            redirect('auth/login'); 
        }
    } 

    public function index(){
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
    }
    
    public function tambah_ke_keranjang($id)
    {
        $barang = $this->model_barang->find($id);

        $data = array(
            'id'      => $barang->id_barang,
            'qty'     => 1,
            'price'   => $barang->harga_barang,
            'name'    => $barang->nama_barang,
    );
    
    $this->cart->insert($data);
    redirect('dashboard');
    }

    public function detail_keranjang()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('dashboard/index');
    }

    public function pembayaran()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/footer');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
    }

    public function proses_pesanan()
    {
        $is_processed = $this->model_pendapatan->index();
        if($is_processed){
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/footer');
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan');
        }else{
            echo 'Maaf, Pesanan Gagal Diproses Silahkan Masukan Kembali';
        }
        
    }

    public function detail($id_barang)
    {
        $data['barang'] = $this->model_barang->detail_barang($id_barang);
        $this->load->view('templates/header');
            $this->load->view('templates/footer');
            $this->load->view('templates/sidebar');
            $this->load->view('detail',$data);
    }
}