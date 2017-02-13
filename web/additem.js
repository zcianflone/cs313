$(function() {
    // Get the form.
    var form = $('#ajax-addItem');

    // Get the messages div.
    var addItemMessages = $('#addItem-messages');
    
    //Get id from URL to add item to the right user's id
    var url = window.location.href;
	var id = url.split('=');
	id.shift();
	console.log(id);
	
    // Set up an event listener for the addItem form.
$(form).submit(function(event) {
    // Stop the browser from submitting the form.
    event.preventDefault();
    
    // Serialize the form data.
var formData = $(form).serialize();

// Submit the form using AJAX.
$.ajax({
    type: 'POST',
    url: $(form).attr('action'),
    data: {formData : 'formData', id : 'id'}
})
.done(function(response) {
    // Make sure that the formMessages div has the 'success' class.
    $(formMessages).removeClass('error');
    $(formMessages).addClass('success');

    // Set the message text.
    $(formMessages).text(response);

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

