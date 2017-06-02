<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_Model extends CI_Model {

	var $table = 'print_transaction_details';
	var $column_order = array('trans-id','key_value','hash','t_xnid','amount','no_of_page','no_of_copies','firstname','mobile','email','productinfo','file_name','order_status',null); //set column field database for datatable orderable
	var $column_search = array('firstname','lastname','address'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			$i++;
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}









/* 
class Admin_Sales_Model extends CI_Model {
	public function __construct()
        {
                parent::__construct();
				$this->load->database();
        }
		public function orded_data(){
		//select all data to provide necessary details in sellar table
		$query=$this->db->query("SELECT * FROM table_order AS ta JOIN file_data AS fd ON ta.id_file_data = fd.f_id JOIN file_data_value as fdv ON ta.id_file_data_value = fdv.fd_id join registration_user AS ru ON ta.user_register_id = ru.id");	
		$res   = $query->result(); 
		return $res;
		}
		function permission() {
    			$query = $this->db->get('transaction_details');
   			 $ret = $query->result();
   		return $ret;
}
}
 */