$(document).ready(function() {
        $('.titleYear').click(function() {
				// get id (year)
				var id= $(this).text()
				
				// show/hide posts/button "othersPosts"
                $('#posts' + id).slideToggle("fast");
				$('#' + id).slideToggle("fast");
				
				// change arrow near title
				$('#h2' + id + ' i').toggleClass("ArrowDown ArrowUp");
        });
    });