$(function() {
    // Get the form.
    var form = $('#modalForm');

    // Get the messages div.
    var formMessages = $('#modalAlert');
    

    // Set up an event listener for the modal form.
$(form).submit(function(event) {
    // Stop the browser from submitting the form.
    
    if ( $("#modalQuantity").val() <= 0){
    	event.preventDefault();
    	formMessages.append("<div class=\"alert alert-danger alert-dismissable fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Quantity Must Be Greater Than Zero!</div>");	
    	}
    
    // Serialize the form data.
var formData = $(form).serialize();

var expDate = $('#addItemExp');

// Submit the form using AJAX.
/*$.ajax({
    type: 'POST',
    url: $(form).attr('action'),
    data: formData
})*/

    
});



});
