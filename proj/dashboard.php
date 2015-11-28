<?
require("db_connection.php");
$p=1;
session_start();
include('__auth.php');
include('function.php');

$month=date('m');
$year=date('Y');

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Administration</title>
<? include('links.php');?>
<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>

  $(function() {
    $( "#tabs" ).tabs();
	$( "#tabs2" ).tabs();
	$( "#tabs3" ).tabs();
  });
  </script>
  <style>
  #product-table td {
    border: 1px solid #d2d2d2;
    padding: 10px 0 10px 10px;
	font-size:12px;
}
  </style>
<link href="calendar.css" type="text/css" rel="stylesheet" /> 
  
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
            <td><h1>Dashboard</h1></td>
          <td align="right" id="BACK" style="display:none">
            <table border="0">
            <tr>
            <td><a href="dashboard.php"><img src="images/go_previous_black.png" height="19" width="19" alt="Back"></a></td>
            <td><a href="dashboard.php"><h2 style="color:#4B4B4B; margin-bottom:5px;">Back</h2></a></td></tr>
            </table>
            </td>
          </tr>
        </table>
 </div>
	
    
    <!-- end page-heading -->
   <div id="LIST">  
     <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
       <tr><th>&nbsp;</th></tr>
       <tr>
      <th style="text-align:center !important;"><a href="javascript:void(0)" onClick="" id="BIRTH"><img src="images/tabIcon-birthday.png"><h1>Birthday/Anniversary</h1></a></th>
       <th><a href="javascript:void(0)" onClick="" id="MARKETING"><img src="images/grey_new_seo-43-128.png" height="30" width="30" style="margin-left:50px;">
       <h1>Marketing List</h1></a></th>
    </table>
   </div>
   <div id="birthday_appear" style="display:none">
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left">
        
        
        </td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				<div id="tabs">
		 		<ul>
                	<li id="tab1"><a href="#tabs-1">Today</a></li>
                    <li id="tab2"><a href="#tabs-2">Weekly</a></li>
                    <li id="tab3"><a href="#tabs-3">Monthly</a></li>
                </ul>
     
     
                 <div id="tabs-1">
                 
                 <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
			<tbody>
           <tr><th>Today's Birthday</th></tr>
            <tr>
					
					<th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Email</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Contact No</a></th>
                    
				</tr>
			<?
			
            	$dob=getTodaysBD();
				if($dob){
					foreach($dob as $val){
						echo $val;
						
					}
				}
				
			?>
           </tbody>
           <tbody>      
           <tr><th>Today's Anniversary</th></tr>
           <tr>
					
					<th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Spouse Name</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Email</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Contact No</a></th>
                    
				</tr>     
            <?
				$anniversary=getTodaysANY();
				if($anniversary){
					foreach($anniversary as $any){
						echo $any;
						
					}
				}
			?>
           </tbody>
            
            
            </table>
                 
                  </div> 
                 <div id="tabs-2">
                 
                  	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                    <tbody>
                   <tr><th>Customer Birthday</th></tr>
                 
                <tr>
					
					<th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Birthday Date</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Email</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Contact No</a></th>
				</tr>
                    <?
                    
                        $dob=getWeeklyBD();
                        if($dob){
                            foreach($dob as $val){
                                echo $val;
                                
                            }
                        }
                        
                    ?>
                   </tbody>
                   <tbody>      
                   <tr><th>Customer Anniversary</th></tr>   
                   <tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="">Name</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Spouse Name</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a href="">Marriage Date</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Email</a></th>
                    <th class="table-header-repeat  line-left"><a href="">Contact No</a></th>
                  </tr>
                     
                    <?
                        $anniversary=getWeeklyANY();
                        if($anniversary){
                            foreach($anniversary as $any){
                                echo $any;
                                
                            }
                        }
                    ?>
                    
                   </tbody>
                    
                    
                    </table>
                  </div>
                 <div id="tabs-3" class="">
                 <label><input name="event_type"  type="radio" value="1" checked="checked"  onchange="ShowMonthly(<?=$month?>,<?=$year?>)"/>Birthday</label>
                 <label><input name="event_type"  type="radio" value="2" onChange="ShowMonthly(<?=$month?>,<?=$year?>)"/>Anniversary</label>
                                  
                 <div class="ShowMonthly">
                 </div>
                  </div>
			 </div>
            
			<div class="clear"></div>
		 
		</div>
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
	
    </div>
   <div id="anniversary_appear" style="display:none">
  
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left">
        
        
        </td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			<table width="98%" border="0">
            <tr><td>
            <h1>Customer Marketing List</h1>
            </td>
            <td align="right">
            <select class="inp-form" name="customer_type" id="customer_type" onChange="customer_type()">
            <option value="">Select Customer Type</option>
            <option value="1">Individual Customer</option>
            <option value="2">Corporate Customer</option>
            </select>
            </td>
            </tr>
            </table>
            <br/>
             <div id="Individual_customer" style="display:none;">
            <div id="tabs2">
		 		<ul>
                	<li id="tab7"><a href="#tabs-7">Professional Details</a></li>
                    <li id="tab8"><a href="#tabs-8">Psychographic Details</a></li>
                    <li id="tab9"><a href="#tabs-9">Relationship with LaVida</a></li>
                </ul>
     		<div id="tabs-7">
            <table border="0" width="100%" cellpadding="0" cellspacing="0" id="">
            <tr>&nbsp;</tr>
             <tr><th style="text-align:left">Professional Details</th></tr>
            <tr><th>&nbsp;</th></tr>
             <tr>
             <td>
             <select class="inp-form" name="specialization" id="specialization">
             <option value="">Select specialization</option>
             <option value="MBBS">MBBS</option>
             <option value="MD">MD</option>
             <option value="DM">DM</option>
             <option value="MS">MS</option>
             </select>
             </td>
             <td><select class="inp-form" name="medical_feild" id="medical_feild">
             <option value="">Select Medical Field</option>
             <?
             $sql_medical="Select * from conference_type";
			 $res_medical=mysql_query($sql_medical) or die(mysql_error().$sql_medical);
			 while($row_medical=mysql_fetch_assoc($res_medical)){
				 
				 echo '<option value="'.$row_medical['id'].'">'.$row_medical['title'].'</option>';
				 }
			 
			 ?>
             </select></td>
             <td><select class="inp-form" name="employee_type" id="employee_type">
             <option value="">Select Employment Type</option>
             <option value="Hospital">Hospital</option>
             <option value="Private Practice">Private Practice</option>
             <option value="Professional Services">Professional Services</option>
             <option value="Government">Government</option>
             <option value="IT">IT</option>
             <option value="Others">Others</option>
             </select></td>
             <td>
             <select class="inp-form" name="employer_name" id="employer_name">
             <option value="">Select Employer's Name</option>
             <?
             $sql_employer_name="select employer_name from customer where employer_name!='' group by employer_name";
			 $res_employer_name=mysql_query($sql_employer_name) or die(mysql_error().$sql_employer_name);
			 while($row_employer_name=mysql_fetch_assoc($res_employer_name)){
				 
				 echo '<option value="'.$row_employer_name['employer_name'].'">'.$row_employer_name['employer_name'].'</option>';
				 }
			 ?>
             </select>
             </td>
             </tr>
           </table>
           	
           
            </div>
            <div id="tabs-8">
           <table border="0" width="100%" cellpadding="0" cellspacing="0" id="">
            <tr>&nbsp;</tr>
             <tr><th style="text-align:left">Psychographic Details</th></tr>
            <tr><th>&nbsp;</th></tr>
            <tr>
            <td>
            <select name="general_intrest" id="general_intrest" class="inp-form">
            <option value="">Select General Interests</option>
            <option value="Sports">Sports</option>
            <option value="Music">Music</option>
            <option value="Television/Film">Television/Film</option>
            <option value="Travel">Travel</option>
            <option value="gourmet/Fine Food">gourmet/Fine Food</option>
            <option value="Shopping">Shopping</option>
            <option value="Fashion Clothing">Fashion Clothing</option>
            <option value="Physical Fitness">Physical Fitness</option>
            <option value="Wildlife">Wildlife</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;
             <select name="travel_intrest" class="inp-form" id="travel_intrest">
            <option value="">Select Travel Interests</option>
            <option value="Adventure Travel">Adventure Travel</option>
            <option value="Spiritual Travel">Spiritual Travel</option>
            <option value="Religious Travel">Religious Travel</option>
            <option value="Solo Travel">Solo Travel</option>
            <option value="Party Travel">Party Travel</option>
            <option value="Family Travel">Family Travel</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <select class="inp-form" name="traveller_type" id="traveller_type">
            <option value="">Select Traveller Type</option>
            <option value="FIT">FIT</option>
            <option value="Group">Group</option>
            </select>
            </td>
            
            </tr>
           </table>
            </div>
            <div id="tabs-9">
             <table border="0" width="100%" cellpadding="0" cellspacing="0" id="">
            <tr>&nbsp;</tr>
             <tr><th style="text-align:left">Relationship with Lavida</th></tr>
            <tr><th>&nbsp;</th></tr>
            <tr>
            <td>
            <select class="inp-form" name="conference_name" id="conference_name">
            <option value="">Select Conference Name</option>
            <?
            $sql_confrence="Select * from lavida_relation where confrence_name!='' group by confrence_name";
			$res_confrence=mysql_query($sql_confrence) or die(mysql_error().$sql_confrence);
			while($row_confrence=mysql_fetch_assoc($res_confrence)){
				
				echo '<option value="'.$row_confrence['confrence_name'].'">'.$row_confrence['confrence_name'].'</option>';
				}
			?>
            </select>
            </td>
            <td>
            <select class="inp-form" name="conference_date" id="conference_date">
            <option value="">Date of Conference</option>
            <?
            $sql_confrense_date="Select * from lavida_relation where confrence_date!='' group by confrence_date";
			$res_confrense_date=mysql_query($sql_confrense_date) or die(mysql_error().$sql_confrense_date);
			while($row__confrense_date=mysql_fetch_assoc($res_confrense_date)){
				
				echo '<option value="'.date("d-m-Y", strtotime($row__confrense_date['confrence_date'])).'">'.date("d-m-Y", strtotime($row__confrense_date['confrence_date'])).'</option>';
				}
			?>
            </select>
            </td>
            <td>
            <select class="inp-form" name="conference_location" id="conference_location">
            <option value="">Select Location</option>
            <?
            $sql_location="Select * from lavida_relation where location!='' group by location";
			$res_location=mysql_query($sql_location) or die(mysql_error().$sql_location);
			while($row_location=mysql_fetch_assoc($res_location)){
				
				echo '<option value="'.$row_location['location'].'">'.$row_location['location'].'</option>';
				}
			?>
            </select>
            </td>
            <td>
           <select class="inp-form" name="conference_medical" id="conference_medical">
           <option value="">Select Medical Fields</option>
            <?
             $sql_medical="Select * from conference_type";
			 $res_medical=mysql_query($sql_medical) or die(mysql_error().$sql_medical);
			 while($row_medical=mysql_fetch_assoc($res_medical)){
				 
				 echo '<option value="'.$row_medical['id'].'">'.$row_medical['title'].'</option>';
				 }
			 
			 ?>
           </select> 
            </td>
            </tr>
            </table>
            </div>
            </div>
            <div align="right">
           <input type="button" name="go" value="go" onClick="Professional_Details()" style="padding:5px; border-radius:5px;">  
			</div>
            
            <div class="clear"></div>
            <br/>
		   <div id="customer_list" style="display:none;"> 
               <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
               <tr>
                <th class="table-header-repeat line-left minwidth-1"><a href="">Customer Name</a></th>
                <th class="table-header-repeat line-left minwidth-1"><a href="">Name Of Employer</a></th>
                <th class="table-header-repeat  line-left"><a href="">Email</a></th>
                <th class="table-header-repeat  line-left"><a href="">Contact No</a></th>
               </tr>
               <tbody id="show_professional_details">
             
               </tbody> 
                </table>
                <a href="javascript:download_csv()" style="background-color:#CCC; padding:7px; border-radius:2px;">Download CSV</a>
        </div>
        </div>
           
            <form action="" method="post" id="idForm">
            <div id="Corporate_customer" style="display:none;">
            <div id="tabs3">
		 		<ul>
                	<li><a href="#tabs-10">Corporate Details</a></li>
                    <li><a href="#tabs-11">Branch Info</a></li>
                    <li><a href="#tabs-12">Other Information</a></li>
                    <li><a href="#tabs-13">Relationship With Lavida</a></li>
                </ul>
         <div id="tabs-10"> 
         <table border="0" width="100%" cellpadding="0" cellspacing="0" id="">
            <tr>&nbsp;</tr>
             <tr><th style="text-align:left">Corporate Details</th></tr>
            <tr><th>&nbsp;</th></tr>
            <tr>
            <td>
            <select class="inp-form" name="corporate_name" id="corporate_name">
            <option value="">Corporate Name</option>
            <?
            $sql_corporate_name="select * from corporate_customer where is_deleted=0";
			$res_corporate_name=mysql_query($sql_corporate_name) or die(mysql_error().$sql_corporate_name);
			while($row_corporate_name=mysql_fetch_assoc($res_corporate_name)){
				
				echo '<option value="'.$row_corporate_name['corporate_name'].'">'.$row_corporate_name['corporate_name'].'</option>';
				}
			?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select class="inp-form" name="contact_type" id="contact_type">
            <option value="">Select Contact Type</option>
            <option value="Corporate Client">Corporate Client</option>
            <option value="Tour Operator Client">Tour Operator Client</option>
            <option value="Vendor - Hotel">Vendor - Hotel</option>
            <option value="Vendor - TO">Vendor - To</option>
    		</select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select class="inp-form" name="corporate_city" id="corporate_city">
            <option value="">Select City</option>
            <?
            $sql_corporate_city="select * from corporate_customer group by city";
			$res_corporate_city=mysql_query($sql_corporate_city) or die(mysql_error().$sql_corporate_city);
			while($row_corporate_city=mysql_fetch_assoc($res_corporate_city)){
				
				echo '<option value="'.$row_corporate_city['city'].'">'.$row_corporate_city['city'].'</option>';
				}
			?>
            </select>
            </td>
            </tr>
           </table>     
         </div>
         <div id="tabs-11">  
           <table border="0" width="100%" cellpadding="0" cellspacing="0" id="">
            <tr>&nbsp;</tr>
             <tr><th style="text-align:left">Branch Info</th></tr>
            <tr><th>&nbsp;</th></tr>
            <tr>
            <td>
            <select class="inp-form" name="branch_city" id="branch_city">
            <option value="">Select Branch City</option>
            <?
            $sql_branch_city="select * from corporate_branch_info group by city";
			$rss_branch_city=mysql_query($sql_branch_city) or die(mysql_error().$sql_branch_city);
			while($row_branch_city=mysql_fetch_assoc($rss_branch_city)){
				
				echo '<option value="'.$row_branch_city['city'].'">'.$row_branch_city['city'].'</option>';
				} 
			?>
            </select>
            </td>
            </tr>
           </table>     
         </div>
         <div id="tabs-12"> 
         <table border="0" width="100%" cellpadding="0" cellspacing="0" id="">
            <tr>
            <th style="text-align:left">Area Of Operation</th>
            </tr>
            <tr><td>&nbsp;</td></tr>
             <tr style="line-height:2em">
        <td width="180"><input type="checkbox" value="India" name="operation[]">&nbsp;&nbsp;&nbsp;India</td>
        <td width="180"><input type="checkbox" value="South East Asia" name="operation[]">&nbsp;&nbsp;&nbsp;South East Asia</td>
        <td width="180"><input type="checkbox" value="Japan" name="operation[]">&nbsp;&nbsp;&nbsp;Japan</td>
        <td width="180"><input type="checkbox" value="Middle East"  name="operation[]">&nbsp;&nbsp;&nbsp;Middle East </td>
        <td width="180"><input type="checkbox" value="North Africa"  name="operation[]">&nbsp;&nbsp;&nbsp;North Africa</td>   
                </tr> 
                <tr style="line-height:2em">
                
                <td width="180"><input type="checkbox" value="South Africa"  name="operation[]">&nbsp;&nbsp;&nbsp;South Africa</td>
                <td width="180"><input type="checkbox" value="Europe"  name="operation[]">&nbsp;&nbsp;&nbsp;Europe</td>
                <td width="180"><input type="checkbox" value="Asia Pacific"  name="operation[]">&nbsp;&nbsp;&nbsp;Asia Pacific </td>   
                <td width="180"><input type="checkbox" value="US/North America"  name="operation[]">&nbsp;&nbsp;&nbsp;US / North America</td>
                <td width="180"><input type="checkbox" value="Latin America"  name="operation[]">&nbsp;&nbsp;&nbsp;Latin America</td>
                </tr> 
			 <tr>
              <tr><td>&nbsp;</td></tr>
            <th style="text-align:left">Area Of Intrest</th>
            </tr>
            <tr><td>&nbsp;</td></tr>
              <tr style="line-height:2em">
                <td width="180"><input type="checkbox" value="Spiritual" name="Intrest[]">&nbsp;&nbsp;&nbsp;Spiritual</td>
                <td width="180"><input type="checkbox" value="Adventure" name="Intrest[]">&nbsp;&nbsp;&nbsp;Adventure</td>
              <td width="180"><input type="checkbox" value="Women" name="Intrest[]">&nbsp;&nbsp;&nbsp;Women</td>				
              <td width="180"><input type="checkbox" value="Culture" name="Intrest[]">&nbsp;&nbsp;&nbsp;Culture</td>				
              <td width="180"><input type="checkbox" value="Theme" name="Intrest[]">&nbsp;&nbsp;&nbsp;Theme</td>		
               </tr><tr style="line-height:2em">
              <td width="180"><input type="checkbox" value="Business" name="Intrest[]">&nbsp;&nbsp;&nbsp;Business</td> 
                </tr>
         </table>      
         </div>
         <div id="tabs-13">
         <table border="0" width="100%" cellpadding="0" cellspacing="0" id="">
            <tr>&nbsp;</tr>
             <tr><th style="text-align:left">Relationship With Lavida</th></tr>
            <tr><th>&nbsp;</th></tr>
            <tr>
            <td>
            <select class="inp-form" name="tour_name" id="tour_name">
            <option value="">Select Tour Name</option>
            <?
            $sql_tour_name="select * from corporate_lavida_relation group by tour_name";
			$rss_tour_name=mysql_query($sql_tour_name) or die(mysql_error().$sql_tour_name);
			while($row_tour_name=mysql_fetch_assoc($rss_tour_name)){
				
			echo '<option value="'.$row_tour_name['tour_name'].'">'.$row_tour_name['tour_name'].'</option>';	
				}
			?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select class="inp-form" name="tour_city" id="tour_city">
            <option value="">Select Tour City</option>
            <?
            $sql_tour_city="select * from corporate_lavida_relation group by tour_city";
			$rss_tour_city=mysql_query($sql_tour_city) or die(mysql_error().$sql_tour_city);
			while($row_tour_city=mysql_fetch_assoc($rss_tour_city)){
				
			echo '<option value="'.$row_tour_city['tour_city'].'">'.$row_tour_city['tour_city'].'</option>';	
				}
			?>
            </select>
            </td>
            
            
            </tr>
         </table>       
         </div>      
         </div>
            <div align="right">
           		<input type="button" name="go" value="go" onClick="corporate_Details()" style="padding:5px; border-radius:5px;">  
			</div>
            <br/>
      <div id="corporate_customer_list" style="display:none;"> 
       <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
       <tr>
		<th class="table-header-repeat line-left minwidth-1"><a href="">Corporate Name</a></th>
        <th class="table-header-repeat line-left minwidth-1"><a href="">City</a></th>
        <th class="table-header-repeat  line-left"><a href="">Email</a></th>
        <th class="table-header-repeat  line-left"><a href="">Contact No</a></th>
       </tr>
       <tbody id="show_corporate_details">
     
       </tbody> 
        </table>
        <a href="javascript:download_csv2()" style="background-color:#CCC; padding:7px; border-radius:2px;">Download CSV</a>
        </div>
        </div>
			</form>
            
             </div>
           <div id="BLANK_TYPE" style="min-height:150px;">
           <p style="margin-left:20px;">Please select the customer type...</p>
           </div>         
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
    </div>
    
    <div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<? include('__footer.php');?>
<!-- end footer -->
 
</body>
</html>
<!--customer marketing list -->

<script>
function download_csv(){
	specialization=$("#specialization").val();
	medical_feild=$("#medical_feild").val();
	employee_type=$("#employee_type").val();
	employer_name=$("#employer_name").val();
	general_intrest=$("#general_intrest").val();
	travel_intrest=$("#travel_intrest").val();
	traveller_type=$("#traveller_type").val();
	confrence_name=$("#conference_name").val();
	conference_date=$("#conference_date").val();
	conference_location=$("#conference_location").val();
	conference_medical=$("#conference_medical").val();
	
	       window.location.href="download_csv.php?specialization="+specialization+"&medical_feild="+medical_feild+"&employee_type="+employee_type+"&employer_name="+employer_name+"&general_intrest="+general_intrest+"&traveller_type="+traveller_type+"&travel_intrest="+travel_intrest+"&confrence_name="+confrence_name+"&conference_date="+conference_date+"&conference_location="+conference_location+"&conference_medical="+conference_medical;
		   
    
}


</script>
<script>
function Professional_Details(){
	specialization=$("#specialization").val();
	medical_feild=$("#medical_feild").val();
	employee_type=$("#employee_type").val();
	employer_name=$("#employer_name").val();
	general_intrest=$("#general_intrest").val();
	travel_intrest=$("#travel_intrest").val();
	traveller_type=$("#traveller_type").val();
	confrence_name=$("#conference_name").val();
	conference_date=$("#conference_date").val();
	conference_location=$("#conference_location").val();
	conference_medical=$("#conference_medical").val();
	
	$.ajax({
           type: "POST",
           url: "ajax_get_professional_details.php?specialization="+specialization+"&medical_feild="+medical_feild+"&employee_type="+employee_type+"&employer_name="+employer_name+"&general_intrest="+general_intrest+"&traveller_type="+traveller_type+"&travel_intrest="+travel_intrest+"&confrence_name="+confrence_name+"&conference_date="+conference_date+"&conference_location="+conference_location+"&conference_medical="+conference_medical,
           data: $("#idForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
               $("#show_professional_details").html(data);
			    $("#customer_list").show();
           }
         });

}


</script>
<script>
function corporate_Details(){
	corporate_name=$("#corporate_name").val();
	corporate_city=$("#corporate_city").val();
	branch_city=$("#branch_city").val();
	tour_name=$("#tour_name").val();
	tour_city=$("#tour_city").val();
	
	$( "input:checked" ).val()
	$.ajax({
           type: "POST",
           url: "ajax_get_corporate_details.php?corporate_name="+corporate_name+"&corporate_city="+corporate_city+"&branch_city="+branch_city+"&tour_name="+tour_name+"&tour_city="+tour_city+"&contact_type="+contact_type,
           data: $("#idForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
               $("#show_corporate_details").html(data);
			    $("#corporate_customer_list").show();
           }
         });

}


</script>

<script>

ShowMonthly(<?=$month?>,<?=$year?>);
function ShowMonthly(month,year){
	
	var type= $('input[name=event_type]:checked').val();
	
$.ajax({
           type: "POST",
           url: "monthly.php?month="+month+"&year="+year+"&type="+type,
           data: $("#idForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
               $(".ShowMonthly").html(data);
           }
         });
}
</script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>
<script>
$(document).ready(function(){
    $("#BIRTH").click(function(){
        $("#birthday_appear").show();
		 $("#LIST").hide();
		  $("#BACK").show();
    });
	$("#MARKETING").click(function(){
        $("#anniversary_appear").show();
		 $("#LIST").hide();
		  $("#BACK").show();
    });
});
</script>
<script>
function customer_type(){
	if($('#customer_type').val()==1){
		 $("#Individual_customer").show();
		  $("#BLANK_TYPE").hide();
		  $("#Corporate_customer").hide();
		}
	if($('#customer_type').val()==2){
		 $("#Individual_customer").hide();
		  $("#BLANK_TYPE").hide();
		  $("#Corporate_customer").show();
		}
	if($('#customer_type').val()==""){
		 $("#BLANK_TYPE").show();
		 
		}			
	}
</script>