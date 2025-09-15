<?php

class Detail_bulan_pembayaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('detail_bulan_pembayaran_model');
		$this->load->model('dashboard_model');
		$this->load->model('uang_kas_model');
		if(!$this->detail_bulan_pembayaran_model->current_user()){
			redirect('login');
		}
	}
    public function bulan_pembayaran($id_bulan_pembayaran)
	{
        // $id_bulan_pembayaran = 2;
        // $where = array ('id_bulan_pembayaran' => $id_bulan_pembayaran);

        $data['detail_bulan_pembayaran']=$this->detail_bulan_pembayaran_model->detail_bulan_pembayaran($id_bulan_pembayaran);
        $data['siswa'] = $this->detail_bulan_pembayaran_model->siswa();
        $data['siswa_baru'] = $this->detail_bulan_pembayaran_model->siswa_baru();
        $data['uang_kas'] = $this->detail_bulan_pembayaran_model->uang_kas($id_bulan_pembayaran);

		$data['current_user'] = $this->detail_bulan_pembayaran_model->current_user();
        $data['jumlah_pengeluaran']=$this->dashboard_model->jumlah_pengeluaran();
		$data['jumlah_pemasukan']=$this->dashboard_model->jumlah_pemasukan();
		$data['jumlah_uang_kas']=$this->dashboard_model->jumlah_uang_kas();
        
		$this->load->view('_partials/head.php', $data);
		$this->load->view('_partials/side_nav.php');
		$this->load->view('detail_bulan_pembayaran.php');
		$this->load->view('_partials/footer.php');
	}
	public function editPembayaranUangKas(){
		$id_bulan_pembayaran =$this->input->post('id_bulan_pembayaran');
		$id_uang_kas =$this->input->post('id_uang_kas');
		$id_user = $_SESSION['id_user'];
		if ($this->input->post('minggu') == 1) {
			$uang_sebelum = $this->input->post('uang_sebelum');
			$minggu_ke_1 = $this->input->post('minggu_ke_1');
			// $query=$this->db->query("UPDATE uang_kas SET minggu_ke_1 = '$minggu_ke_1' WHERE id_uang_kas = '$id_bulan_pembayaran'");
			$this->detail_bulan_pembayaran_model->minggu1($minggu_ke_1, $id_uang_kas);
			$this->detail_bulan_pembayaran_model->riwayat($id_user, $id_uang_kas, "telah mengubah pembayaran minggu ke-1 dari Rp. " . number_format($uang_sebelum) . " menjadi Rp. " . number_format($minggu_ke_1));
			// return $this->db->affected_rows();
		} elseif ($this->input->post('minggu') == 2) {
			$uang_sebelum = $this->input->post('uang_sebelum');
			$minggu_ke_2 = $this->input->post('minggu_ke_2');
			$this->detail_bulan_pembayaran_model->minggu2($minggu_ke_2, $id_uang_kas);
			$this->detail_bulan_pembayaran_model->riwayat($id_user, $id_uang_kas, "telah mengubah pembayaran minggu ke-2 dari Rp. " . number_format($uang_sebelum) . " menjadi Rp. " . number_format($minggu_ke_2));
		} elseif ($this->input->post('minggu') == 3) {
			$uang_sebelum = $this->input->post('uang_sebelum');
			$minggu_ke_3 = $this->input->post('minggu_ke_3');
			$this->detail_bulan_pembayaran_model->minggu3($minggu_ke_3, $id_uang_kas);
			$this->detail_bulan_pembayaran_model->riwayat($id_user, $id_uang_kas, "telah mengubah pembayaran minggu ke-3 dari Rp. " . number_format($uang_sebelum) . " menjadi Rp. " . number_format($minggu_ke_3));
		} elseif ($this->input->post('minggu') == 4) {
			$uang_sebelum = $this->input->post('uang_sebelum');
			$minggu_ke_4 = $this->input->post('minggu_ke_4');
			echo var_dump($this->input->post());
			$this->detail_bulan_pembayaran_model->minggu4($minggu_ke_4, $id_uang_kas);
			$this->detail_bulan_pembayaran_model->riwayat($id_user, $id_uang_kas, "telah mengubah pembayaran minggu ke-4 dari Rp. " . number_format($uang_sebelum) . " menjadi Rp. " . number_format($minggu_ke_4));
		}
		redirect('detail_bulan_pembayaran/bulan_pembayaran/'.$id_bulan_pembayaran);
	}
	
}