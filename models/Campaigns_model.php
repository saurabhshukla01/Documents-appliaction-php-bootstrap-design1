<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaigns_model extends Prud_Model{

	var $column_search   = array('campaign_name','list_name','status', 'client_name');
	var $column_alias    = array('campaign_name'=>'c','list_name'=>'list','status'=>'c', 'client_name'=> 'mc'); 
    var $column_database  = array('campaign_name'=>'name','list_name'=>'name','status'=>'status', 'client_name' => 'fname');
 
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
		$this->master->where('list_uid',$uid);
		$this->master->update($table_name,$data);
		return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function findByUid($list_uid){
		$this->slave->select('list_id, list_uid, name, status, data_count, date_added');
		$this->slave->from('hs_list');
		$this->slave->where("list_uid ='".$list_uid."'");
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

	public function update_client_status($table_name,$data,$uid){
		$this->master->where('list_uid',$uid);
		$this->master->update($table_name,$data);
		return ($this->master->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function get_campaignList($clientId){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('c.campaign_uid,c.name as campaign_name,c.type,c.campaign_id,c.scheduled_at,c.processed_at,c.finished_at,c.status as campaign_status,c.name,c.date_added,s.name as list_name,s.list_uid, mc.fname, mc.lname, mc.client_uid');
        $this->slave->from('hs_campaign as c');
        $this->slave->join('hs_list as s','c.list_id=s.list_id');
        $this->slave->join('hs_clients as mc','mc.client_id=c.client_id');
        $this->slave->where("c.client_id", $clientId);
        $this->slave->where("c.status!=", 6);
		$this->slave->limit($length,$start);
		$this->get_datatables_query();
		$customer = $this->slave->get();
		return $customer->result();
	}

	public function count_filtered($clientId){
		$this->slave->select('c.campaign_uid,c.name as campaign_name,c.type,c.campaign_id,c.scheduled_at,c.processed_at,c.finished_at,c.status as campaign_status,c.name,c.date_added,s.name as list_name,s.list_uid, mc.fname, mc.lname, mc.client_uid');
        $this->slave->from('hs_campaign as c');
        $this->slave->join('hs_list as s','c.list_id=s.list_id');
        $this->slave->join('hs_clients as mc','mc.client_id=c.client_id');
        $this->slave->where("c.client_id", $clientId);
        $this->slave->where("c.status!=", 6);
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function count_all($clientId){
		$this->slave->from('hs_campaign as c');
        $this->slave->join('hs_list as s','c.list_id=s.list_id');
        $this->slave->join('hs_clients as mc','mc.client_id=c.client_id');
        $this->slave->where("c.client_id", $clientId);
        $this->slave->where("c.status!=", 6);
		return $this->slave->count_all_results();
	}

	public function get_datatables_query(){
		$i = 0;
		$column_name    = isset($_POST['columns'])? $_POST['columns'] : array();
		foreach($column_name as $col){
			$col_name  = $col['data'];
			$col_value = $col['search']['value'];
			if (in_array($col_name, $this->column_search) && $col_value != '') {
				$col_database = $this->column_alias[$col_name].'.'.$this->column_database[$col_name];
				if($i===0) {
					$this->slave->group_start();
					switch($col_name) {
						case "campaign_name":
							$this->slave->like("CONCAT_WS(' ',c.name,c.campaign_uid)", $col_value, "both");
							break;
						case "list_name":
							$this->slave->like("CONCAT_WS(' ',s.list_uid,s.name)", $col_value, "both");
							break;
						case "client_name":
							$this->slave->like("CONCAT_WS(' ',mc.fname, mc.lname, mc.client_uid)", $col_value, "both");
							break;
						default:
							$this->slave->like($col_database, $col_value);
					}
				}
				else {
					switch($col_name) {
						case "campaign_name":
							$this->slave->like("CONCAT_WS(' ',c.name,c.campaign_uid)", $col_value, "both");
							break;
						case "list_name":
							$this->slave->like("CONCAT_WS(' ',s.list_uid,s.name)", $col_value, "both");
							break;
						case "client_name":
							$this->slave->like("CONCAT_WS(' ',mc.fname, mc.lname, mc.client_uid)", $col_value, "both");
							break;
						default:
							$this->slave->like($col_database, $col_value);
					}
				}
				$i++;
			}
		}
		if($i > 0){
			$this->slave->group_end();
		}
	}

	public function get_category() { 
		$this->slave->select('category_name, category_id');
		$this->slave->from('hs_category');
		$this->slave->where("parent_id", '0');
		$this->slave->order_by("category_name", "asc");
		$category_arr = $this->slave->get()->result();
		return $category_arr;
	}

	public function get_list($clientId) {
		$this->slave->select('list_id, name, list_uid, data_count');
		$this->slave->from('hs_list');
		$this->slave->where("client_id", $clientId);
		$this->slave->where("status", '1');
		$this->slave->order_by("list_id", "desc");
		$list_arr = $this->slave->get()->result();
		return $list_arr;
	}

	public function get_domain_active($clientId){
		$this->slave->select('domain_id, domain_name, reply_to, from_email');
		$this->slave->from('hs_client_domain');
		$this->slave->where("client_id='".$clientId."'");
		$this->slave->where("is_verified ='1'");
		$this->slave->where("status ='1'");
		$domain_data = $this->slave->get()->result();
		return  $domain_data;
	}

	public function generate_uid()  {
		$uniqid = uniqid();
		$exists = $this->find_by_uid($uniqid);
		if (!empty($exists)&& count($exists) < 1 ) {

			return $this->generate_uid();
		}
		return $uniqid;
	}

	public function find_by_uid($campaign_uid) {
        $this->slave->select('*');
        $this->slave->from('hs_campaign');
        $this->slave->where("campaign_uid='".$campaign_uid."'");
        $campaign_data = $this->slave->get()->row();
        return  $campaign_data;
    }

	public function insert_campaign_data($campaign_data) {
		$this->master->trans_begin();
        $this->master->insert('hs_campaign', $campaign_data);
        $campaign_id = $this->master->insert_id();
        if ($this->master->trans_status() === FALSE) {
            $this->master->trans_rollback();
            return FALSE;
        }
        else {
            $client_id=   $campaign_data['client_id'];
            $campaign_name       =   $campaign_data['name'];
            $campaign_uid        =   $campaign_data['campaign_uid'];
            $activity_list_log   = array('client_id' => $client_id, 'message' => "Campaign $campaign_name ($campaign_uid) created successfully");
            $this->master->trans_commit();
        }  
        return true;
	}


	public function find_campaign_template_by_id($campaignId) {
		$this->slave->select('*');
		$this->slave->from('hs_campaign_template');
		$this->slave->where("campaign_id='".$campaignId."'");
		return $this->slave->get()->row();
	}

	public function get_cdn_host_random() {
		$this->slave->select('cdn_host_id, client_id, tag, content, date_added, last_updated');
		$this->slave->from('hs_cdn_host');
		$this->slave->order_by('rand()');
		$this->slave->limit(1);
		$query = $this->slave->get();
		return $query->row();
	}

	public function update_campaign_template_data($data) {
		$this->master->trans_begin();
		$campaign_data = array(
				"client_id"     => $data['client_id'],
				"content"       => $data['content'],
				"plain_text"    => $data['plain_text']
				);
		$this->master->where('campaign_id', $data['campaign_id']);
		$this->master->update('hs_campaign_template', $campaign_data);
		if ($this->master->trans_status() === FALSE) {
			$this->master->trans_rollback();
			return FALSE;
		}
		else {
			$client_id           =   $data['client_id'];
			$campaign_name       =   $data['name'];
			$campaign_uid        =   $data['campaign_uid'];
			$this->master->trans_commit();
		}
		return true;
	}

	public function insert_campaign_template_data($data){
		$this->master->trans_begin();
		$campaign_data = array(
				"campaign_id"   => $data['campaign_id'],
				"content"       => $data['content'],
				"plain_text"    => $data['plain_text']
				);
		$this->master->insert('hs_campaign_template', $campaign_data);
		if ($this->master->trans_status() === FALSE) {
			$this->master->trans_rollback();
			return FALSE;
		}
		else {
			$client_id           =   $data['client_id'];
			$campaign_name       =   $data['name'];
			$campaign_uid        =   $data['campaign_uid'];
			$this->master->trans_commit();
		}
		return  $this->master->insert_id();
	}

	public function get_url_category($campaign) {
		$campaign_id    = $campaign->campaign_id;
		$this->slave->select('url_id, campaign_id, hash, destination, sub_category_id, date_added, status');
		$this->slave->from('hs_campaign_url as url');
		$this->slave->where('url.campaign_id', $campaign_id);
		$this->slave->where('url.status', '1');
		$campaign_url_data = $this->slave->get()->result();
		return  $campaign_url_data;
	}

	public function find_by_url_id($campaign) {
        $campaign_id    = $campaign->campaign_id;
        $this->slave->select('url.url_id, campaign_id, hash,destination, sub_category_id, status');
        $this->slave->from('hs_campaign_url as url');
        $this->slave->join('hs_category as c', 'url.sub_category_id = c.category_id', 'left');
        $this->slave->where('url.campaign_id', $campaign_id);
        $this->slave->where('url.status', '1');
        $campaign_url_data = $this->slave->get()->result();
        return  $campaign_url_data;
    }

	public function update_campaign_data($tablename, $data) {
		$campaign_uid   =   $data['campaign_uid'];
		$this->master->where('campaign_uid',$campaign_uid);
		$this->master->update($tablename,$data);
		return true;
	}

	public function update_url_by_campaign($data) {
		$campaign_id   =   $data['campaign_id'];
		$this->master->where('campaign_id', $campaign_id);
		$this->master->update('hs_campaign_url', $data);
	}

	public function bulk_insert_campaign_url($data) {
		$this->master->insert_batch('hs_campaign_url', $data); 
	}

	public function find_by_domain_id($domain_id) {
		$this->slave->select('domain_id, client_id, domain_name, reply_to, from_email');
		$this->slave->from('hs_client_domain');
		$this->slave->where("domain_id ='".$domain_id."'");
		$domain_data = $this->slave->get()->row();
		return  $domain_data;
	}

	public function find_campaign_template_testing_by_campaign_uid($campaign_uid) {
		$this->slave->select('*');
		$this->slave->from('hs_campaign_template_testing');
		$this->slave->where("campaign_uid='".$campaign_uid."'");
		return $this->slave->get()->row();
	}

	public function insert_campaign_template_testing_data($data){
		$this->master->insert('hs_campaign_template_testing',$data);
		return  $this->master->insert_id();
	}


	public function update_campaign_template_mail_data($data) {
		$this->master->where('campaign_uid',$data['campaign_uid']);
		$this->master->update('hs_campaign_template_testing', $data);
		return true;
	}

	public function copy_campaign($campaign_uid) {
        $campaign           = $this->find_by_uid($campaign_uid); 
        $campaign_template  = $this->Campaigns_model->find_campaign_template_by_id($campaign->campaign_id);
        $cnt                = count($campaign_template); 
        if (preg_match('/\#(\d+)$/', $campaign->name, $matches)){
            $counter = (int)$matches[1];
            $counter++;
            $campaign->name = preg_replace('/\#(\d+)$/', '#' . $counter, $campaign->name);
        } 
        else {
            $campaign->name .= ' #1';
        }
        $campaign->campaign_id      =   0;
        $campaign->campaign_uid     =   $this->generate_uid();
        $campaign->status           =   0;
        $campaign->scheduled_at     =   '0000-00-00 00:00:00';
        $campaign->processed_at     =   '0000-00-00 00:00:00';
        $campaign->finished_at      =   '0000-00-00 00:00:00';
        $campaign->date_added       =    date("Y-m-d H:i:s");
        $campaign->last_updated     =    date("Y-m-d H:i:s");  
        $campaign_data = (array) $campaign;
        $this->master->trans_begin();
        $campaign_id = $this->insert_data('hs_campaign', $campaign_data);
        if($cnt > 0) {
            $campaign_template_data = array(
                                              'campaign_id'             => $campaign_id,
                                              'content'                 => $campaign_template->content,
                                              'inline_css'              => $campaign_template->inline_css,
                                              'minify'                  => $campaign_template->minify, 
                                              'plain_text'              => $campaign_template->plain_text,
                                              'only_plain_text'         => $campaign_template->only_plain_text,
                                              'auto_plain_text'         =>  $campaign_template->auto_plain_text,
                                          );
            $this->temp_insert_data('hs_campaign_template', $campaign_template_data);
        }
        if ($this->master->trans_status() === FALSE) {
            $this->master->trans_rollback();
            return FALSE;
        }
        else {
            $this->master->trans_commit();
        }  
        return true;
    }

	public function temp_insert_data($table_name,$data){
        $this->master->insert($table_name,$data);
        return  $this->master->insert_id();
    }
	
	public function update_status($data, $campaign_data) {
		$status         = $data['status'];
		$campaign_uid   = $data['campaign_uid'];
		$this->master->where('campaign_uid', $campaign_uid);
		$this->master->update('hs_campaign', $data);
		$status_arr = $this->get_campaign_status();
		if($this->master->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function get_campaign_status() {
		$status = array(
				"0" => "Draft",
				"1" => "Pending-Sending",
				"2" => "Processing",
				"3" => "sending",
				"4" => "Sent",
				"5" => "Pause",
				"6" => "Deleted",
				"7" => "Quota-Exhaust"
				);
		return $status; 
	}

	public function delete($campaign_uid, $campaign) {
		$data['status']= '6';
		$this->master->where('campaign_uid', $campaign_uid);
		$this->master->update('hs_campaign', $data);
		if($this->master->affected_rows() > 0) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function update_data_campaign($args) {
		$data = $args['hs_campaign'];
		$campaign_uid   =   $data['campaign_uid'];
		$this->master->where('campaign_uid', $campaign_uid);
		$this->master->update('hs_campaign', $data);
		if ($this->master->trans_status() === FALSE) {
			$this->master->trans_rollback();
			return FALSE;
		}
		else {
			$client_id           =   $data['client_id'];
			$campaign_name       =   $data['name'];
			$campaign_uid        =   $data['campaign_uid'];
			$this->master->trans_commit();
		} 
		return true;
	}

	public function get_client_send_campaign($client_id) {
        $this->slave->select('*');
        $this->slave->from('hs_campaign');
        $this->slave->where('client_id', $client_id);
        $this->slave->where('status', '4');
        return $campaign_data = $this->slave->get()->result();
    }

}
