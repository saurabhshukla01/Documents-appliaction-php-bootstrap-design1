<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends Prud_Model{

	function __construct() {
		parent::__construct();
	}

	public function get_adminId($admin_id)
	{   
		$this->slave->select('*');
		$this->slave->from('hs_admins');
		$this->slave->where("admin_id='".$admin_id."'");
		$this->slave->where("status='1'");
		$user = $this->slave->get()->row();
		return $user;
	}

	public function get_clientId($client_id){
		$this->slave->select('*');
		$this->slave->from('hs_clients');
		$this->slave->where("client_id='".$client_id."'");
		$this->slave->where("status='1'");
		$user = $this->slave->get()->row();
		return $user;
	}

	public function getadmindata($roleId)
    {
        $this->slave->select('*');
        $this->slave->from('hs_admins');
        $this->slave->where("role_id='".$roleId."'");
        $this->slave->where("status!='2'");
		return $this->slave->count_all_results();
    }

	public function getclientData(){
        $this->slave->select('*');
        $this->slave->from('hs_clients');
        $this->slave->where("status!='2'");
		return $this->slave->count_all_results();
    }

	public function getcampaignData($status=null){
		$this->slave->select('*');
		$this->slave->from('hs_campaign');
		if($status!=''){
			$this->slave->where("status = '".$status."'");
		}
		$this->slave->where("status!='6'");
		return $this->slave->count_all_results();
	}

	public function getcampaigncountData($clientId=null, $status=null){
        $this->slave->select('*');
        $this->slave->from('hs_campaign');
        if($clientId!='' && $status!=''){
            $this->slave->where("client_id= '".$clientId."'");
			$this->slave->where("status = '".$status."'");
        }
        $this->slave->where("status!='6'");
        return $this->slave->count_all_results();
    }


	public function get_campaignList($clientId=null){

        $this->slave->select('c.campaign_uid,c.name as campaign_name,c.type,c.campaign_id,c.scheduled_at,c.processed_at,c.finished_at,c.status as campaign_status,c.name,c.date_added,s.name as list_name,s.list_uid, mc.fname, mc.lname, mc.client_uid');
        $this->slave->from('hs_campaign as c');
        $this->slave->join('hs_list as s','c.list_id=s.list_id');
        $this->slave->join('hs_clients as mc','mc.client_id=c.client_id');
		if($clientId!=''){
            $this->slave->where("c.client_id= '".$clientId."'");
        }
        $this->slave->where("c.status!=", 6);
		$this->slave->order_by("c.campaign_uid", "random");
        $this->slave->limit(6);
        $obj = $this->slave->get();
        return $obj->result();
    }

	public function get_listcount($clientId=null, $type=null){
		$this->slave->select('*');
		$this->slave->from('hs_list');
		if($clientId!=''){
			$this->slave->where("client_id = ".$clientId."");
		}
		if($type!=''){
			$this->slave->where("type = ".$type."");
		}
		$this->slave->where("status!='2'");
		return $this->slave->count_all_results();
	}


}
