<?php

class Dashboard_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		if(!$this->dashboard_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$where=$this->input->post('tahun');
		// $where = array (
        //     'tahun' => $tahun
        // );

		$data['current_user'] = $this->dashboard_model->current_user();
		$data['jumlah_user']=$this->dashboard_model->jumlah_user();
		$data['jumlah_siswa']=$this->dashboard_model->jumlah_siswa();
		$data['jumlah_pengeluaran']=$this->dashboard_model->jumlah_pengeluaran();
		$data['jumlah_pemasukan']=$this->dashboard_model->jumlah_pemasukan();
		$data['jumlah_uang_kas']=$this->dashboard_model->jumlah_uang_kas();
		$data['hasil']=$this->dashboard_model->graph_uang_kas($where);
		$data['pengeluaran']=$this->dashboard_model->graph_pengeluaran($where);
		$data['bulan_pembayaran']=$this->dashboard_model->bulan_pembayaran();
		
		$this->load->view('_partials/head.php', $data);
		$this->load->view('dashboard_views.php');
		$this->load->view('_partials/side_nav.php');
		$this->load->view('_partials/footer.php');
	}
	
}