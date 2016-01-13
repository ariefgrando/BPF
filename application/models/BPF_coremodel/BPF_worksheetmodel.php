<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Arief Grando
 * Description: BPF Worksheet model class
 */
class BPF_worksheetmodel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function get_category($idframe){
		$query=$this->db->query("SELECT	p.process_name, c.id, c.APQC_id, c.process_category FROM category c, process_framework p where c.framework_id = p.id and  c.framework_id = '".$idframe."'");
		$data["kategori"] = $query->result();

		return ($data);
	}

	public function get_detil_activity($iditem){
		$check = substr_count($iditem, ".");
		if($check==1){
			$query = $this->db->query("Select id, process_group as namaitem from process_group where id = '".$iditem."'");
		}elseif($check==2){
			$query = $this->db->query("Select id, Process as namaitem from process where id = '".$iditem."'");
		}elseif($check==3){
			$query = $this->db->query("Select id, activity as namaitem from activity where id = '".$iditem."'");
		}elseif($check==0){
			$query = $this->db->query("Select id, process_category as namaitem from category where id = '".$iditem."'");
		}

		$jabatan = $this->get_jabataninunit();
		
		$data["itemisian"] = $query->result();
		$result = array_merge($data, $jabatan);
		return ($result);
		
	}

    public function get_subcategory($idsubframe){
		$query=$this->db->query("SELECT p.process_category, c.id, c.APQC_id, c.process_group FROM process_group c, category p where c.master_id = p.id and p.id = '".$idsubframe."'");
		$data["subkategori"] = $query->result();

		return ($data);
	}

    public function get_subsubcategory($idsubsubframe){
		$query=$this->db->query("SELECT p.id, p.master_id as idMaster, p.sub_master_id, p.APQC_id, p.Process, g.id as process_group_id, g.master_id, g.process_group FROM process p, process_group g where g.id = p.sub_master_id and p.sub_master_id = '".$idsubsubframe."' order by p.id asc");
		$data["subsubkategori"] = $query->result();

		return ($data);
	}

    public function get_activity($idactivity){
		$query=$this->db->query("SELECT a.id as activity_id, a.master_id as idMaster, a.sub_master_id as submasteractivity, a.sub_sub_master_id as idprocess, a.APQC_id, a.activity, p.id as processid, p.master_id as masteridprocess, p.sub_master_id as submasterprocess, p.Process FROM activity a, process p where p.id = a.sub_sub_master_id and p.id = '".$idactivity."'");
		$data["activity"] = $query->result();

		return ($data);
	}

    public function get_kelompokproses($idkategori){
		$query=$this->db->query("SELECT	* FROM process_group where master_id = '".$idkategori."'");
		$data["kelompokproses"] = $query->result();

		return ($data);
	}

    public function get_proses($idsubmaster){
		$query=$this->db->query("SELECT	* FROM process where sub_master_id = '".$idsubmaster."'");
		$data["proses"] = $query->result();

		return ($data);
	}

	public function get_jabataninunit($custom=null){
		if($custom!=null){
			$querygetjabatan=$this->db->query("SELECT * FROM jabatan where unitjab = '".$this->session->userdata('id')."' ".$custom);
		}else{
			$querygetjabatan=$this->db->query("SELECT * FROM jabatan where unitjab = '".$this->session->userdata('id')."'");
		}
		$datajab["daftarjabatan"] = $querygetjabatan->result();

		return($datajab);
	}

	public function get_pointfix(){
		$querygetpointfix=$this->db->query("SELECT * FROM worksheet");
		$datapointfix["daftarpointfix"] = $querygetpointfix->result();

		return($datapointfix);
	}

		
	public function do_submitunitworksheet(){

		$idactivity		= $this->input->POST('idactivity');
		$input			= $this->input->POST('input'.$this->input->POST('keyidactivity'));
		$output			= $this->input->POST('output'.$this->input->POST('keyidactivity'));
		$stk			= $this->input->POST('stk'.$this->input->POST('keyidactivity'));
		$aplikasi		= $this->input->POST('aplikasi'.$this->input->POST('keyidactivity'));
		$responsible	= $this->input->POST('responsible');
		$approval		= $this->input->POST('approval');
		$support		= $this->input->POST('support');
		$consult		= $this->input->POST('consult');
		$informed		= $this->input->POST('informed');


		
		$data = array(
		   'id_activity' => $idactivity ,
		   'input' => $input,
		   'output' => $output,
		   'stk' => $stk,
		   'aplikasi' => $aplikasi,
		   'responsible' => $responsible,
		   'approval' => $approval,
		   'support' => $support,
		   'consult' => $consult,
		   'informed' => $informed,
		   'unit' => $this->session->userdata('id'),
		   'log' =>  date("F j, Y, g:i a")
		);

		if($this->db->insert('worksheet', $data)){
			return true;	
		}else{
			return false;
		}


	}



	
    
}
?>