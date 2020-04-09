<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends Prud_Model{

	var $column_search = array('role_name', 'first_name', 'email', 'mobile_no'); 

	function __construct() {
		parent::__construct();
	}

	public function insert_data($data){
		$this->master->trans_begin();
            $data_user_roles =  array(
                    'role_name'     => $data['role_name'],
					'status'		=> $data['status'],
                    );
            $this->master->insert('hs_user_role', $data_user_roles);
            $role_id = $this->master->insert_id();
            
            $role_data = json_decode($data['role_data']);
            foreach($role_data as $i){
                $data_user_role_page_action =  array(
                    'role_id'     => $role_id,
                    'page_id'     => $i->pageid,
                    'action_id'   => $i->actionid,
                    );
                $this->master->insert('hs_admin_role_page_action',$data_user_role_page_action);
            }
            if ($this->master->trans_status() === FALSE){
                $this->master->trans_rollback();
                return FALSE;
            }else{
                $this->master->trans_commit();
                return TRUE;
            }
	
		$this->master->insert($table_name,$data);
		return  $this->master->insert_id();
	}

	public function update_data($data,$role_id){
		$this->master->trans_begin();
            $data_user_roles =  array(
                    'role_name'     => $data['role_name'],
					'status'		=> $data['status'], 
                    );
            $this->master->where('role_id',$role_id);
            $this->master->update('hs_user_role',$data_user_roles);

            $role_data = json_decode($data['role_data']);
            $this->master->where('role_id', $role_id);
            $this->master->delete('hs_admin_role_page_action'); 
            foreach($role_data as $i){
                $data_user_role_page_action =  array(
                    'role_id'     => $role_id,
                    'page_id'     => $i->pageid,
                    'action_id'   => $i->actionid,
                    );
                $this->master->insert('hs_admin_role_page_action',$data_user_role_page_action);
            }
            if ($this->master->trans_status() === FALSE){
                $this->master->trans_rollback();
                return FALSE;
            }else{
                $this->master->trans_commit();
                return TRUE;
            }
	}

	public function findByUid($role_id){
		$this->slave->select('role_id, role_name, status, type, date_added');
		$this->slave->from('hs_user_role');
		$this->slave->where("role_id='".$role_id."'");
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

	public function update_role_status($table_name,$data,$uid){
        $this->master->where('role_id',$uid);
        $this->master->update($table_name,$data);
        return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
    }

	public function get_roleList(){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('role_id, role_name, status, type, date_added');
		$this->slave->from('hs_user_role');
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
		$this->slave->select('role_id, role_name, status, type, date_added');
		$this->slave->from('hs_user_role');
		$this->slave->where("status != '2'");
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function count_all(){
		$this->slave->from('hs_user_role');
		$this->slave->where("status != '2'");
		return $this->slave->count_all_results();
	}

	public function get_role_by_id($role_id){
		$this->slave->select('role_name, status');
		$this->slave->from('hs_user_role');
		$this->slave->where("role_id='".$role_id."'");
		$query = $this->slave->get()->row();
		return $query;        
	}

	public function get_edit_exist($role_name,$role_id){
		$this->slave->select('count(role_id) as cnt');
		$this->slave->from('hs_user_role');
		$this->slave->where("role_id!='".$role_id."'");
		$this->slave->where("role_name='".$role_name."'");
		$this->slave->where('status!="2"');
		$query = $this->slave->get()->row();
		return  ($query->cnt>0)?$query->cnt:0;
	}
	
	public function get_page(){
        $this->slave->select('page_id, page_url');
        $this->slave->from('hs_admin_page');
        $query = $this->slave->get()->result();
        return $query;        
    }

    public function get_page_action(){        
        $this->slave->select('action_id, action_name');
        $this->slave->from('hs_admin_page_action');
        $query = $this->slave->get()->result();
        return $query;
    }

	public function get_page_action_by_role($role_id){
        $this->slave->select('page_id,action_id');
        $this->slave->from('hs_admin_role_page_action');
        $this->slave->where("role_id='".$role_id."'");
        $query = $this->slave->get()->result();
        return $query;        
    }

	public function get_List($role_id){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('admin_id, admin_uid, first_name, last_name, email, mobile_no, status, type, role_id, date_added');
		$this->slave->from('hs_admins');
		$this->slave->where("role_id = ".$role_id."");
		$this->slave->where("status != '2'");
		$this->slave->limit($length,$start);
		$this->get_datatables_query();
		$customer = $this->slave->get();
		return $customer->result();
	}

	public function user_count_filtered($role_id){
		$this->slave->select('admin_id, admin_uid, first_name, last_name, email, mobile_no, status, type, role_id date_added');
		$this->slave->from('hs_admins');
		$this->slave->where("role_id = ".$role_id."");
		$this->slave->where("status != '2'");
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function user_count_all($role_id){
		$this->slave->from('hs_admins');
		$this->slave->where("role_id = ".$role_id."");
		$this->slave->where("status != '2'");
		return $this->slave->count_all_results();
	}
	
	public function insert_user_data($table_name,$data){
		$date = date('c', time());
		$data['date_added'] = $date;
		$this->master->insert($table_name,$data);
		return  $this->master->insert_id();
	}

	public function findUserByUid($admin_uid){
		$this->slave->select('admin_uid, admin_id, first_name, last_name, email, mobile_no, role_id, status, type');
		$this->slave->from('hs_admins');
		$this->slave->where("admin_uid ='".$admin_uid."'");
		$this->slave->where("status != '2'");
		$role_arr = $this->slave->get()->row();
		return  $role_arr;
	}
	
	public function update_user_data($table_name,$data,$uid){
		$this->master->where('admin_uid',$uid);
		$this->master->update($table_name,$data);
		return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function update_setting($data, $admin_id) {
		$this->master->where('admin_id', $admin_id);
		$this->master->update('hs_admin_setting', $data);
		return true;
	}

	public function update_setting_data($table, $data) {
		$setting_id = $data['setting_id'];
		$list_approval_data = array(
			'list_approval' => $data['list_approval']	
		);
        $this->master->where('setting_id', $setting_id);
        $this->master->update($table, $list_approval_data);
        return true;
    }


	public function insert_setting_data($table_name,$data){
		$date = date('c', time());
		$data['date_added'] = $date;
		$this->master->insert($table_name,$data);
		return  $this->master->insert_id();
	}

	public function setting_details($admin_id) {
		$this->slave->select('*');
		$this->slave->from('hs_admin_setting');
		$this->slave->where("admin_id='".$admin_id."'"); 
		$obj = $this->slave->get()->row();
		return $obj;
	}

	public function save_setting($table, $data){
		$date = date('c', time());
		$data['date_added'] = $date;
		$this->master->insert($table, $data);
		return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function get_settingList($adminId){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('setting_id, total_limit, total_consume_limit, no_of_client, pricing, list_approval, date_added');
		$this->slave->from('hs_admin_setting');
		$this->slave->where("admin_id = ".$adminId."");
		$this->slave->limit($length,$start);
		$setting = $this->slave->get();
		return $setting->result();
	}

	public function setting_count_filtered($adminId){
		$this->slave->select('setting_id, total_limit, total_consume_limit, no_of_client, pricing, date_added');
		$this->slave->from('hs_admin_setting');
		$this->slave->where("admin_id = ".$adminId."");
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function setting_count_all($adminId){
		$this->slave->from('hs_admin_setting');
		$this->slave->where("admin_id = ".$adminId."");
		return $this->slave->count_all_results();
	}	
}
