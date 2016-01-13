<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {
	public function index()
	{
		$this->template->load('master_error');
	}
	
	public function validateAdmin()
	{
		$this->template->load('master_error_admin');
	}
}

/* End of file Indeks.php */
/* Location: ./application/controllers/Indeks.php */