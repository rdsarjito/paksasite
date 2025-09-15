<?php

class Riwayat_pengeluaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('riwayat_pengeluaran_model');
		$this->load->model('dashboard_model');
		$this->load->model('uang_kas_model');
		if(!$this->riwayat_pengeluaran_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{   
		$data['current_user'] = $this->riwayat_pengeluaran_model->current_user();
		$data['riwayat_pengeluaran']=$this->riwayat_pengeluaran_model->riwayat_pengeluaran();
		$data['jumlah_pengeluaran']=$this->dashboard_model->jumlah_pengeluaran();
		$data['jumlah_pemasukan']=$this->dashboard_model->jumlah_pemasukan();
		$data['jumlah_uang_kas']=$this->dashboard_model->jumlah_uang_kas();

		$this->load->view('_partials/head.php', $data);
		$this->load->view('_partials/side_nav.php');
		$this->load->view('riwayat_pengeluaran.php');
		$this->load->view('_partials/footer.php');
	}
	
}