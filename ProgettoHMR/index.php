<!DOCTYPE html><html lang="it"><head><meta charset="UTF-8">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111997111-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111997111-1');
</script>

<title>Hackerando la Macchina Ridotta</title>

<link rel="stylesheet" type="text/css" href="HMR_Style.css">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" />

<link rel="icon" type="image/png" href="../Assets/Images/HMR_2017g_GC-WebFavIcon16x16.png" />

<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> 

<script type='text/javascript' src='EPICAC/JSwebsite/searchAndSharing.js'></script>

<script type='text/javascript' src='Assets/JS/HMR_CreaHTML.js'></script>



<meta name="description" content="HMR è un progetto di ricerca in storia dell'informatica, il suo obiettivo è recuperare e raccontare le storie e le tecnologie dei primi calcolatori - italiani in particolare, ma non solo. HMR è un progetto di storia e di informatica: da un lato studia e documenta lo sviluppo degli strumenti per il calcolo - calcolatori, ma non solo; dall'altro fa rivivere le tecnologie d'epoca, mantenendo in funzione gli originali, costruendone repliche e usando l'informatica di oggi (la simulazione software) per ricostruire copie virtuali ma fedeli delle macchine del passato.">

<meta name="keywords" content="hackerando hacker hacking macchina ridotta calcolatrice elettronica pisana CEP electronic computer storia history informatica computer science archeologia archeology sperimentale experimental ricostruzioni rebuilding replica repliche replicas simulazione simulation simulatori simulators macchine passato past machines laboratorio laboratori workshop didattica teaching museo museum strumenti calcolo computing machinery universitÃ  university pisa cignoni giovanni" />	

<!-- meta Facebook Open Graph -->
<meta id="metaImage" property="og:image" content="Assets/Images/"/>
<meta id="metaTitle" property="og:title" content="Hackerando la Macchina Ridotta"/>
<meta id="metaDescription" property="og:description" content="storia e archeologia sperimentale dell'informatica" />
<meta property="og:url" content="https://progettohmr.it/"/>
<meta property="og:site_name" content="HMR"/>
<meta property="og:type" content="website"/>
	
</head>

<body>

<!-- Standard HMRWeb header ///////////////////////////////////////////////////
// For banner:
// - set level, 1 = "../", 2 = "../../" and so on;
// - set image, file name and extension, no path, has to be in /Assets/Images.
// For menu:
// - set level, same as banner;
// - set active menu entry, 1=Cronologia, 2=Eventi and so on.  -->
	
<div class="HMR_Banner">
	<script> creaHeader(0, 'HMR_2017g_GC-WebHeaderRite-270x105-1.png') </script>
</div>
	
<div id="HMR_Menu" class="HMR_Menu" >
	<script> creaMenu(0, 0) </script>
</div>
	
<div class="HMR_Content">


	<div id="HMR_StaticBox">
			
		<div class= "HMR_TextIndex"><!--div per il testo statico da spostare con margin a sinistra-->
			<?php
			$content = file_get_contents('Assets/HTML/HMR_HP.html');
			echo $content;
			?>
		</div>
			
	</div>
		
	<div id="HMR_DinamicBox"> 
			
			<?PHP	
				include ('EPICAC/APIdb/HMR_EpicacDB.php');
				$query = 'SELECT IdHl, Position, Title, Text, Icon, LinkTo, Visible FROM highlights WHERE Visible= "si" ORDER BY Position LIMIT 9';
				$result = mysqli_query($db, $query);
				while($row = mysqli_fetch_array($result)){
					echo '<table>';
					echo '<tr>';
					if($row['LinkTo'] == ""){
						echo '<td class="HMR_cellaImmagine"> <img src="'.$row['Icon'].'" alt=""> </td>';
					} else echo '<td class="HMR_cellaImmagine"> <a href='.$row["LinkTo"].'> <img src="'.$row['Icon'].'" alt="logo"></a></td>';
					echo '<td class="HMR_cellaScritte" valign="top">';
					if($row['LinkTo'] == ""){
						echo '<h3>'.$row['Title'].'</h3>';
					} else echo '<a href='.$row["LinkTo"].'><h3>'.$row['Title'].'</h3></a>';
					echo '<p>'.$row['Text'].'</p>';
					echo '</td>';
					echo '</tr>';
					echo '</table>';
				}
				
		?>
	</div>
	
</div>
	

<div class="HMR_Footer">
	
	<?PHP
	$queryultimaMod = 'SELECT Highlights FROM lastmod';
	$resultUltimaMod = mysqli_query($db, $queryultimaMod);
	while($row = mysqli_fetch_array($resultUltimaMod)){
		$ultimaMod=  $row['Highlights'];
	}
	
	echo '<div class="HMR_FooterTop">
		<img id="HMR_imgFooter" src="Assets/Images/CC_By-Nc-Nd-Eu-80x28.png" alt="">
		<div id="HMR_scrittaFooterUp">Copyright © 2009 - 2018 G.A.Cignoni</div>
		<div id="HMR_scrittaFooterBottom">Pagina creata: 03/21/2009; ultima modifica: '.$ultimaMod.'</div>
	</div>
	<div class="HMR_FooterBottom">
		<div id="HMR_SocialFooter"><a href="https://www.facebook.com/progettoHMR/" target="_blank">Segui HMR su Facebook</a></div>
		<a href="https://www.facebook.com/progettoHMR/" target="_blank"><img id="HMR_SocialFooterFb" src="Assets/Images/HMR_2017g_GC-FacebookIcon24x24.png" alt="Icona di Facebook" title="Icona di Facebook"></a>
		
		<span id="lineaSocial"></span>
		
		<div id="HMR_contatti"><a href="mailto:info@progettohmr.it">Contatti</a> <br/> <a href="Persone/">Persone</a></div>
		<div id="HMR_login"><a href="Administration/Assets/PHP/autentication.php"><img src="Assets/Images/HMR_2017g_GC-LoginIcon24x24.png" alt="Login"></a></div>
	</div>';
	?>

</div>
	
</body>


</html>












