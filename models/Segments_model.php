<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Segments_model extends Prud_Model{

	function __construct() {
		parent::__construct();
	}

	public function get_list($client_id) {
        $this->slave->select("*");
        $this->slave->from('hs_list');
        $this->slave->where("client_id='".$client_id."' AND status = '1'");
        $obj = $this->slave->get()->row();
        return $obj;
    }
	
	public function get_setting_data($client_id)
	{
		$this->slave->select('*');
		$this->slave->from('hs_client_setting');
		$this->slave->where("client_id", $client_id);
		$obj = $this->slave->get()->row();
		return $obj;
	}

	public function create_segment($args)
    {
        if(isset($args['NAME']) && isset($args['CLIENT']->client_id))
        {
            $retData = $this->chk_segment_name(array("SEGMENTNAME" => $args['NAME'], "CLIENTID" => $args['CLIENT']->client_id));
            if($retData)
            {
                $data = array("SUCCESS" => 0, "MSG" => 'Segment name already exist.');
                return $data;
            }
        }
        $list_uid= uniqid();
        $retData = $this->get_insert_data($args);
        $args['URL'] = empty($retData['ARGS']['URL']) ? $args['URL'] : $retData['ARGS']['URL'];  
        $filterBy = $retData['FILTERBY'];
        $segment_data = array(
                "name"           => $args['NAME'],
                "criteria"       => $args['URL'],
                "list_uid"    	 => $list_uid,
                "client_id"    	 => $args['CLIENT']->client_id,
                "data_count"     => $args['TOTALRECORDS'],
                "extra_info"     => json_encode($filterBy),
                "type"           => '2',
                "upload_status"  => '2'
                );
        $this->master->insert('hs_list', $segment_data);
        $data = array("SUCCESS" => 1, "MSG" => 'Succesfully Added');
        return $data;
    }

	public function category_combo()
    {
        $this->slave->select('*');
        $this->slave->from('hs_category');
        $this->slave->order_by('category_name', 'asc');
        $data = $this->slave->get();
        
        $dataObj = $data->result();
        $allCatData = array();
        if($dataObj)
        {
            $getPrName = array();
            foreach($dataObj as $row)
            {
                if($row->category_id)
                {
                    $getPrName[$row->category_id] = $row;
                }
            }

            foreach($dataObj as $row)
            {
                $row->parent_type = 'yes';
                $catName = $row->category_name;
                if($row->parent_id == 0)
                {
                    $row->parent_type = 'blank';
                }
                
                if($row->parent_id == 0 && $row->parent_type == 'blank')
                {
                    $allCatData[$row->category_name][] = array('ID' => $row->category_id, 'NAME' => $catName, 'PARENT' => $row->parent_id, 'PARENTTYPE' => $row->parent_type);
                }
                else
                {
                    if($row->parent_type == 'yes')
                    {
                        $allCatData[$getPrName[$row->parent_id]->category_name][] = array('ID' => $row->category_id, 'NAME' => $catName, 'PARENT' => $row->parent_id, 'PARENTTYPE' => $row->parent_type);
                    }
                }
                
            }
        }
        ksort($allCatData);
        $option = '';
        foreach($allCatData as $key => $value)
        {
            $option .=<<<HTML
                            <option>$key</option>
HTML;
            foreach($value as $innerRow)
            {
                if($innerRow['PARENTTYPE'] == 'yes')
                {
                    $name = $innerRow['NAME'];
                    $option .=<<<HTML
                            <option value="$name">&nbsp;&nbsp;&nbsp;&nbsp;$name</option>
HTML;
                }
            }
        }
        $catData = array();
        
            $retData = array();
            $retData['OPTION'] = $option;
            return $retData;
        
    }

	public function get_location()
    {
        $location = array('Mumbai','Delhi','Bangalore','Hyderabad','Ahmedabad','Chennai','Kolkata','Surat','Pune','Jaipur','Lucknow','Kanpur','Nagpur','Visakhapatnam','Indore','Thane','Bhopal','Patna','Vadodara','Ghaziabad');
        return $location;
    }

    public function domain_combo($client_id)
    {
        $this->slave->select('distinct(domain_name)');
        $this->slave->from('hs_client_domain');
        $this->slave->where("client_id", $client_id);
        $obj = $this->slave->get()->result();
        $option = '';
        if($obj)
        {
           foreach($obj as $row)
            {
                $domain_name = $row->domain_name;
                $domain_name_lower = strtolower($domain_name);
                $option .=<<<HTML
                                <option value="$domain_name_lower">$domain_name</option>
HTML;
            } 
        }
        return $option;
    }

	public function get_device()
    {
        $device = array('Android','iPhone','Wap');
        return $device;
    }

	public function getSearchParam($list_uid)
    {
        $qryParama = array();
        $this->slave->select('criteria, list_uid, extra_info');
        $this->slave->from('hs_list');
        $this->slave->where("list_uid= '$list_uid'");
        $data = $this->slave->get()->row();
        if(isset($data->criteria))
        {
            $qryParama = $this->parseSearchParam($data->criteria);
        }
        $retData = array();
        $retData['QRYPARAM'] = $qryParama;
        $retData['DATA'] = $data;
        return $retData;
 
    }

	public function parseSearchParam($criteria)
    {
        $retData = array();
        $allSearchParam = explode('&', $criteria);
        if($allSearchParam)
        {
            foreach($allSearchParam as $row)
            {
                if (preg_match("/fq=(.*)/", $row, $matches))
                {
                    $fqSplit = explode('AND', $matches[1]);
                    if($fqSplit)
                    {
                        foreach($fqSplit as $fqRow)
                        {
                            $fqRow = trim($fqRow);
                            $fqRow = str_replace("+"," ",$fqRow);
                            if(preg_match("/category/",$fqRow))
                            {
                                $fqRow = str_replace("(","","$fqRow");
                                $fqRow = str_replace(")","","$fqRow");
                                $fqRow = str_replace("category:","","$fqRow");
                                $fqRowSplit = explode('OR', $fqRow);
                                $catData = array();
                                foreach($fqRowSplit as $fqRowInner)
                                {
                                    $fqRowInner = trim($fqRowInner);
                                    array_push($catData, $fqRowInner);
                                }
                                $catJoin = implode("','", $catData);
                                //$catJoin = "'".$catJoin."'";
                                $retData['CATJOIN'] = $catJoin;
                                $retData['CAT'] = $catData;
                            }
                            if(preg_match("/location/",$fqRow))
                            {
                                $fqRow = str_replace("(","","$fqRow");
                                $fqRow = str_replace(")","","$fqRow");
                                $fqRow = str_replace("location:","","$fqRow");
                                $fqRowSplit = explode('OR', $fqRow);
                                $locData = array();
                                foreach($fqRowSplit as $fqRowInner)
                                {
                                    $fqRowInner = trim($fqRowInner);
                                    array_push($locData, $fqRowInner);
                                }
                                $locJoin = implode("','", $locData);
                                //$locJoin = "'".$locJoin."'";
                                $retData['LOCJOIN'] = $locJoin;
                                $retData['LOC'] = $locData;
                            }
                            if(preg_match("/campaign_id/",$fqRow))
                            {
                                $fqRow = str_replace("(","","$fqRow");
                                $fqRow = str_replace(")","","$fqRow");
                                $fqRow = str_replace("campaign_id:","","$fqRow");
                                $fqRowSplit = explode('OR', $fqRow);
                                $campaignData = array();
                                foreach($fqRowSplit as $fqRowInner)
                                {
                                    $fqRowInner = trim($fqRowInner);
                                    array_push($campaignData, $fqRowInner);
                                }
                                $campaignJoin = implode("','", $campaignData);
                                $retData['CAMPAIGNJOIN'] = $campaignJoin;
                                $retData['CAMPAIGN'] = $campaignData;
                            }
                            if(preg_match("/sender_domain/",$fqRow))
                            {
                                $fqRow = str_replace("(","","$fqRow");
                                $fqRow = str_replace(")","","$fqRow");
                                $fqRow = str_replace("sender_domain:","","$fqRow");
                                $fqRowSplit = explode('OR', $fqRow);
                                $domainData = array();
                                foreach($fqRowSplit as $fqRowInner)
                                {
                                    $fqRowInner = trim($fqRowInner);
                                    array_push($domainData, $fqRowInner);
                                }
                                $domainJoin = implode("','", $domainData);
                                //$locJoin = "'".$locJoin."'";
                                $retData['DOMAINJOIN'] = $domainJoin;
                                $retData['DOMAIN'] = $domainData;
                            }
                            if(preg_match("/device/",$fqRow))
                            {
                                $fqRow = str_replace("(","","$fqRow");
                                $fqRow = str_replace(")","","$fqRow");
                                $fqRow = str_replace("device:","","$fqRow");
                                $fqRowSplit = explode('OR', $fqRow);
                                $deviceData = array();
                                foreach($fqRowSplit as $fqRowInner)
                                {
                                    $fqRowInner = trim($fqRowInner);
                                    array_push($deviceData, $fqRowInner);
                                }
                                $deviceJoin = implode("','", $deviceData);
            
                                $retData['DEVICEJOIN'] = $deviceJoin;
                                $retData['DEVICE'] = $deviceData;
                            }
                            if(preg_match("/\bcreated\b/",$fqRow))
                            {
                                $fqRow = str_replace("created:","","$fqRow");
                                $fqRow = str_replace("([","","$fqRow");
                                $fqRow = str_replace("])","","$fqRow");
                                $fqRowSplit = explode('TO', $fqRow);
                                $retData['OLDCREATED'] = $fqRowSplit[0];
                                if(isset($fqRowSplit[1]))
                                {
                                    $retData['NEWCREATED'] = $fqRowSplit[1];
                                }
                            }
                            if(preg_match("/\bclicked\b/",$fqRow))
                            {
                                $fqRow = str_replace("clicked:","","$fqRow");
                                $fqRow = str_replace("([","","$fqRow");
                                $fqRow = str_replace("])","","$fqRow");
                                $fqRowSplit = explode('TO', $fqRow);
                                $retData['OLDCLICKED'] = $fqRowSplit[0];
                                if(isset($fqRowSplit[1]))
                                { 
                                    $retData['NEWCLICKED'] = $fqRowSplit[1];
                                }
                            }
                            if(preg_match("/\bviewed\b/",$fqRow))
                            {
                                $fqRow = str_replace("viewed:","","$fqRow");
                                $fqRow = str_replace("([","","$fqRow");
                                $fqRow = str_replace("])","","$fqRow");
                                $fqRowSplit = explode('TO', $fqRow);
                                $retData['OLDVIEWED'] = $fqRowSplit[0];
                                if(isset($fqRowSplit[1]))
                                {
                                    $retData['NEWVIEWED'] = $fqRowSplit[1];
                                }
                            }

                        }
                    }
                }
                if (preg_match("/\bq\b=(.*)/", $row, $matches))
                {
                    $retData['KEYWORD'] = $matches[1];
                }
                if (preg_match("/\brows\b=(.*)/", $row, $matches))
                {
                    $retData['ROWS'] = $matches[1];
                }
                if (preg_match("/\bstart\b=(.*)/", $row, $matches))
                {
                    $retData['START'] = $matches[1];
                }
        
            }
        }
        return $retData; 
    }
	
	public function get_dataTable($args)
    { 
        $this->config->load('custom_config');
        $qryParam = $retData = array();
        $page_count = $this->config->item('PAGE_COUNT');
    
        $hrsChecked = $dateChecked = '';
        $chkRadioBtn = 1;
        if(isset($args['HRSCHECKED']) && $args['HRSCHECKED'])
        {
            $hrsChecked = $args['HRSCHECKED'];
        }
        if(isset($args['DATECHECKED']) && $args['DATECHECKED'])
        {
            $dateChecked = $args['DATECHECKED'];
        }
        if((isset($args['list_uid']) && $args['list_uid']) && (empty($args['UPDT'])))
        {
            $retData = $this->getSearchParam($args['list_uid']);
            $qryParam = $retData['QRYPARAM'];
            if(isset($qryParam['CAT']) && $qryParam['CAT'])
            {
                $args['CAT'] = $qryParam['CAT'];
            }
            if(isset($qryParam['LOC']) && $qryParam['LOC'])
            {
                $args['LOC'] = $qryParam['LOC'];
            }
            if(isset($qryParam['DOMAIN']) && $qryParam['DOMAIN'])
            {
                $args['DOMAIN'] = $qryParam['DOMAIN'];
            }
            if(isset($qryParam['CAMPAIGN']) && $qryParam['CAMPAIGN'])
            {
                $args['CAMPAIGN'] = $qryParam['CAMPAIGN'];
            }
            if(isset($qryParam['DEVICE']) && $qryParam['DEVICE'])
            {
                $args['DEVICE'] = $qryParam['DEVICE'];
            }
            if(isset($qryParam['KEYWORD']) && $qryParam['KEYWORD'])
            {
                $args['keyWord'] = $qryParam['KEYWORD'];
            }
            
        }
        $currTime = date('Y-m-d H:i:s');
        $currTime = strtotime($currTime);
        $start  =   (isset( $_POST['start']))?$_POST['start']:"0";
        $fqChk = 0;

        $SOLR_HOST = $this->config->item('SOLR_HOST');

        $CORE = $args['CLIENT_UID']; 
        $url  = $SOLR_HOST.'/solr/'.$CORE.'/select?';
        $urlFORDB = $url;
        $mainUrl  = $SOLR_HOST.'/solr/'.$CORE.'/select?';
        $filterQry = 'fq=';
        $saveQryInDB = 'fq=';
        if(isset($args['CAT']) && $args['CAT'])
        {
            $fqChk = 1;
            $filterQry .= $this->mltipleData(array('FILTERNAME' => 'category', 'DATA' => $args['CAT']));
            $saveQryInDB .= $this->mltipleData(array('FILTERNAME' => 'category', 'DATA' => $args['CAT']));
            
        }
        if(isset($args['LOC']) && $args['LOC'])
        {
            $fqChk = 1;
            $filterQry .= $this->mltipleData(array('FILTERNAME' => 'location', 'DATA' => $args['LOC']));
            $saveQryInDB .= $this->mltipleData(array('FILTERNAME' => 'location', 'DATA' => $args['LOC']));
            
        }
        if(isset($args['DOMAIN']) && $args['DOMAIN'])
        {
            $fqChk = 1;
            $filterQry .= $this->mltipleData(array('FILTERNAME' => 'sender_domain', 'DATA' => $args['DOMAIN']));
            $saveQryInDB .= $this->mltipleData(array('FILTERNAME' => 'sender_domain', 'DATA' => $args['DOMAIN']));

        }    
        if(isset($args['DEVICE']) && $args['DEVICE'])
        {
            $fqChk = 1;
            $filterQry .= $this->mltipleData(array('FILTERNAME' => 'device', 'DATA' => $args['DEVICE']));
            $saveQryInDB .= $this->mltipleData(array('FILTERNAME' => 'device', 'DATA' => $args['DEVICE']));
            
        }
        if(isset($args['CAMPAIGN']) && $args['CAMPAIGN'])
        {
            $fqChk = 1;
            $filterQry .= $this->mltipleData(array('FILTERNAME' => 'campaign_id', 'DATA' => $args['CAMPAIGN']));
            $saveQryInDB .= $this->mltipleData(array('FILTERNAME' => 'campaign_id', 'DATA' => $args['CAMPAIGN']));

        }
        
        if(isset($args['EXTRAINFO']) && $args['EXTRAINFO'])
        {
            $extrainfo_decode = json_decode($args['EXTRAINFO']); 
            
            if(isset($extrainfo_decode->duration_created_min) && isset($extrainfo_decode->duration_created_max))
            {
                $args['CREATED'] = $extrainfo_decode->duration_created_min.';'.$extrainfo_decode->duration_created_max;
            }

            if(isset($extrainfo_decode->days_open_min) && isset($extrainfo_decode->days_open_max))
            {
                $args['VIEWED'] = $extrainfo_decode->days_open_min.';'.$extrainfo_decode->days_open_max;
            }
            if(isset($extrainfo_decode->days_click_min) && isset($extrainfo_decode->days_click_max))
            {
                $args['CLICKED'] = $extrainfo_decode->days_click_min.';'.$extrainfo_decode->days_click_max;
            }
            
            if(isset($extrainfo_decode->hours_open_min) && isset($extrainfo_decode->hours_open_max))
            {
                $args['VIEWED_HRS'] = $extrainfo_decode->hours_open_min.';'.$extrainfo_decode->hours_open_max;
            }
            if(isset($extrainfo_decode->hours_click_min) && isset($extrainfo_decode->hours_click_max))
            {
                $args['CLICKED_HRS'] = $extrainfo_decode->hours_click_min.';'.$extrainfo_decode->hours_click_max;
            }
        }
        if(isset($args['CREATED']))
        {
            $fqChk = 1;
            $retData = $this->get_date_diff($args['CREATED'], 'created', 'days');
            $toCreated = $retData['TODATE'];
            $fromCreated = $retData['PREVIOUSDATE'];
            if($fromCreated && $toCreated)
            {
                $chkRadioBtn = 0;
                $filterQry .= "(created:[$fromCreated+TO+$toCreated])". "AND";
            }
            $saveQryInDB .= '';
        }

        if(isset($args['VIEWED']))
        {
            $fqChk = 1;
            $retData = $this->get_date_diff($args['VIEWED'], 'viewed', 'days');
            $toViewed = $retData['TODATE'];
            $fromViewed = $retData['PREVIOUSDATE'];
            if($fromViewed && $toViewed)
            {
                $chkRadioBtn = 0;
                $filterQry .= "(viewed:[$fromViewed+TO+$toViewed])". "AND";
            }
            $saveQryInDB .= '';
        }

        if(isset($args['CLICKED']))
        {
            $fqChk = 1;
            $retData = $this->get_date_diff($args['CLICKED'], 'clicked', 'days');
            $toClicked = $retData['TODATE'];
            $fromClicked = $retData['PREVIOUSDATE'];
            if($fromClicked && $toClicked)
            {
                $chkRadioBtn = 0;
                $filterQry .= "(clicked:[$fromClicked+TO+$toClicked])". "AND";
            }
            $saveQryInDB .= '';
        }
    
        if(isset($args['VIEWED_HRS']))
        {
            $fqChk = 1;
            $retData = $this->get_date_diff($args['VIEWED_HRS'], 'viewed_time', 'minute');
            $toViewed_time = $retData['TODATE'];
            $fromViewed_time = $retData['PREVIOUSDATE'];
            if($fromViewed_time || $toViewed_time)
            {
                $chkRadioBtn = 0;
                $filterQry .= "(viewed_time:[$fromViewed_time+TO+$toViewed_time])". "AND";
            }
            $saveQryInDB .= '';
        }

        if(isset($args['CLICKED_HRS']))
        {
            $fqChk = 1;
            $retData = $this->get_date_diff($args['CLICKED_HRS'], 'clicked_time', 'minute');
            $toClicked_time = $retData['TODATE'];
            $fromClicked_time = $retData['PREVIOUSDATE'];
            if($fromClicked_time || $toClicked_time)
            {
                $chkRadioBtn = 0;
                $filterQry .= "(clicked_time:[$fromClicked_time+TO+$toClicked_time])". "AND";
            }
            $saveQryInDB .= '';
        }

        

        if(isset($args['CRITERIA']) && $args['CRITERIA'])
        {
            $args['PRECRITERIA'] = $args['CRITERIA'];
        }
        if((isset($args['LISTTYPE']) && $args['LISTTYPE'] == 1) && (isset($args['PRECRITERIA']) && $args['PRECRITERIA']))
        {
            $preCriteria = $args['PRECRITERIA'];
            preg_match('/.*=(.*?)&.*/', $preCriteria, $matchData);
            $newSourceCriteria = $matchData[1];
            if(preg_match("/source/",$newSourceCriteria))
            {
                $fqChk = 1;
                $newSourceCriteria = preg_replace('/\s+/','+',$newSourceCriteria);
                $filterQry .= "($newSourceCriteria)";
                $saveQryInDB .= "($newSourceCriteria)";
            }
        }
        else if(isset($args['PRECRITERIA']) && $args['PRECRITERIA'])
        {
            $preCriteria = $args['PRECRITERIA'];
            $preCriteria = explode('&rows',$preCriteria);
            preg_match('/.*=(.*?)&.*/', $preCriteria[0], $matchData);
            if(isset($matchData) && count($matchData)){
                $newSourceCriteria = $matchData[1];
                if(preg_match("/source/",$newSourceCriteria))
                {
                    $fqChk = 1;
                    $newSourceCriteria = preg_replace('/\s+/','+',$newSourceCriteria);
                    preg_match('/.*source:(.*)/', $newSourceCriteria, $getOnlySourceVal);
                    if(isset($getOnlySourceVal) && count($getOnlySourceVal))
                    {
                        $getOnlySourceVal[1] = preg_replace('/\)/','', $getOnlySourceVal[1]);
                        $filterQry .= "(source:$getOnlySourceVal[1])";
                        $saveQryInDB .= "(source:$getOnlySourceVal[1])";
                    }
                    else
                    {
                        $filterQry .= "($newSourceCriteria)";
                        $saveQryInDB .= "($newSourceCriteria)";
                    }
                }
            }
        }
        $textParam = '';
        if(isset($args['keyWord']) && $args['keyWord'] && preg_match("/[a-zA-Z0-9]/", $args['keyWord']))
        {
            $keyWords = preg_split('/\s+/', $args['keyWord']);          
            $keyWords = implode('""', $keyWords);
            #$keyWords = str_replace('"','',$keyWords);          
            $keyWords = preg_replace('/^"|"$/','',$keyWords);
            $keyWords = '"'.$keyWords.'"';
            $textParam = "&q=".$keyWords."";
        }
        else    
        {
            $textParam = "&q=*:*";
        }
        if($fqChk)
        {
            $url .= $filterQry;
            $urlFORDB .= $saveQryInDB;
        }
        $url .= $textParam;
        $urlFORDB .= $textParam;
        
        $url .= "&rows=".$page_count."&start=".$start;
        $urlFORDB .= "&rows=".$page_count."&start=".$start;
        
        $url = str_replace("AND&","&","$url");
        $urlFORDB = str_replace("AND&","&","$urlFORDB");
        $header = array(
                "Content-Type: text/json",
                );
        if(0)
        {
            if(isset($args['CRITERIA']) && $args['CRITERIA'])
            {
                $args['CRITERIA'] = preg_replace('/\s+/','+',$args['CRITERIA']);
                $url = $mainUrl.$args['CRITERIA'];
                $url .= "&rows=".$page_count."&start=".$start;
                $urlFORDB .= "&rows=".$page_count."&start=".$start;
            }
        }
        //print "$url";die();
        //print "$urlFORDB";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        $response = curl_exec($ch);
        curl_close($ch);
        $retData = array("RESPONSE" => $response, "URL" => $url, "URLFORDB" => $urlFORDB);
        return $retData;
    }

	public function make_hidden_email($email)
	{
		if($email)
		{
			$email_split = explode('@', $email);
			if(isset($email_split[0]) && isset($email_split[1]))
			{
				$email_mdfy = preg_replace('/[[:print:]]|[[:^print:]]/', 'x', $email_split[0]);
				return "$email_mdfy".'@'.$email_split[1];
			}
		}
	}

	public function update_segment($args, $segmentUID)
    {
        $retData = $this->get_insert_data($args);
        $args['URL'] = empty($retData['ARGS']['URL']) ? $args['URL'] : $retData['ARGS']['URL'];
        $filterBy = json_encode($retData['FILTERBY']);
        $segment_data = array(
                "criteria"       => $args['URL'],
                "data_count"     => $args['TOTALRECORDS']
                );
        if($filterBy)
        {
            $segment_data["extra_info"] = $filterBy;
        }
        $this->master->where("list_uid", $segmentUID);
        $sts = $this->master->update('hs_list', $segment_data);
        $data = array("SUCCESS" => 1, "MSG" => 'Successfully Updated');
        return $data;
    }

	public function chk_segment_name($args)
    {
        $name = $args['SEGMENTNAME'];
        $name = trim($name);
        $name = preg_replace("/[[:blank:]]+/"," ",$name);
        $this->slave->select('*');
        $this->slave->from('hs_list');
        $this->slave->where("name = '".$name."'");
        $this->slave->where("client_id= '".$args['CLIENTID']."'");
        $obj = $this->slave->get()->row();
        if($obj)
        {
            return 1;
        }
        return 0;
    }

	public function get_insert_data($args)
    {
        $retData = array();
        $filterBy = $extrainfo = array();
        $listType = 2;
        $sourceCriteria = $newSourceCriteria = '';
        $chkFilterBy = 0;
        if(isset($args['CRITERIA']) && isset($args['CRITERIA']['CREATED']))
        {
            list($minCreated, $maxCreated) = $this->duration_split(array('STATS' => $args['CRITERIA']['CREATED']));
            $filterBy['duration_created_min'] = $minCreated;
            $filterBy['duration_created_max'] = $maxCreated;
            
        }
            
        if(isset($args['CRITERIA']) && isset($args['CRITERIA']['VIEWED']))
        {
            list($minViewed, $maxViewed) = $this->duration_split(array('STATS' => $args['CRITERIA']['VIEWED']));
            $filterBy['days_open_min'] = $minViewed;
            $filterBy['days_open_max'] = $maxViewed;
        }

        if(isset($args['CRITERIA']) && isset($args['CRITERIA']['CLICKED']))
        {
            list($minClicked, $maxClicked) = $this->duration_split(array('STATS' => $args['CRITERIA']['CLICKED']));
            $filterBy['days_click_min'] = $minClicked;
            $filterBy['days_click_max'] = $maxClicked;
        }

        if(isset($args['CRITERIA']) && isset($args['CRITERIA']['VIEWED_HRS']))
        {
            list($minViewed_Hrs, $maxViewed_Hrs) = $this->duration_split(array('STATS' => $args['CRITERIA']['VIEWED_HRS']));
            $filterBy['hours_open_min'] = $minViewed_Hrs;
            $filterBy['hours_open_max'] = $maxViewed_Hrs;
        }

        if(isset($args['CRITERIA']) && isset($args['CRITERIA']['CLICKED_HRS']))
        {
            list($minClicked_Hrs, $maxClicked_Hrs) = $this->duration_split(array('STATS' => $args['CRITERIA']['CLICKED_HRS']));
            $filterBy['hours_click_min'] = $minClicked_Hrs;
            $filterBy['hours_click_max'] = $maxClicked_Hrs;
        }
        
        
        if(isset($args['LISTARGS']) && $args['LISTARGS'])
        {
            if(isset($args['LISTARGS']['LISTTYPE']))
            {
                $listType = $args['LISTARGS']['LISTTYPE'];
            }
            if(isset($args['LISTARGS']['PRECRITERIA']))
            {
                if(!preg_match("/source:/",$args['URL']))
                {
                $sourceCriteria = $args['LISTARGS']['PRECRITERIA'];
                preg_match('/.*=(.*?)&.*/', $sourceCriteria, $matchData);
                if(count($matchData) >= 1 )
                {
                    if(isset($matchData[1]))
                    {
                        $newSourceCriteria = $matchData[1];
                        if(preg_match("/source/",$newSourceCriteria))
                        {
                            $args['URL'] = $this->get_new_criteria(array('EXISTCRITERIA' => $args['URL'], 'NEWSOURCE' => $newSourceCriteria, "CHKFILTERBY" => $chkFilterBy));
                        }
                    }
                }
                }

            }
        }
        $retData['ARGS'] = $args;
        $retData['FILTERBY'] = $filterBy;
        return $retData;
    }

	public function get_date_diff($getDateChunk, $sliderName, $diffFrom)
    {
        $retData = array();
        $retData['PREVIOUSDATE'] = 0;
        $retData['TODATE'] = 0;
        list($date_to,$date_from) = explode(';', $getDateChunk);
        if($date_to || $date_from)
        {
            if($diffFrom == 'days')
            {
                if($date_to > 0) $date_to--;
                if($date_from > 0) $date_from--;
                $date_to = strtotime(date('Y-m-d', strtotime("-$date_to $diffFrom"))." 23:59:59");
                $date_from =  strtotime(date('Y-m-d', strtotime("-$date_from $diffFrom"))." 00:00:00");
            }
            else if($diffFrom == 'minute')
            {
                list($date_to,$date_from) = array($date_from,$date_to);
            }
        }
        $retData['PREVIOUSDATE'] = $date_from;
        $retData['TODATE'] = $date_to;
        return $retData;
    }	

	public function duration_split($args)
    {
            list($min, $max) = explode(';', $args['STATS']);
            return array($min, $max);
    }

	public function mltipleData($args)
    {
        $returnData = "";
        $dataSplit = $args['DATA'];
        if($dataSplit)
        {
            $returnData .= "(";
            foreach($dataSplit as $eachData)
            {
                $eachData = '"'.$eachData.'"';
                $eachData = preg_replace('/\s+/','+',$eachData);
                $eachData = preg_replace('/"+/','"',$eachData);
                $returnData .= "".$args['FILTERNAME'].":".$eachData. "+OR+";
            }
            $returnData = rtrim($returnData,"+OR+");
            $returnData .= ")";
            $returnData .= "AND";
        }
        return $returnData;
    }

	public function get_list_by_client_listuid($client_id, $list_uid) {
        $this->slave->select("*");
        $this->slave->from('hs_list');
        $this->slave->where("client_id='".$client_id."' AND list_uid = '".$list_uid."' AND status = '1'");
        $obj = $this->slave->get()->row();
        return $obj;
    }

	public function get_client_setting($client_id) {
        $this->slave->select("*");
        $this->slave->from('hs_client_setting');
        $this->slave->where("client_id='".$client_id."'");
        $obj = $this->slave->get()->row();
        return $obj;
    }



}
