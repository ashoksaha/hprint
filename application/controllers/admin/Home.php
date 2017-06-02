<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
         if ($this->session->userdata('is_admin_login')) {
            redirect('admin/dashboard');
        } else {
        $this->load->view('admin/vwLogin');
        }
    }

     public function do_login() {

        if ($this->session->userdata('is_admin_login')) {
            redirect('admin/home/dashboard');
        } else {
            $user = $_POST['username'];
            $password = $_POST['password'];

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/vwLogin');
            }else {
                $data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
			$this->load->model('Admin_Model');
			$this->Admin_Model->login('printproject',$data);
			}
                if ($data) {  
				if($this->session->userdata('user_type') == 'SA'){
                    redirect('admin/dashboard');
				}elseif(($this->session->userdata('user_type') == 'A')){
					echo"Welcome Admin";
				}elseif(($this->session->userdata('user_type') == 'S')){
					redirect('admin/Sales');
				}
                 else {
                    $err['error'] = '<strong>Access Denied</strong> Invalid Username/Password';
                    $this->load->view('admin/vwLogin', $err);
                }
				}
            }
        }
           
    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('is_admin_login');   
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('admin/home', 'refresh');
    }
}
