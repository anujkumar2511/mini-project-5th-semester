<?php 
session_start();
require("db_connection.php");

if($_REQUEST['act']==1){

	$insert="Insert into babytable set
	 name						=		'".$_REQUEST['name']."',
	 sex						=		'".$_REQUEST['gender']."',
	 year						=		'".$_REQUEST['year']."',
	 position					=		'".$_REQUEST['position']."',
	  freq						=		'".$_REQUEST['freq']."'
	";
	mysql_query($insert) or die(mysql_error().$insert);
	$insertID=mysql_insert_id();
	$_SESSION['product_action']=1;
	header("Location:add_Name.php");
}


if($_REQUEST['act']==2){
 $update="update babytable set
 	 name						=		'".$_REQUEST['name']."',
	 sex						=		'".$_REQUEST['gender']."',
	 year						=		'".$_REQUEST['year']."',
	 position					=		'".$_REQUEST['position']."',
	 freq						=		'".$_REQUEST['freq']."'
	 where id	=		'".$_REQUEST['id']."'	
	";
	mysql_query($insert) or die(mysql_error().$insert);
	$_SESSION['product_action']=2;
	header("Location:add_Name.php");
}


if($_REQUEST['act']==3){
		/*$sql="Select * from gallery where id='".$_REQUEST['id']."'";	
		$rss=mysql_query($sql) or die();
		$row=mysql_fetch_assoc($rss);
	
		unlink($row['photo']);*/
		
		
		$del="delete from babytable where id='".$_REQUEST['id']."'";
		mysql_query($del) or die(mysql_error().$del);
		header("Location:customer.php");
	
}

?>