$(function() {

	
	//on page load, we empty and fill all category selects
  	var select = $('#categoryspinner');

	$(select).change(function(){
	
		//console.log(select.val());
		
		var selectVal = select.val();
	
		$.ajax({
			type: 'POST',
			url: "categoryview.php", 
			data: selectVal
		})
		.done(function(response) {
		
		
			console.log(response);
		
			/*var json = JSON.parse(response);
			
			for (i in json){
			
				var categoryName = json[i].name;
				
				var toAdd = "<option value=" + json[i].id + ">" + categoryName + "</option>";
				
				$(select).append(toAdd);
				

			}*/
	
	});

  
});
