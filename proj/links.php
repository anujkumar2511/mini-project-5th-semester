<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

<!--[if IE]>

<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />

<![endif]-->



<!--  jquery core -->

<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>



<!--  checkbox styling script -->

<script src="js/jquery/ui.core.js" type="text/javascript"></script>

<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>

<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>

<script type="text/javascript">

$(function(){

	
	$('#toggle-all').click(function(){

 	$('#toggle-all').toggleClass('toggle-checked');

	$('#mainform input[type=checkbox]').checkBox('toggle');

	return false;

	});

});

</script>  






<!--  styled select box script version 2 --> 

<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>








<!-- Custom jquery scripts -->

<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

 

<!-- Tooltips -->

<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>

<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>

 





<!--  date picker script -->
<script src="js/jquery/date.js" type="text/javascript"></script>

<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>





<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->

<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>

