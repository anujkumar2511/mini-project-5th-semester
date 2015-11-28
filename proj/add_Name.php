<?
session_start();
require("db_connection.php");
$p=3;
if($_REQUEST['id']!=""){
	$sql="Select * from babytable where id='".$_REQUEST['id']."'";	
	$rss=mysql_query($sql) or die();
	$row=mysql_fetch_assoc($rss);
	$title	=	$row['title'];
	$act	=	2;
	$tt='Edit';
	
}else{
	$act	=	1;	
	$tt='Add';
	$validate="validate[required]";
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Add Customer</title>
<? include('links.php');?>

	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
    <link rel="stylesheet" href="css/customer_customize.css" type="text/css"/>
	<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
	
   
 
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<style>
.error{ color:#F00;} 
#msgShow{
	color:#F00;}
 </style>
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


<div id="page-heading">
	<form name="typeId" id="typeId" method="post">
        <table width="98%" border="0">
          <tr>
            <td><h1><?=$tt?> Populer Name</h1></td>
          </tr>
        </table>
        </form>

</div>


             <?
            	if($_SESSION['product_action']==1){
						echo '<div id="message-green">
								<table border="0" width="100%" cellpadding="0" cellspacing="0">
									<tr>
										<td class="green-left">Customer added sucessfully. <a href="addcustomer.php">Add new one.</a></td>
										<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
									</tr>
								</table>
							  </div>';
				}
			?>
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
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href=""><?=$tt?> Populer Name</a></div>
			<div class="clear"></div>
		</div>
<!--  end step-holder -->
   <!-- start individual client form -->
	
	<!-- start id-form -->
 		<form id="cus_reg" class="" method="post" action="add_Name_action.php" enctype="multipart/form-data">
        <input name="act" type="hidden" value="<?=$act?>" />
        <input name="id" type="hidden" value="<?=$_REQUEST['id']?>" />
        
                <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
               
                <tr>&nbsp;</tr>
                <tr>
                    <th width="180" valign="top">Name:<span style="color:#F00">*</span></th>
                   <td width="248">
                   	<input type="text" class="inp-form validate[required]"  name="name" id="name"  value="<?=$row['name']?>" onblur="fill_values()"/></td>
                </tr>
                <tr>
                <th width="180" valign="top">Gender:</th>
                    <td width="248"><input type="radio" class=""  name="gender" id="gender" value="1" checked="checked" <? if($row['sex']==1){ echo 'checked';}?>/>&nbsp;Male &nbsp;
                    <input type="radio" class=""  name="gender" id="gender" value="2" <? if($row['sex']==2){ echo 'checked';}?>/>&nbsp;Female&nbsp;
                    <input type="radio" class=""  name="gender" id="gender" value="3" <? if($row['sex']==3){ echo 'checked';}?>/>&nbsp;other&nbsp;</td>
                </tr>
                <tr>
                <th width="180" valign="top">Select Year:</th>
                    <td width="248">
                     <select name="year" id="year" class="inp-form  validate[required]">
                     <option value="">Select Year</option>
                     <option value="1994" <? if($row['year']==1994){ echo 'selected';}?>>1994</option>
                     <option value="1995" <? if($row['year']==1995){ echo 'selected';}?>>1995</option>
                     <option value="1996" <? if($row['year']==1996){ echo 'selected';}?>>1996</option>
                     <option value="1997" <? if($row['year']==1997){ echo 'selected';}?>>1997</option>
                     <option value="1998" <? if($row['year']==1998){ echo 'selected';}?>>1998</option>
                     <option value="1999" <? if($row['year']==1999){ echo 'selected';}?>>1999</option>
                     <option value="2000" <? if($row['year']==2000){ echo 'selected';}?>>2000</option>
                     <option value="2001" <? if($row['year']==2001){ echo 'selected';}?>>2001</option>
                     <option value="2002" <? if($row['year']==2002){ echo 'selected';}?>>2002</option>
                     <option value="2003" <? if($row['year']==2003){ echo 'selected';}?>>2003</option>
                     <option value="2004" <? if($row['year']==2004){ echo 'selected';}?>>2004</option>
                     <option value="2005" <? if($row['year']==2005){ echo 'selected';}?>>2005</option>
                     <option value="2006" <? if($row['year']==2006){ echo 'selected';}?>>2006</option>
                     <option value="2007" <? if($row['year']==2007){ echo 'selected';}?>>2007</option>
                     <option value="2008" <? if($row['year']==2008){ echo 'selected';}?>>2008</option>
                     <option value="2009" <? if($row['year']==2009){ echo 'selected';}?>>2009</option>
                     <option value="2010" <? if($row['year']==2010){ echo 'selected';}?>>2010</option>
                     <option value="2011" <? if($row['year']==2011){ echo 'selected';}?>>2011</option>
                     <option value="2012" <? if($row['year']==2012){ echo 'selected';}?>>2012</option>
                     <option value="2013" <? if($row['year']==2013){ echo 'selected';}?>>2013</option>
                     <option value="2014" <? if($row['year']==2014){ echo 'selected';}?>>2014</option>
                     </select>
                    </td>
                </tr>
               <tr>
               <th width="180" valign="top">Position:</th>
               <td width="248"><input type="text" class="inp-form validate[required]"  name="position" id="position"  value="<?=$row['position']?>"/></td>
               </tr> 
              <tr>
              <th width="180" valign="top">Freq:</th>
               <td width="248"><input type="text" class="inp-form validate[required]"  name="freq" id="freq"  value="<?=$row['freq']?>"/></td>
              </tr> 
             <tr>
             <th width="180" valign="top">&nbsp;</th>
               <td width="248"><input value="" class="form-submit" type="button" id="" onclick="incustomer_detail()"></td>
             </tr>  
            </table>
        </form>
  </td>
  <td>
</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
	<div class="clear"></div>
</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
</table>

<div class="clear">&nbsp;</div>
</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
<div class="clear">&nbsp;</div>
<!-- start footer -->         
<? include_once('__footer.php')?>

<script>

function incustomer_detail(){

	var error=0;
	$(".error").empty();
	if($("#name").val()==""){
		  $("#name").after('<span class="error">This Field is required</span>');
		  error=1;
	}
	if($("#gender").val()==""){
		  $("#gender").after('<span class="error">This Field is required</span>');
		  alert('Please Fill the Mail id Field');
		  error=1;
	}
	if($("#year").val()==""){
		  $("#year").after('<span class="error">This Field is required</span>');
		  error=1;
	}
	if($("#position").val()==""){
		  $("#position").after('<span class="error">This Field is required</span>');
		  error=1;
	}
	if(error==0){
		
		$("#cus_reg").submit();
		
	}
	}
</script>
<? if($_SESSION['product_action']="")?>
</body>
</html>