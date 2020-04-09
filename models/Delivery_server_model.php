<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery_server_model extends Prud_Model{

	function __construct() {
		parent::__construct();
	}

	var $column_search = array('hostname', 'username', 'port');

	public function get_delivery_Server_details($server_id){

		$this->slave->select('server_id, bounce_server_id, tracking_domain_id, cdn_host_id, type, name, hostname, username, password, port, protocol, timeout, from_email, from_name, reply_to_email, probability, hourly_quota, monthly_quota, meta_data, confirmation_key, locked, use_for, use_queue, signing_enabled, force_from, force_reply_to, must_confirm_delivery, status, mailing_domain, date_added');
		$this->slave->from('hs_delivery_server');
		$this->slave->where("server_id = ".$server_id."");
		$this->slave->where("status != '2'");
		$server        =   $this->slave->get()->row();
		$server_details =   array();

		if(isset($server->server_id)&& $server->server_id!=''){
			$server_details['server_id']     = $server->server_id;
			$server_details['bounce_server_id'] = $server->bounce_server_id;
			$server_details['tracking_domain_id']= $server->tracking_domain_id;
			$server_details['cdn_host_id']      = $server->cdn_host_id;
			$server_details['type']      = $server->type;
			$server_details['name']      = $server->name;
			$server_details['hostname']      = $server->hostname;
			$server_details['username']      = $server->username;
			$server_details['password']      = $server->password;
			$server_details['port']      = $server->port;
			$server_details['protocol']      = $server->protocol;
			$server_details['timeout']      = $server->timeout;
			$server_details['from_email']      = $server->from_email;
			$server_details['from_name']      = $server->from_name;
			$server_details['reply_to_email']      = $server->reply_to_email;
			$server_details['probability']      = $server->probability;
			$server_details['hourly_quota']      = $server->hourly_quota;
			$server_details['monthly_quota']      = $server->monthly_quota;
			$server_details['meta_data']      = $server->meta_data;
			$server_details['confirmation_key']      = $server->confirmation_key;
			$server_details['locked']      = $server->locked;
			$server_details['use_for']      = $server->use_for;
			$server_details['use_queue']      = $server->use_queue;
			$server_details['signing_enabled']      = $server->signing_enabled;
			$server_details['force_from']      = $server->force_from;
			$server_details['force_reply_to']      = $server->force_reply_to;
			$server_details['must_confirm_delivery']      = $server->must_confirm_delivery;
			$server_details['status']      = $server->status;
			$server_details['mailing_domain']      = $server->mailing_domain;
			return  $server_details;
		}else{
			return array();
		}
	}
	public function save_delivery_server($data){
		if(isset($data['server_id'])){
			$this->master->where('server_id',$data['server_id']);
			$this->master->update('hs_delivery_server',$data);
		}else{
			$date = date('c', time());
			$data['date_added'] = $date;
			$this->master->insert('hs_delivery_server',$data);
		}
		return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
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

	public function get_serverList(){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('server_id, hostname, username, port, from_email, from_name, status, reply_to_email, date_added');
		$this->slave->from('hs_delivery_server');
		$this->slave->where("status != '2'");
		$this->slave->order_by("server_id DESC");
		$this->slave->limit($length,$start);
		$this->get_datatables_query();
		$customer = $this->slave->get();
		return $customer->result();
	}
	public function count_server_filtered(){
		$this->slave->select('server_id, hostname, username, port, from_email, from_name, reply_to_email');
		$this->slave->from('hs_delivery_server');
		$this->slave->where("status != '2'");
		$this->slave->order_by("server_id DESC");
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function count_server_all(){
		$this->slave->from('hs_delivery_server');
		$this->slave->where("status != '2'");
		return $this->slave->count_all_results();
	}

	public function get_delivery_server() {
		$this->slave->select('a.client_id,a.name,a.hostname,a.username,a.from_email,a.type,a.status,a.locked,a.server_id,a.date_added,a.last_updated,c.client_uid');
		$this->slave->from('hs_delivery_server a');
		$this->slave->join('hs_clients c', 'c.client_id= a.client_id', 'left');
		$this->slave->where('a.status','1');
		$this->slave->order_by("server_id", "desc");
		$delivery_server = $this->slave->get();
		return $delivery_server->result();
	}

	public function get_delivery_server_by_client($client_id) {
		$this->slave->select('client_id, name, hostname, username, from_email, type, status, server_id, date_added, last_updated');
		$this->slave->from('hs_delivery_server');
		$this->slave->where("client_id='".$client_id."'");
		$delivery_server = $this->slave->get();
		return $delivery_server->result();
	}

	public function gettrackinglist(){
		$this->slave->select('domain_id, name, date_added, last_updated');
        $this->slave->from('hs_tracking_domain');
        $track_server = $this->slave->get();
        return $track_server->result();
	}

	public function getBouncelist() {
		$this->slave->select('server_id, hostname, username, email, service,  date_added, last_updated');
        $this->slave->from('hs_bounce_server');
		$this->slave->where('status','1');
        $bounce_server = $this->slave->get();
        return $bounce_server->result();
	}

}
