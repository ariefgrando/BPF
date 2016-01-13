<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Arief Grando
 * Description: BPF Worksheet controller class
 */
class BPF_worksheet extends MY_Controller{
    
    function __construct(){
        parent::__construct();
    }

	public function getkelompokproses(){
		$this->load->model('BPF_coremodel/BPF_worksheetmodel');
		$result=$this->BPF_worksheetmodel->get_kelompokproses($this->input->post('idkategori'));
		$result2=$this->BPF_worksheetmodel->get_jabataninunit();
		$result3=$this->BPF_worksheetmodel->get_pointfix();

		$finalresult = array_merge($result, $result2, $result3);
		print_r(json_encode($finalresult));
	}

	public function getproses(){
		$this->load->model('BPF_coremodel/BPF_worksheetmodel');
		$result=$this->BPF_worksheetmodel->get_proses($this->input->post('idsubmaster'));
		//$result2=$this->BPF_worksheetmodel->get_jabataninunit();
		//$result3=$this->BPF_worksheetmodel->get_pointfix();

		//$finalresult = array_merge($result, $result2, $result3);
		print_r(json_encode($result));
	}

	public function getcategory(){
		$this->load->model('BPF_coremodel/BPF_worksheetmodel');
		$this->load->model('BPF_coremodel/BPF_basicdata');

		if($this->session->userdata('admin')=="YES"){
			// Jika Admin
		}else{
			$hasil=$this->BPF_basicdata->get_processframework();
		}

		$result=$this->BPF_worksheetmodel->get_category($this->uri->segment(5));

		$data = array_merge($result, $hasil);
		$this->template->load('master_aplikasi','BPF_core/kertas_kerja_proses', $data);
	}

	public function getsubcategory(){
		$this->load->model('BPF_coremodel/BPF_worksheetmodel');
		$this->load->model('BPF_coremodel/BPF_basicdata');

		if($this->session->userdata('admin')=="YES"){
			// Jika Admin
		}else{
			$hasil=$this->BPF_basicdata->get_processframework();
		}

		$result=$this->BPF_worksheetmodel->get_subcategory($this->uri->segment(5));

		$data = array_merge($result, $hasil);
		$this->template->load('master_aplikasi','BPF_core/kertas_kerja_sub_proses', $data);
	}

	public function getsubsubcategory(){
		$this->load->model('BPF_coremodel/BPF_worksheetmodel');
		$this->load->model('BPF_coremodel/BPF_basicdata');

		if($this->session->userdata('admin')=="YES"){
			// Jika Admin
		}else{
			$hasil=$this->BPF_basicdata->get_processframework();
		}

		$result=$this->BPF_worksheetmodel->get_subsubcategory($this->uri->segment(5));

		$data = array_merge($result, $hasil);
		$this->template->load('master_aplikasi','BPF_core/kertas_kerja_sub_sub_proses', $data);
	}

	public function getactivity(){
		$this->load->model('BPF_coremodel/BPF_worksheetmodel');
		$this->load->model('BPF_coremodel/BPF_basicdata');

		if($this->session->userdata('admin')=="YES"){
			// Jika Admin
		}else{
			$hasil=$this->BPF_basicdata->get_processframework();
		}

		$result=$this->BPF_worksheetmodel->get_activity($this->uri->segment(5));

		$data = array_merge($result, $hasil);
		$this->template->load('master_aplikasi','BPF_core/kertas_kerja_activity', $data);
	}


	public function formworksheet(){
		$this->load->model('BPF_coremodel/BPF_worksheetmodel');
		$this->load->model('BPF_coremodel/BPF_basicdata');

		if($this->session->userdata('admin')=="YES"){
			// Jika Admin
			$hasil=$this->BPF_basicdata->get_processframework();
		}else{
			$hasil=$this->BPF_basicdata->get_processframework();
		}

		$result=$this->BPF_worksheetmodel->get_detil_activity($this->uri->segment(5));

		$data = array_merge($result, $hasil);
		$this->template->load('master_aplikasi','BPF_core/form_worksheet', $data);
	}

	public function submitunitworksheet(){
		$this->load->model('BPF_coremodel/BPF_worksheetmodel');
		$result=$this->BPF_worksheetmodel->do_submitunitworksheet();
		if($result){
			echo "1";
		}else{
			echo "0";
		}
	}

	public function getjabatan(){
		$this->load->model('BPF_coremodel/BPF_worksheetmodel');
		$result2=$this->BPF_worksheetmodel->get_jabataninunit("and id = '".$this->input->POST('idjab')."'");
		print_r(json_encode($result2));
	}


	
}
?>