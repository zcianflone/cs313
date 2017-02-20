$(function() {

	

	
	//on page load, we empty and fill all category selects
  	var select = $('#categoryspinner');
  	
  	var list  =$('.categoryaccordion');

	$(select).change(function(){
	
		list.empty();
		
		var selectVal = select.val();
	
		$.ajax({
			type: 'POST',
			url: "categoryview.php", 
			data: {"selectVal": selectVal}
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
									   								   
									   "</div></div></div>";						
				
				//test
				
				
				
				$(list).append(toAdd);
				

			}
			
	
			
			
			
		})
	
	
	});

  
});
