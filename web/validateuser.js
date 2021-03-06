$(function() {
    // Get the form.
    var form = $('#ajax-login');

    // Get the messages div.
    var formMessages = $('#form-messages');
    
    // Set up an event listener for the contact form.
$(form).submit(function(event) {
    // Stop the browser from submitting the form.
    event.preventDefault();
    
    // Serialize the form data.
var formData = $(form).serialize();

// Submit the form using AJAX.
$.ajax({
    type: 'POST',
    url: $(form).attr('action'),
    data: formData,
    success: function(data) { 
    			if (data.includes("pantry.html"))
    			{
                	window.location.href =  data;
                }
            }
})
.done(function(response) {
    // Make sure that the formMessages div has the 'success' class.
    $(formMessages).removeClass('error');
    $(formMessages).addClass('success');

	if (!response.includes("pantry.html"))
    		{
    			 // Set the message text.
    			$(formMessages).text(response);
    			$(formMessages).addClass("alert alert-danger");
            }
   

    // Clear the form.
    $('#name').val('');
    $('#password').val('');
})
.fail(function(data) {
    // Make sure that the formMessages div has the 'error' class.
    $(formMessages).removeClass('success');
    $(formMessages).addClass('error');

    // Set the message text.
    if (data.responseText !== '') {
        $(formMessages).text(data.responseText);
    } else {
        $(formMessages).text('Oops! An error occurred.');
    }
});

    
});



});

