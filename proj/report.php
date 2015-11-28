<?
require("db_connection.php");
$p=4;
session_start();

function yearDropdown($startYear, $endYear,$select_year){ 
    //start the select tag 
        //echo each year as an option     
        for ($i=$startYear;$i<=$endYear;$i++){
			if($select_year==$i){$s='Selected';}else{$s='';} 
        echo "<option value=".$i." ".$s.">".$i."</option>";     
        } 
      
   
} 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Customer</title>
<style>
.error{ color:#F00;} 
#msgShow{
	color:#F00;}
 </style>
	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
    <link rel="stylesheet" href="css/customer_customize.css" type="text/css"/>
	<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<? include('links.php');?>
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
            <td><h1>Report Analysis</h1></td>
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
          <td> <input type="button" onclick="CustomerValue()" value="Submit" class=""></td>
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


             	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th width="43" class="table-header-repeat" align="center"><a href="">S.No</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Popular Name</a>	</th>
                    <th class="table-header-repeat  line-left"><a href="">Freq</a></th>
                    <th class="table-header-repeat  line-left"><a href="">year</a></th>
                    
				</tr>
                <?
				$start=0;
				$limit=10;
				
				if(isset($_REQUEST['page'])){
					$id=$_REQUEST['page'];
					$start=($id-1)*$limit;
				}
				
				//$sql="Select * from babytable where 1  $where order by name LIMIT $start, $limit" ;
				
				if($_REQUEST['year_to']!=""){
				$sql="Select * from babytable where (year BETWEEN '".$_REQUEST['year_to']."' AND '".$_REQUEST['year_from']."') and name='".$_REQUEST['name']."' order by freq desc" ;
				$rss=mysql_query($sql) or die();
				$i=0;if(mysql_num_rows($rss)==0){?>
				<tr>
                	<td  colspan="8" align="center">No Data Found.</td>
                </tr>
                		
				<? }
				
				while($row=mysql_fetch_assoc($rss)){
					$i++;
					
				if($i % 2 == 0){ $bg='class="alternate-row"';}else{ $bg='';} 	
				?>
                
				<tr <?=$bg?>>
					<td><?=$i?></td>
					<td><?=ucwords($row['name'])?></td>
                    <td><?=$row['freq']?></td>
                    <td><?=$row['year']?></td>
                </tr>
				
				
				<? }
				}?>

			</table>
            
           
				
                <?php /*?>echo $sql="Select * from babytable where 1  ".$where." LIMIT $start, $limit";
			    $rss=mysql_query($sql) or die();
				$rows=mysql_num_rows($rss);
				$total=ceil($rows/$limit);
                echo '<table  border="0" align="right"> <tr>';
                if($id>1){echo "<td><a href='?customerType=".$_REQUEST['customerType']."&page=".($id-1)."' class='page-left'></a></td><td>";}else{ echo '<td>';}
				
				  echo "<ul class='page'>";
                        for($i=1;$i<=$total;$i++)
                        {
                            if($i==$id) { echo "<li class='currentpage'>".$i."</li>"; }
                            
                            else { echo "<li><a href='?customerType=".$_REQUEST['customerType']."&page=".$i."'>".$i."</a></li>"; }
                        }
                echo "</ul>";
				if($id!=$total)
                {
                  
					 echo "</td><td><a href='?customerType=".$_REQUEST['customerType']."&page=".($id+1)."' class='page-right'></a></td>";
                }
             echo '</tr></table>';<?php */?>   
              
				
				
				
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