<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order_Payment extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$testlogin = session_id();
		//if (!$this->session->userdata('is_user_active')) {
           redirect('Order_Payment/response');
		//}
	}
	
	public function response()
	{
		$status=$this->input->post('status');
		$firstname=$this->input->post('firstname');
		$amount=$this->input->post('amount'); //Please use the amount value from database
		$txnid=$this->input->post('txnid');
		$posted_hash=$this->input->post('hash');
		$key=$this->input->post('key');
		$productinfo=$this->input->post('productinfo');
		$email=$this->input->post('email');
		$salt="eCwWELxi"; //Please change the value with the live salt for production environment
		$session_data = $this->session->userdata('noofpage');
		$session_dataf = $this->session->userdata('file_name');
		$session_datac = $this->session->userdata('copies');
		//print_r($session_data);
		//exit();
		$data = array(
			'key_value'=>$this->input->post('key'),
			'hash'=>$this->input->post('hash'),
			't_xnid'=>$this->input->post('txnid'),
			'amount'=>$this->input->post('amount'),
			'firstname'=>$this->input->post('firstname'),
			'email'=>$this->input->post('email'),
			'productinfo'=>$this->input->post('productinfo'),
			'order_status'=>$this->input->post('status'),
			'mobile'=>$this->input->post('phone'),
			'no_of_page'=>$session_data,
			'no_of_copies'=>$session_datac,
			'file_name'=>$session_dataf
			);
		//print_r($data);
		//exit();	
		$this->Register_User->payment_details_insert($data);

		if(isset($_POST["additionalCharges"])) {
       		$additionalCharges=$_POST["additionalCharges"];
        	$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }else{	  

        	$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         	}
		 	$hash = hash("sha512", $retHashSeq);
		 
       		if ($hash != $posted_hash) {
	       	echo "Transaction has been tampered. Please try again";
		   	}else {
           	   
          		//echo "<h3>Thank You, " . $firstname .".Your order status is ". $status .".</h3>";
          		//echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
		   		//redirect('Order_Payment/your_order');
		   		//print_r($data);
		   		$this->session->set_userdata('user_data',$data);
		   		$deliveryData   = $this->session->userdata('user_data'); 
		   		//print_r($deliveryData);
		   		//exit();
		   		redirect('Order_Payment/your_order');

		   		//exit();
		   		//$data['result'] = $data;
		   		///$this->load->view('Payment_Success',$data);
          }
}
public function your_order()
{
	//print_r($data);
	$this->load->view('Payment_Success');

}
}