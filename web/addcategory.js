$(function() {
    // Get the form.
    var form = $('#addCategory');

    // Get the messages div.
    var formMessages = $('#addCategory-messages');
    

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
    data: formData
})
.done(function(response) {


    // Set the message text.
    $(formMessages).text(response);

 
})
.fail(function(data) {

    // Set the message text.
    if (data.responseText !== '') {
        $(formMessages).text(data.responseText);
    } else {
        $(formMessages).text('Oops! An error occurred.');
    }
});

    
});



});

