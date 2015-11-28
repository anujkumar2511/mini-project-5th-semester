<?
//******************************for Today's 

function getTodaysBD(){
	$sql_customer="select * from customer where day(date_of_birth) = day(CURDATE()) and month(date_of_birth) = month(CURDATE()) and is_delete=0";
	$res_customer=mysql_query($sql_customer) or die(mysql_error().$sql_customer);
	while($row_customer=mysql_fetch_assoc($res_customer)){
		
			$date[]='<tr><td>'.$row_customer['pre_name'].' '.$row_customer['fname'].' '.$row_customer['lname'].'</td>
			<td>'.$row_customer['Email'].'</td>
			<td>'.$row_customer['Mobile'].'</td></tr>';
			
			
	}
	return $date;

}

function getTodaysANY(){
	$sql_customer="select * from customer where day(marriageDate) = day(CURDATE()) and month(marriageDate) = month(CURDATE()) and is_delete=0";
	$res_customer=mysql_query($sql_customer) or die(mysql_error().$sql_customer);
	while($row_customer=mysql_fetch_assoc($res_customer)){
					$anny[]='<tr><td>'.$row_customer['pre_name'].' '.$row_customer['fname'].' '.$row_customer['lname'].'</td>
					<td>'.$row_customer['spouse_name'].'</td>
					<td>'.$row_customer['Email'].'</td><td>'.$row_customer['Mobile'].'</td></tr>';
		
	}
	return $anny;
}

//******************************************FOR WEEKLY


function getWeeklyBD(){
	$sql_customer="select * from customer where week(date_of_birth) >= week(CURDATE())and month(date_of_birth) = month(CURDATE()) and is_delete=0";
	$res_customer=mysql_query($sql_customer) or die(mysql_error().$sql_customer);
	while($row_customer=mysql_fetch_assoc($res_customer)){
		
			$date[]='<tr><td>'.$row_customer['pre_name'].' '.$row_customer['fname'].' '.$row_customer['lname'].'</td>
			<td>'.$row_customer['date_of_birth'].'</td>
			<td>'.$row_customer['Email'].'</td><td>'.$row_customer['Mobile'].'</td></tr>';
	}
	return $date;
}

function getWeeklyANY(){
	$sql_customer="select * from customer where week(marriageDate) = week(CURDATE()) and month(marriageDate) = month(CURDATE()) and is_delete=0";
	$res_customer=mysql_query($sql_customer) or die(mysql_error().$sql_customer);
	while($row_customer=mysql_fetch_assoc($res_customer)){
					$anny[]='<tr><td>'.$row_customer['pre_name'].' '.$row_customer['fname'].' '.$row_customer['lname'].'</td>
					<td>'.$row_customer['spouse_name'].'</td>
					<td>'.date("m-d-Y", strtotime($row_customer['marriageDate'])).'</td>
					<td>'.$row_customer['Email'].'</td>
					<td>'.$row_customer['Mobile'].'</td></tr>';
		
	}
	return $anny;
}

//******************************************FOR MONTHLY
function getmonthBD(){
	$sql_customer="select * from customer where month(date_of_birth) =  month(CURDATE()) and month(date_of_birth) = month(CURDATE()) and is_delete=0";
	$res_customer=mysql_query($sql_customer) or die(mysql_error().$sql_customer);
	while($row_customer=mysql_fetch_assoc($res_customer)){
		
			$date[]='<tr><td>'.$row_customer['fname'].'</td><td>'.date("d-m-Y",strtotime($row_customer['date_of_birth'])).'</td>
			<td></td></tr>';
	}
	return $date;
}


function getmonthANY(){
	$sql_customer="select * from customer where month(marriageDate) = month(CURDATE()) and month(marriageDate) = month(CURDATE()) and is_delete=0";
	$res_customer=mysql_query($sql_customer) or die(mysql_error().$sql_customer);
	while($row_customer=mysql_fetch_assoc($res_customer)){
					$anny[]='<tr><td>'.$row_customer['fname'].'</td><td>'.date("d-m-Y",strtotime($row_customer['marriageDate'])).'</td>
					<td></td></tr>';
		
	}
	return $anny;
}

?>

