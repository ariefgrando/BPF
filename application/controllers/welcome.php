<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		if($this->session->userdata("fname")!="") {
            redirect('user/entrance');
        }else{
			$this->load->model('BPF_models_process');
			$hasil=$this->BPF_models_process->get_processframework();
			//$this->template->load('default_asli','BPF_core/index_asli', $hasil);
			//$this->template->load('master','BPF_home/login', $hasil);
			$this->load->view("BPF_home/login");
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */