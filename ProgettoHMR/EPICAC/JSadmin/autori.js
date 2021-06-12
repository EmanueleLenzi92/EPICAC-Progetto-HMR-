function aggiungiAutoreAccadimento(){
	var idAutore = $( "#selectAutoriAccadimento option:selected" ).val(); //recuper valore e id dell'autore selezionato
	var NomeAutore = $( "#selectAutoriAccadimento option:selected" ).text();
	
	var autoriGiaInseriti = []; //metto in un array gli id degli span degli autori già inseriti da confronare con quelli nuovi da inserire
	$("#autoriAccadimentoSelezionati p span").each(function() {
		$this = $(this);
		var value = $this.attr('id');
		autoriGiaInseriti.push(value);
	});
	
	if (idAutore!= -1){ //se non è stato selezionato nessun autore, ne viene scelto uno gia presente o ne vengono selezionati piu di 6, non funziona. altrimenti lo aggiunge e ne crea un input nascosto. AGGIUNGE AUTORI A TUTTE LE SEZIONI DEL CMS
		if(jQuery.inArray(idAutore, autoriGiaInseriti) == -1){
			if(autoriGiaInseriti.length < 6){ 
				$('#autoriAccadimentoSelezionati p').append('<span id="' + idAutore + '" >' + NomeAutore + '<input type="checkbox" value="' + idAutore + '" name="rimuoviAutoreAccadimento"><input type="hidden" name="inputIdAutoriAccadimento[]" value="' + idAutore +'" ></span>')
				$('#autoriPgDedicataSelezionati p').append('<span id="' + idAutore + '" >' + NomeAutore + '<input type="checkbox" value="' + idAutore + '" name="rimuoviAutorePgDedicata"><input type="hidden" name="inputIdAutoriPgDedicata[]" value="' + idAutore +'" ></span>')
				$('#autoriCronologiaSelezionati p').append('<span id="' + idAutore + '" >' + NomeAutore + '<input type="checkbox" value="' + idAutore + '" name="rimuoviAutoreCronologia"><input type="hidden" name="inputIdAutoriCronologia[]" value="' + idAutore +'" ></span>')
				$('#autoriEventiSelezionati p').append('<span id="' + idAutore + '" >' + NomeAutore + '<input type="checkbox" value="' + idAutore + '" name="rimuoviAutoreEvento"><input type="hidden" name="inputIdAutoriEventi[]" value="' + idAutore +'" ></span>')
				$('#autoriRiferimentiSelezionati p').append('<span id="' + idAutore + '" >' + NomeAutore + '<input type="checkbox" value="' + idAutore + '" name="rimuoviAutoreRiferimento"><input type="hidden" name="inputIdAutoriRiferimenti[]" value="' + idAutore +'" ></span>')
			} else alert('Massimo autori raggiunto')
		} else alert('Autore gia presente')
	} else alert('scegli un autore')
}

function rimuoviAutoriAccadimento(){
	var arreychekboxAutoriDaRimuovere = [];
	$("input[name='rimuoviAutoreAccadimento']:checked").each(function (){ //scorro tutti gli input checkbox checkati e inserisco il loro valore in un array
		arreychekboxAutoriDaRimuovere.push($(this).val());
	});
	
	if(arreychekboxAutoriDaRimuovere != ""){ 
		for(i=0; i<arreychekboxAutoriDaRimuovere.length ; i++){ 
			$('#autoriAccadimentoSelezionati p span[id="' + arreychekboxAutoriDaRimuovere[i] +  '"]').remove();
			$('#autoriPgDedicataSelezionati p span[id="' + arreychekboxAutoriDaRimuovere[i] +  '"]').remove();
			$('#autoriCronologiaSelezionati p span[id="' + arreychekboxAutoriDaRimuovere[i] +  '"]').remove();
			$('#autoriEventiSelezionati p span[id="' + arreychekboxAutoriDaRimuovere[i] +  '"]').remove();
			$('#autoriRiferimentiSelezionati p span[id="' + arreychekboxAutoriDaRimuovere[i] +  '"]').remove();
		}
	} else alert('Seleziona gli autori da eliminare')
}

function aggiungiAutorePgDedicata(){
	var idAutore = $( "#selectAutoriPgDedicata option:selected" ).val(); //recuper valore e id dell'autore selezionato
	var NomeAutore = $( "#selectAutoriPgDedicata option:selected" ).text();
	
	var autoriGiaInseriti = []; //metto in un array gli id degli span degli autori già inseriti da confronare con quelli nuovi da inserire
	$("#autoriPgDedicataSelezionati p span").each(function() {
		$this = $(this);
		var value = $this.attr('id');
		autoriGiaInseriti.push(value);
	});
	
	if (idAutore!= -1){ //se non è stato selezionato nessun autore, ne viene scelto uno gia presente o ne vengono selezionati piu di 6, non funziona. altrimenti lo aggiunge e ne crea un input nascosto. AGGIUNGE AUTORI A TUTTE LE SEZIONI DEL CMS
		if(jQuery.inArray(idAutore, autoriGiaInseriti) == -1){
			if(autoriGiaInseriti.length < 6){ 
				$('#autoriPgDedicataSelezionati p').append('<span id="' + idAutore + '" >' + NomeAutore + '<input type="checkbox" value="' + idAutore + '" name="rimuoviAutorePgDedicata"><input type="hidden" name="inputIdAutoriPgDedicata[]" value="' + idAutore +'" ></span>')
			} else alert('Massimo autori raggiunto')
		} else alert('Autore gia presente')
	} else alert('scegli un autore')
}

function rimuoviAutoriPgDedicata(){
	var arreychekboxAutoriDaRimuovere = [];
	$("input[name='rimuoviAutorePgDedicata']:checked").each(function (){ //scorro tutti gli input checkbox checkati e inserisco il loro valore in un array
		arreychekboxAutoriDaRimuovere.push($(this).val());
	});
	
	if(arreychekboxAutoriDaRimuovere != ""){ 
		for(i=0; i<arreychekboxAutoriDaRimuovere.length ; i++){ 
			$('#autoriPgDedicataSelezionati p span[id="' + arreychekboxAutoriDaRimuovere[i] +  '"]').remove();
		}
	} else alert('Seleziona gli autori da eliminare')
}

function aggiungiAutoreCronologia(){
	var idAutore = $( "#selectAutoriCronologia option:selected" ).val(); //recuper valore e id dell'autore selezionato
	var NomeAutore = $( "#selectAutoriCronologia option:selected" ).text();
	
	var autoriGiaInseriti = []; //metto in un array gli id degli span degli autori già inseriti da confronare con quelli nuovi da inserire
	$("#autoriCronologiaSelezionati p span").each(function() {
		$this = $(this);
		var value = $this.attr('id');
		autoriGiaInseriti.push(value);
	});
	
	if (idAutore!= -1){ //se non è stato selezionato nessun autore, ne viene scelto uno gia presente o ne vengono selezionati piu di 6, non funziona. altrimenti lo aggiunge e ne crea un input nascosto. AGGIUNGE AUTORI A TUTTE LE SEZIONI DEL CMS
		if(jQuery.inArray(idAutore, autoriGiaInseriti) == -1){
			if(autoriGiaInseriti.length < 6){ 
				$('#autoriCronologiaSelezionati p').append('<span id="' + idAutore + '" >' + NomeAutore + '<input type="checkbox" value="' + idAutore + '" name="rimuoviAutoreCronologia"><input type="hidden" name="inputIdAutoriCronologia[]" value="' + idAutore +'" ></span>')
			} else alert('Massimo autori raggiunto')
		} else alert('Autore gia presente')
	} else alert('scegli un autore')
}

function rimuoviAutoriCronologia(){
	var arreychekboxAutoriDaRimuovere = [];
	$("input[name='rimuoviAutoreCronologia']:checked").each(function (){ //scorro tutti gli input checkbox checkati e inserisco il loro valore in un array
		arreychekboxAutoriDaRimuovere.push($(this).val());
	});
	
	if(arreychekboxAutoriDaRimuovere != ""){ 
		for(i=0; i<arreychekboxAutoriDaRimuovere.length ; i++){ 
			$('#autoriCronologiaSelezionati p span[id="' + arreychekboxAutoriDaRimuovere[i] +  '"]').remove();
		}
	} else alert('Seleziona gli autori da eliminare')
}

function aggiungiAutoreEvento(){
	var idAutore = $( "#selectAutoriEventi option:selected" ).val(); //recuper valore e id dell'autore selezionato
	var NomeAutore = $( "#selectAutoriEventi option:selected" ).text();
	
	var autoriGiaInseriti = []; //metto in un array gli id degli span degli autori già inseriti da confronare con quelli nuovi da inserire
	$("#autoriEventiSelezionati p span").each(function() {
		$this = $(this);
		var value = $this.attr('id');
		autoriGiaInseriti.push(value);
	});
	
	if (idAutore!= -1){ //se non è stato selezionato nessun autore, ne viene scelto uno gia presente o ne vengono selezionati piu di 6, non funziona. altrimenti lo aggiunge e ne crea un input nascosto. AGGIUNGE AUTORI A TUTTE LE SEZIONI DEL CMS
		if(jQuery.inArray(idAutore, autoriGiaInseriti) == -1){
			if(autoriGiaInseriti.length < 6){ 
				$('#autoriEventiSelezionati p').append('<span id="' + idAutore + '" >' + NomeAutore + '<input type="checkbox" value="' + idAutore + '" name="rimuoviAutoreEvento"><input type="hidden" name="inputIdAutoriEventi[]" value="' + idAutore +'" ></span>')
			} else alert('Massimo autori raggiunto')
		} else alert('Autore gia presente')
	} else alert('scegli un autore')
}

function rimuoviAutoriEvento(){
	var arreychekboxAutoriDaRimuovere = [];
	$("input[name='rimuoviAutoreEvento']:checked").each(function (){ //scorro tutti gli input checkbox checkati e inserisco il loro valore in un array
		arreychekboxAutoriDaRimuovere.push($(this).val());
	});
	
	if(arreychekboxAutoriDaRimuovere != ""){ 
		for(i=0; i<arreychekboxAutoriDaRimuovere.length ; i++){ 
			$('#autoriEventiSelezionati p span[id="' + arreychekboxAutoriDaRimuovere[i] +  '"]').remove();
		}
	} else alert('Seleziona gli autori da eliminare')
}

function aggiungiAutoreRiferimenti(){
	var idAutore = $( "#selectAutoriRiferimenti option:selected" ).val(); //recuper valore e id dell'autore selezionato
	var NomeAutore = $( "#selectAutoriRiferimenti option:selected" ).text();
	
	var autoriGiaInseriti = []; //metto in un array gli id degli span degli autori già inseriti da confronare con quelli nuovi da inserire
	$("#autoriRiferimentiSelezionati p span").each(function() {
		$this = $(this);
		var value = $this.attr('id');
		autoriGiaInseriti.push(value);
	});
	
	if (idAutore!= -1){ //se non è stato selezionato nessun autore, ne viene scelto uno gia presente o ne vengono selezionati piu di 6, non funziona. altrimenti lo aggiunge e ne crea un input nascosto. AGGIUNGE AUTORI A TUTTE LE SEZIONI DEL CMS
		if(jQuery.inArray(idAutore, autoriGiaInseriti) == -1){
			if(autoriGiaInseriti.length < 6){ 
				$('#autoriRiferimentiSelezionati p').append('<span id="' + idAutore + '" >' + NomeAutore + '<input type="checkbox" value="' + idAutore + '" name="rimuoviAutoreRiferimento"><input type="hidden" name="inputIdAutoriRiferimenti[]" value="' + idAutore +'" ></span>')
			} else alert('Massimo autori raggiunto')
		} else alert('Autore gia presente')
	} else alert('scegli un autore')
}

function rimuoviAutoriRiferimenti(){
	var arreychekboxAutoriDaRimuovere = [];
	$("input[name='rimuoviAutoreRiferimento']:checked").each(function (){ //scorro tutti gli input checkbox checkati e inserisco il loro valore in un array
		arreychekboxAutoriDaRimuovere.push($(this).val());
	});
	
	if(arreychekboxAutoriDaRimuovere != ""){ 
		for(i=0; i<arreychekboxAutoriDaRimuovere.length ; i++){ 
			$('#autoriRiferimentiSelezionati p span[id="' + arreychekboxAutoriDaRimuovere[i] +  '"]').remove();
		}
	} else alert('Seleziona gli autori da eliminare')
}