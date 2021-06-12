$(document).ready(function(){
  
  $(".yearsBar p a").on('click', function(event) {
	  
	// hide all posts
	$('.posts').hide();
	$('.altro').hide()

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
	
	// open posts clicked
	var year= $(this).text();
	$('#posts' + year).show();
	$('#' + year).show();
	
	// change arrow near title
	$('.titleYear i').removeClass('ArrowUp');
	$('.titleYear i').addClass('ArrowDown');
	$('#h2' + year + ' i').toggleClass("ArrowDown ArrowUp");
	
	
  });
});