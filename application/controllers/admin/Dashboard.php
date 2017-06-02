<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
         if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $arr['page']='dash';
        $this->load->view('admin/vwDashboard',$arr);
    }

    
    

}
