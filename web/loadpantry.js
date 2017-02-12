$(function() {

	var listButton = $('#pantryButton');

    // Get the list.
    var list = $('#pantryList');

	$(listButton).click(function(){
	
	$(list).text("<li class=\"list-group-item\">First item</li>");

    });
});