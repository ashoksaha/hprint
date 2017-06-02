<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Sales extends Admin_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->database();    
        $this->load->model('Person_Model','print_transaction_details');
        $this->load->library('form_validation');
		$this->session->unset_userdata('is_admin_login');
		if (!$this->session->userdata("user_type") == "S") {
            redirect('admin/home');
        }
    }
	public function index() {
		$this->load->model('Person_Model');
		//$res = $this->Admin_Sales_Model->permission();
		//print_r($res);
		//exit();
		//if($res){
		//	$data['result'] = $res;
		//	$this->load->view('admin/VwSales.php', $data);
		///}
		$this->load->helper('url');
		$this->load->view('admin/VwSales');
		
    }
		public function ajax_list()
	{
		$list = $this->transaction_details->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $transaction_details) {
			$no++;
			$row = array();
			//$row[] = $transaction_details->trans-id;
			//$row[] = $transaction_details->key_value;
			//$row[] = $transaction_details->hash;
			$row[] = $transaction_details->amount;
			$row[] = $transaction_details->no_of_page;
			$row[] = $transaction_details->no_of_copies;
			$row[] = $transaction_details->firstname;
			$row[] = $transaction_details->mobile;
			$row[] = $transaction_details->email;
			$row[] = $transaction_details->productinfo;
			//$row[] = $transaction_details->file_name;
			//$row[] = $transaction_details->file_name;
			$row[] = $transaction_details->order_status;
			$filename = $transaction_details->file_name;
			
			//$row[] = $transaction_details->no_of_copies;    .base_url(). '<a href=".base_url().">'.$row['num_fattura'].'</a>'
			$row[] = '<a href="'.base_url().'uploads/'.$filename.'" download><button>Download</button></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->transaction_details->count_all(),
						"recordsFiltered" => $this->transaction_details->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}	
}