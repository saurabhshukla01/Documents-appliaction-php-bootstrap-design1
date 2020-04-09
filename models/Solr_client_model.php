<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solr_client_model extends Prud_Model{

	
    var $solr_url;
    var $instance_root_directory;

	function __construct() {
		parent::__construct();
		$this->config->load('custom_config');
		$this->instance_root_directory = $this->config->item('SOLR_INSTANCE_DIR');
		try {
			$this->solr_url =   $this->config->item('SOLR_HOST');
		}
		catch(Exception $e) {
			echo "Unable to connect ".$e->getMessage();
		}
	}
	
	public function get_solr_url() {
		return $this->solr_url;
	}

	public function get_instance_root_directory() {
		return $this->instance_root_directory; 
	}


}
