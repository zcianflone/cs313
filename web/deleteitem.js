//Takes an item and ID and passes it to the server to be deleted
function deleteItem (id){

console.log("Called deleteItem!");

console.log(id);


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