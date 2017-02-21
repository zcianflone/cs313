$(function() {

	

	
	//grabbing sign out button
  	var signOutButton = $('#signout');
  	


	$(signOutButton).click(function(){
	
	
		$.ajax({
			type: 'POST',
			url: "signout.php", 
		})
		.done(function(response) {
		window.location.href =  "loginpantry.html";
		
		 })
	
	
	});

  
});