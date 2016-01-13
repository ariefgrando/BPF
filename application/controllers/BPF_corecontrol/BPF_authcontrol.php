<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */
class BPF_authcontrol extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
        
    public function login(){
        // Load the model
        $this->load->model('BPF_coremodel/BPF_authmodel');
        // Validate the user can login
        $result = $this->BPF_authmodel->validate();
        // Now we verify the result
        if($result==false){
            // If user did not validate, then show them login page again
            $data["msg"] = "<font color=red>Username / Password Salah</font><br />";
            $this->load->view("BPF_templates/master_login",$data);
			//$this->template->load('master_login',$data);
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('BPF_corecontrol/BPF_welcome');
			//$this->load->view('user/entrance');
        }        
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Indeks');
    }

}
?>