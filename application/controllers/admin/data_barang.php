<?php

class Data_barang extends CI_Controller{
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
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/footer');
        $this->load->view('admin/data_barang', $data);
    }
    public function tambah_aksi(){
        $nama_barang = $this->input->post('nama_barang');
        $deskripsi = $this->input->post('deskripsi');
        $categories = $this->input->post('categories');
        $harga_barang = $this->input->post('harga_barang');
        $stok_barang = $this->input->post('stok_barang');
        $gambar = $_FILES['gambar']['name'];
    if ($gambar =''){

    }else{
        $config ['upload_path'] = './uploads';
        $config ['allowed_types'] = 'jpg|png|jpeg|gif';

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('gambar')){
            echo "Gambar Tidak Berhasil Terupload!";
        }else{
            $gambar=$this->upload->data('file_name');
        }
    }
    $data = array (
        'nama_barang' => $nama_barang,
        'deskripsi' => $deskripsi,
        'harga_barang' => $harga_barang,
        'categories' => $categories,
        'stok_barang' => $stok_barang,
        'gambar' => $gambar
    );
    $this->model_barang->tambah_barang($data, 'barang');
    redirect('admin/data_barang/index');
    }

    public function edit($id)
    {
        $where = array('id_barang' =>$id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/footer');
        $this->load->view('admin/edit_barang', $data);
    }

    public function update(){
        $id             = $this->input->post('id_barang');
        $nama_barang    = $this->input->post('nama_barang');
        $deskripsi      = $this->input->post('deskripsi');
        $categories     = $this->input->post('categories');
        $harga_barang   = $this->input->post('harga_barang');
        $stok_barang    = $this->input->post('stok_barang');

        $data = array(
            'nama_barang'   => $nama_barang,
            'deskripsi'     => $deskripsi,
            'categories'    => $categories,
            'harga_barang'  => $harga_barang,
            'stok_barang'   => $stok_barang
        );

        $where = array(
            'id_barang' => $id
        );

        $this->model_barang->update_data($where,$data, 'barang');
        redirect('admin/data_barang');
    }

    public function hapus ($id)
    {
        $where = array('id_barang' => $id);
        $this->model_barang->hapus_data($where, 'barang');
        redirect('admin/data_barang');
    }
}
