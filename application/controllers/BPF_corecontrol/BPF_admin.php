<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Arief Grando
 * Description: BPF Admin controller class
 */
class BPF_admin extends MY_Controller{
    
    function __construct(){
        parent::__construct();
    }

    public function index(){
		if($this->session->userdata('admin')!="YES"){	
			redirect('Error/validateAdmin');
		}else{
			
		}
    }

	public function getdetil_unit(){
		$this->index();
		$this->load->model('BPF_coremodel/BPF_adminmodel');
		$result=$this->BPF_adminmodel->get_list_unit_bygroup($this->uri->segment(5));
		if(count($result["listunitByGroup"])<2){
			$this->checkunit($result["listunitByGroup"][0]->idunit);
		}else{
			$this->template->load('master_aplikasi','BPF_core/unit_interface', $result);
		}
	}

	public function checkunit($unit=null){
		$this->index();
		$this->load->model('BPF_coremodel/BPF_adminmodel');
		//$result=$this->BPF_adminmodel->get_unit_report_detail($this->uri->segment(5));
		//print_r($unit);
		if($unit=='idunit'){
			$this->template->load('master_aplikasi','BPF_core/unit_dashboard_forAdmin');
		}else{
			//$this->template->load('master_aplikasi','BPF_core/unit_dashboard_forAdmin',$idunit);
			echo "<script>window.location='".base_url()."BPF_corecontrol/BPF_admin/checkunit/idunit/".$unit."'</script>";
		}
	}	

	public function generateXLS(){
		$this->index();
		$this->load->model('BPF_coremodel/BPF_adminmodel');
		$result = $this->BPF_adminmodel->getAllActivity($this->input->post('idunit'));
		print_r($result);
	}	

	public function listuser(){
		$this->index();
		$this->load->model('BPF_coremodel/BPF_adminmodel');
		$result = $this->BPF_adminmodel->getAllUser();
		$this->template->load('master_aplikasi','BPF_core/listadmin',$result);
	}	

	public function formedituser(){
		$this->index();
		$this->load->model('BPF_coremodel/BPF_adminmodel');
		$result = $this->BPF_adminmodel->getParticularUser($this->uri->segment(5));
		$this->template->load('master_aplikasi','BPF_core/formupdateuser',$result);
	}	

	public function execupdateuser(){
		$this->index();
		$this->load->model('BPF_coremodel/BPF_adminmodel');
		$result = $this->BPF_adminmodel->q_update_user();
		echo $result;
	}	

	public function listevents(){
		$this->index();
		$this->load->model('BPF_coremodel/BPF_adminmodel');
		$result = $this->BPF_adminmodel->getallEvents();
		echo $result;
	}

	public function addevents(){
		$this->index();
		$this->load->model('BPF_coremodel/BPF_adminmodel');
		$result = $this->BPF_adminmodel->savenewEvents();
		echo $result;
	}

}
?>