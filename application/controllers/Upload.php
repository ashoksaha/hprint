<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	function index()
	{	
		
		$this->load->view('Upload_Form', array('error' => ' ' ));
		$this->session->sess_destroy();

	}
	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '10000';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('Upload_Form', $error);
		}
		else
		{
			//$data = $this->session->userdata('session_id');
			$data = array('upload_data' => $this->upload->data());
			$this->Register_User->file_insert($this->upload->data());
			$this->load->view('Upload_Success', $data);

		}
	}
	function final_step()
	{
		$testlogin = session_id();
		$this->session->set_userdata('session_id', $testlogin);
		$priceone = $this->input->post('pages')*.80;
		$price = $this->input->post('copies')*$priceone;
		$data = array(
				'pages' => $this->input->post('pages'),
				'copies' => $this->input->post('copies'),
				'size' => $this->input->post('paper_size'),
				'sides' => $this->input->post('print_type'),
				'color' => $this->input->post('colour_type'),
				'paper' => $this->input->post('paper_type'),
				'binding' => $this->input->post('binding_type'),
				'comment' => $this->input->post('remarks'),
				'price'=>$price,
				'session_id' =>$testlogin
				);
			$this->Register_User->final_step($data);
			//print_r($price);
			//exit();
			redirect('Order_Review/order_rev');
	}
}
?>
