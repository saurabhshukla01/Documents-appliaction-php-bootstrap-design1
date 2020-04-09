<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_setting_model extends Prud_Model{

	function __construct() {
		parent::__construct();
	}

	public function find_by_id($client_id){
		$this->slave->select('*');
		$this->slave->from('hs_client_setting');
		$this->slave->where("client_id='".$client_id."'");
		$obj= $this->slave->get()->row();
		return $obj;
	}

	public function findByUid($client_id){
        $this->slave->select('client_uid, fname, lname, mobileno, company_name, company_gst_no, company_contact_person, company_person_email, company_person_mobile, company_address, company_city, company_pincode, country_id, state_id, email');
        $this->slave->from('hs_clients');
        $this->slave->where("client_id ='".$client_id."'");
        $role_arr = $this->slave->get()->row();
        return  $role_arr;
    }

	public function update_data($table_name,$data,$uid){
        $this->master->where('client_id',$uid);
        $this->master->update($table_name,$data);
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
    }

}
