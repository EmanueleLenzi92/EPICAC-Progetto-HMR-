

//Definisce il livello di una cartella e aggiunge '../' a seconda del livello messo
function climbTreeStr(level){
	var levelTree = "";
	var path = "../";
	var i = 0;
	while (i < level){
		levelTree = levelTree + path
		i++;
	}
	
	return levelTree;
}

//ultima modifica per footer
function ultimaModificaFooter(){
	var anno; var mese; var giorno; var ore; var minuti; var secondi;
	var data= new Date(document.lastModified);
	//lastmod = document.lastModified
	anno= data.getFullYear(data) + "/"
	//mese= data.getMonth(data) + "/"
	mese= ("0" + (data.getMonth(data) + 1)).slice(-2) + "/"
	//giorno= data.getDate(data) 
	giorno= ("0" + data.getDate(data)).slice(-2) + "/"
	ore= data.getHours(data) + ":"
	minuti= data.getMinutes(data) + ":"
	secondi= data.getSeconds(data) 
	
	return anno + mese + giorno + " " + ore + minuti + secondi
}

//Crea il footer
function creaFooter(level, annoInizio, annoFine, autori, dataCreazione, ultimaMod){
	var levelTree = climbTreeStr(level);
	var ultimaModifica= ultimaModificaFooter(ultimaMod)
	//$(".HMR_Footer").append("<table><tr><td><img src='" + levelTree + "Assets/Images/CC_By-Nc-Nd-Eu-100x35.png' alt=''></td><td><cite>Copyright © " + annoInizio + " - " + annoFine + " " + autori +  "</br>Pagina creata: " + dataCreazione +  "; ultima modifica: " + ultimaMod +  "</cite></td></tr></table><a href='amministrazione/asset/html/welcome.php'> <p>login</p> </a>"); 
		
	$(".HMR_Footer").append(""+
	"<div class='HMR_FooterTop'>"+
		"<img id='HMR_imgFooter' src='" + levelTree + "Assets/Images/CC_By-Nc-Nd-Eu-80x28.png' alt=''>"+
		"<div id='HMR_scrittaFooterUp'>Copyright © " + annoInizio + " - " + annoFine + " " + autori + "</div>"+
		"<div id='HMR_scrittaFooterBottom'>Pagina creata: "+ dataCreazione + "; ultima modifica: " + ultimaModifica + "</div>"+
	"</div>"+ 
	
	"<div class='HMR_FooterBottom'>"+
		"<div id='HMR_SocialFooter'><a href='https://www.facebook.com/progettoHMR/' target='_blank'>Segui HMR su Facebook</a></div>" +
		"<a href='https://www.facebook.com/progettoHMR/' target='_blank'><img id='HMR_SocialFooterFb' src='" + levelTree + "Assets/Images/HMR_2017g_GC-FacebookIcon24x24.png' alt='Icona di Facebook' title='Icona di Facebook'></a>" +
		
		"<span id='lineaSocial'></span>" +
		
		"<div id='HMR_contatti'><a href='mailto:info@progettohmr.it'>Contatti</a> <br/> <a href='"+levelTree+"Persone/'>Persone</a></div>" +
		
		"<div id='HMR_login'><a href='"+levelTree+"Administration/Assets/PHP/autentication.php'><img src='"+levelTree+"Assets/Images/HMR_2017g_GC-LoginIcon24x24.png' alt='Login'></a></div>" +
	"</div>"); 

}

//Crea l'header con i percorsi giusti (specificando il nome dell'immagine a destra dell'header e il livello della directory). il percorso dei link dell'header riportano sempre alla home e prendono automaticamente l'index.php  
function creaHeader(level, nameImg){
	var levelTree = climbTreeStr(level);
	$(".HMR_Banner").append("<a href='" + levelTree + "'><img id='HMR_Logo' src='" + levelTree + "Assets/Images/HMR_2017g_GC-WebHeaderLogo-140x105.gif' alt='img'></a>  <div id='HMR_HeaderText1'><a href='" + levelTree + "'>Hackerando la Macchina Ridotta</a></div> <div id='HMR_HeaderText2'>storia e archeologia sperimentale dell&rsquo;informatica</div>  <img id='HMR_HeaderRightImg' src='" + levelTree + "Assets/Images/" + nameImg + "' alt='img'>");
}





//Crea il menu con i link sottilineati a seconda della posizione delle voci di menù. nelle immagini in fondo ci sono i link per lo sharing che prendono la url della pagina e le funzioni per visualizzare le cose al click (ricerca e sharing)	
function creaMenu(level, currentLink){
	
	var levelTree = climbTreeStr(level);
	var titlePage = document.title //per titolo pgina nelle email
	titlePage = titlePage.replace(/'/g, '\'');
	
	var cronologia = "";
	var eventi = "";
	var corso = "";
	var ricostruzioni = "";
	var chkb = "";
	var oggisti = "";
	var documentazione = "";
	var biblioteca = "";
	
	switch(currentLink){
	
		case 1:
			cronologia = "active";  //cronologia
			break;
		case 2:
			eventi = "active";  //eventi
			break;
		case 3:
			corso = "active";  //corso
			break;
		case 4:
			ricostruzioni = "active";  //ricostruzioni
			break;
		case 5:
			oggisti = "active"; // oggisti
			break;
		case 6:
			chkb = "active";  //chkb
			break;
		case 7:
			documentazione = "active"; //documentazione
			break;
		case 8:
			biblioteca = "active"; //biblioteca
			break;
	}
	
	//$(".HMR_Menu").append("<div id='HMR_LeftMenu'><ul> <li ><a href='" + levelTree + "Cronologia/' class='" + cronologia + "' title='Cronologia del progetto' >Cronologia</a></li> <li><a href='" + levelTree + "Eventi/' class='" + eventi + "' title='HMR racconta: eventi, mostre e siminari'>Eventi</a></li> <li><a href='" + levelTree + "Corso/' class='" + corso +"' title='Il corso di Storia dell&rsquo;Informatica'>Corso</a></li> <li><a href='" + levelTree + "Ri-costruzioni/' class='" + ricostruzioni + "' title='(Ri)costruzioni: macchine, programmi e altro'>(Ri)costruzioni</a></li> <li><a href='" + levelTree + "oggiSTI/' class='" + oggisti + "' title='Oggi nella Storia dell&rsquo;Informatica'>OggiSTI</a></li> <li><a href='" + levelTree + "CHKB/' class='" + chkb + "' title='Computing History Knowledge Base'>CHKB</a></li> <li><a href='" + levelTree + "Riferimenti/' class='" + riferimenti + "' title='La bibliografia del progetto'>Riferimenti</a></li> </ul></div>   <div id='HMR_RightMenu'><ul> <li class='HMR_ContenitoreImgCentrate'><a href='http://www.facebook.com/sharer.php?u=" + window.location.href + "' target='_blank' title='Condividi su Facebook'><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-FacebookIcon24x24.png' id='facebookShare' style='display:none'></a></li>    <li class='HMR_ContenitoreImgCentrate' ><a href='mailto:?subject= Hackerando la macchina ridotta&body= Link del Progetto HMR: " + window.location.href + "' title='Condividi via email'><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-MailIcon24x24.png' id='emailShare' style='display:none'></a></li>    <li class='HMR_ContenitoreImgCentrate' ><a href='http://twitter.com/share?url=" + window.location.href + "' target='_blank' title='Condividi su Twitter' ><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-TwitterIcon24x24.png' id='twitterShare' style='display:none'></a></li>    <li class='HMR_ContenitoreImgCentrate' id='HMR_ShareIcon'><a href='#' onclick='visualizzaShare(); return false' title='Condividi' ><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-ShareIcon24x24.png' style='display:block' id='HMR_LogoshareIcon'></a> <form action='http://www.google.com/custom' method='get' target='_blank'><input type='hidden' value='progettohmr.it' name='as_sitesearch'><input type='hidden' value='it' name='hl'><input id='HMR_Ricerca' name='q' type='text' size='14' style='display:none'></form> </li>    <li class='HMR_ContenitoreImgCentrate' id='HMR_SearchIcon'><a href='#' onclick='visualizza(); return false' title='Cerca sul sito'> <img src='" + levelTree + "Assets/Images/HMR_2017g_GC-SearchIcon24x24.png'> </a></li>  <li id='HMR_Eng'><a href='" + levelTree + "index_en.html' >ENG</a></li> </ul></div>")
	//$(".HMR_Menu").append("<div id='HMR_LeftMenu'><ul> <li ><a href='" + levelTree + "Cronologia/' class='" + cronologia + "' title='Cronologia del progetto' >Cronologia</a></li> <li><a href='" + levelTree + "Eventi/' class='" + eventi + "' title='HMR racconta: eventi, mostre e seminari'>Eventi</a></li> <li><a href='" + levelTree + "Corso/' class='" + corso +"' title='Il corso di Storia dell&rsquo;Informatica'>Corso</a></li> <li><a href='" + levelTree + "Ri-costruzioni/' class='" + ricostruzioni + "' title='(Ri)costruzioni: macchine, programmi e altro'>(Ri)costruzioni</a></li> <li><a href='" + levelTree + "OggiSTI/' class='" + oggisti + "' title='Oggi nella Storia dell&rsquo;Informatica'>OggiSTI</a></li>  <li><a href='" + levelTree + "Documentazione/' class='" + documentazione + "' title='Articoli, presentazioni e documenti di progetto'>Documentazione</a></li> </ul></div>   <div id='HMR_RightMenu'><ul> <li class='HMR_ContenitoreImgCentrate'><a href='http://www.facebook.com/sharer.php?u=" + window.location.href + "' target='_blank' title='Condividi su Facebook'><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-FacebookIcon24x24.png' id='facebookShare' style='display:none'></a></li>    <li class='HMR_ContenitoreImgCentrate' ><a href='mailto:?subject=Progetto HMR&body=Ti segnalo la pagina &quot;" + titlePage + "&quot;%0D%0A" + window.location.href + "' title='Condividi via email'><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-MailIcon24x24.png' id='emailShare' style='display:none'></a></li>    <li class='HMR_ContenitoreImgCentrate' ><a href='http://twitter.com/share?url=" + window.location.href + "' target='_blank' title='Condividi su Twitter' ><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-TwitterIcon24x24.png' id='twitterShare' style='display:none'></a></li>    <li class='HMR_ContenitoreImgCentrate' id='HMR_ShareIcon'><a href='#' onclick='visualizzaShare(); return false' title='Condividi' ><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-ShareIcon24x24.png' style='display:block' id='HMR_LogoshareIcon'></a> <form action='http://www.google.com/custom' method='get' target='_blank'><input type='hidden' value='progettohmr.it' name='as_sitesearch'><input type='hidden' value='it' name='hl'><input id='HMR_Ricerca' name='q' type='text' size='14' style='display:none'></form> </li>    <li class='HMR_ContenitoreImgCentrate' id='HMR_SearchIcon'><a href='#' onclick='visualizza(); return false' title='Cerca sul sito'> <img src='" + levelTree + "Assets/Images/HMR_2017g_GC-SearchIcon24x24.png'> </a></li>  <li id='HMR_Eng'><a href='" + levelTree + "index_en.html' >ENG</a></li> </ul></div>")

	$(".HMR_Menu").append("" + 
	
	"<div id='HMR_LeftMenu'>"+
		"<ul>"+ 
			"<li ><a href='" + levelTree + "Cronologia/' class='" + cronologia + "' title='Cronologia del progetto' >Cronologia</a></li>" + 
			//"<li><a href='" + levelTree + "Eventi/' class='" + eventi + "' title='HMR racconta: eventi, mostre e seminari'>Eventi</a></li>" +  
			"<li><a href='" + levelTree + "Corso/' class='" + corso +"' title='Il corso di Storia dell&rsquo;Informatica'>Corso</a></li>" + 
			"<li><a href='" + levelTree + "Ri-costruzioni/' class='" + ricostruzioni + "' title='(Ri)costruzioni: macchine, programmi e altro'>(Ri)costruzioni</a></li>" + 
			"<li><a href='" + levelTree + "OggiSTI/' class='" + oggisti + "' title='Oggi nella Storia dell&rsquo;Informatica'>OggiSTI</a></li>"+  
			"<li><a href='" + levelTree + "Biblio/' class='" + biblioteca + "' title='La Biblioteca di HMR, consultabile per tutti'>Biblioteca</a></li>"+ 
			"<li><a href='" + levelTree + "Documentazione/' class='" + documentazione + "' title='Articoli, presentazioni e documenti di progetto'>Documentazione</a></li>"+ 
		"</ul>"+
	"</div>" +   
	
	"<div id='HMR_RightMenu'>"+
		"<ul>"+ 
			"<li class='HMR_ContenitoreImgCentrate'><a href='http://www.facebook.com/sharer.php?u=" + window.location.href + "' target='_blank' title='Condividi su Facebook'><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-FacebookIcon24x24.png' id='facebookShare' style='display:none'></a></li>"+    
			"<li class='HMR_ContenitoreImgCentrate' ><a href='mailto:?subject=Progetto HMR&body=Ti segnalo la pagina &quot;" + titlePage + "&quot;%0D%0A" + window.location.href + "' title='Condividi via email'><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-MailIcon24x24.png' id='emailShare' style='display:none'></a></li>"+    
			"<li class='HMR_ContenitoreImgCentrate' ><a href='http://twitter.com/share?url=" + window.location.href + "' target='_blank' title='Condividi su Twitter' ><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-TwitterIcon24x24.png' id='twitterShare' style='display:none'></a></li>"+    
			
			"<li class='HMR_ContenitoreImgCentrate' id='HMR_ShareIcon'>"+
				"<a href='#' onclick='visualizzaShare(); return false' title='Condividi' ><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-ShareIcon24x24.png' style='display:block' id='HMR_LogoshareIcon' alt='Icona di condivisione' title='Icona di condivisione'></a>"+ 
				"<form action='http://www.google.com/custom' method='get' target='_blank'>"+
					"<input type='hidden' value='progettohmr.it' name='as_sitesearch'><input type='hidden' value='it' name='hl'><input id='HMR_Ricerca' name='q' type='text' size='14' style='display:none'>"+
				"</form>"+ 
			"</li>"+    
			"<li class='HMR_ContenitoreImgCentrate' id='HMR_SearchIcon'>"+
				"<a href='#' onclick='visualizza(); return false' title='Cerca sul sito'><img src='" + levelTree + "Assets/Images/HMR_2017g_GC-SearchIcon24x24.png' alt='Icona di ricerca' title='Icona di ricerca'></a>"+
			"</li>"+  
			"<li id='HMR_Eng'><a href='" + levelTree + "index_en.html' >ENG</a></li>"+ 
		"</ul>"+
	"</div>")
	
} 