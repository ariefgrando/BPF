<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Arief Grando
 * Description: BPF Worksheet controller class
 */
class BPF_reporting extends MY_Controller{
    
    function __construct(){
        parent::__construct();
    }

	public function getmasterreport(){
		$this->load->model('BPF_coremodel/BPF_adminmodel');
		$result = $this->BPF_adminmodel->getAllActivity($this->session->userdata('id'));
		print_r($result);
	}

        
}
?>