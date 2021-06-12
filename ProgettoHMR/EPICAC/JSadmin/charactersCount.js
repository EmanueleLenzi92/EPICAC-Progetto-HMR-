$(document).ready(function(){
	//accadimento
	$("#contaTitoloAccadimento").text("Caratteri consigliati: " + $('#titoloAccadimento').val().length + "/50");
	$("#titoloAccadimento").keyup(function(){
		$("#contaTitoloAccadimento").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	
	$("#contaSottotitoloAccadimento").text("Caratteri consigliati: " + $('#sottotitoloAccadimento').val().length + "/50");
	$("#sottotitoloAccadimento").keyup(function(){
		$("#contaSottotitoloAccadimento").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	
	//pgDedicata
	$("#contaTitoloPgDedicata").text("Caratteri consigliati: " + $('#titoloPgDedicata').val().length + "/50");
	$("#titoloPgDedicata").keyup(function(){
		$("#contaTitoloPgDedicata").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	
	$("#contaSottotitoloPgDedicata").text("Caratteri consigliati: " + $('#sottotitoloPgDedicata').val().length + "/50");
	$("#sottotitoloPgDedicata").keyup(function(){
		$("#contaSottotitoloPgDedicata").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	
	//evidenza
	$("#contaTitoloEvidenza").text("Caratteri consigliati: " + $('#titoloInEvidenza').val().length + "/50");
	$("#titoloInEvidenza").keyup(function(){
		$("#contaTitoloEvidenza").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	
	//crono
	$("#contaTitoloCrono").text("Caratteri consigliati: " + $('#titoloCrono').val().length + "/50");
	$("#titoloCrono").keyup(function(){
		$("#contaTitoloCrono").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	
	$("#contaSottotitoloCrono").text("Caratteri consigliati: " + $('#sottotitoloCrono').val().length + "/50");
	$("#sottotitoloCrono").keyup(function(){
		$("#contaSottotitoloCrono").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	
	//eventi
	$("#contaTitoloEventi").text("Caratteri consigliati: " + $('#titoloEventi').val().length + "/50");
	$("#titoloEventi").keyup(function(){
		$("#contaTitoloEventi").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	
	$("#contaSottotitoloEventi").text("Caratteri consigliati: " + $('#sottotitoloEventi').val().length + "/50");
	$("#sottotitoloEventi").keyup(function(){
		$("#contaSottotitoloEventi").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	
	//riferimenti
	$("#contaTitoloRiferimenti").text("Caratteri consigliati: " + $('#titoloRiferimenti').val().length + "/50");
	$("#titoloRiferimenti").keyup(function(){
		$("#contaTitoloRiferimenti").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	
	$("#contaAmbitoRiferimenti").text("Caratteri consigliati: " + $('#ambitoRiferimenti').val().length + "/50");
	$("#ambitoRiferimenti").keyup(function(){
		$("#contaAmbitoRiferimenti").text("Caratteri consigliati: " + $(this).val().length + "/50");
	});
	

});








//$("#textarea").keyup(function(){
//  $("#count").text("Characters left: " + (500 - $(this).val().length));
//});