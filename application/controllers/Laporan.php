<?php

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('laporan_model');
		$this->load->model('dashboard_model');
		if(!$this->laporan_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data['current_user'] = $this->laporan_model->current_user();
        $data['jumlah_pengeluaran']=$this->dashboard_model->jumlah_pengeluaran();
		$data['jumlah_pemasukan']=$this->dashboard_model->jumlah_pemasukan();
        $data['jumlah_uang_kas']=$this->dashboard_model->jumlah_uang_kas();
        $data['bulan_pembayaran']=$this->laporan_model->bulan_pembayaran();
        $data['sql']=$this->laporan_model->laporan();
        $data['jml_uang_kas']=$this->laporan_model->jml_uang_kas();
        
		$this->load->view('_partials/head.php', $data);
		$this->load->view('_partials/side_nav.php');
		$this->load->view('laporan.php');
		$this->load->view('_partials/footer.php');
	}
	
}