<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class BPF_authmodel extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        


		$query1=$this->db->query("SELECT
								u.id,
								u.username,
								u.lastlog,
								b.namaunit
								FROM `user` u, master_unit b WHERE u.username = '".$username."' and u.password = '".md5($password)."' and u.unit = b.idunit
								");


		$query = $query1->result();
        // Prep the query
        //$this->db->where('username', $username);
        //$this->db->where('password', md5($password));
        
        // Run the query
        //$query = $this->db->get('user');
        // Let's check if there are any results


        if(count($query) == 1)
        {
            // If there is a user, then create session data
            //$row = $query->row();

			foreach($query as $row){

			if($row->id==0){
				$admin="YES";
			}else{
				$admin="NO";
			}

            $data = array(
                    'id' => $row->id,
                    'namaunit' => $row->namaunit,
					'lastlog' => $row->lastlog,
					'admin' => $admin
                    );

		
			}
			/*
			date_default_timezone_set('Asia/Jakarta');
			$datalog = array(
               'lastlogin' => date("F j, Y, g:i a")
            );

			$this->db->where('id', $row->id);
			$this->db->update('user', $datalog); 
			*/
            echo $this->session->set_userdata($data);
            return $data;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>