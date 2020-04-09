<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_setting_model extends Prud_Model{

	function __construct() {
		parent::__construct();
	}


	public function findByUid($admin_id){
        $this->slave->select('admin_id, admin_uid, role_id, first_name, last_name, mobile_no, email, status, type');
        $this->slave->from('hs_admins');
        $this->slave->where("admin_id ='".$admin_id."'");
        $role_arr = $this->slave->get()->row();
        return  $role_arr;
    }

	public function update_data($table_name,$data,$uid){
        $this->master->where('admin_id',$uid);
        $this->master->update($table_name,$data);
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
    }

}
