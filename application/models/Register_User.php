<?php
class Register_User extends CI_Model {
        public function __construct()
        {
                parent::__construct();
				$this->load->database();
				//$this->load->library('PasswordHash');
        }
		function file_insert($data){
			$testlogin = session_id();
			$pdftext = file_get_contents($data['full_path']);
  			$num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
  			$this->session->set_userdata('noofpage',$num);
			$data = array(
				'file_name' => $data['file_name'],
				'file_path' => $data['full_path'],
				'session_id'=>$testlogin,
				'counted_page' =>$num
			);
			$this->session->set_userdata('file_name',$data['file_name']);
			$this->db->insert('print_file_data', $data);
			$this->session->set_userdata('reg_sec_id',$this->db->insert_id());
		}
		function final_step($data)
		{
			$this->session->set_userdata('copies',$data['copies']);
			$query = $this->db->insert('print_file_data_value', $data);
			$this->session->set_userdata('reg_third_id',$this->db->insert_id());
		}
		function order_table($data)
		{
			$ses = $data['ses'];
			$alldata = $this->session->all_userdata();
			//Inser data in table order
			$insertWork = array(
                'id_file_data' => $alldata['reg_sec_id'],
                'id_file_data_value' =>$alldata['reg_third_id'],
				'session_id' =>$ses
                );
			$this->db->insert('print_table_order',$insertWork);
			//calling function to fetch data on the basic of registration id
			$this->user_order_review();
		}
		public function user_order_review()
		{
			$alldata = $this->session->all_userdata();
			//$testlogin = session_id();
			//print_r($alldata);
			//exit();
			$val = $this->session->userdata('session_id');
			//print_r($val);
			
			//$val = $alldata['reg_sec_id'];
			$query=$this->db->query("SELECT * FROM print_file_data AS r JOIN print_file_data_value AS fd ON r.session_id = fd.session_id WHERE r.session_id = '$val'");
			$res   = $query->result();
			return $res;
		}
		
		public function payment_details_insert($data)
		{
			$query = $this->db->insert('print_transaction_details', $data);
			$this->session->unset_userdata('session_id');
			$this->session->unset_userdata('noofpage');

		}
}

?>