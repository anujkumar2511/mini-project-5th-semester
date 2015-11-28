<html>
<body>
	<form action="<?php echo base_url();?>index.php/welcome/query3" method="post">
	Name <input type="text" name="name">
	Year <input type="year" name="year">
	<input type="submit" value="submit">
	<a href="<?php echo base_url();?>index.php/welcome/index">query1</a>
	<br>
	sno.   Name       Frequency    Year<br>
	<?php
	$i=0;
		foreach($dta as $out)
		{
			$i++;
			echo $i." ".$out->name." ".$out->freq." ".$out->year."<br>"; 

		}
	?>
</form>
</html>