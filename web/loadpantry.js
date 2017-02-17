$(function() {

	var listButton = $('#pantryButton');

    // Get the list.
    var list = $('#pantryDiv');

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
			
			for (i in json){
				var itemName = json[i].name;
				
				
				
				
				
				
				//var toAdd = "<li class=\"list-group-item\">" + itemName + "</li></ul>";
				var toAdd = "<div class=\"panel panel-default\">" +
								"<div class=\"panel-heading\">" +
									"<h4 class=\"panel-title\">" +
										"<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#" +
											 json[i].name + "\">" + json[i].name + "</a>" +
									 "</h4>" +
									 "</div>" +
									 "<div id=\"" + json[i].name + "\"class=\"panel-collapse collapse in\">" +
									   "<div class=\"panel-body\">Test</div></div></div>";						
				
				
				
				
				$(list).append(toAdd);
			}
			
			
			
			
		})
		.fail(function(data) {
	
		});


    });
});


/*<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Collapsible Group 1</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
      minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
      commodo consequat.</div>
    </div>
  </div> */