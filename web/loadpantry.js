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
		
			var json = JSON.parse(response);
			
			console.log(json);
			
			for (key in json){
				
				//console.log(key.name);
				if (key == "name"){
				var val = json[key];
				console.log(val);
				}
			
			}
			
	
		})
		.fail(function(data) {
	
		});


    });
});