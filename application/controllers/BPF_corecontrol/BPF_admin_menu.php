<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Arief Grando
 * Description: BPF Admin controller class
 */
class BPF_admin_menu extends MY_Controller{
    
    function __construct(){
        parent::__construct();
    }

    public function index(){
		if($this->session->userdata('admin')!="YES"){	
			redirect('Error/validateAdmin');
		}else{
			
		}
    }

	public function infoSubMenu(){
		$this->index();
		$this->template->load('master_aplikasi','BPF_core/subInformasi');
	}

	public function showFormInfo(){
		$this->index();
		$this->template->load('master_aplikasi','BPF_core/formInfo');
	}

	public function listInfo(){
		$this->index();
		$this->load->model('BPF_coremodel/BPF_adminmodel');
		$data = $this->BPF_adminmodel->getAllWallInfo();
		print_r(json_encode($data));
		//$this->template->load('master_aplikasi','BPF_core/daftarInformasi', $data);
	}

}
?>