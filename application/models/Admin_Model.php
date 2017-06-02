<?php
class Admin_Model extends CI_Model {
	public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
	function login($printprojects, $data)
	{
	$this->db->where("username",$data['username']);
	$this->db->where("password",md5($data['password']));
	$query = $this->db->get("print_tbl_admin_users");
	if($query->num_rows()>0)
	{	$row = $query->row();    $userdata = array(    'user_id'  => $row->id,    'username'  => $row->username,	'user_type'    => $row->user_type, 'is_admin_login' => true,	);
	$this->session->set_userdata($userdata);	
	//print_r($this->session->userdata('user_type'));
	//exit();
	return true;
	}
	return false;
	}	
}
?>