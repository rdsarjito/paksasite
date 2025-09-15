<?php

class Setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
		if (!$this->setting_model->current_user()) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['current_user'] = $this->setting_model->current_user();
		$data['jumlah_pengeluaran']=$this->setting_model->jumlah_pengeluaran();
		$data['jumlah_uang_kas']=$this->setting_model->jumlah_uang_kas();

		$this->load->view('_partials/head.php', $data);
		$this->load->view('_partials/side_nav.php');
		$this->load->view('settings/setting.php');		
		$this->load->view('_partials/footer.php');
	}

	public function edit_profile()
	{
		$data['current_user'] = $this->setting_model->current_user();
		$data['jumlah_pengeluaran']=$this->setting_model->jumlah_pengeluaran();
		$data['jumlah_uang_kas']=$this->setting_model->jumlah_uang_kas();
		
		$this->load->library('form_validation');
		$this->load->model('profile_model');
		$data['current_user'] = $this->setting_model->current_user();

		if ($this->input->method() === 'post') {
			$rules = $this->profile_model->profile_rules();
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() === FALSE){
				return $this->load->view('settings/setting_edit_profile_form.php', $data );
			}

			$new_data = [
				'id_user' => $data['current_user']->id_user,
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
			];

			if($this->profile_model->update($new_data)){
				$this->session->set_flashdata('message', 'Profile berhasil diubah');
				redirect(site_url('setting'));
			}
		}
		
		$this->load->view('_partials/head.php', $data);
		$this->load->view('settings/setting_edit_profile_form.php', $data);
		$this->load->view('_partials/side_nav.php');
		$this->load->view('_partials/footer.php');
	}

	public function edit_password()
	{
		$this->load->library('form_validation');
		$this->load->model('profile_model');
		$data['current_user'] = $this->setting_model->current_user();
		$data['jumlah_pengeluaran']=$this->setting_model->jumlah_pengeluaran();
		$data['jumlah_uang_kas']=$this->setting_model->jumlah_uang_kas();

		if ($this->input->method() === 'post') {
			$rules = $this->profile_model->password_rules();
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() === FALSE){
				$salah['1']=$this->load->view('_partials/head.php');
				$salah['2']=$this->load->view('settings/setting_edit_password_form.php', $data);
				$salah['3']=$this->load->view('_partials/side_nav.php');
				$salah['4']=$this->load->view('_partials/footer.php');
				$salah['5']=$this->session->set_flashdata('pass_beda', 'Password baru tidak sesuai dengan konfirmasi password!');
				return $salah;
				// return $this->load->view('settings/setting_edit_password_form.php', $data);
			}

			$new_password_data = [
				'id_user' => $data['current_user']->id_user,
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'password_updated_at' => date("Y-m-d H:i:s"),
			];

			if($this->profile_model->update($new_password_data)){
				$this->session->set_flashdata('message', 'Password berhasil diubah');
				redirect(site_url('setting'));
			}
		}
		
		$this->load->view('_partials/head.php', $data);
		$this->load->view('settings/setting_edit_password_form.php', $data);
		$this->load->view('_partials/side_nav.php');
		$this->load->view('_partials/footer.php');
	}

	public function upload_avatar()
	{

		$data['current_user'] = $this->setting_model->current_user();
		$data['jumlah_pengeluaran']=$this->setting_model->jumlah_pengeluaran();
		$data['jumlah_uang_kas']=$this->setting_model->jumlah_uang_kas();

		$this->load->model('profile_model');

		if ($this->input->method() === 'post') {
			$file_name = $data['current_user']->id_user;
			$config['upload_path']          = FCPATH.'/upload/avatar/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['file_name']            = $file_name;
			$config['overwrite']            = true;
			$config['max_size']             = 4096; // 4MB
			$config['max_width']            = 4096;
			$config['max_height']           = 2160;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('avatar')) {
				$data['error'] = $this->upload->display_errors();
			} else {
				$uploaded_data = $this->upload->data();

				$new_data = [
					'id_user' => $data['current_user']->id_user,
					'avatar' => $uploaded_data['file_name'],
				];
		
				if ($this->profile_model->update($new_data)) {
					$this->session->set_flashdata('message', 'Avatar berhasil diubah!');
					redirect(site_url('setting'));
				}
			}
		}



		$this->load->view('_partials/head.php', $data);
		$this->load->view('settings/setting_upload_avatar.php');
		$this->load->view('_partials/side_nav.php');
		$this->load->view('_partials/footer.php');
	}

	public function remove_avatar()
	{
		$current_user = $this->setting_model->current_user();
		$this->load->model('profile_model');
			
		// hapus file
		unlink(FCPATH."/upload/avatar/".$current_user->avatar);

		// set avatar menjadi null
		$new_data = [
			'id_user' => $current_user->id_user,
			'avatar' => null,
		];

		if ($this->profile_model->update($new_data)) {
			$this->session->set_flashdata('message', 'Avatar dihapus!');
			redirect(site_url('setting'));
		}
	}

}