<?php

class Riwayat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('riwayat_model');
		$this->load->model('dashboard_model');
		$this->load->model('uang_kas_model');
		if(!$this->riwayat_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{   
		$data['current_user'] = $this->riwayat_model->current_user();
		$data['riwayat']=$this->riwayat_model->riwayat();
        $data['jumlah_pengeluaran']=$this->dashboard_model->jumlah_pengeluaran();
		$data['jumlah_pemasukan']=$this->dashboard_model->jumlah_pemasukan();
		$data['jumlah_uang_kas']=$this->dashboard_model->jumlah_uang_kas();

		$this->load->view('_partials/head.php', $data);
		$this->load->view('_partials/side_nav.php');
		$this->load->view('riwayat.php');
		$this->load->view('_partials/footer.php');
	}
	
}