$(function() {

	var listButton = $('#pantryButton');

    // Get the list.
    var list = $('#pantryUL');

	$(listButton).click(function(){
	
	//$(list).append("<ul class=\"list-group\"><li class=\"list-group-item\">First item</li></ul>");
	
			// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: "loadpantry.php",
			//data: formData
		})
		.done(function(response) {
		
			console.log(response);
			
			$.each(response, function (key, value) {
				console.log(key + ":" value);
			});

		})
		.fail(function(data) {
	
		});


    });
});