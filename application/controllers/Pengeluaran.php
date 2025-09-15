<?php

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengeluaran_model');
        $this->load->model('dashboard_model');
        if(!$this->pengeluaran_model->current_user()){
            redirect('login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->pengeluaran_model->current_user();
        $data['pengeluaran'] = $this->pengeluaran_model->pengeluaran();
        $data['jumlah_pengeluaran'] = $this->dashboard_model->jumlah_pengeluaran();
        $data['jumlah_pemasukan'] = $this->dashboard_model->jumlah_pemasukan();
        $data['jumlah_uang_kas'] = $this->pengeluaran_model->jumlah_uang_kas();
        $data['bulan'] = $this->pengeluaran_model->bulan_pembayaran();

        $this->load->view('_partials/head.php', $data);
        $this->load->view('_partials/side_nav.php');
        $this->load->view('pengeluaran.php');
        $this->load->view('_partials/footer.php');
    }

    public function tambah_pengeluaran()
    {
        $jumlah_pengeluaran = $this->input->post('jumlah_pengeluaran');
        $keterangan = $this->input->post('keterangan');
        $tanggal_pengeluaran = $this->input->post('tanggal_pengeluaran');
        $id_bulan_pembayaran = $this->input->post('id_bulan_pembayaran');
        $aksi = "telah menambahkan pengeluaran " . $keterangan . " dengan biaya Rp. " . number_format($jumlah_pengeluaran);

        $data = array(
            'jumlah_pengeluaran' => $jumlah_pengeluaran,
            'keterangan' => $keterangan,
            'tanggal_pengeluaran' => $tanggal_pengeluaran,
            'id_bulan_pembayaran' => $id_bulan_pembayaran,
        );

        $datariwayat = array(
            'aksi' => $aksi,
            'tanggal' => $tanggal_pengeluaran
        );

        $this->pengeluaran_model->input_pengeluaran($data, $datariwayat);
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
        redirect('pengeluaran');
    }

    public function hapus_pengeluaran($id_pengeluaran)
    {
        $where = array('id_pengeluaran' => $id_pengeluaran);
        $this->pengeluaran_model->delete_pengeluaran($where);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect('pengeluaran');
    }

    public function edit_pengeluaran()
    {
        $id_pengeluaran = $this->input->post('id_pengeluaran');
        $jumlah_pengeluaran = $this->input->post('jumlah_pengeluaran');
        $keterangan = $this->input->post('keterangan');
        $tanggal_pengeluaran = $this->input->post('tanggal_pengeluaran');

        $data = array(
            'jumlah_pengeluaran' => $jumlah_pengeluaran,
            'keterangan' => $keterangan,
            'tanggal_pengeluaran' => $tanggal_pengeluaran
        );

        $where = array(
            'id_pengeluaran' => $id_pengeluaran
        );

        $this->pengeluaran_model->update_pengeluaran($where, $data);
        $this->session->set_flashdata('message', 'Data berhasil diubah');
        redirect('pengeluaran');
    }
}
