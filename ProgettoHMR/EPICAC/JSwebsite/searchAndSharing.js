
function visualizza(){ 
  
    if(document.getElementById('HMR_Ricerca').style.display == 'none'){ //all'inizio "ricerca" (che è l'input text) è per forza none. se si clicca sulla lente, compare "ricerca" e scompaiono tutte le altre icone (copresa quella di sharing). Se ci si riclicca ricompare l'icna di sharing e scompare l'input
      document.getElementById('HMR_Ricerca').style.display = 'block'; 
	  document.getElementById('facebookShare').style.display = 'none'; 
	  document.getElementById('emailShare').style.display = 'none';
	  document.getElementById('twitterShare').style.display = 'none';
	  document.getElementById('HMR_LogoshareIcon').style.display = 'none';
    }else{ 
      document.getElementById('HMR_Ricerca').style.display = 'none'; 
	  document.getElementById('HMR_LogoshareIcon').style.display = 'block';
	 
    }  
	
  }
  
function visualizzaShare(){ 
  
    if((document.getElementById('emailShare').style.display == 'none') && (document.getElementById('facebookShare').style.display == 'none') && (document.getElementById('twitterShare').style.display == 'none')) { 
      document.getElementById('facebookShare').style.display = 'block'; 
	  document.getElementById('emailShare').style.display = 'block'; 
	  document.getElementById('twitterShare').style.display = 'block';
    }else{ 
      document.getElementById('facebookShare').style.display = 'none'; 
	  document.getElementById('emailShare').style.display = 'none';
	  document.getElementById('twitterShare').style.display = 'none';
    }  
	
  }
  
 
 
 
 
 
 
