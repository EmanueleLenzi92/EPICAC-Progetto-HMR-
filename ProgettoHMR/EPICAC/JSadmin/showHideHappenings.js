$(document).ready(function(){
	
	$('#dedicataSelezionata').change(function() {
        if($(this).is(":checked")) {
           $("#HMR_PgDedicata").show();
        }
    else
    {
         $("#HMR_PgDedicata").hide();   
    }
    });
	
	$('#evidenzaSelezionata').change(function() {
        if($(this).is(":checked")) {
           $("#HMR_inEvidenza").show();
        }
    else
    {
         $("#HMR_inEvidenza").hide();   
    }
    });
	
	$('#cronologiaSelezionata').change(function() {
        if($(this).is(":checked")) {
           $("#HMR_inCronologia").show();
        }
    else
    {
         $("#HMR_inCronologia").hide();   
    }
    });
	
	$('#eventiSelezionata').change(function() {
        if($(this).is(":checked")) {
           $("#HMR_inEventi").show();
        }
    else
    {
         $("#HMR_inEventi").hide();   
    }
    });
	
	$('#riferimentiSelezionata').change(function() {
        if($(this).is(":checked")) {
           $("#HMR_inRiferimenti").show();
        }
    else
    {
         $("#HMR_inRiferimenti").hide();   
    }
    });
	
	
	
	$('#HMR_PgDedicata input:radio').click(function() {
    if ($(this).val() == "si") {
      $("#HMR_CampiPgGenerata").show();
    } else {
		$("#HMR_CampiPgGenerata").hide();  
	}
	if ($(this).val() == "no") {
       $("#HMR_CampiPgNonGenerata").show();
    } else{
		$("#HMR_CampiPgNonGenerata").hide(); 
	}
  });
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*
	if(document.getElementById('dedicataSelezionata').checked) {
		$("#pgDedicata").show();
	} else {
		$("#pgDedicata").hide();
	}
	
	if(document.getElementById('evidenzaSelezionata').checked) {
		$("#inEvidenza").show();
	} else {
		$("#inEvidenza").hide();
	}
	
	if(document.getElementById('cronologiaSelezionata').checked) {
		$("#inCronologia").show();
	} else {
		$("#inCronologia").hide();
	}
	
	if(document.getElementById('eventiSelezionata').checked) {     
		$("#inEventi").show();
	} else {
		$("#inEventi").hide();
	}
	
	if(document.getElementById('riferimentiSelezionata').checked) {
		$("#inRiferimenti").show();
	} else {
		$("#inRiferimenti").hide();
	}*/

	


});