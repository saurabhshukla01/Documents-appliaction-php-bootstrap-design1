<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists_model extends Prud_Model{

	var $column_search = array('name', 'type'); 

	function __construct() {
		parent::__construct();
	}

	public function insert_data($table_name,$data){
		$date = date('c', time());
		$data['date_added'] = $date;
		$this->master->insert($table_name,$data);
		return  $this->master->insert_id();
	}

	public function update_data($table_name,$data,$uid){
		$this->master->where('list_uid',$uid);
		$this->master->update($table_name,$data);
		return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function findByUid($list_uid){
		$this->slave->select('list_id, list_uid, name, data_count, type, extra_info, criteria, date_added');
		$this->slave->from('hs_list');
		$this->slave->where("list_uid ='".$list_uid."'");
		$this->slave->where("status !='2'");
		$role_arr = $this->slave->get()->row();
		return  $role_arr;
	}

	public function generateUid(){
		$uniqid = uniqid();          
		$exists = $this->findByUid($uniqid);
		if (!empty($exists)&& count($exists)<1) {
			return $this->generateUid();
		}
		return $uniqid;
	}

	public function update_list_status($table_name,$data,$uid){
		$this->master->where('list_uid',$uid);
		$this->master->update($table_name,$data);
		return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function get_clientList($clientId){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('list_id, list_uid, name, data_count, type, date_added');
		$this->slave->from('hs_list');
		$this->slave->where("client_id = ".$clientId."");
		$this->slave->where("status !='2'");
		$this->slave->limit($length,$start);
		$this->get_datatables_query();
		$customer = $this->slave->get();
		return $customer->result();
	}

	public function get_datatables_query(){
		$i = 0;
		$date = '';
		$column_name    = isset($_POST['columns'])?$_POST['columns']:array();
		foreach($column_name as $col){
			$col_name = $col['data'];
			$col_value = $col['search']['value'];
			if (in_array($col_name, $this->column_search) && $col_value != '') {
				$this->slave->group_start();
				$this->slave->like($col_name, $col_value);
				$this->slave->group_end();
			}
		}
	}

	public function count_filtered($clientId){
		$this->slave->select('list_id, list_uid, name, data_count, date_added');
		$this->slave->from('hs_list');
		$this->slave->where("client_id = ".$clientId."");
		$this->slave->where("status !='2'");
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function count_all($clientId){
		$this->slave->from('hs_list');
		$this->slave->where("client_id = ".$clientId."");
		$this->slave->where("status !='2'");
		return $this->slave->count_all_results();
	}

	public function find_by_name($name, $client_id){
        $this->slave->select('name');
        $this->slave->from('hs_list');
        $this->slave->where("name ='".$name."'");
        $this->slave->where("client_id = '".$client_id."'");
		$this->slave->where("status !='2'");
        $obj = $this->slave->get()->row();
        return $obj;
    }

	public function find_list_by_id($list_id){
		$this->slave->select('list_uid, client_id, name, data_count, date_added, last_updated');
		$this->slave->from('hs_list');
		$this->slave->where("list_id ='".$list_id."'");
		$this->slave->where("status !='2'");
		$list_arr = $this->slave->get()->row();
		return  $list_arr;
	}

	public function get_testmail_list_details($clientId) {
		$this->slave->select("*");
		$this->slave->from('hs_list');
		$this->slave->where('client_id', $clientId);
		$this->slave->where('type', '3');
		$this->slave->where("status !='2'");
		$obj = $this->slave->get()->row();
		return $obj;
	}

	public function list_data($list_uid, $client_id){
        $this->slave->select('*');
        $this->slave->from('hs_list');
        $this->slave->where("list_uid='".$list_uid."'");
        $this->slave->where("client_id = '".$client_id."'");
        $this->slave->where("status !='2'");
        $obj = $this->slave->get()->row();
        return $obj;
    }

	public function update_list($data, $listID) 
    {
        $this->master->where("list_id", $listID);
        $this->master->update('hs_list', $data);
    }


	public function get_client_setting($client_id) {
        $this->slave->select("*");
        $this->slave->from('hs_client_setting');
        $this->slave->where("client_id='".$client_id."'");
        $obj = $this->slave->get()->row();
        return $obj;
    }

	public function get_list_client($client_id) {
        $this->slave->select("*");
        $this->slave->from('hs_list');
        $this->slave->where("client_id='".$client_id."' AND status = '1'");
        $obj = $this->slave->get()->row();
        return $obj;
    }

	 public function get_rejectList($list_id) {
        $length =   (isset($_POST['length'])) ? $_POST['length'] : 10;
        $start  =   (isset( $_POST['start'])) ? $_POST['start'] : 0;

        $this->slave->select('*');
        $this->slave->from('hs_list_rejected_email');
        $this->slave->where('list_id', $list_id);
        $this->slave->limit($length, $start);
        $user = $this->slave->get();
        return $user->result();
    }

    public function reject_count_filtered($list_id) {
        $this->slave->from('hs_list_rejected_email');
        $this->slave->where('list_id', $list_id);
        $query = $this->slave->get();
        return $query->num_rows();
    }

    public function reject_count_all($list_id) {
        $this->slave->from('hs_list_rejected_email');
        $this->slave->where('list_id', $list_id);
        return $this->slave->count_all_results();
    }

}
