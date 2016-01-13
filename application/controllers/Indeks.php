<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indeks extends CI_Controller {
	public function index()
	{
		if($this->session->userdata("namaunit")!="") {
            redirect('BPF_corecontrol/BPF_welcome');
        }else{
			//$this->load->model('BPF_models_process');
			//$hasil=$this->BPF_models_process->get_processframework();
			//$this->template->load('default_asli','BPF_core/index_asli', $hasil);
			$this->template->load('master_login');
			//$this->load->view("BPF_home/login");
		}
	}
}

/* End of file Indeks.php */
/* Location: ./application/controllers/Indeks.php */