<?php
class Model_pendapatan extends CI_Model{
    public function index(){
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        
        $pendapatan = array (
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'tgl_pemesanan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s', mktime( date('H'), 
            date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
        );
        $this->db->insert('pendapatan', $pendapatan);
        $id_pendapatan = $this->db->insert_id();

        foreach ($this->cart->contents() as $items){
            $data = array(
                'id_pendapatan' => $id_pendapatan,
                'id_barang'     => $items['id'],
                'nama_barang'   => $items['name'],
                'jumlah'        => $items['qty'],
                'harga'         => $items['price'],
            );
            $this->db->insert('pesanan', $data);
        }
        return TRUE;
    }
    public function tampil_data(){
        $result = $this->db->get('pendapatan');
        if($result->num_rows()>0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function ambil_id_pendapatan($id_pendapatan)
    {
        $result = $this->db->where('id', $id_pendapatan)->limit(1)->get('pendapatan');
        if($result->num_rows() > 0){
            return $result->row();
        }else {
            return false;
        }
    }

    public function ambil_id_pesanan($id_pendapatan)
    {
        $result = $this->db->where('id_pendapatan', $id_pendapatan)->get('pesanan');
        if($result->num_rows() > 0){
            return $result->result();
        }else {
            return false;
        }
    }
}