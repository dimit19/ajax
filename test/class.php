<?php
include('crud.php');
$action = $_REQUEST['action'];
//echo $action; 
if($action == 'insert')
{
	$crud = new Crud();
	$insert = $crud -> insert($_REQUEST);	
}
if($action == 'login')
{
	$crud = new Crud();
	$insert = $crud -> login($_REQUEST);
}
if($action == 'fetch')
{
	$crud = new Crud();
	$fetch = $crud -> fetch($_REQUEST);
}
if($action == 'delete')
{
	$crud = new Crud();
	$delete = $crud -> deletedata($_REQUEST);
}
?>