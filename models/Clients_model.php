<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients_model extends Prud_Model{

	var $column_search = array('fname','lname','email','mobileno','status','date_added'); 

	function __construct() {
		parent::__construct();
	}

	public function insert_setting_data($table_name,$data){
		unset($data['allowed_domain']);
		unset($data['delivery_server']);
		$this->master->insert($table_name,$data);
		return  $this->master->insert_id();
	}


	public function insert_data($table_name,$data){
		$date = date('c', time());
		$data['date_added'] = $date;
		$this->master->insert($table_name,$data);
		return  $this->master->insert_id();
	}

	public function update_data($table_name,$data,$uid){
		$this->master->where('client_uid',$uid);
		$this->master->update($table_name,$data);
		return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function findByUid($client_uid){
		$this->slave->select('client_uid, client_id, admin_id, fname, lname, email, mobileno, status, company_name, company_gst_no, company_contact_person, company_person_email, company_person_mobile, company_address, company_city, company_pincode, country_id, state_id, logo');
		$this->slave->from('hs_clients');
		$this->slave->where("client_uid ='".$client_uid."'");
		$this->slave->where("status != '2'");
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

	public function update_client_status($table_name,$data,$uid){
		$this->master->where('client_uid',$uid);
		$this->master->update($table_name,$data);
		return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function get_clientList($adminId){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('client_id, client_uid, fname, lname, email, mobileno, status, date_added');
		$this->slave->from('hs_clients');
		$this->slave->where("admin_id = '".$adminId."'");
		$this->slave->where("status != '2'");
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

	public function count_filtered($adminId){
		$this->slave->select('client_id, client_uid, fname, lname, email, mobileno, status, date_added');
		$this->slave->from('hs_clients');
		$this->slave->where("admin_id = '".$adminId."'");
		$this->slave->where("status != '2'");
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function count_all($adminId){
		$this->slave->from('hs_clients');
		$this->slave->where("admin_id = '".$adminId."'");
		$this->slave->where("status != '2'");
		return $this->slave->count_all_results();
	}

	public function get_country($country_id=null){

		$this->slave->select('country_id, name');
		$this->slave->from('hs_countries');
		if($country_id!=''){
			$this->slave->where("country_id =$country_id");
		}
		$country_arr = $this->slave->get()->result();
		return $country_arr;
	}

	public function get_state($country_id=null,$state_id=null){
		$this->slave->select('state_id, name');
		$this->slave->from('hs_states');
		if($state_id!=''){
			$this->slave->where("state_id=$state_id");
		}
		if($country_id!=''){
			$this->slave->where("country_id =$country_id");
		}
		$state_arr = $this->slave->get()->result();
		return $state_arr;
	}

	public function find_by_uid($client_uid){
		$this->slave->select('email');
		$this->slave->from('hs_clients');
		$this->slave->where("client_uid ='".$client_uid."'");
		$obj = $this->slave->get()->row();
		return $obj;
	}

	public function get_domain_details($client_id, $domain_id){

		$this->slave->select('*');
		$this->slave->from('hs_client_domain');
		$this->slave->where("client_id='".$client_id."' and domain_id= ".$domain_id."");
		$obj = $this->slave->get()->row();
		return $obj;
	}

	public function find_domain_by_client($domain_name, $clientId) {

        $this->slave->select('domain_id, client_id, domain_name, reply_to, from_email');
        $this->slave->from('hs_client_domain');
        $this->slave->where("domain_name", $domain_name);
        $this->slave->where("client_id", $clientId);
        $domain_data = $this->slave->get()->row();
        return  $domain_data;
    }

	public function get_global_setting() {

		$this->slave->select('spf_ip_range');
		$this->slave->from('hs_global_setting');
		$global_setting_obj = $this->slave->get()->row();
		return  $global_setting_obj;
	}
		
	public function save_domain($args, $data) {
		if(isset($data['domain_id'])&& $data['domain_id'] > 0){
			$this->master->where("domain_id = ".$data['domain_id']." and client_id = ".$data['client_id']."");
			$this->master->update('hs_client_domain',$args);
		}
		else {
			$this->master->insert('hs_client_domain',$args);
		}
		return true;
	}

	public function get_domainList($client_id) {

        $length    =   isset($_POST['length'])?$_POST['length']:0;
        $start     =   isset($_POST['start'])?$_POST['start']:10;

        $this->slave->select('domain_id, client_id, domain_name, reply_to, from_email, is_verified');
        $this->slave->from('hs_client_domain cd');
        $this->slave->where("client_id", $client_id);
        $this->slave->where("status!='2'");
        $this->slave->limit($length,$start);
        $this->slave->order_by("domain_id desc");
        $user = $this->slave->get();
        return $user->result();

    }

    public function count_domain_filtered($client_id) {

        $this->slave->select('domain_id, client_id, domain_name, reply_to, from_email, is_verified');
        $this->slave->from('hs_client_domain cd');
        $this->slave->where("client_id", $client_id);
        $this->slave->where("status!='2'");
        $query = $this->slave->get();
        return $query->num_rows();

    }

    public function count_domain_all($client_id) {

        $this->slave->from('hs_client_domain cd');
        $this->slave->where("client_id", $client_id);
        $this->slave->where("cd.status!='2'");
        return $this->slave->count_all_results();

    }
	public function find_by_id($domain_id) {
		$this->slave->select('domain_id, client_id, domain_name, reply_to, from_email');
		$this->slave->from('hs_client_domain');
		$this->slave->where("domain_id ='".$domain_id."'");
		$domain_data = $this->slave->get()->row();
		return  $domain_data;
	}

	public function update_domain_data($tablename, $data) {       
		$client_id   =   $data['client_id'];
		$domain_id     =   $data['domain_id'];
		$status        =   $data['status'];
		$domain_data   =   array(
				'is_verified' => "$status"
				);
		$this->master->where('client_id', $client_id);
		$this->master->where('domain_id', $domain_id);
		$this->master->update($tablename, $domain_data);
		return true;
	}

	public function update_domain($post_data,$client)
	{
		if(isset($post_data['domain_id']) && isset($client->client_id))
		{
			$cust_data['status'] =   '2';
			$this->master->where('domain_id',$post_data['domain_id']);
			$this->master->where('client_id',$client->client_id);
			$this->master->update('hs_client_domain',$cust_data);
		}
	}
		
	public function find_by_client_id($client_id){
        $this->slave->select('*');
        $this->slave->from('hs_clients');
        $this->slave->where("client_id ='".$client_id."'");
		$this->slave->where("status!='2'");
        $obj = $this->slave->get()->row();
        return $obj;
    }

	public function get_cdn_host_details($client_id, $cdn_host_id){

		$this->slave->select('*');
		$this->slave->from('hs_cdn_host');
		$this->slave->where("client_id='".$client_id."' and cdn_host_id= ".$cdn_host_id."");
		$obj = $this->slave->get()->row();
		$cdn_details =   array();
		if(isset($obj->cdn_host_id)&& $obj->cdn_host_id!=''){
			$cdn_details['cdn_host_id']   = $obj->cdn_host_id;
			$cdn_details['content'] = $obj->content;
			return  $cdn_details;
		}else{
			return array();
		}
	}

	public function get_cdn_host_List($clientId) {

		$length    =   isset($_POST['length'])?$_POST['length']:0;
		$start     =   isset($_POST['start'])?$_POST['start']:10;

		$this->slave->select('cdn_host_id, client_id, tag, content');
		$this->slave->from('hs_cdn_host');
		$this->slave->where("client_id", $clientId);
		$this->slave->limit($length,$start);
		$user = $this->slave->get();
		return $user->result();
	}

	public function count_cdn_host_filtered($clientId) {
		$this->slave->select('cdn_host_id, client_id, tag, content');
		$this->slave->from('hs_cdn_host');
		$this->slave->where("client_id", $clientId);
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function count_cdn_host_all($clientId) {
		$this->slave->from('hs_cdn_host');
		$this->slave->where("client_id", $clientId);
		return $this->slave->count_all_results();

	}

	public function save_cdn_host($args, $data) {
		if(isset($data['cdn_host_id'])&& $data['cdn_host_id'] > 0){
			$this->master->where("cdn_host_id = ".$data['cdn_host_id']." and client_id = ".$data['client_id']."");
			$this->master->update('hs_cdn_host',$args);
		}
		else {
			$this->master->insert('hs_cdn_host',$args);
		}
		return true;
	}

	public function delete_cdn_host($post_data,$client)
	{	
		if(isset($post_data['cdn_host_id']) && isset($client->client_id))
		{
			return $this->master->query("DELETE FROM hs_cdn_host WHERE cdn_host_id =".$post_data['cdn_host_id']." AND client_id = ".$client->client_id."");
		}
	}

	
	public function setting_details($client_id) {
		$this->slave->select('*');
		$this->slave->from('hs_client_setting');
		$this->slave->where("client_id='".$client_id."'"); 
		$obj = $this->slave->get()->row();
		return $obj;
	}

	public function get_all_domain(){
		$this->slave->select('domain_id, name, status, date_added');
		$this->slave->from('hs_domain');
		$domain = $this->slave->get();
		return $domain->result();
	}

	public function get_domain_by_client($client_id) {
		$this->slave->select('allowed_domain_id, client_id');
		$this->slave->from('hs_client_allowed_domain');
		$this->slave->where("client_id='".$client_id."'");
		$domain = $this->slave->get();
		return $domain->result();
	}

	public function update_setting($data, $client) {
		$client_id     = $client->client_id;
		$client_name   = $client->fname;
		$client_uid    = $client->client_uid;
		$this->master->where('client_id', $client_id);
		$this->master->delete('hs_client_allowed_domain');
		$this->master->where('client_id', $client_id);
		$this->master->delete('hs_client_allowed_domain');
		$this->master->where('client_id', $client_id);
		$this->master->update('hs_delivery_server', array('client_id' => 0, 'locked' => 'no'));
		$allowed_domain_data = array();
		if(count($data['allowed_domain']) > 0) {
			foreach($data['allowed_domain'] as $domain) {
				$domain_data = array(
						"client_id"           => $client_id,
						"allowed_domain_id"    => $domain
						);
				array_push($allowed_domain_data, $domain_data);
			}
			$this->master->insert_batch('hs_client_allowed_domain', $allowed_domain_data);
		}
		$delivery_server_data = array();
		if(count($data['delivery_server']) > 0) {
			foreach($data['delivery_server'] as $delivery_id) {
				$delivery_data = array(
						"client_id"          => $client_id,
						"locked"              => 'yes',
						);
				$this->master->where('server_id', $delivery_id);
				$this->master->update('hs_delivery_server', $delivery_data);
			}
		}
		unset($data['allowed_domain']);
		unset($data['delivery_server']);
		$this->master->where('client_id', $client_id);
		$this->master->update('hs_client_setting', $data);
		return true;

	}

	public function getAdminSetting($adminId){
		
		$this->slave->select('total_limit, total_consume_limit, list_approval, no_of_client as cnt');
		$this->slave->from('hs_admin_setting');
		$this->slave->where("admin_id='".$adminId."'");
		$client = $this->slave->get();
		return $client->row();

	}

	public function getclientData($adminId) { 
	
		$this->slave->select('count(*) as total');
		$this->slave->from('hs_clients');
		$this->slave->where("admin_id = '".$adminId."'");
		$client = $this->slave->get();
		return $client->row();

	}

	public function find_by_email($email, $adminId){
        $this->slave->select('email');
        $this->slave->from('hs_clients');
        $this->slave->where("email ='".$email."'");
        $this->slave->where("admin_id= '".$adminId."'");
        $obj = $this->slave->get()->row();
        return $obj;
    }

	public function update_admin_setting($data, $admin_id) {
        $this->master->where('admin_id', $admin_id);
        $this->master->update('hs_admin_setting', $data);
        return true;
    }


}
