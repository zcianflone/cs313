function loadPantry(){


	var listButton = $('#pantryButton');
	
	
	
    // Get the list.
    var list = $('#accordion');

	$(list).empty();
	$.ajax({
			type: 'POST',
			url: "loadpantry.php"
		})
		.done(function(response) {
		
		
		
			var json = JSON.parse(response);
			
			for (i in json){
				var itemName = json[i].name;
				
				var date = 'None Specified';
				var expStatus = 'list-group-item-info';
				
				if (json[i].expdate){
				 date = new Date (json[i].expdate);
				 
				 var today = new Date;
				 
				 var dayDiff = (date.getTime() - today.getTime())/(1000*3600*24);
				 
				 
				 if (dayDiff > 7){
				 	expStatus = 'list-group-item-success';
				 }
				 else if (dayDiff > 0){
				 	expStatus = 'list-group-item-warning';
				 }
				 else {
				 	expStatus = 'list-group-item-danger';
				 }
				 
				 
				 date = date.toDateString();
				 
				}	
				
				
				
				
				
				
				//var toAdd = "<li class=\"list-group-item\">" + itemName + "</li></ul>";
				var toAdd = "<div class=\"panel panel-default\">" +
								"<div class=\"panel-heading\">" +
									"<h4 class=\"panel-title\">" +
										"<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#" +
											 json[i].id + "\">" + json[i].name + "</a>" +
									 "</h4>" +
									 "</div>" +
									 "<div id=\"" + json[i].id + "\"class=\"panel-collapse collapse\">" +
									   "<div class=\"panel-body\">"+
									   		"<ul class=\"list-group\">" +
									   			"<li class=\"list-group-item\">Quantity: " + json[i].quantity + "</li>" +
									   			"<li class=\"list-group-item " + expStatus +"\">Expiration Date: " + date + "</li>"  +	
									   			"</ul>" +		
									   			"<div class=\"btn-toolbar\" role=\"toolbar\">" +
									   			"<div class=\"btn-group mr-2\" role=\"group\">" +
									   			"<button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#myModalNorm\">Edit Item</button>" +
									   			"</div>" +	
									   			"<div class=\"btn-group mr-2\" role=\"group\">" +
									   			"<button type=\"button\" id=\"" + json[i].id + "\" class=\"btn btn-danger\">Delete</button>"	+
									   			"</div>" +					   
									   "</div></div></div>";						
				
				//test
				
				
				
				$(list).append(toAdd);
				

			}
			
			var deleteButton = $('.btn-danger');
			
			//activating our new delete buttons	
			$(deleteButton).click(function(){
			
			
			//console.log(this.id);
			
				deleteItem(this.id);
				
				
				$("#pantryAlert").append("<div class=\"alert alert-danger alert-dismissable fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Successfully Deleted Item!</div>");
				
				loadPantry();

    			});
			
			
			
		})
		.fail(function(data) {
	
		});


}




$(function() {

	
    
    loadPantry();

	var listButton = $('#pantryButton');
	
	
	
    // Get the list.
    var list = $('#accordion');

	$(listButton).click(function(){
			
			
			loadPantry();
		

    });
    
    

  
    
    
  
});



