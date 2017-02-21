$(function() {
    // Get the form.
    var form = $('#ajax-addItem');
    
    var additemlink = $('#addpantryitemview');
    var itemname =$('#addItemName');
     var itemquantity =$('#addItemQuantity');
     var itemexp = $('#addItemQuantity');
     var itemcat = $('#addItemCategory');

    // Get the messages div.
    var formMessages = $('#addItem-messages');
    
	$(addpantryitemview).click(function(event){
	 	$(itemname).val('');
	 	$(itemquantity).val('');
	 	$(itemexp).val('');
	 	$(itemcat).val('');
	})
   
    

    // Set up an event listener for the addItem form.
$(form).submit(function(event) {
    // Stop the browser from submitting the form.
    event.preventDefault();
    
    // Serialize the form data.
var formData = $(form).serialize();

var expDate = $('#addItemExp');

// Submit the form using AJAX.
$.ajax({
    type: 'POST',
    url: $(form).attr('action'),
    data: formData
})
.done(function(response) {
    // Make sure that the formMessages div has the 'success' class.
    $(formMessages).removeClass('error');
    $(formMessages).addClass('success');

    // Set the message text.
    $(formMessages).text(response);

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

