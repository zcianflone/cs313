$(function() {
    // Get the form.
    var form = $('#modalForm');
    
    var editButton = $('#editButton');

    // Get the messages div.
    var formMessages = $('#modalAlert');
    

    // Set up an event listener for the modal form.
	$(editButton).click(function(){
    // Stop the browser from submitting the form.
    

    if ( $("#modalQuantity").val() <= 0){
    	formMessages.empty();
    	formMessages.append("<div class=\"alert alert-danger alert-dismissable fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Quantity Must Be Greater Than Zero!</div>");	
    	}
    	
    else {
    
    	var formData = $(form).serialize();
    	
    	$.ajax({
   			 type: 'POST',
   			 url: $(form).attr('action'),
    		 data: formData
		})
		.done( function(response) { 
		
		console.log(response);
		loadPantry();
		formMessages.append("<div class=\"alert alert-success alert-dismissable fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Successfully Edited Item!</div>");
	
		})
		.fail( function(response) {
	
		});

    	
    	
    	}
    
    // Serialize the form data.




// Submit the form using AJAX.

    
});



});
