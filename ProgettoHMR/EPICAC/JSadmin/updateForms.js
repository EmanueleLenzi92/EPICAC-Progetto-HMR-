function aggiornaLink() 
{ 
    
	document.getElementById('sottotitoloCrono').value = document.getElementById('sottotitoloAccadimento').value;
	document.getElementById('sottotitoloEventi').value = document.getElementById('sottotitoloAccadimento').value;
	document.getElementById('dataCronologia').value = document.getElementById('dataAccadimento').value;
	document.getElementById('dataEventi').value = document.getElementById('dataAccadimento').value;
	document.getElementById('dataRiferimenti').value = document.getElementById('dataAccadimento').value;
	document.getElementById('titoloCrono').value = document.getElementById('titoloAccadimento').value;
	document.getElementById('titoloEventi').value = document.getElementById('titoloAccadimento').value;
	document.getElementById('titoloRiferimenti').value = document.getElementById('titoloAccadimento').value;
	
	document.getElementById('linkAccadimentoCronologia').innerHTML = 'http://www.progettohmr.it/Cronologia/?id=' + document.getElementById('Ancora').value; 
	
	document.getElementById('linkAccadimentoEventi').innerHTML = 'http://www.progettohmr.it/Eventi/?id=' + document.getElementById('Ancora').value; 
	document.getElementById('linkAccadimentoRiferimenti').innerHTML = 'http://www.progettohmr.it/Documentazione/?id=' + document.getElementById('Ancora').value;
	
} 

function aggiornaTitolo(){
	document.getElementById('titoloCrono').value = document.getElementById('titoloAccadimento').value; 
	document.getElementById('contaTitoloCrono').innerHTML = 'Caratteri consigliati ' + document.getElementById('titoloCrono').value.length + '/50'
	
	document.getElementById('titoloEventi').value = document.getElementById('titoloAccadimento').value; 
	document.getElementById('contaTitoloEventi').innerHTML = 'Caratteri consigliati ' + document.getElementById('titoloEventi').value.length + '/50'   
	
	document.getElementById('titoloRiferimenti').value = document.getElementById('titoloAccadimento').value; 
	document.getElementById('contaTitoloRiferimenti').innerHTML = 'Caratteri consigliati ' + document.getElementById('titoloRiferimenti').value.length + '/50'
	
	document.getElementById('titoloPgDedicata').value = document.getElementById('titoloAccadimento').value;
	document.getElementById('contaTitoloPgDedicata').innerHTML = 'Caratteri consigliati ' + document.getElementById('titoloPgDedicata').value.length + '/50'
}

function aggiornaSottotitolo(){
	document.getElementById('sottotitoloCrono').value = document.getElementById('sottotitoloAccadimento').value;  
	document.getElementById('contaSottotitoloCrono').innerHTML = 'Caratteri consigliati ' + document.getElementById('sottotitoloCrono').value.length + '/50'
	
	document.getElementById('sottotitoloEventi').value = document.getElementById('sottotitoloAccadimento').value;
	document.getElementById('contaSottotitoloEventi').innerHTML = 'Caratteri consigliati ' + document.getElementById('sottotitoloEventi').value.length + '/50'
	
	document.getElementById('sottotitoloPgDedicata').value = document.getElementById('sottotitoloAccadimento').value;
	document.getElementById('contaSottotitoloPgDedicata').innerHTML = 'Caratteri consigliati ' + document.getElementById('sottotitoloPgDedicata').value.length + '/50'
}

function aggiornaData(){
	document.getElementById('dataCronologia').value = document.getElementById('dataAccadimento').value;
	document.getElementById('dataEventi').value = document.getElementById('dataAccadimento').value;
	document.getElementById('dataRiferimenti').value = document.getElementById('dataAccadimento').value;
}

function aggiornaAncora(){
	document.getElementById('linkAccadimentoCronologia').innerHTML = "http://www.progettohmr.it/Cronologia/?id=" + document.getElementById('Ancora').value; 
	document.getElementById('linkAccadimentoEventi').innerHTML = "http://www.progettohmr.it/Eventi/?id=" + document.getElementById('Ancora').value; 
	document.getElementById('linkAccadimentoRiferimenti').innerHTML = "http://www.progettohmr.it/Documentazione/?id=" + document.getElementById('Ancora').value;
}