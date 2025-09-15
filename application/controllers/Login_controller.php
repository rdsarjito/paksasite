<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }   

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        $this->load->library('form_validation');

        $rules = $this->login_model->rules();
        $this->form_validation->set_rules($rules);

        if($this->form_validation->run() == FALSE){
            return $this->load->view('login_views');
        }

        $captcha_response = trim($this->input->post('g-recaptcha-response'));

        if($captcha_response != '')
        {
            $keySecret = '6LdAhOIpAAAAAGYg9rsV8Bep1u0pCZ8yLgoStpbF';

            $check = array(
                'secret'        => $keySecret,
                'response'      => $captcha_response
            );

            $startProcess = curl_init();

            curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($startProcess, CURLOPT_POST, true);
            curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
            curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

            $receiveData = curl_exec($startProcess);
            curl_close($startProcess);
            $finalResponse = json_decode($receiveData, true);

            if($finalResponse['success'])
            {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                if($this->login_model->login($username, $password)){
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message_login_error', 'Login failed, please check your username and password.');
                }
            }
            else
            {
                $this->session->set_flashdata('message_login_error', 'Captcha validation failed, please try again.');
            }
        }
        else
        {
            $this->session->set_flashdata('message_login_error', 'Captcha is required.');
        }

        $this->load->view('login_views');
    }

    public function logout()
    {
        $this->login_model->logout();
        redirect(site_url('login'));
    }
}