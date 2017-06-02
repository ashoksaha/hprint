<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Review extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
		function index()
		{
            redirect('Order_Review/order_rev');
		}
	public function order_rev(){
		$testlogin = session_id();
			$data = array(
				'ses' =>$testlogin
			);
		$this->Register_User->order_table($data);
		$res = $this->Register_User->user_order_review();
		if($res){
			$data['result'] = $res;
			redirect("Order_Review/pay");
	
	}	

		}
		public function pay()
		{
			$res = $this->Register_User->user_order_review();
			if($res){
			$data['result'] = $res;
		}
			$this->load->view('Order_Review_View.php', $data);
		}
}
?>