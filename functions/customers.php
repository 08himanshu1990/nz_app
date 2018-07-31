<?php
class customers{
	public $app_db;
	
	function customers($db){
		$this->app_db = $db;
	}
	
	
	function customerPage(){
			$customers = $this->app_db->GetResults("select * from customer_general where Status='Active' order by Surname");
			$title = 'Customers';
			include('templates/header.php');
			include('templates/customer_page.php');
			include('templates/footer.php');
	}
	
	function createCustomer(){
		$json = array();
		if(isset($_POST['surname'])){
			$customer_fields = array('CreateDate','Surname','FirstName','DisplaySurname','Address','Suburb','City','Country','Phone','Mobile','Status','StartDate','Designer','Letter1Sent','ContractDate','NotesToClient','Postcode','Email','InstallerComments');
			$customer_values = array($this->changeToSysDate($_POST['create_date']),$_POST['surname'],$_POST['first_name'],$_POST['display_name'],$_POST['address'],$_POST['suburb'],$_POST['city'],$_POST['country'],$_POST['phone'],$_POST['mobile'],$_POST['status'],$this->changeToSysDate($_POST['start_date']),$_POST['designer'],$this->changeToSysDate($_POST['letter_1_sent']),$this->changeToSysDate($_POST['contract_date']),$this->app_db->mssql_real_escape_string($_POST['notes_to_client']),$_POST['postcode'],$_POST['email'],$this->app_db->mssql_real_escape_string($_POST['installer_comments']));
			
			$this->app_db->Insert('customer_general',$customer_fields,$customer_values,'JobNumber');
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
	
	function getCustomerInfo(){
		$customer_info = $this->app_db->GetRow("select * from customer_general where JobNumber=".$_POST['jobnumber']);
		
		$json = array(
			'surname'				=> $customer_info['Surname'],
			'createdate'			=> $customer_info['CreateDate']->format('m-d-Y'),
			'firstname'				=> $customer_info['FirstName'],
			'displayname'			=> $customer_info['DisplaySurname'],
			'address'				=> $customer_info['Address'],
			'suburb'				=> $customer_info['Suburb'],
			'city'					=> $customer_info['City'],
			'country'				=> $customer_info['Country'],
			'postcode'				=> $customer_info['Postcode'],
			'phone'					=> $customer_info['Phone'],
			'mobile'				=> $customer_info['Mobile'],
			'email'					=> $customer_info['Email'],
			'designer'				=> $customer_info['Designer'],
			'status'				=> $customer_info['Status'],
			'start_date'			=> $customer_info['StartDate']->format('m-d-Y'),
			'letter_1_sent'			=> $customer_info['Letter1Sent']->format('m-d-Y'),
			'contract_date'			=> $customer_info['ContractDate']->format('m-d-Y'),
			'installer_comments'	=> $this->app_db->mssql_real_escape_string_restore($customer_info['InstallerComments']),
			'notes_to_client'		=> $this->app_db->mssql_real_escape_string_restore($customer_info['NotesToClient']),
			'jobnumber'				=> $customer_info['JobNumber']
		);
		
		echo json_encode($json);
		exit();
	}
	
	function saveCustomer(){
		$json = array();
		if(isset($_POST['surname'])){
			$this->app_db->Query("update customer_general set CreateDate='".$this->changeToSysDate($_POST['create_date'])."',Surname='".$_POST['surname']."',FirstName='".$_POST['first_name']."',DisplaySurname='".$_POST['display_name']."',Address='".$_POST['address']."',Suburb='".$_POST['suburb']."',City='".$_POST['city']."',Country='".$_POST['country']."',Postcode='".$_POST['postcode']."',Phone='".$_POST['phone']."',Mobile='".$_POST['mobile']."',Email='".$_POST['email']."',Status='".$_POST['status']."',StartDate='".$this->changeToSysDate($_POST['start_date'])."',Letter1Sent='".$this->changeToSysDate($_POST['letter_1_sent'])."',ContractDate='".$this->changeToSysDate($_POST['contract_date'])."',InstallerComments='".$this->app_db->mssql_real_escape_string($_POST['installer_comments'])."',NotesToClient='".$this->app_db->mssql_real_escape_string($_POST['notes_to_client'])."' where JobNumber=".$_POST['current_job_number']);
			
			$json['submit_suc'] = 'Submitted';
		}
		
		echo json_encode($json);
		exit();
	}
	
	function searchCustomer(){
		$query = 'select * from customer_general';
		
		$query .= ' where'; 
		if($_POST['text']!=''){
			$query .= " (Surname like '%".$_POST['text']."%' or FirstName like '%".$_POST['text']."%' or Address like '%".$_POST['text']."%' or City like '%".$_POST['text']."%' or Suburb like '%".$_POST['text']."%' or Status like '%".$_POST['text']."%') and";
		}
		
		$query .= " Status='".$_POST['status']."'";
		
		if($_POST['order']=='Z-A'){
			$query .= " order by Surname desc";
		}else{
			$query .= " order by Surname asc";
		}
		
		$customers = $this->app_db->GetResults($query);
		
		$html = '';
		
		foreach($customers as $customer){
			$html .= "<li class='nav-item'>
                                            <a class='nav-link active' href='javascript:void();' onClick='loadCustomer(".$customer['JobNumber'].");' >
                                                <span class='text-uppercase'>".$customer['Surname']."</span> ".$customer['FirstName']."</a>
                                        </li>";
		}
		
		if(count($customers)==0){
			$html .= "<li class='nav-item'>
                                            <a class='nav-link active' href='javascript:void();'>No Record Found</a>
                                        </li>";
		}
		
		echo $html;
		exit();
		
		
	}
	
	
	
	
}
 ?>