<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class BPF_welcome extends MY_Controller{
    
    function __construct(){
        parent::__construct();
    }
        
    public function index(){
		if($this->session->userdata('admin')=="YES"){		
			$this->load->model('BPF_coremodel/BPF_adminmodel');
			$hasil=$this->BPF_adminmodel->get_log();

			$this->template->load('master_aplikasi','BPF_core/dashboard', $hasil);
		}else{

			$this->load->model('BPF_coremodel/BPF_basicdata');
			$data=$this->BPF_basicdata->get_infoadmin();

			$this->template->load('master_aplikasi','BPF_core/dashboard_unit', $data);
		}
    }
}
?>