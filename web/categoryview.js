$(function() {

	
	//on page load, we empty and fill all category selects
  	var select = $('#categoryspinner');

	$(select).change(function(){
	
		//console.log(select.val());
		
		var selectVal = select.val();
	
		$.ajax({
			type: 'POST',
			url: "categoryview.php", 
			data: {"selectVal": selectVal}
		})
		.done(function(response) {
		
		
			var json = JSON.parse(response);
			
			console.log(json);
			
			/*for (i in json){
			
				
				
				var toAdd = "<option value=" + json[i].id + ">" + categoryName + "</option>";
				
				$(select).append(toAdd);
			}*/

			})
	
	});

  
});
