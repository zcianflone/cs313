//Takes an item and ID and passes it to the server to be deleted
function fillModal (id){

//removing the 'e' from the beginning
id = id.substr(1);


	$.ajax({
			type: 'POST',
			url: "deleteitem.php",
			data : {"id": id}
		})
	.done( function(response) { 
	
		console.log(response);
	
	})
	.fail( function(response) {
	
	});

}