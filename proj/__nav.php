<nav>
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
        <div id="nav-right">
			
			<div class="showhide-account">&nbsp;</div>
			
			<div class="nav-divider">&nbsp;</div>
            
			<div class="clear">&nbsp;</div>
		
			
		</div>
        <? if($_SESSION['type']==0){?> 
		<div id="nav-right" style="width:50px;">
			
			<div class="showhide-account">&nbsp;</div>
			
			<div class="nav-divider">&nbsp;</div>
            
			
			<div class="clear">&nbsp;</div>
		
			
		</div>
        <? }?>
		<!-- end nav-right -->
        

		<!--  start nav -->
		<nav>
     <ul class="nav">
       <li><a href="index.php"  <? if($p==1) echo 'class="selected"'; ?>>Dashboard</a></li>
       <li><a href="add_Name.php" <? if($p==3) echo 'class="selected"'; ?>>Add Populer Name</a></li>
       <li><a href="report.php" <? if($p==4) echo 'class="selected"'; ?>>Report</a></li>
       <li><a href="new_graph.php" <? if($p==5) echo 'class="selected"'; ?>>Graph</a></li>
  </ul>

</nav>
</div>
<!--  start nav-outer -->
</div>
</nav>