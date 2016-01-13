<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class BPF_basicdata extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function get_infoadmin(){
		$query=$this->db->query("SELECT	* FROM info_admin");
		$data["infoadmin"] = $query->result();
		
		return ($data);
	}
		
	public function get_processframework(){
		$query=$this->db->query("SELECT	* FROM process_framework");
		$query2=$this->db->query("SELECT * FROM kelompok_unit");
		$data["framework"] = $query->result();
		$data2["kelompokunit"] = $query2->result();

		$basicdata = array_merge($data, $data2);
			
			return ($basicdata);
	}
	
    
}
?>