<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports_model extends Prud_Model{

	var $column_search = array('company_name' => 'company_name', 'campaign_date' => 'campaign_date', 'client_uid' => 'client_uid', 'month_date' => 'month_date');
    var $column_alias = array('company_name' => 'hs', 'campaign_date' => 'cds', 'client_uid' => 'hs', 'month_date' => 'cms'); 

	function __construct() {
		parent::__construct();
		$this->TYPE = $this->session->userdata('type');
        $this->LOGIN_ID = ($this->TYPE =='admin') ? $this->session->userdata('admin')['login_id'] : $this->session->userdata('client')['login_id'];
	}

	public function get_campaingReportList($clientId){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('hs.client_uid, hs.client_id, hs.fname, hs.lname, hs.email, hs.company_name, hm.campaign_id, hm.campaign_uid, hm.name as campaing_name, hm.status, hm.processed_at, hm.finished_at, hm.scheduled_at, hm.date_added, hm.subject, hm.campaign_domain_id, hl.name as list_name, hl.list_uid');
		$this->slave->from('hs_clients hs');
		$this->slave->join('hs_campaign as hm ','hm.client_id=hs.client_id');
		$this->slave->join('hs_list as hl ','hl.list_id=hm.list_id');
		$this->slave->where("hs.client_id = ".$clientId."");
		$this->slave->where("hs.status != '2'");
		$this->slave->order_by('hm.finished_at', 'desc');
		$this->slave->limit($length,$start);
		$this->get_datatables_query();
		$customer = $this->slave->get();
		return $customer->result();
	}


	public function count_filtered($clientId){
		$this->slave->select('hs.client_uid, hs.client_id, hs.fname, hs.lname, hs.email, hs.company_name, hm.campaign_id, hm.campaign_uid, hm.name as campaing_name, hm.status, hm.processed_at, hm.finished_at, hm.scheduled_at, hm.date_added, hm.subject, hm.campaign_domain_id, hl.name as list_name, hl.list_uid');
        $this->slave->from('hs_clients hs');
        $this->slave->join('hs_campaign as hm ','hm.client_id=hs.client_id');
        $this->slave->join('hs_list as hl ','hl.list_id=hm.list_id');
        $this->slave->where("hs.client_id = ".$clientId."");
        $this->slave->where("hs.status != '2'");
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function count_all($clientId){
		$this->slave->from('hs_clients hs');
        $this->slave->join('hs_campaign as hm ','hm.client_id=hs.client_id');
        $this->slave->join('hs_list as hl ','hl.list_id=hm.list_id');
        $this->slave->where("hs.client_id = ".$clientId."");
        $this->slave->where("hs.status != '2'");
		return $this->slave->count_all_results();
	}

	public function get_datatables_query() {
        $i = 0;
        $column_name    = isset($_POST['columns'])? $_POST['columns'] : array();
        foreach($column_name as $col) {
            $col_name = $col['data'];
            $col_value = $col['search']['value'];
            if ( $col_value != '') {
                if($i===0){
                    $this->slave->group_start();
                }
                switch($col_name) {
                    case "campaign":
                        $this->slave->like('hm.name', $col_value);
                        $this->slave->or_like('hm.campaign_uid', $col_value);
                        $this->slave->or_like('hl.list_uid', $col_value);
                        $this->slave->or_like('hl.name', $col_value);
                        break;
                     case "client":
                        $this->slave->like('hs.fname', $col_value);
                        $this->slave->or_like('hs.client_uid', $col_value);
                        break;
                     case "status":
                        $this->slave->like('hm.status', $col_value);
                        break;
                     case "finished_at":
                         $this->slave->where('date(hm.finished_at)', $col_value);
                        break;
                     case "list":
                        $this->slave->like('hl.name', $col_value);
                        $this->slave->or_like('hl.list_uid', $col_value);
                        break;
                     default :
                    }
                $i++;
            }
        }
        if($i > 0) {
            $this->slave->group_end();
        }
    }

	public function client_daily_report($clientId){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('hs.company_name, hs.client_uid, cds.campaign_date, cds.processed, cds.campaign_count, cds.delivery_success, cds.delivery_failure');
		$this->slave->from('hs_client_daily_stats as cds');
		$this->slave->join('hs_clients as hs ','hs.client_id=cds.client_id');
		$this->slave->where("hs.client_id = ".$clientId."");
		$this->slave->where("hs.status != '2'");
		$this->slave->order_by('cds.campaign_date', 'desc');
		$this->slave->limit($length,$start);
		$this->get_datatables_query_filter();
		$client = $this->slave->get();
		return $client->result();
	}

	public function client_daily_report_countAll($clientId){
		$this->slave->select('hs.company_name, hs.client_uid, cds.campaign_date, cds.processed, cds.campaign_count, cds.delivery_success, cds.delivery_failure');
		$this->slave->from('hs_client_daily_stats as cds');
		$this->slave->join('hs_clients as hs ','hs.client_id=cds.client_id');
		$this->slave->where("hs.client_id = ".$clientId."");
		$this->slave->where("hs.status != '2'");
		return $this->slave->count_all_results();
	}

	public function client_daily_report_countFilter($clientId){
		$this->slave->select('hs.company_name, hs.client_uid, cds.campaign_date, cds.processed, cds.campaign_count, cds.delivery_success, cds.delivery_failure'); 
		$this->slave->from('hs_client_daily_stats as cds');
		$this->slave->join('hs_clients as hs ','hs.client_id=cds.client_id');
		$this->slave->where("hs.client_id = ".$clientId."");
		$this->slave->where("hs.status != '2'");		
		$this->get_datatables_query_filter();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function get_datatables_query_filter()
    {
        $i = 0;
        $column_name    = isset($_POST['columns'])?$_POST['columns']:array();
        foreach($column_name as $col)
        {
            $col_name = $col['name'];
            $col_value = $col['search']['value'];
            if (in_array($col_name, $this->column_search) && $col_value != '') 
            {
                $col_database = $this->column_alias[$col_name].'.'.$this->column_search[$col_name];
                if($i===0)
                {
                    $this->slave->group_start();
                    switch($col_name)
                    {
                        case "company_name":
                            $this->slave->like("CONCAT_WS(' ',hs.company_name,hs.client_uid)", $col_value, "both");
                            break;
                        default:
                            $this->slave->like($col_database, $col_value);
                    }
                }
                else
                {
                    switch($col_name) 
                    {
                        case "company_name":
                            $this->slave->like("CONCAT_WS(' ',hs.company_name,c.client_uid)", $col_value, "both");
                            break;
                        
                        default:
                            $this->slave->like($col_database, $col_value);
                    }
                }
                $i++;
            }
        }
        if($i > 0)
        {

            $this->slave->group_end();
        }
    }


	public function client_month_report($clientId){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('hs.company_name, hs.client_uid, cms.month_date, cms.processed, cms.campaign_count, cms.delivery_success, cms.delivery_failure');
		$this->slave->from('hs_client_monthly_stats as cms');
		$this->slave->join('hs_clients as hs ','hs.client_id=cms.client_id');
		$this->slave->where("hs.client_id = ".$clientId."");
		$this->slave->where("hs.status != '2'");
		$this->slave->order_by('cms.month_date', 'desc');
		$this->slave->limit($length,$start);
		$this->get_datatables_query_filter();
		$client = $this->slave->get();
		return $client->result();
	}

	public function client_month_report_countAll($clientId){
		$this->slave->select('hs.company_name, hs.client_uid, cms.month_date, cms.processed, cms.campaign_count, cms.delivery_success, cms.delivery_failure');
		$this->slave->from('hs_client_monthly_stats as cms');
		$this->slave->join('hs_clients as hs ','hs.client_id=cms.client_id');
		$this->slave->where("hs.client_id = ".$clientId."");
		$this->slave->where("hs.status != '2'");
		return $this->slave->count_all_results();
	}

	public function client_month_report_countFilter($clientId){
		$this->slave->select('hs.company_name, hs.client_uid, cms.month_date, cms.processed, cms.campaign_count, cms.delivery_success, cms.delivery_failure');
		$this->slave->from('hs_client_monthly_stats as cms');
		$this->slave->join('hs_clients as hs ','hs.client_id=cms.client_id');
		$this->slave->where("hs.client_id = ".$clientId."");
		$this->slave->where("hs.status != '2'");
		$this->get_datatables_query_filter();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function findByCompanyUid($uid){
        $this->slave->select('company_name, client_uid');
        $this->slave->from('hs_clients');
        $this->slave->where("client_uid='".$uid."'");
        $role_arr = $this->slave->get()->row();
        return  $role_arr;
    }

	public function findByCampaignUid($uid){
        $this->slave->select('campaign_id, campaign_uid, client_id,  list_id, name, template, max_send_count, scheduled_at');
        $this->slave->from('hs_campaign');
        $this->slave->where("campaign_uid='".$uid."'");
        $this->slave->where("status != '6'");
        $role_arr = $this->slave->get()->row();
        return  $role_arr;
    }

	function report_download($post) {
        if($this->TYPE == 'client'){
        $client_id = $_SESSION['client']['login_id'];
        }else{
        $client= '0';
        }
        $subject = 'Report Download for';
        $criteria = '';
        $action         = $post['action'];
        if(isset($post['action']) && $post['action'] == 'report-export') {
            $subject.= " All Report";
        }
        if(isset($post['company_uid']))
        {
            $company_uid = $post['company_uid'];
            $company = $this->findByCompanyUid($company_uid);
            $subject.= " Company $company->company_name ($company->client_uid)";
        }
        if(isset($post['campaign_uid']))
        {
            $campaign_uid = $post['campaign_uid'];
            $campaign = $this->findByCampaignUid($campaign_uid);
            $subject.= " Campaign $campaign->name ($campaign->campaign_uid)";
        }
        if(isset($post['status_data']))
        {
            $statusId = $post['status_data'];
            $subject.= " Status $statusId";
        }
        if(isset($post['min']))
        {
            $min = $post['min'];
            $subject.= " Sent Date $min";
        }
        if(isset($post['max']))
        {
            $max = $post['max'];
            $subject.= " Sent Date $max";
        }
        $login_type = ($this->TYPE == 'client')? 1 : 0;
        $status = ($login_type == 1) ? 1 : 0;
        $extra_info = json_encode($post);
        $data = array(
                "client_id"   	=> $client_id,
                "login_id"      => $this->LOGIN_ID,
                "login_type"    => $login_type,
                "action"        => $action,
                "status"        => $status,
                "subject"       => $subject,
                "extra_info"    => $extra_info,
                "ip_address"    => $_SERVER['REMOTE_ADDR'],
                "user_agent"    => $_SERVER['HTTP_USER_AGENT'],
                );
        $last_inserted_id = $this->save('hs_client_activity_action', $data);
        if($last_inserted_id > 0) {
            $response = array (
                    "success" => 1,
                    "message" => "Record Updated Successfully"
                    );
        }
        return $response;
    }

	public function save($table_name, $data){
        if(isset($data['client_action_id'])&& $data['client_action_id'] > 0) {
            $this->master->where('client_action_id',$data['client_action_id']);
            $this->master->where('client_id',$data['client_id']);
            $this->master->update($table_name,$data);
            return true;
        }else{
            $this->master->insert($table_name,$data);
            return  $this->master->insert_id();
        }
    }

	public function get_campaign_domain($campaign_domain_id){
        $this->slave->select("domain_name");
        $this->slave->from('hs_client_domain');
        $this->slave->where("domain_id='".$campaign_domain_id."'");
        $obj = $this->slave->get();
        $dataObj = $obj->result();
        $domain_name =  isset($dataObj[0]->domain_name)?$dataObj[0]->domain_name:'';
        return $domain_name;
    }

	public function get_delivery_stats_by_campaing_id($campaign_id)
    {
        $this->slave->select('*');
        $this->slave->from('hs_campaign_delivery_stats');
        $this->slave->where('campaign_id', $campaign_id);
        $query = $this->slave->get();
        //echo $this->slave->last_query();
        $qryObj = $query->result();
        $campignWise = $campignSplit = array();
        $html = '';
        if($qryObj)
        {
                    $html .=<<<HTML
                            <table border=\'1\'>
                                <tr>
                                <th>Sent/Success/Failure</th>
                                <th>All/Unique Open</th>
                                <th>All/Unique Click</th>
                                <th>Bounce</th>
                                <th>Unsubscribe</th>
                                <th>Sent At</th>
                                </tr>

HTML;
            foreach($qryObj as $row)
            {
                $row->sidTime = $row->date_added;
                $campignWise["$row->campaign_id"]["$row->sid"] = $row;
                //if(isset($campignWise["$row->campaign_id"]["splitRow"]))
                //{
                $campignWise["$row->campaign_id"]["splitRow"][]  = $row;               
                //}

                if(isset($campignWise["$row->campaign_id"]) && isset($row->sidTime))
                {
                    $delivery_success   = empty($row->delivery_success) ? 0 : $row->delivery_success;
                    $deilivery_failure  = empty($row->delivery_failure) ? 0 : $row->delivery_failure;
                    $sent = $delivery_success + $deilivery_failure;

                    $all_opens = empty($row->all_opens) ? 0 : $row->all_opens;
                    $unique_opens = empty($row->unique_opens) ? 0 : $row->unique_opens;
                    
                    $all_clicks = empty($row->all_clicks) ? 0 : $row->all_clicks;
                    $unique_clicks = empty($row->unique_clicks) ? 0 : $row->unique_clicks;
                    
                    $bounce = empty($row->bounce) ? 0 : $row->bounce;
                    $unsubscribe = empty($row->unsubscribe) ? 0 : $row->unsubscribe;
                    $html .=<<<HTML
                                <tr>
                                    <td>$sent / $delivery_success / $deilivery_failure</td>
                                    <td>$all_opens / $unique_opens</td>
                                    <td>$all_clicks / $unique_clicks</td>
                                    <td>$bounce</td>
                                    <td>$unsubscribe</td>
                                    <td>$row->sidTime</td>
                                </tr>
HTML;
                }
    
                if(isset($campignWise["$row->campaign_id"]['processed']))
                {
                    $campignWise["$row->campaign_id"]['processed'] += $row->processed;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['processed'] = $row->processed;
                }

                if(isset($campignWise["$row->campaign_id"]['delivery_success']))
                {
                    $campignWise["$row->campaign_id"]['delivery_success'] += $row->delivery_success;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['delivery_success'] = $row->delivery_success;
                }

                if(isset($campignWise["$row->campaign_id"]['delivery_error']))
                {
                    $campignWise["$row->campaign_id"]['delivery_error'] += $row->delivery_error;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['delivery_error'] = $row->delivery_error;
                }

                if(isset($campignWise["$row->campaign_id"]['all_opens']))
                {
                    $campignWise["$row->campaign_id"]['all_opens'] += $row->all_opens;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['all_opens'] = $row->all_opens;
                }

                if(isset($campignWise["$row->campaign_id"]['unique_opens']))
                {
                    $campignWise["$row->campaign_id"]['unique_opens'] += $row->unique_opens;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['unique_opens'] = $row->unique_opens;
                }

                if(isset($campignWise["$row->campaign_id"]['all_clicks']))
                {
                    $campignWise["$row->campaign_id"]['all_clicks'] += $row->all_clicks;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['all_clicks'] = $row->all_clicks;
                }

                if(isset($campignWise["$row->campaign_id"]['unique_clicks']))
                {
                    $campignWise["$row->campaign_id"]['unique_clicks'] += $row->unique_clicks;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['unique_clicks'] = $row->unique_clicks;
                }

                if(isset($campignWise["$row->campaign_id"]['unsubscribe']))
                {
                    $campignWise["$row->campaign_id"]['unsubscribe'] += $row->unsubscribe;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['unsubscribe'] = $row->unsubscribe;
                }

                if(isset($campignWise["$row->campaign_id"]['bounce']))
                {
                    $campignWise["$row->campaign_id"]['bounce'] += $row->bounce;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['bounce'] = $row->bounce;
                }

                if(isset($campignWise["$row->campaign_id"]['hard_bounces']))
                {
                    $campignWise["$row->campaign_id"]['hard_bounces'] += $row->hard_bounces;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['hard_bounces'] = $row->hard_bounces;
                }

                if(isset($campignWise["$row->campaign_id"]['soft_bounces']))
                {
                    $campignWise["$row->campaign_id"]['soft_bounces'] += $row->soft_bounces;
                }
                else
                {
                    $campignWise["$row->campaign_id"]['soft_bounces'] = $row->soft_bounces;
                }
 
            }
                    $html .=<<<HTML
                            </table>
HTML;
        }
        $retData = array();
        $retData['campignWise'] = $campignWise;
        $retData['HTML'] = $html;
        //print_r($campignWise);
        return $retData;

    }

	public function getClientlist($adminId){
        $this->slave->select('client_id');
        $this->slave->from('hs_clients');
        $this->slave->where("admin_id='".$adminId."'");
        $role_arr = $this->slave->get()->result();
        return  $role_arr;
    }

	public function admin_get_campaingReportList($clientId){
		$length =   (isset($_POST['length']))?$_POST['length']:"";
		$start  =   (isset( $_POST['start']))?$_POST['start']:"";

		$this->slave->select('hs.client_uid, hs.client_id, hs.fname, hs.lname, hs.email, hs.company_name, hm.campaign_id, hm.campaign_uid, hm.name as campaing_name, hm.status, hm.processed_at, hm.finished_at, hm.scheduled_at, hm.date_added, hm.subject, hm.campaign_domain_id, hl.name as list_name, hl.list_uid');
		$this->slave->from('hs_clients hs');
		$this->slave->join('hs_campaign as hm ','hm.client_id=hs.client_id');
		$this->slave->join('hs_list as hl ','hl.list_id=hm.list_id');
		$this->slave->where_in('hs.client_id', $clientId, FALSE);
		$this->slave->where("hs.status != '2'");
		$this->slave->order_by('hm.finished_at', 'desc');
		$this->slave->limit($length,$start);
		$this->get_datatables_query();
		$client = $this->slave->get();
		return $client->result();
	}

	public function admin_count_filtered($clientId){
		$this->slave->select('hs.client_uid, hs.client_id, hs.fname, hs.lname, hs.email, hs.company_name, hm.campaign_id, hm.campaign_uid, hm.name as campaing_name, hm.status, hm.processed_at, hm.finished_at, hm.scheduled_at, hm.date_added, hm.subject, hm.campaign_domain_id, hl.name as list_name, hl.list_uid');
		$this->slave->from('hs_clients hs');
		$this->slave->join('hs_campaign as hm ','hm.client_id=hs.client_id');
		$this->slave->join('hs_list as hl ','hl.list_id=hm.list_id');
		$this->slave->where_in('hs.client_id', $clientId, FALSE);
		$this->slave->where("hs.status != '2'");
		$this->get_datatables_query();
		$query = $this->slave->get();
		return $query->num_rows();
	}

	public function admin_count_all($clientId){
		$this->slave->from('hs_clients hs');
		$this->slave->join('hs_campaign as hm ','hm.client_id=hs.client_id');
		$this->slave->join('hs_list as hl ','hl.list_id=hm.list_id');
		$this->slave->where_in('hs.client_id', $clientId, FALSE);
		$this->slave->where("hs.status != '2'");
		return $this->slave->count_all_results();
	}



}
