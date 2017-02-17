$(function() {

	var listButton = $('#pantryButton');

    // Get the list.
    var list = $('#pantryUL');

	$(listButton).click(function(){
	
			$(list).empty();
	

	
			// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: "loadpantry.php",
			//data: formData
		})
		.done(function(response) {
		
		
		
			var json = JSON.parse(response);
			
			for (key in json){
			
				//console.log(json[key].name);
				var itemName = json[key].name;
				var toAdd = "<li class=\"list-group-item\">" + itemName + "</li></ul>";
				$(list).append(toAdd);
			}
			
			
			
			
		})
		.fail(function(data) {
	
		});


    });
});