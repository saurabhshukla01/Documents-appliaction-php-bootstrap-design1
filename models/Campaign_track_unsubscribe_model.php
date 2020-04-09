<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign_track_unsubscribe_model extends Prud_Model{

	function __construct() {
		parent::__construct();
	}

	public function insert_data($table_name, $data){
		$this->master->insert($table_name, $data);
		return  $this->master->insert_id();
	}

	public function update_data($tablename, $data) {
		$campaign_uid   =   $data['campaign_uid'];
		$this->master->where('campaign_uid',$campaign_uid);
		$this->master->update($tablename,$data);
		return true;
	}

	public function delete_data($tablename, $data) {
		$email  = $data['email'];
		$this->master->where('email', $email);
		$this->master->delete($tablename);
	}

	public function findByUid($client_uid){
		$this->slave->select('client_uid, client_id, admin_id, fname, lname, email, mobileno, status, company_name, company_gst_no, company_contact_person, company_person_email, company_person_mobile, company_address, company_city, company_pincode, country_id, state_id, logo');
		$this->slave->from('hs_clients');
		$this->slave->where("client_uid ='".$client_uid."'");
		$this->slave->where("status != '2'");
		$role_arr = $this->slave->get()->row();
		return  $role_arr;
	}

	public function get_campaign($campaign_id){
		$this->slave->select('*');
		$this->slave->from('hs_campaign');
		$this->slave->where("campaign_id = $campaign_id");
		$obj = $this->slave->get()->row();
		return $obj;
	}

	public function get_list($list_id){
		$this->slave->select('*');
		$this->slave->from('hs_list');
		$this->slave->where("list_id= $list_id");
		$obj = $this->slave->get()->row();
		return $obj;
	}


}
