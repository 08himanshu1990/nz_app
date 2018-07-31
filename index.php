<?php 
session_start();
include('database.php');
ini_set('display_errors',1);
$e2e_db = new Database();

if(isset($_GET['page'])){

	$pages = explode("/",$_GET['page']);
	
	$page = $pages[0];
	
	if(!file_exists("functions/".$page.".php") && $page!='home'){
		die("No Page Found");
	}
	
}

if((isset($_GET['page']) && $pages[0]=='home') || !isset($_GET['page']) ){
	//$page = "login";
	header('location: index.php?page=leads/leadPage');
	//die("No Page Found");
}



include "functions/".$page.".php";
$fn_class = new $page($e2e_db);

if(isset($_GET['page']) && isset($pages[1])){
	if(!method_exists($fn_class,$pages[1])){
		die("No Page Found");
	}else{
	
		$fn_class->$pages[1]();
	
	}
}
?>