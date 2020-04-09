<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blacklists_model extends Prud_Model { 

	var $column_search = array('email', 'type');
	var $redis_master;
    var $redis_slave;
	var $manager;
    var $db;	
	
	function __construct() {
		parent::__construct();
		$this->config->load('redis');
        $this->redis_master = new Redis();
        $this->redis_slave = new Redis();
        $redis_master_host     =   '127.0.0.1';
        $redis_master_port     =   '6379';
        $redis_master_password =   'Prudigital@1234';
        $redis_slave_host      =   '127.0.0.1';
        $redis_slave_port      =   '6379';
        $redis_slave_password  =   'Prudigital@1234';

        try {
            $this->redis_master->connect($redis_master_host, $redis_master_port);
            $this->redis_master->auth($redis_master_password);
            $this->redis_slave->connect($redis_slave_host, $redis_slave_port);
            $this->redis_slave->auth($redis_slave_password);
        }
        catch(Exception $e) {
            echo "Unable to connect ".$e->getMessage();
        }

		$this->manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$this->db = 'heysend_db.hs_client_email_blacklist';
	}

	public function insert_data($table_name, $data){
		$date = date('c', time());
		$data['date_added'] = $date;
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->insert($data);
		return $manager->executeBulkWrite($this->db, $bulk);
	}

	public function set($key, $value){
        $data=$this->redis_slave->set($key, $value);
        return $data;
    }

	public function find_black_list_by_email_client($email, $client_id) {
        $filter= ['client_id' => $client_id, 'email' => $email];
		$query = new MongoDB\Driver\Query($filter);
		$cursor = $this->manager->executeQuery($this->db, $query);
		return $cursor;
	}

	public function get_blackList($clientId){
        $filter= ['client_id' => $clientId];
        $query = new MongoDB\Driver\Query($filter);
        $cursor = $this->manager->executeQuery($this->db, $query);
		$blacklist = $cursor->toArray();
        return (object) $blacklist;

	}

	public function count_filtered($clientId){
        $filter= ['client_id' => $clientId];
        $query = new MongoDB\Driver\Query($filter);
        $cursor = $this->manager->executeQuery($this->db, $query);
        $blacklist = count($cursor->toArray());
		return $blacklist;
	}

	public function count_all($clientId){
        $filter= ['client_id' => $clientId];
        $query = new MongoDB\Driver\Query($filter);
        $cursor = $this->manager->executeQuery($this->db, $query);
        $blacklist = count($cursor->toArray());
		return $blacklist;
	}


	public function get_unsubscribeList($clientId){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('email, type, date_added');
		$this->slave->from('hs_campaign_track_unsubscribe');
		$this->slave->where("client_id = ".$clientId."");
		$this->slave->limit($length,$start);
		$this->get_datatables_query();
		$unsubscribe = $this->slave->get();
		return $unsubscribe->result();
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

	public function count_unsubscribe_filtered($clientId){
		$this->slave->select('email, type, date_added');
		$this->slave->from('hs_campaign_track_unsubscribe');
		$this->slave->where("client_id = ".$clientId."");
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function count_unsubscribe_all($clientId){
		$this->slave->from('hs_campaign_track_unsubscribe');
		$this->slave->where("client_id = ".$clientId."");
		return $this->slave->count_all_results();
	}
}
