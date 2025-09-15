<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Tidak memerlukan model dalam constructor
	}

    public function index()
	{
        // Jika tidak memerlukan data dari model, tidak perlu menyertakan model
		$this->load->view('LandingPage.php');
	}
}
?>
