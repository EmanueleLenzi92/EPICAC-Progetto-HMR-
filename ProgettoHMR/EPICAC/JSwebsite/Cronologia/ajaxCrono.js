$( document ).ready(function() {
			$( ".altro" ).click(function() {
				
				var anno= $(this).attr('id'); // get id of ".altro" clicked
				var numPosts= $("#posts" + anno + " > div").length; // count div of posts of selected year
				
				$.ajax({  
					type: "POST",
					url: "../EPICAC/PHP/Cronologia/ajaxJson.php", 
					dataType: "JSON",					
					data: {posts: numPosts, year: anno},
					success: function(risposta) {  
					
						// show and hide loading gif
						$("#loadingGif" + anno).fadeIn();
						$("#loadingGif" + anno).fadeOut("slow");
						
						
						// get value of "html" of $data in php file
						var postsHtml= risposta.html
						
						// write in div of corrispondent year (after hiding gif)
						setTimeout(function(){
							$("#posts" + anno).html(postsHtml);
						}, 1000);
						
						
						
						// remove or not the "otherPost" button
						if (risposta.buttonVisible == false){
							$('#' + anno).remove();
						}
						
													
					},
					error: function(){
						alert("Chiamata fallita!!!");
					} 
				}); 
			});
		});