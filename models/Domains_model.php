<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Domains_model extends Prud_Model{

	var $column_search = array('name'); 

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
		$this->master->where('domain_id',$uid);
		$this->master->update($table_name,$data);
		return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function findByUid($domain_id){
		$this->slave->select('domain_id, name, status, date_added');
		$this->slave->from('hs_domain');
		$this->slave->where("domain_id ='".$domain_id."'");
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

	public function update_domain_status($table_name,$data,$uid){
        $this->master->where('domain_id',$uid);
        $this->master->update($table_name,$data);
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
    }

	public function get_domainList(){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('domain_id, name, status, date_added');
		$this->slave->from('hs_domain');
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

	public function count_filtered(){
		$this->slave->select('domain_id, name, status, date_added');
		$this->slave->from('hs_domain');
		$this->slave->where("status != '2'");
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function count_all(){
		$this->slave->from('hs_domain');
		$this->slave->where("status != '2'");
		return $this->slave->count_all_results();
	}

	public function get_domain_details($domain_id){
        
        $this->slave->select('domain_id, name, status, date_added');
        $this->slave->from('hs_domain');
        $this->slave->where("domain_id = ".$domain_id."");
        $this->slave->where("status != '2'");
        $domain        =   $this->slave->get()->row();
        $domain_details =   array();
        
        if(isset($domain->domain_id)&& $domain->domain_id!=''){
           $domain_details['domain_id']     = $domain->domain_id;
           $domain_details['name'] = $domain->name;
           $domain_details['status']      = $domain->status;
            return  $domain_details;
        }else{
           return array();
        }
    }

    public function save_domain($data){
        if(isset($data['domain_id'])){
            $this->master->where('domain_id',$data['domain_id']);
            $this->master->update('hs_domain',$data);
        }else{
            $date = date('c', time());
            $data['date_added'] = $date;
            $this->master->insert('hs_domain',$data);
        }
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
    }

	public function get_all_domain(){
		$this->slave->select('domain_id,name,status,date_added');
		$this->slave->from('hs_domain');
		$this->slave->where("status != '2'");
		$domain = $this->slave->get();
		return $domain->result();

	}

	public function get_track_domain_details($domain_id){

        $this->slave->select('domain_id, name, date_added');
        $this->slave->from('hs_tracking_domain');
        $this->slave->where("domain_id = ".$domain_id."");
        $domain        =   $this->slave->get()->row();
        $domain_details =   array();

        if(isset($domain->domain_id)&& $domain->domain_id!=''){
           $domain_details['domain_id']     = $domain->domain_id;
           $domain_details['name'] = $domain->name;
            return  $domain_details;
        }else{
           return array();
        }
    }

	public function track_save_domain($data){
        if(isset($data['domain_id'])){
            $this->master->where('domain_id',$data['domain_id']);
            $this->master->update('hs_tracking_domain',$data);
        }else{
            $date = date('c', time());
            $data['date_added'] = $date;
            $this->master->insert('hs_tracking_domain',$data);
        }
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
    }

	public function get_track_domainList(){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('domain_id, name, date_added');
		$this->slave->from('hs_tracking_domain');
		$this->slave->limit($length,$start);
		$this->get_datatables_query();
		$customer = $this->slave->get();
		return $customer->result();
	}

	public function track_count_filtered(){
		$this->slave->select('domain_id, name, date_added');
		$this->slave->from('hs_tracking_domain');
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function track_count_all(){
		$this->slave->from('hs_tracking_domain');
		return $this->slave->count_all_results();
	}

	public function bounce_server_save_domain($data){
        if(isset($data['server_id'])){
            $this->master->where('server_id',$data['server_id']);
            $this->master->update('hs_bounce_server',$data);
        }else{
            $date = date('c', time());
            $data['date_added'] = $date;
            $this->master->insert('hs_bounce_server',$data);
        }
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
    }

	public function get_bounce_server_details($server_id){

        $this->slave->select('server_id, hostname, username, password, email, service, port, protocol, validate_ssl, locked, disable_authenticator, search_charset, delete_all_messages, status, date_added');
        $this->slave->from('hs_bounce_server');
        $this->slave->where("server_id = ".$server_id."");
        $server        =   $this->slave->get()->row();
        $server_details =   array();

        if(isset($server->server_id)&& $server->server_id!=''){
           $server_details['server_id']     = $server->server_id;
           $server_details['hostname'] = $server->hostname;
           $server_details['username'] = $server->username;
           $server_details['password'] = $server->password;
           $server_details['email'] = $server->email;
           $server_details['service'] = $server->service;
           $server_details['port'] = $server->port;
           $server_details['protocol'] = $server->protocol;
           $server_details['validate_ssl'] = $server->validate_ssl;
           $server_details['locked'] = $server->locked;
           $server_details['disable_authenticator'] = $server->disable_authenticator;
           $server_details['search_charset'] = $server->search_charset;
           $server_details['delete_all_messages'] = $server->delete_all_messages;
           $server_details['status'] = $server->status;
            return  $server_details;
        }else{
           return array();
        }
    }

	public function get_bounce_serverList(){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('server_id, hostname, username, password, email, service, port, protocol, validate_ssl, locked, disable_authenticator, search_charset, delete_all_messages, status, date_added');
		$this->slave->from('hs_bounce_server');
		$this->slave->limit($length,$start);
		$this->get_datatables_query();
		$customer = $this->slave->get();
		return $customer->result();
	}

	public function bounce_server_count_filtered(){
		$this->slave->select('server_id, hostname, username, password, email, service, port, protocol, validate_ssl, locked, disable_authenticator, search_charset, delete_all_messages, status, date_added');
		$this->slave->from('hs_bounce_server');
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function bounce_server_count_all(){
		$this->slave->from('hs_bounce_server');
		return $this->slave->count_all_results();
	}


}
