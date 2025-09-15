<?php

class Uang_kas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('uang_kas_model');
        $this->load->model('dashboard_model');
        if(!$this->uang_kas_model->current_user()){
            redirect('login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->uang_kas_model->current_user();
        $data['jumlah_pengeluaran'] = $this->dashboard_model->jumlah_pengeluaran();
        $data['jumlah_pemasukan'] = $this->dashboard_model->jumlah_pemasukan();
        $data['uang_kas'] = $this->uang_kas_model->uang_kas();
        $data['jumlah_uang_kas'] = $this->dashboard_model->jumlah_uang_kas();
        $data['bulan_pembayaran'] = $this->uang_kas_model->bulan_pembayaran();
        
        $this->load->view('_partials/head.php', $data);
        $this->load->view('_partials/side_nav.php');
        $this->load->view('uang_kas.php');
        $this->load->view('_partials/footer.php');
    }

    public function tambah_bulan_pembayaran()
    {
        $nama_bulan = $this->input->post('nama_bulan');
        $tahun = $this->input->post('tahun');
        $pembayaran_perminggu = $this->input->post('pembayaran_perminggu');

        $data = array(
            'nama_bulan' => $nama_bulan,
            'tahun' => $tahun,
            'pembayaran_perminggu' => $pembayaran_perminggu
        );
        
        $this->uang_kas_model->addBulanPembayaran($data, 'bulan_pembayaran');
        redirect('uang_kas');
    }

    public function hapus_bulan_pembayaran($id_bulan_pembayaran)
    {
        $where = array('id_bulan_pembayaran' => $id_bulan_pembayaran);
        $this->uang_kas_model->delete_bulan_pembayaran($where, 'bulan_pembayaran');
        redirect('uang_kas');
    }
}
