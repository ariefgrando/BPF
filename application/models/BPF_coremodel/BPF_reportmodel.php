<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Arief Grando
 * Description: BPF_reportmodel model class
 */
class BPF_reportmodel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function reportgeneral(){
		$query1=$this->db->query("SELECT * from category");
		$data1["kategori"] = $query1->result();
		$index=0;
		$index2=0;
		$index3=0;

		foreach($data1["kategori"] as $value1){

			$query2=$this->db->query("SELECT * from process_group where master_id = '".$value1->id."'");
			$data2[$index]["p_group"] = $query2->result();
			$index++;

			/*foreach($data2 as $value2){
				$query3=$this->db->query("SELECT * from process where sub_master_id = '".$value2->id."'");
				$data3[$index][$index2]["process"] = $query3->result();
				$index2++;

				foreach($data3[$index][$index2]["process"] as $value3){
					$query4=$this->db->query("SELECT * from activity where sub_sub_master_id = '".$value3->id."'");
					$data4[$index][$index2][$index3]["activity"] = $query4->result();
					$index3++;
				}
			}
			*/
			
			
			
		}

		array_push($data2);

		return ($data1);
	}

		
    
}
?>