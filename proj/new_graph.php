<?
require("db_connection.php");
$p=5;
session_start();

function yearDropdown($startYear, $endYear,$select_year){ 
    //start the select tag 
        //echo each year as an option     
        for ($i=$startYear;$i<=$endYear;$i++){
			if($select_year==$i){$s='Selected';}else{$s='';} 
        echo "<option value=".$i." ".$s.">".$i."</option>";     
        } 
      
   
} 

function getTotalConference(){
	$sql="SELECT * FROM `babytable` WHERE `year` BETWEEN '".$_REQUEST['year_to']."' and '".$_REQUEST['year_from']."' AND `name` ='".$_REQUEST['name']."' order by year";
	$rss=mysql_query($sql) or die();
	$i=0;
	while($row=mysql_fetch_assoc($rss)){$i++;
	if($i!=1){$com=',';}
	$str.=$com."[[".$row['freq']."],'".$row['year']."']";	
	}
	return $str;
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Customer</title>
<? include('links.php');?>
<script type='text/javascript' src="js/jqBarGraph.1.1.js"></script>
</head>
<body> 
<!-- Start: page-top-outer -->
<? include('__logo.php');?>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<? include('__nav.php');?>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">
<form name="customerID" id="customerID">
	<!--  start page-heading -->
	<div id="page-heading">
		
        <table width="98%" border="0">
          <tr>
            <td><h1>Populer Name</h1></td>
          	<td align="right">
            <span style="font-size:14px; font-weight:700; color:#4B4B4B;">Year To:</span>
            <select name="year_to" id="year_to" class="inp-form">
            <option value="">Select year</option>
             <?php yearDropdown(1944, date('Y'),$_REQUEST['year_to']);  ?>
            </select>
            
          </td>
            <td> <span style="font-size:14px; font-weight:700; color:#4B4B4B;">Year From:</span>
          <select name="year_from" id="year_from" class="inp-form">
          <option value="">Select year</option>
             <?php yearDropdown(1944, date('Y'),$_REQUEST['year_from']);  ?>
          </select>
          </td>
            <td> <span style="font-size:14px; font-weight:700; color:#4B4B4B;">Name</span>
          <input type="text" name="name" id="name" class="inp-form" value="<?=$_REQUEST['name']?>">
          </td>
           <td> <input type="submit" onclick="CustomerValue()"></td>
          </tr>
          
        </table>
        
	</div>
	<!-- end page-heading -->
    <!--Start view individual customer-->


	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
            <table border="0" width="100%">
                  <tr>
                    <td><div id="chart-1" style="border:1px dashed;padding:10px;"></div></td>
                    
                  </tr>
                </table>

 	<!--  end product-table................................... --> 
             </div></div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
 </form>
    <!--end view Corporate customer-->
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
<div class="clear">&nbsp;</div>
<!-- start footer -->         
<? include_once('__footer.php')?>
<!-- end footer -->
<script>
function search_det(){
	
	$('#customerID').submit();
	}
</script>
<script>
function clearAll(type){
	
	$('#search').val('');
	$('#customerID').submit();
	
	}
</script>
<script>
function CustomerValue(){

	var error=0;
	$(".error").empty();
	if($("#year_to").val()==""){
		  $("#year_to").after('<span class="error">This Field is required</span>');
		  error=1;
	}
	if($("#year_from").val()==""){
		  $("#year_from").after('<span class="error">This Field is required</span>');
		  error=1;
	}
	if($("#name").val()==""){
		  $("#name").after('<span class="error">This Field is required</span>');
		  error=1;
	}
	if(error==0){
		
		$('#customerID').submit();
	}
	}
</script>

</body>
</html>
<?
	$_SESSION['product_action']="";
?>

<script type="text/javascript">
arrayOfData1 = new Array(<?=getTotalConference()?>);	
$('#chart-1').jqBarGraph({data: arrayOfData1,
	colors: ['#92b22c','#6B0E1D','#AB2522'],
	width: 400,
	color: '#ffffff',
	type: 'multi',
	title: '<h2>Total Conferences</h2>'
});
</script>