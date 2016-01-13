<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class BPF_adminmodel extends CI_Model{
    function __construct(){
        parent::__construct();
    }

	public function get_log(){
		$query=$this->db->query("SELECT *
								FROM log
								ORDER BY id DESC
								LIMIT 10 ");
		$data["log"] = $query->result();
			
			return ($data);
	}

	public function get_list_unit_bygroup($idgroup){
		$query=$this->db->query("SELECT m.idunit, m.namaunit, m.kelompok, d.groupname
								FROM master_unit m, kelompok_unit d
								WHERE m.kelompok = ? AND d.id = m.kelompok", array($idgroup));
		$data["listunitByGroup"] = $query->result();
			
			return ($data);
	}

	public function getAllUser(){
		$query=$this->db->query("select	m.idunit, u.username, m.namaunit from user u, master_unit m where u.unit = m.idunit and u.id <> 0");
		$data["listuser"] = $query->result();
		return ($data);
	}

	public function getParticularUser($idUnit){
		$query=$this->db->query("select	m.idunit, u.username, m.namaunit from user u, master_unit m where u.unit = m.idunit and u.id  = ?", array($idUnit));
		$data["unittobeedited"] = $query->result();
		return ($data);
	}

	public function q_update_user(){

		
		$idunit = $this->input->post('idunittobeedited');
		$username = $this->input->post('user');
		//$oPass = $this->input->post('oldpassword');
		$nPass = $this->input->post('newpassword');
		//$cPass = $this->input->post('confirmpassword');
		$err="";
		if($username==""){
			$err.="Please enter your username";
		}
		if($nPass==""){
			$err.="Please enter your new password";
		}


		$data = array(
			'username'=>$username,
			'password'=>md5($nPass)
		);

		$this->db->where('id', $idunit);
		$this->db->update('user',$data);

		if ($this->db->affected_rows() > 0){
			echo "true";
		}
		

	}

	public function getAllActivity($id){
		$query=$this->db->query("SELECT  c.*, i.input, i.output, i.pi, i.stk, i.aplikasi, i.responsible, i.approval, i.support, i.consult, i.informed, i.status, i.unit FROM  category c left JOIN	worksheet i	ON	c.id = i.id_activity AND i.unit = ?", array($id));
		$category = $query->result();
		for($i=0; $i<count($category); $i++){
			$query2=$this->db->query("SELECT  c.*, i.input, i.output, i.pi, i.stk, i.aplikasi, i.responsible, i.approval, i.support, i.consult, i.informed, i.status, i.unit FROM  process_group c left JOIN	worksheet i	ON	c.id = i.id_activity AND i.unit = ? WHERE c.master_id = ? ", array($id, $category[$i]->id));
			$category[$i]->process_group = $query2->result();

			for($j=0; $j<count($category[$i]->process_group); $j++){
				$query3=$this->db->query("SELECT  c.*, i.input, i.output, i.pi, i.stk, i.aplikasi, i.responsible, i.approval, i.support, i.consult, i.informed, i.status, i.unit FROM  process c left JOIN	worksheet i	ON	c.id = i.id_activity AND i.unit = ? WHERE c.sub_master_id = ? ", array($id, $category[$i]->process_group[$j]->id));	
				$category[$i]->process_group[$j]->process = $query3->result();

				for($k=0; $k<count($category[$i]->process_group[$j]->process); $k++){
					$query4=$this->db->query("SELECT  c.*, i.input, i.output, i.pi, i.stk, i.aplikasi, i.responsible, i.approval, i.support, i.consult, i.informed, i.status, i.unit FROM  activity c left JOIN	worksheet i	ON	c.id = i.id_activity AND i.unit = ? WHERE c.sub_sub_master_id = ? ", array($id, $category[$i]->process_group[$j]->process[$k]->id));
					$category[$i]->process_group[$j]->process[$k]->activity = $query4->result();
				}
			}
		}
		//$result = array_merge($data["category"],$data["process_group"]);
		//$final["list"]=$category;
		return json_encode($category);
	}
	
    public function getallEvents(){
		$query=$this->db->query("SELECT * FROM events ORDER BY id");
		$events = $query->result();
		return json_encode($events);
	}

	public function savenewEvents(){
		$title = $this->input->POST('title');
		$start = $this->input->POST('start');
		$end = $this->input->POST('end');
		$url = $this->input->POST('url');

		$data = array(
		   'title' => $title ,
		   'start' => $start,
		   'end' => $end,
		   'url' => $url
		);

		if($this->db->insert('events', $data)){
			return true;	
		}else{
			return false;
		}

	}

	public function getAllWallInfo(){
		$query=$this->db->query("select	* from info_admin");
		$data= $query->result();
		return ($data);
	}

}
?>