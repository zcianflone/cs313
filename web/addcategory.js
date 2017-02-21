$(function() {
    // Get the form.
    var form = $('#addCategory');

    // Get the messages div.
    var formMessages = $('#addCategory-messages');
    
    var addCatLink = $('#createcatview');
    var catName = $('#categoryName');
    
    $(addCatLink).click(function(event){
	 	$(catName).val('');
	 	$(formMessages).empty();
	})
    

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
   $(formMessages).append("<div class=\"alert alert-success alert-dismissable fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Successfully Added Category!</div>");
	loadCategory();

 
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

