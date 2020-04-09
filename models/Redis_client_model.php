<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redis_client_model extends Prud_Model {

    var $redis_master;
    var $redis_slave; 
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
    }

	public function set($key, $value){
		$data=$this->redis_slave->set($key, $value);
        return $data;
	}
	
	public function getData($matching) {

        $data = $this->redis_slave->keys($matching);
        return $data;
    }
	
	public function getAllHashData($key) {
		$data=$this->redis_slave->Get($key);
		return $data;
	}

	public function deleteHset($key) {
		echo $key;die();
        $data = $this->redis_slave->del($key);
    }


}
