<?php
include('config.php');
class Database{
	public $con;
	function Database(){
		$db_config = new Config();
		$db_config_details = $db_config->DatabaseDetails();
		$serverName = $db_config_details['db_host'];

		$connectionOptions = array(
							"Database" => $db_config_details['db_database'], 
							"UID" => $db_config_details['db_username'],
							"PWD" => $db_config_details['db_password']
							);

		$this->con = sqlsrv_connect($serverName, $connectionOptions) or die(print_r(sqlsrv_errors()));

	}

	function Insert($table,$fields,$values,$primarykey){
		sqlsrv_query($this->con,"insert into ".$table." (".implode(",",$fields).") values('".implode("','",$values)."')") or die (print_r(sqlsrv_errors())."insert into ".$table." (".implode(",",$fields).") values('".implode("','",$values)."')");
		$query_objects = sqlsrv_query($this->con,"select ".$primarykey." as id from ".$table." order by ".$primarykey." desc") or die ("select ".$primarykey." from ".$table." order by ".$primarykey." desc");
		$row = sqlsrv_fetch_array( $query_objects, SQLSRV_FETCH_ASSOC);
		return $row['id'];
	}

	function GetRow($query){
		$query_objects = sqlsrv_query($this->con,$query) or die ($query);
		$row = sqlsrv_fetch_array( $query_objects, SQLSRV_FETCH_ASSOC);
		return $row;
	}

	function GetResults($query){
		$query_objects = sqlsrv_query($this->con,$query) or die (print_r(sqlsrv_errors()).$query);
		$data = array();
		while($row = sqlsrv_fetch_array( $query_objects, SQLSRV_FETCH_ASSOC)){
			$data[] = $row;
		}

		return $data;
	}

	/*function GetFields($query){
		$query_objects = sqlsrv_query($this->con,$query) or die ($query);
		$data = array();
		while($row = mysqli_fetch_field($query_objects)){
			$data[] = $row;
		}

		return $data;
	}*/

	function Query($query){
		sqlsrv_query($this->con,$query) or die (print_r(sqlsrv_errors()).$query);
	}

	function LastError() {
	  return print_r(sqlsrv_errors());
	}
	
	function mssql_real_escape_string($str) {
		$find = array('\x00','\n','\r',"'",'"','\x1a');
		$replace = array('\\x00','\\n','\\r',"~",'\"','\\x1a');
		
	   return str_replace($find,$replace,$str);
	}
	
	function mssql_real_escape_string_restore($str) {
		
		$find = array('\\x00','\\n','\\r',"~",'\"','\\x1a');
		$replace = array('\x00','\n','\r',"'",'"','\x1a');
		
	   return str_replace($find,$replace,$str);
	}
	
	
	/*function stringEscape($string){
		return mysqli_real_escape_string($this->con,$string);
	}*/
}



?>
