$(function() {

	

	
	//grabbing sign out button
  	var signOutButton = $('#signout');
  	


	$(signOutButton).click(function(){
	
	console.log("click");
	
		$.ajax({
			type: 'POST',
			url: "signout.php", 
		})
		.done(function(response) {
		console.log("response");
		window.location.href =  "loginpantry.html";
		
		 })
	
	
	});

  
});