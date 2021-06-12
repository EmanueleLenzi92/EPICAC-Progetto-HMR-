
$(document).ready(function () {

   $("#formAccadimento").validate({
        rules: {
            titoloAccadimento: {
                required: true
            },
            dataAccadimento: {
                required: true
            },
			ancora: {
				required: true
			}
        }
    });
	
	
	//Salva cancella tutti i controlli e salva i dati
	$('#salva').click(function () {
		$('#formAccadimento :input').each(function () {
			$(this).rules('remove');
		});
		$("#formAccadimento").valid();  
		$("#formAccadimento").submit();
	});

    //pubblica, aggiunge i controlli ai campi a seconda delle checkbox
    $('#pubblica').click(function () {
		var pagDedicataSi= $('#PaginaDaCreareSi:checked').val()
		var pagDedicataNo= $('#PaginaDaCreareNo:checked').val()
        var crono= $('#MHR_Checkbox #cronologiaSelezionata:checked').val()
		var eventi = $('#MHR_Checkbox #eventiSelezionata:checked').val()
		var riferimenti= $('#MHR_Checkbox #riferimentiSelezionata:checked').val()
		var evidenza= $('#MHR_Checkbox #evidenzaSelezionata:checked').val()
		
		var controlloCheckbox= [pagDedicataSi, pagDedicataNo, crono, eventi, riferimenti, evidenza]
		
		for(var i=0; i < controlloCheckbox.length; i++){
			if(jQuery.inArray( "evidenza", controlloCheckbox ) !== -1 ){
				$('#HMR_inEvidenza #titoloInEvidenza').rules('add', {
				required: true
				});
				
				$('#HMR_inEvidenza input[name="posizioneBox"]').rules('add', {
				required: true
				});
			} else {
				$('#HMR_inEvidenza #titoloInEvidenza').rules('remove');
				
				$('#HMR_inEvidenza input[name="posizioneBox"]').rules('remove');
			}
			
			if(jQuery.inArray( "cronologia", controlloCheckbox ) !== -1 ){
				$('#HMR_inCronologia #titoloCrono').rules('add', {
				required: true
				});
			
			} else {
				$('#HMR_inCronologia #titoloCrono').rules('remove')
				
			}
			
			if(jQuery.inArray( "eventi", controlloCheckbox ) !== -1 ){
				$('#HMR_inEventi input[name="tipoEventi"]').rules('add', {
				required: true
				});
				$('#HMR_inEventi #titoloEventi').rules('add', {
				required: true
				});
				
			} else {
				$('#HMR_inEventi input[name="tipoEventi"]').rules('remove')
				$('#HMR_inEventi #titoloEventi').rules('remove')
				
			}
			
			if(jQuery.inArray( "riferimenti", controlloCheckbox ) !== -1 ){
				$('#HMR_inRiferimenti #titoloRiferimenti').rules('add', {
				required: true
				});
				$('#HMR_inRiferimenti #ambitoRiferimenti').rules('add', {
				required: true
				});
				$('#HMR_inRiferimenti #tipoRiferimento').rules('add', {
				required: true
				});
			
			} else {
				$('#HMR_inRiferimenti #titoloRiferimenti').rules('remove')
				$('#HMR_inRiferimenti #ambitoRiferimenti').rules('remove')
				$('#HMR_inRiferimenti #tipoRiferimento').rules('remove')
			}
			
			if(jQuery.inArray( "si", controlloCheckbox ) !== -1 ){
				$('#HMR_CampiPgGenerata #titoloPgDedicata').rules('add', {
				required: true
				});
				
			} else {
				$('#HMR_CampiPgGenerata #titoloPgDedicata').rules('remove')
				
			}
		
			if(jQuery.inArray( "no", controlloCheckbox ) !== -1 ){
				$('#HMR_CampiPgNonGenerata #linkriferimento').rules('add', {
				required: true
				});
			} else {
				$('#HMR_CampiPgNonGenerata #linkriferimento').rules('remove')
			}
		
		}
	});
        
	
});

	
	
	
	
	
	
	