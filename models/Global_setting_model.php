<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_setting_model extends Prud_Model{

	function __construct() {
		parent::__construct();
	}
	
	public function update_testmail_server($table_name,$data,$day){
        $this->master->where('day', "$day");
        $this->master->update($table_name,$data);
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
    }


	public function create_global_setting($global_setting_data) {
        $global_setting = $this->find_global_setting();
        $this->master->trans_begin();
        if(isset($global_setting)) {
                $this->master->where('global_setting_id', $global_setting->global_setting_id);
                $this->master->update('hs_global_setting', $global_setting_data);
        }
        else {
                $this->master->insert('hs_global_setting', $global_setting_data);
                $global_setting_id = $this->master->insert_id();
        }
         if ($this->master->trans_status() === FALSE){
             $this->master->trans_rollback();
             return FALSE;
         }
        else{
             $this->master->trans_commit();
             return TRUE;
         }
    }

	public function find_global_setting(){
		$this->slave->select('*');
		$this->slave->from('hs_global_setting');
		$obj = $this->slave->get()->row();
		return $obj;
	}

	public function find_delivery_server(){
        $this->slave->select('server_id, hostname');
        $this->slave->from('hs_delivery_server');
        $this->slave->where("status='1'");
        $obj = $this->slave->get()->result();
        return $obj;
    }


}
