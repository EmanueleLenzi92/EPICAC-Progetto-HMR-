<!DOCTYPE html>
<html>

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111997111-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-111997111-1');
	</script>
	
	<title></title>
	
	<meta name="description" content="">
	<script type='text/javascript' src='../EPICAC/JSwebsite/searchAndSharing.js'></script>
	<script type='text/javascript' src='../Assets/JS/HMR_CreaHTML.js'></script>
	<link rel="stylesheet" type="text/css" href="../HMR_Style.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link rel="icon" type="image/png" href="../Assets/Images/HMR_2017g_GC-WebFavIcon16x16.png" />
	<meta charset="utf-8">
	
	<!--Collection Sripts-->
	<?php  
	require ('../../Config/Biblio_config.php');
	require ('../Biblio/Assets/PHP/functions_get.php');
	include('../Administration/Assets/PHP/sessionSet.php');
	if(isset($_SESSION["fileSecretPermission"])){$fileSecretPermission = $_SESSION["fileSecretPermission"];} else {$fileSecretPermission= null;}
	?>
	<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type='text/javascript' src='../Biblio/Assets/JS/format_print_biblio2.0.js'></script>
	<script type='text/javascript' src='../Biblio/Assets/JS/collections.js'></script>
	<!--Collection-->
	
	
	<!--/////////////INSERT CODE HERE////////////////////////-->
	
	
	
	
	<!--/////////////INSERT CODE HERE//////////////////////////-->
	
	
	<style>
	.highlightedClickedLink{background-color:rgba(255,0,255,0.3);}
	ol li{margin-top: -8px;}
	</style>
	
	<?php		
		// scrolling page at clicked link
		if(isset($_GET['id'])){
					
			echo "<script>
			$(document).ready(function(){ 
						
				//add class highlightedClickedLink to clicked link
				$('#".$_GET['id']."').addClass('highlightedClickedLink')
						
				//scroll to post
						
				$('html, body').animate({
					scrollTop: $('#".$_GET['id']."').offset().top
				}, );
						
				// hide class for clicked link
				$( '#".$_GET['id']."' ).switchClass( 'highlightedClickedLink', '', 2500 );
						
			});
			</script>";
		}
	?>
	
</head>

<body>
	<div class="HMR_Banner">
		<script> creaHeader(1, 'HMR_2017g_GC-WebHeaderRite-270x105-1.png', 1) </script>
	</div>
	
	<div id="HMR_Menu" class="HMR_Menu" >
		<script> creaMenu(1, 7, 1) </script>
	</div>
	
	<div class="HMR_Content">

		<div class= "HMR_Text">
			
			<div id="result"></div>
			
		</div>

	</div>

    <div class="HMR_Footer">
        <script>
            creaFooter(1, "2020", "2021", "G.A. Cignoni", 
                                "2021/01/20", "2021/05/11 18:15")
        </script> 
    </div>

</body>


</html>