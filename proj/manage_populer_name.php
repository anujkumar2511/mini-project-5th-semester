<?
require("db_connection.php");
$p=6;
$sp=6;
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Popular Name List</title>
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

	<!--  start page-heading -->
	<div id="page-heading">
		<table width="98%" border="0">
          <tr>
            <td><h1>Popular Name</h1></td>
            <td align="right"><a href="add_Name.php" class="button2">Add Popular Name</a></td>
          </tr>
        </table>
	</div>
	<!-- end page-heading -->

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
			
            <?
            	if($_SESSION['product_action']==2){
						echo '<div id="message-green">
								<table border="0" width="100%" cellpadding="0" cellspacing="0">
									<tr>
										<td class="green-left">Customer Type Updated sucessfully. </td>
										<td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
									</tr>
								</table>
							  </div>';
				}
			?>
            
            <?
            	if($_SESSION['product_action']==3){
						echo '<!--  start message-red -->
							<div id="message-red">
							<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td class="red-left">Customer Type Delete Successfully.</td>
								<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
							</tr>
							</table>
							</div>
							<!--  end message-red -->';
				}
			?>
            
				<!--  start product-table ..................................................................................... -->
				<!--  end product-table................................... --> 
				<form id="mainform" action="">
               
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th width="43" class="table-header-repeat" align="center"><a href="">S.No</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">popular Name</a>	</th>
                    <th class="table-header-repeat  line-left"><a href="">No of Babies</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Action</a></th>
				</tr>
                <?
				$start=0;
				$limit=10;
				
				if(isset($_REQUEST['page'])){
					$id=$_REQUEST['page'];
					$start=($id-1)*$limit;
				}
				$sql="Select * from babytable where 1 LIMIT $start, $limit";
				$rss=mysql_query($sql) or die();
				$i=0;if(mysql_num_rows($rss)==0)
				$count=
				{?>
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
					<td><?=$row['name']?></td>
                    <td><?=$row['year']?></td>
                    <td class="options-width">
					<a href="add_Namr.php?id=<?=$row['id']?>" title="Edit" class="icon-11 info-tooltip"></a>
                    <a href="add_Name_action.php?act=3&id=<?=$row['id']?>" onclick="return confirm('Are you sure?')"  title="Delete" class="icon-12 info-tooltip"></a>
					
					</td>
				</tr>
				
				
				<? }?>

			</table>	
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		  </div>
			
			<div class="clear"></div>
		 
		</div>
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
</body>
</html>
<?
	$_SESSION['product_action']="";
?>