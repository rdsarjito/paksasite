<?php

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');
        $this->load->model('dashboard_model');
		if(!$this->siswa_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{   
		$data['current_user'] = $this->siswa_model->current_user();
		$data['siswa']=$this->siswa_model->siswa();

        $data['jumlah_pengeluaran']=$this->dashboard_model->jumlah_pengeluaran();
		$data['jumlah_uang_kas']=$this->dashboard_model->jumlah_uang_kas();

		$this->load->view('_partials/head.php', $data);
		$this->load->view('_partials/side_nav.php');
		$this->load->view('siswa.php');
		$this->load->view('_partials/footer.php');
	}
	
	public function tambah_siswa()
    {
        $id_user = $this->siswa_model->current_user()->id_user;
        $nama_siswa = $this->input->post('nama_siswa');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');

        $data = array(
            'id_user' => $id_user,
            'nama_siswa' => $nama_siswa,
            'jenis_kelamin' => $jenis_kelamin,
            'no_telepon' => $no_telepon,
            'email' => $email
        );
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
        $this->siswa_model->input_siswa($data, 'siswa');
        redirect('siswa');
    }
    public function hapus_siswa($id_siswa){
        $where = array ('id_siswa' => $id_siswa);
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        $this->siswa_model->delete_siswa($where,'siswa');
        redirect('siswa');
    }

    public function edit_siswa()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nama_siswa = $this->input->post('nama_siswa');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');

        $data = array(
            'nama_siswa' => $nama_siswa,
            'jenis_kelamin' => $jenis_kelamin,
            'no_telepon' => $no_telepon,
            'email' => $email
        );
        $where = array(
            'id_siswa' => $id_siswa
        );
        $this->session->set_flashdata('message', 'Data berhasil diubah');
        $this->siswa_model->update_siswa($where, $data, 'siswa');
        redirect('siswa');
    }


}