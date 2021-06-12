



function campoSingolo(){
	var numeroCampi= $('#campiAggiuntiPdf p').length; //conto i p e le righe della tabella per stabilire quante volte il campo può apparire (il numero delle righe mi serve anche per il valore del radio button, che è uguale al numero delle righe)
	var numeroRigheTabella= $('#myTable tr').length;
	var presenzaLinkSuTitolo = []; //creo l'arrey dove inserisco i vaolri della tabella linksutitolo, e vedo se c'è almeno un "selezionato"
	
	$("#myTable tr").each(function() {
	$this = $(this);
	var value = $this.find(".cellaLinkSuTitolo p").html();
	presenzaLinkSuTitolo.push(value);
	});

	if(numeroCampi == 0) { //imposto i limiti di un campo solo alla volta e di massimo 16
		if (numeroRigheTabella < 17){
			if( jQuery.inArray("Selezionato", presenzaLinkSuTitolo) !== -1){ //se nell'array c'è "selezionato", e quindi è gia stato riportato un link su titolo, il nuovo link su titolo sarà readonly
				$('#campiAggiuntiPdf').append("<p id='campi' style='display:block'> <input type='checkbox' id='pdfDaCaricare' name='pdfDaCaricare' value='1' onclick='mostraNascondiInputPdf();'/>PDF <span id='spanInputPdf' style='display: none;'><input type='file' id='inputPDFutente' name='pdf[]' /></span> <span id='spanLinkEsterno'><input type='text' id='linkEsterno' name='linkEsterno[]' value='' onchange='CheckInputLinkEsterno();'/>LinkEst</span> <input type='radio' id='titoloLinkato' name='titoloLinkato' value='" + numeroRigheTabella + "' disabled />link su titolo <input type='text' id='linkSuTesto' name='linkSuTesto[]' value='' onchange='CheckInputTestoLinkato();'/>link su testo <input type='button' value='conferma' id='confermaPdf' onclick='aggiungi();'> <input type='button' value='annulla' id='annullaPdf' onclick='annullaCampoSingolo();'> </p>");
			} else {
				$('#campiAggiuntiPdf').append("<p id='campi' style='display:block'> <input type='checkbox' id='pdfDaCaricare' name='pdfDaCaricare' value='1' onclick='mostraNascondiInputPdf();' />PDF <span id='spanInputPdf' style='display: none;'><input type='file' id='inputPDFutente' name='pdf[]' /></span> <span id='spanLinkEsterno'><input type='text' id='linkEsterno' name='linkEsterno[]' value='' onchange='CheckInputLinkEsterno();'/>LinkEst</span> <input type='radio' id='titoloLinkato' name='titoloLinkato' value='" + numeroRigheTabella + "' onclick='Checkradiobutton();' />link su titolo <input type='text' id='linkSuTesto' name='linkSuTesto[]' value='' onchange='CheckInputTestoLinkato();'/>link su testo <input type='button' value='conferma' id='confermaPdf' onclick='aggiungi();'> <input type='button' value='annulla' id='annullaPdf' onclick='annullaCampoSingolo();'> </p>");
			}
		} else {
			alert('Massimo PDF raggiunto');
		}
		
	} else {
		alert('Prima conferma la tua scelta');
	}

}

function annullaCampoSingolo(){
	$( "#campi" ).remove();
}

function aggiungi(){
	var presenzaPDF= $("#campiAggiuntiPdf #inputPDFutente").val(); //variabili per controllare se è cliccabile il tasto conferma
	var presenzaInputTestoLink= $("#campiAggiuntiPdf #linkSuTesto").val(); 
	var presenzaRadioPdf = $('#campiAggiuntiPdf input[name=pdfDaCaricare]:checked').val();
	var presenzaTitoloLinkato = $('#campiAggiuntiPdf input[name=titoloLinkato]:checked').val();
	var presenzaLinkEst = $('#campiAggiuntiPdf #linkEsterno').val();
	
	var id= $('#myTable tr').length; //l'id è il numero delle righe (da 1 a 5)
	

	
	//prima controllo i pdf (cliccati checkbox, input fyle e testo, o checkbox, input fyle e linktitolo) poi i link esterni 
	if(((presenzaPDF != "") && ($('#campiAggiuntiPdf input[name=titoloLinkato]').is(':checked')) && ($('#campiAggiuntiPdf input[name=pdfDaCaricare]').is(':checked'))) || ((presenzaPDF != "") && (presenzaInputTestoLink != "") && ($('#campiAggiuntiPdf input[name=pdfDaCaricare]').is(':checked'))) || ((presenzaLinkEst != "") && ($('#campiAggiuntiPdf input[name=titoloLinkato]').is(':checked'))) ||  ((presenzaLinkEst != "") && (presenzaInputTestoLink != "")) ){
		
		//creo la nuova riga con iframe nascosti per i campi da copiarci
		$('#myTable tr:last').after('<tr class="datiPdfInseriti" id="rigaPdf_' + id + '"> <td class="cellaPdf"><span class="hiddenIframePDF" style="display:none"></span></td> <td class="cellaLinkSuTitolo"><span class="hiddenIframeLinkSuTitolo" style="display:none"></span></td> <td class="cellaLinkSuTesto"><span class="hiddenIframeLinkSuTesto" style="display:none"></span></td> <td class="cellaLinkEsterno"><span class="hiddenIframeLinkEsterno" style="display:none"></span></td> <td><p><input type="checkbox" name="rimuoviPdf" value="rigaPdf_' + id + '"></p></td> </tr>');
	
		var $inputPDF = $("#campiAggiuntiPdf #inputPDFutente"), $clone = $inputPDF.clone(); //assegno alla variabile $inputPDF 'file1' che è l'input dove inserire i pdf e lo clono
		$inputPDF.after($clone).appendTo('.hiddenIframePDF:last'); //appendo il clone al nodo b (in un campo nascosto iframe hidden)
		var nomePDF = $('#campiAggiuntiPdf #inputPDFutente[type=file]').val().split('\\').pop(); //prendo il nome del pdf da inserire nella tabella
		$('.hiddenIframePDF:last').append("<input type='text' id='nomePdf' name='nomePdf[]' value='" + nomePDF +"' />" ); //appendo anche un input col nome del pdf. mi servirà per confrontarlo con le aggiunte/modifiche dei pdf al posto dell'array globale $files
		$('.hiddenIframePDF:last').append("<input type='text' id='linkPdf' name='linkPdf[]' value='' />" ); //il link all'inizio è vuoto
		$('tr .cellaPdf:last').append('<p>' + nomePDF + '</p>');
 
		var titoloLinkato = $('#campiAggiuntiPdf input[name=titoloLinkato]:checked').val(); //se il valore non è undefined, vuol dire che è stato selezionato "link su titolo". quindi questo pdf avrà scritto "selezionato" nella tabellina. Il valore reale non mi interessa qui. mi interessa nel codice PHP
		if (titoloLinkato != undefined){
			$('tr .cellaLinkSuTitolo:last').append("<p>Selezionato</p>");
		}
		var $clone = $("#campiAggiuntiPdf").clone(true).find('input[name=titoloLinkato]').attr('name', 'titoloLinkato'); //clono il radio button e lo metto nel iform nascosto in tabella
		$clone.appendTo('.hiddenIframeLinkSuTitolo:last');
	
		var titoloSuTesto = $("#campiAggiuntiPdf #linkSuTesto").val();
		$('tr .cellaLinkSuTesto:last').append('<p>' + titoloSuTesto + '</p>');
		var $inputLinkTesto = $("#campiAggiuntiPdf #linkSuTesto"), $clone = $inputLinkTesto.clone();
		$inputLinkTesto.after($clone).appendTo('.hiddenIframeLinkSuTesto:last');
		
		var linkEsterno = $("#campiAggiuntiPdf #linkEsterno").val();
		$('tr .cellaLinkEsterno:last').append('<p>' + linkEsterno + '</p>');
		var $inputLinkEsterno = $("#campiAggiuntiPdf #linkEsterno"), $clone = $inputLinkEsterno.clone();
		$inputLinkEsterno.after($clone).appendTo('.hiddenIframeLinkEsterno:last');
		
		$( "#campi" ).remove(); //rimuovo il campo p dove c'è anche il file input principale. rimarrà solo il clone nascosto
	} else {
		alert("Inserire un pdf o un riferimento esterno con le relative ancore")
	}
	
}

//function controlloAggiungi(){
	//var presenzaInputTestoLink= $("#campiAggiuntiPdf #linkSuTesto").val();
	//var presenzaRadioPdf = $('#campiAggiuntiPdf input[name=pdfDaCaricare]:checked').val();
	//var presenzaTitoloLinkato = $('#campiAggiuntiPdf input[name=titoloLinkato]:checked').val();
	//var presenzaLinkEst = $('#campiAggiuntiPdf #linkEsterno').val();
	//	if(presenzaPDF == ""){
		//	alert('NO')
		//	return false
		//} else {
		//	alert('si')
		//return true;	}	
//}

function mostraNascondiInputPdf(){	//se selezionato il radiobutton PDF, compare l'input fyle(che è display none) e scompare il link esterno
	
	if($('#campiAggiuntiPdf input[name=pdfDaCaricare]').is(':checked')){
		$("#spanInputPdf").show();
		$("#spanLinkEsterno").hide();  
    }  else{
		$("#spanInputPdf").hide();
		$("#spanLinkEsterno").show();  
	}

}
	
function Checkradiobutton(){
	if($('#campiAggiuntiPdf input[name=titoloLinkato]').is(':checked')){    // se il radio button è cliccato link su titolo, l'input #linkSuTesto è disabilitato
		$("#campiAggiuntiPdf #linkSuTesto").attr('readonly', true);
	}else{
		$("#campiAggiuntiPdf #linkSuTesto").attr('readonly', false);
	}
}

function CheckInputTestoLinkato(){
	var val= $("#campiAggiuntiPdf #linkSuTesto").val(); //recupero il valore (le scritte) del campo. se ci sono scritte, cambio l'attributo del radio button in #campiAggiuntiPdf
	if ((val =! "") || (val.length  > 0)) {
		$("#campiAggiuntiPdf input[name=titoloLinkato]").attr('disabled', true);
	} else{
		$("#campiAggiuntiPdf input[name=titoloLinkato]").attr('disabled', false);
	}
}

function CheckInputLinkEsterno(){ //se scrivo sul linkEsterno, non si può cliccare su radiobuttonPDF
	var val= $("#campiAggiuntiPdf #linkEsterno").val();
	if ((val =! "") || (val.length  > 0)) {
		$("#campiAggiuntiPdf input[name=pdfDaCaricare]").attr('disabled', true);
	} else{
		$("#campiAggiuntiPdf input[name=pdfDaCaricare]").attr('disabled', false);
	}
}



function RimuoviPdfs(){
	
	var arreychekboxPdfDaRimuovere = [];
	$("input[name='rimuoviPdf']:checked").each(function (){ //scorro tutti gli input checkbox checkati e inserisco il loro valore in un array
		arreychekboxPdfDaRimuovere.push($(this).val());
		//https://stackoverflow.com/questions/6166763/jquery-multiple-checkboxes-array
	});
	
	
	
	
	
	if(arreychekboxPdfDaRimuovere != ""){ //inizia ad eliminare solo se sono stati selezionati i pdf e quindi l'arrey non è vuoto
		//var idTabella= [];
		//$("#myTable .datiPdfInseriti").each(function (){ //scorro le righe della tabella con i dati (escludendo quella coi titoli) e salvo gli id delle righe nel'array
		//	idTabella.push($(this).attr('id'))
		//});
	
	//	for(i=0; i<idTabella.length ; i++){ //scorro i 2 array e rimuovo gli id che sono in tutti i 2 gli array
			
			for(j=0; j<arreychekboxPdfDaRimuovere.length ; j++){
				var nomePdfEliminare= $("#myTable #" + arreychekboxPdfDaRimuovere[j] + " .cellaPdf .hiddenIframePDF #nomePdf").val(); //salvo i valori dei pdf da mettere negli input nascosti per eliminarlinel php
				$("#myTable #" + arreychekboxPdfDaRimuovere[j]).remove(); //rimuovo la riga della tabella
				if(nomePdfEliminare != ""){
					$('#inputPdfEliminati').append('<input type="hidden" name="pdfDaEliminare[]" value="' + nomePdfEliminare + '" >');
				}
			}
		
		
	//	}
	
		var idTabella= []; //svuoto l'arrey e lo aggiorno con gli id rimasti da ricompattare e ordinare
		$("#myTable .datiPdfInseriti").each(function (){ 
			idTabella.push($(this).attr('id'))
		});
		for (i=0; i<idTabella.length; i++){ //scorro il nuovo array con i pdf rimanenti, e li ricompatto mettendo PRIMA il valore del rimuoviPdf, poi il valore dell'input linkSutitolo checkato (con i+1 perche i parte da 0, ma l'id è sempre almeno 1), poi perULTIMO l'id della riga mettendoli in ordine (sfruttando l'indice + 1 perche le righe partono da 1, mentre la scansione dell'arrey parte da 0 perche voglio scandire tutti gli elementi)
			$('#myTable #' + idTabella[i] + ' td p input[name="rimuoviPdf"]').val('rigaPdf_' + (i + 1));
			$('#myTable #' + idTabella[i] + ' .cellaLinkSuTitolo .hiddenIframeLinkSuTitolo input[name="titoloLinkato"]:checked').val(i + 1);
			$('#myTable #' + idTabella[i]).attr( 'id','rigaPdf_' + (i + 1));
		
		
		}
	} else {
		alert ("seleziona prima i pdf da eliminare");
	}

	
}