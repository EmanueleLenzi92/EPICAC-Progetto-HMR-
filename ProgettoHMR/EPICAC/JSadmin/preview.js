//per creare il link dell'immagine preview (caricata in un div con disply none in happeningsform)
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgPreview')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
     }

//per creare il link del logo in evidenza preview (caricata in un div con disply none in happeningsform)	 
function readURLlogo(input) {
    if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
		$('#logoPreview')
		.attr('src', e.target.result)
		.width(150)
		.height(200);
		};
		reader.readAsDataURL(input.files[0]);
	}
}

$(document).ready(function () {
	
	
	$('#previewEvidenza').click (function() {
		
		var titolo;
		var recuperoTitolo= $('#titoloInEvidenza').val();
		if(recuperoTitolo == ""){
			titolo= ""
		} else{
			titolo= recuperoTitolo 
		}
		
		tinyMCE.triggerSave();
		var testoo= $('#testoInEvidenza').val();
		
		
		var imgLink;
		var recuperoImmagineCaricata= $('#linkIcona').val();
		if (recuperoImmagineCaricata != ""){
			imgLink = "../../" + recuperoImmagineCaricata;
		} else imgLink= $('#logoPreview').attr('src');
		
		
		
		
		var handle = window.open("","" ,"scrollbars=1,resizable=1,height=500,width=1000");
		handle.document.write('<html><head><link rel="stylesheet" type="text/css" href="../../HMR_Style.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"><script type="text/javascript" src="../../Assets/JS/HMR_CreaHTML.js"></script><script type="text/javascript" src="../JSwebsite/searchAndSharing.js"></script></head><body><div class="HMR_Banner"><script> creaHeader(2, "HMR_2017g_GC-WebHeaderRite-270x105-1.png") </script></div><div id="HMR_Menu" class="HMR_Menu" ><script> creaMenu(2, 0) </script></div><div class="HMR_Content"><div id="HMR_StaticBox"><div class= "HMR_TextIndex"><div w3-include-html="Assets/HTML/HMR_HP.html"></div><script>w3.includeHTML();</script></div></div>  <div id="HMR_DinamicBox"><table><tr><td class="HMR_cellaImmagine"><img src="' + imgLink + '"></td><td class="HMR_cellaScritte" valign="top"><h3>' + titolo + '</h3><p>' + testoo + '</p></td></tr></table></div></div></html>');
	});
	
	
	
	$('#previewEventi').click (function() {
		var data;
		var recuperoData= $('#dataEventi').val();
		if(recuperoData == ""){
			data= "";
		} else {
			data= '<b>' + recuperoData + ' - </b>';
		}
	
		var titolo;
		var recuperoTitolo= $('#titoloEventi').val();
		if(recuperoTitolo == ""){
			titolo= ""
		} else{
			titolo= '<b>' + recuperoTitolo + '</b> '
		}
	
		var sottotitolo;
		var recuperoSottotitolo= $('#sottotitoloEventi').val();
		if(recuperoSottotitolo == ""){
			sottotitolo= ""
		} else{
			sottotitolo= '<i>' + recuperoSottotitolo + ';</i> '
		}
	
		var autoriEventi;
		var recuperoAutoriEv= []
		$("#autoriEventiSelezionati p span").each(function() {
			$this = $(this);
			var value = $this.text();
			recuperoAutoriEv.push(value);
		});
		if(recuperoAutoriEv.length == 0){
			autoriEventi= ""
		} else{
			var autori= "";
			for(var i=0; i<recuperoAutoriEv.length; i++){
				autori= recuperoAutoriEv[i] + " " + autori ;
			}
			autoriEventi= '<i>' + autori + '</i> '
		}
	
		var aCapo= "";
		if ((autoriEventi != "") || (sottotitolo != "")){
			aCapo= '<br/>';
		}
	
		tinyMCE.triggerSave();
		var testo= $('#testoEventi').val();
	
		var handle = window.open("","" ,"scrollbars=1,resizable=1,height=500,width=1000");
		handle.document.write('<html><head><link rel="stylesheet" type="text/css" href="../../HMR_Style.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"><script type="text/javascript" src="../../Assets/JS/HMR_CreaHTML.js"></script><script type="text/javascript" src="../JSwebsite/searchAndSharing.js"></script></head><body><div class="HMR_Banner"><script> creaHeader(2, "HMR_2017g_GC-WebHeaderRite-270x105-1.png") </script></div><div id="HMR_Menu" class="HMR_Menu" ><script> creaMenu(2, 0) </script></div><div class="HMR_Content"><div class="HMR_Text"><div class="HMR_Evento"><p>' + data + titolo + '<br/>' + sottotitolo + autoriEventi + aCapo +  testo +  '</p></div></div></div></html>');
	});


	$('#previewCronologia').click (function() {
		var data;
		var recuperoData= $('#dataCronologia').val();
		if(recuperoData == ""){
			data= "";
		} else {
			data= '<b>' + recuperoData + ' - </b>';
		}
	
		var titolo;
		var recuperoTitolo= $('#titoloCrono').val();
		if(recuperoTitolo == ""){
			titolo= ""
		} else{
			titolo= '<b>' + recuperoTitolo + '</b> '
		}
	
		var sottotitolo;
		var recuperoSottotitolo= $('#sottotitoloCrono').val();
		if(recuperoSottotitolo == ""){
			sottotitolo= ""
		} else{
			sottotitolo= '<i>' + recuperoSottotitolo + ';</i> '
		}
	
		var autoriCrono;
		var recuperoAutoriCr= []
		$("#autoriCronologiaSelezionati p span").each(function() {
			$this = $(this);
			var value = $this.text();
			recuperoAutoriCr.push(value);
		});
		if(recuperoAutoriCr.length == 0){
			autoriCrono= ""
		} else{
			var autori= "";
			for(var i=0; i<recuperoAutoriCr.length; i++){
				autori= recuperoAutoriCr[i] + " " + autori ;
			}
			autoriCrono= '<i>' + autori + '</i> '
		}
	
		var aCapo= "";
		if ((autoriCrono != "") || (sottotitolo != "")){
			aCapo= '<br/>';
		}
	
		tinyMCE.triggerSave();
		var testo= $('#testoInCronologia').val();
	
		var handle = window.open("","" ,"scrollbars=1,resizable=1,height=500,width=1000");
		handle.document.write('<html><head><link rel="stylesheet" type="text/css" href="../../HMR_Style.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"><script type="text/javascript" src="../../Assets/JS/HMR_CreaHTML.js"></script><script type="text/javascript" src="../JSwebsite/searchAndSharing.js"></script></head><body><div class="HMR_Banner"><script> creaHeader(2, "HMR_2017g_GC-WebHeaderRite-270x105-1.png") </script></div><div id="HMR_Menu" class="HMR_Menu" ><script> creaMenu(2, 0) </script></div><div class="HMR_Content"><div class="HMR_Text"><div class="HMR_Evento"><p>' + data + titolo + '<br/>' + sottotitolo + autoriCrono + aCapo +  testo +  '</p></div></div></div></html>');
	});
	
	
	
	
	$('#previewPgDedicata').click (function() {
		
		
		var titolo;
		var recuperoTitolo= $('#titoloPgDedicata').val();
		if(recuperoTitolo == ""){
			titolo= ""
		} else{
			titolo= '<h1>' + recuperoTitolo + '</h1> '
		}
	
		var sottotitolo;
		var recuperoSottotitolo= $('#sottotitoloPgDedicata').val();
		if(recuperoSottotitolo == ""){
			sottotitolo= ""
		} else{
			sottotitolo= '<i>' + recuperoSottotitolo + '; </i> '
		}
	
		var autoriPg;
		var recuperoAutoriPg= []
		$("#autoriPgDedicataSelezionati p span").each(function() {
			$this = $(this);
			var value = $this.text();
			recuperoAutoriPg.push(value);
		});
		if(recuperoAutoriPg.length == 0){
			autoriPg= ""
		} else{
			var autori= "";
			for(var i=0; i<recuperoAutoriPg.length; i++){
				autori= recuperoAutoriPg[i] + " " + autori ;
			}
			autoriPg= '<i>' + autori + '</i> '
		}
		
		var nomeCartellaImg= $('#nomeCartellaPagina').val();
		var imgLink;
		var recuperoImmagineCaricata= $('#linkImg').val();
		if (recuperoImmagineCaricata != ""){
			imgLink = "../../" + nomeCartellaImg + "/" + recuperoImmagineCaricata;
		}
		else imgLink= $('#imgPreview').attr('src');
		
		
		tinyMCE.triggerSave();
		var testo= '<p>' + $('#testoPgDedicata').val() + '</p>';
	
		var handle = window.open("","" ,"scrollbars=1,resizable=1,height=500,width=1000");
		//handle.document.write('<html><head><link rel="stylesheet" type="text/css" href="../../HMR_Style.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"><script type="text/javascript" src="../../Assets/JS/HMR_CreaHTML.js"></script><script type="text/javascript" src="../JSwebsite/searchAndSharing.js"></script></head><body><div class="HMR_Banner"><script> creaHeader(2, "HMR_2017g_GC-WebHeaderRite-270x105-1.png") </script></div><div id="HMR_Menu" class="HMR_Menu" ><script> creaMenu(2, 0) </script></div><div class="HMR_Content"><div class="HMR_Text"><div id="HMR_PaginaDedicata"><img id="imgPreview" src="' + imgLink + '" alt="Immagine" />' + titolo + sottotitolo + autoriPg + '<br/>' + testo + '</div></div></div></html>');
		handle.document.write('<html><head><link rel="stylesheet" type="text/css" href="../../HMR_Style.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"><script type="text/javascript" src="../../Assets/JS/HMR_CreaHTML.js"></script><script type="text/javascript" src="../JSwebsite/searchAndSharing.js"></script></head><body><div class="HMR_Banner"><script> creaHeader(2, "HMR_2017g_GC-WebHeaderRite-270x105-1.png") </script></div><div id="HMR_Menu" class="HMR_Menu" ><script> creaMenu(2, 0) </script></div><div class="HMR_Content"><div class="HMR_Text"><table class="TableDedicatedPage"><tr><td><img id="imgPreview" src="' + imgLink + '" alt="Immagine" /><td><td class="tdText">' + titolo + sottotitolo + autoriPg + '<br/>' + testo + '</td></tr></table></div></div></html>');
	});
	
	
	
	
	$('#previewRiferimenti').click (function() {
		var data;
		var recuperoData= $('#dataRiferimenti').val();
		if(recuperoData == ""){
			data= "";
		} else {
			data= ", " + recuperoData;
		}
	
		var titolo;
		var recuperoTitolo= $('#titoloRiferimenti').val();
		if(recuperoTitolo == ""){
			titolo= ""
		} else{
			//vedo se è stato selezionato un pdf sul titolo
			var presenzaLinkSuTitolo = [];
			$("#myTable tr").each(function() {
				$this = $(this);
				var value = $this.find(".cellaLinkSuTitolo p").html();
				presenzaLinkSuTitolo.push(value);
			});
			
			if( jQuery.inArray("Selezionato", presenzaLinkSuTitolo) !== -1){
				titolo= ', "<a href="#">' + recuperoTitolo + '</a>"';
			} else {
				titolo= ', "' + recuperoTitolo + '"';
			}
		}
	
		
		var ambito;
		var recuperoAmbito= $('#ambitoRiferimenti').val();
		if(recuperoAmbito == ""){
			ambito= ""
		} else{
			ambito= ', ' + recuperoAmbito; 
		}
	
		
		var autoriRif;
		var recuperoAutoriRif= []
		$("#autoriRiferimentiSelezionati p span").each(function() {
			$this = $(this);
			var value = $this.text();
			recuperoAutoriRif.push(value);
		});
		if(recuperoAutoriRif.length == 0){
			autoriRif= ""
		} else{
			var autori= "";
			for(var i=0; i<recuperoAutoriRif.length; i++){
				autori +=  recuperoAutoriRif[i] ;
			}
			autoriRif= autori 
		}
		
		var pdfParentesi= [];
		$("#myTable tr .cellaLinkSuTesto p").each(function() {
				$this = $(this);
				var value = $this.html();
				pdfParentesi.push(value);
			});
		
		if (pdfParentesi.length == 0){
			var pdf= "";
		} else {
			pdf= "( "
			for(var i=0; i<pdfParentesi.length; i++){
				pdf += "<a href='#'>" + pdfParentesi[i] + "</a> " ;
			}
			pdf+= ")";
		}
		
		
		var handle = window.open("","" ,"scrollbars=1,resizable=1,height=500,width=1000");
		handle.document.write('<html><head><link rel="stylesheet" type="text/css" href="../../HMR_Style.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"><script type="text/javascript" src="../../Assets/JS/HMR_CreaHTML.js"></script><script type="text/javascript" src="../JSwebsite/searchAndSharing.js"></script></head><body><div class="HMR_Banner"><script> creaHeader(2, "HMR_2017g_GC-WebHeaderRite-270x105-1.png") </script></div><div id="HMR_Menu" class="HMR_Menu" ><script> creaMenu(2, 0) </script></div><div class="HMR_Content"><div class="HMR_Text"><ol><li>' + autoriRif +  titolo + ambito + data + '</li></ol></div></div></div></html>');
	});
	
});