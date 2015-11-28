<?
require("db_connection.php");
$p=1;
session_start();

function yearDropdown($startYear, $endYear,$select_year){ 
    //start the select tag 
        //echo each year as an option     
        for ($i=$startYear;$i<=$endYear;$i++){
			if($select_year==$i){$s='Selected';}else{$s='';} 
        echo "<option value=".$i." ".$s.">".$i."</option>";     
        } 
      
   
} 

print_r($_REQUEST);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Customer</title>
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
            <td><h1>Populer Name</h1></td>
          	<td align="right">
            <span style="font-size:14px; font-weight:700; color:#4B4B4B;">Select Year:</span>
            <select name="select_year" id="select_year" class="inp-form">
            <option value="">Select year</option>
             <?php yearDropdown(1944, date('Y'),$_REQUEST['select_year']);  ?>
            </select>
            
          </td>
          <td> <span style="font-size:14px; font-weight:700; color:#4B4B4B;">Gender</span>
          <select name="gender" id="gender" class="inp-form">
          <option value="">Select Gender</option>
          <option value="Male" <? if($_REQUEST['gender']=='Male'){ echo 'Selected';}?>>Male</option>
          <option value="Female" <? if($_REQUEST['gender']=='Female'){ echo 'Selected';}?>>Female</option>
          
          </select>
          </td>
          <td> <span style="font-size:14px; font-weight:700; color:#4B4B4B;">Name</span>
          <input type="text" name="name" id="name" class="inp-form" value="<?=$_REQUEST['name']?>">
          </td>
          
          <td> <span style="font-size:14px; font-weight:700; color:#4B4B4B;">Top</span>
          		<select name="top_data">
                	<option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>

                </select>
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


             	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th width="43" class="table-header-repeat" align="center"><a href="">S.No</a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Popular Name</a>	</th>
                    <th class="table-header-repeat  line-left"><a href="">Freq</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Position</a></th>
                    
				</tr>
                <?
				$start=0;
				$limit=10;
				
				if(isset($_REQUEST['page'])){
					$id=$_REQUEST['page'];
					$start=($id-1)*$limit;
				}
				
				
				
				if($_REQUEST['select_year']!=""){
					$where.=" and  year='".$_REQUEST['select_year']."'";
				}
				
				if($_REQUEST['gender']!=""){
					$where.=" and  sex='".$_REQUEST['gender']."'";
				}
				
				if($_REQUEST['name']!=""){
					$where.=" and  name like '%".$_REQUEST['name']."%'";
				}
				
				if($_REQUEST['top_data']!=""){
					$limit=$_REQUEST['top_data'];
				}
				
				//$sql="Select * from babytable where 1  $where order by name LIMIT $start, $limit" ;
				
				if($_REQUEST['select_year']!="")
				$sql="Select * from babytable where 1  $where order by freq desc limit $limit" ;
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
                    <td><?=$row['position']?></td>
                </tr>
				
				
				<? }?>

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
$('#customerID').submit();
}
</script>

</body>
</html>
<?
	$_SESSION['product_action']="";
?>