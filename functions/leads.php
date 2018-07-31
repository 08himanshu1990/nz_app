<?php
class leads{
	public $app_db;
	
	function leads($db){
		$this->app_db = $db;
	}
	
	
	function leadPage(){
			$leads = $this->app_db->GetResults("select * from lead_general where LeadStatus='Active' order by Surname");
			$title = 'Leads';
			include('templates/header.php');
			include('templates/lead_page.php');
			include('templates/footer.php');
	}
	
	function createLead(){
		$json = array();
		if(isset($_POST['surname'])){
			$lead_fields = array('CreateDate','Surname','FirstName','Address','Suburb','City','Country','Postcode','PhoneNumber','MobileNumber','Email','LeadSource','LeadStatus','ProjectType1','ProjectType2','Designer','LeadUpdate','DateAppt1','DateAppt2','DateAppt3','DateAppt4','CheckDate');
			$lead_values = array($this->changeToSysDate($_POST['create_date']),$_POST['surname'],$_POST['first_name'],$_POST['address'],$_POST['suburb'],$_POST['city'],$_POST['country'],$_POST['postcode'],$_POST['phone'],$_POST['mobile'],$_POST['email'],$_POST['lead_source'],$_POST['status'],$this->changeToSysDate($_POST['project_type_1']),$this->changeToSysDate($_POST['project_type_2']),$_POST['designer'],$this->app_db->mssql_real_escape_string($_POST['lead_update']),$this->changeToSysDate($_POST['date_appt_1']),$_POST['date_appt_2'],$_POST['date_appt_3'],$_POST['date_appt_4'],$this->changeToSysDate($_POST['check_date']));
			
			$this->app_db->Insert('lead_general',$lead_fields,$lead_values,'LeadId');
			$json['submit_suc'] = 'Submitted';
		}
		
		echo json_encode($json);
		exit();
	}
	
	function changeToSysDate($date){
		
		return date('Y-m-d',strtotime(str_replace('-','/',$date)));
	}
	
	function changeToPageDate($date){
		
		return date('m-d-Y',strtotime($date));
	}
	
	function getLeadInfo(){
		$lead_info = $this->app_db->GetRow("select * from lead_general where LeadId=".$_POST['leadId']);
		
		$json = array(
			'surname'		=> $lead_info['Surname'],
			'createdate'	=> $lead_info['CreateDate']->format('m-d-Y'),
			'firstname'		=> $lead_info['FirstName'],
			'address'		=> $lead_info['Address'],
			'suburb'		=> $lead_info['Suburb'],
			'city'			=> $lead_info['City'],
			'country'		=> $lead_info['Country'],
			'postcode'		=> $lead_info['Postcode'],
			'phonenumber'	=> $lead_info['PhoneNumber'],
			'mobilenumber'	=> $lead_info['MobileNumber'],
			'email'			=> $lead_info['Email'],
			'leadsource'	=> $lead_info['LeadSource'],
			'leadstatus'	=> $lead_info['LeadStatus'],
			'projecttype1'	=> $this->changeToPageDate($lead_info['ProjectType1']),
			'projecttype2'	=> $this->changeToPageDate($lead_info['ProjectType2']),
			'designer'		=> $lead_info['Designer'],
			'leadupdate'	=> $this->app_db->mssql_real_escape_string_restore($lead_info['LeadUpdate']),
			'dateappt1'		=> $lead_info['DateAppt1']->format('m-d-Y'),
			'dateappt2'		=> $lead_info['DateAppt2'],
			'dateappt3'		=> $lead_info['DateAppt3'],
			'dateappt4'		=> $lead_info['DateAppt4'],
			'checkdate'		=> $lead_info['CheckDate']->format('m-d-Y'),
			'leadid'		=> $lead_info['LeadId']
		);
		
		echo json_encode($json);
		exit();
	}
	
	function saveLead(){
		$json = array();
		if(isset($_POST['surname'])){
			$this->app_db->Query("update lead_general set CreateDate='".$this->changeToSysDate($_POST['create_date'])."',Surname='".$_POST['surname']."',FirstName='".$_POST['first_name']."',Address='".$_POST['address']."',Suburb='".$_POST['suburb']."',City='".$_POST['city']."',Country='".$_POST['country']."',Postcode='".$_POST['postcode']."',PhoneNumber='".$_POST['phone']."',MobileNumber='".$_POST['mobile']."',Email='".$_POST['email']."',LeadSource='".$_POST['lead_source']."',LeadStatus='".$_POST['status']."',ProjectType1='".$this->changeToSysDate($_POST['project_type_1'])."',ProjectType2='".$this->changeToSysDate($_POST['project_type_2'])."',Designer='".$_POST['designer']."',LeadUpdate='".$this->app_db->mssql_real_escape_string($_POST['lead_update'])."',DateAppt1='".$this->changeToSysDate($_POST['date_appt_1'])."',DateAppt2='".$_POST['date_appt_2']."',DateAppt3='".$_POST['date_appt_3']."',DateAppt4='".$_POST['date_appt_4']."',CheckDate='".$this->changeToSysDate($_POST['check_date'])."' where LeadId=".$_POST['current_lead_id']);
			
			$json['submit_suc'] = 'Submitted';
		}
		
		echo json_encode($json);
		exit();
	}
	
	function searchLead(){
		$query = 'select * from lead_general';
		
		$query .= ' where'; 
		if($_POST['text']!=''){
			$query .= " (Surname like '%".$_POST['text']."%' or FirstName like '%".$_POST['text']."%' or Address like '%".$_POST['text']."%' or City like '%".$_POST['text']."%' or Suburb like '%".$_POST['text']."%' or LeadSource like '%".$_POST['text']."%' or LeadStatus like '%".$_POST['text']."%') and";
		}
		
		$query .= " LeadStatus='".$_POST['status']."'";
		
		if($_POST['order']=='Z-A'){
			$query .= " order by Surname desc";
		}else{
			$query .= " order by Surname asc";
		}
		
		$leads = $this->app_db->GetResults($query);
		
		$html = '';
		
		foreach($leads as $lead){
			$html .= "<li class='nav-item'>
                                            <a class='nav-link active' href='javascript:void();' onClick='loadLead(".$lead['LeadId'].");' >
                                                <span class='text-uppercase'>".$lead['Surname']."</span> ".$lead['FirstName']."</a>
                                        </li>";
		}
		
		if(count($leads)==0){
			$html .= "<li class='nav-item'>
                                            <a class='nav-link active' href='javascript:void();'>No Record Found</a>
                                        </li>";
		}
		
		echo $html;
		exit();
		
		
	}
	
	
	
	
}
 ?>