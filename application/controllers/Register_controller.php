<?php
class Register_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_model');
        $this->load->library('form_validation');
    }

    public function register()
    {
        $this->form_validation->set_rules($this->register_model->rules());

        // Menambahkan validasi khusus untuk username
        $this->form_validation->set_rules('username', 'Username', 'callback_username_check');

        if ($this->form_validation->run() === FALSE) {
            $data['recaptcha_site_key'] = getenv('RECAPTCHA_SITE_KEY') ?: '';
            $this->load->view('register_views', $data);
        } else {
            $fullname = $this->input->post('fullname');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->register_model->register($fullname, $username, $email, $password)) {
                redirect('login');
            } else {
                $this->session->set_flashdata('message_register_error', 'Registration failed.');
                $data['recaptcha_site_key'] = getenv('RECAPTCHA_SITE_KEY') ?: '';
                $this->load->view('register_views', $data);
            }
        }
    }

    // Callback function untuk memeriksa ketersediaan username
    public function username_check($str)
    {
        if (!$this->register_model->is_username_available($str)) {
            $this->form_validation->set_message('username_check', 'Username sudah digunakan');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
