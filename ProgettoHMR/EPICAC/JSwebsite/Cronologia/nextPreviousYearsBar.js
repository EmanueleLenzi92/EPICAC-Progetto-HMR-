$(document).ready(function(){
	
	$(".yearsBar p #yearDown").on('click', function(event) {
		
		// get 10 number between max and min
		var yearsInBar=[];
		$('.yearsBar p a').each(function(){
				if( $(this).css('display') == 'inline-block' ) {
					yearsInBar.push($(this).text());
				}
		});
		
		// get year min 
		var yearMin= $("#yearMin").text();
	
		// display 3points up
		$("#yearUp").css("display", "inline-block");
		
		// hide first number of taken numbers
		$("#a" + yearsInBar[0]).css("display", "none");
		
		// display others taken numbers
		for (var i=1; i < yearsInBar.length; i++){
			$("#a" + yearsInBar[i]).css("display", "inline-block");
		}
		
		// display next number
		var nextYear= Number(yearsInBar[9]) - 1
		
		$("#a" + nextYear).css("display", "inline-block");
	
		// hide 3points Down
		if((nextYear - 1) == yearMin){
			$("#yearDown").css("display", "none");
		}
		
		// managemant of " | "
		$(".yearsBar span").remove()
		$('.yearsBar p #yearMax').after("<span> | </span>");
		$('.yearsBar p a[style="display: inline-block;"]').after("<span> | </span>");
		$('#yearUp').after("<span> | </span>");
		if((nextYear - 1) != yearMin){
			$('#yearDown').after("<span> | </span>");
		}
		
		
	})
		
		
		
	$(".yearsBar p #yearUp").on('click', function(event) {
			
		// get 10 number between max and min
		var yearsInBar=[];
		$('.yearsBar p a').each(function(){
			
			if( $(this).css('display') == 'inline-block' ) {
				yearsInBar.push($(this).text());
			}
		});
		
		// get year max 
		var yearMax= $("#yearMax").text();
			
		// display 3points down
		$("#yearDown").css("display", "inline-block");
			
		// hide last number of taken numbers
		$("#a" + yearsInBar[9]).css("display", "none");
			
		// display others taken numbers
		for (var i=0; i < yearsInBar.length - 1; i++){
			$("#a" + yearsInBar[i]).css("display", "inline-block");
		}
			
		// display next number
		var nextYear= Number(yearsInBar[0]) + 1
		
		$("#a" + nextYear).css("display", "inline-block");
			
		// hide 3points Down
		if((nextYear + 1) == yearMax){
			$("#yearUp").css("display", "none");
		}
		
		// managemant of " | "
		$(".yearsBar span").remove()
		$("<span> | </span>").insertBefore('.yearsBar p #yearMin')
		$("<span> | </span>").insertBefore('.yearsBar p a[style="display: inline-block;"]');
		if((nextYear + 1) != yearMax){
			$('<span> | </span>').insertBefore("#yearUp");
		}
		$('<span> | </span>').insertBefore("#yearDown");
		
	})
	
	
		
})