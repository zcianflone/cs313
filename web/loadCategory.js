function loadCategory(){

  // Get the selects
    var select = $('.categorySelect');

	$(select).empty();
	
	$(select).append("<option value=\" \"> </option>");
	
	$.ajax({
			type: 'POST',
			url: "loadCategory.php"
		})
		.done(function(response) {
		
		
		
			var json = JSON.parse(response);
			
			for (i in json){
			
				var categoryName = json[i].name;
				
				var toAdd = "<option value=" + json[i].id + ">" + categoryName + "</option>";
				
				$(select).append(toAdd);
				

			}
			
			
		})
		.fail(function(data) {
	
		});


}



$(function() {

	
	//on page load, we empty and fill all category selects
  	var select = $('.categorySelect');

	$(select).empty();
	
	loadCategory();
	
	var catButton = $('#addCatButton');


	$(catButton).click(function(){
			
			console.log("got it!");
			loadCategory();
			

    });
    
    

  
    
    
  
});
