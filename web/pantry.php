<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pantry Pro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="loadpantry.js"></script>
	<script src="additem.js"></script>
	<script src="deleteitem.js"></script>
	<script src="edititem.js"></script>
	<script src='addcategory.js'></script>
	<script src='loadCategory.js'></script>
	<script src='categoryview.js'></script>
  
  <style>
    .row.content {height: 2500px}
    
    /* Sets Side Nav dimensions and color */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Simple Footer */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* Css for small screens */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
      
      .modal-body .form-horizontal .col-sm-2,
	.modal-body .form-horizontal .col-sm-10 {
    		width: 100%
		}

	.modal-body .form-horizontal .control-label {
    	text-align: left;
		}
		.modal-body .form-horizontal .col-sm-offset-2 {
   		 margin-left: 15px;
	}
      
    }
  </style>
</head>
<body>


<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    <br> 
      <h2>Pantry Pro</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a data-toggle="pill" href="#pantry" id="pantryButton">Pantry</a></li>
        <li><a data-toggle="pill" href="#addItem">Add Pantry Item</a></li>
        <li><a data-toggle="pill" href="#createcategory">Create Category</a></li>
        <li><a data-toggle="pill" href="#categoryview">Category View</a></li>
          <li><a data-toggle="pill" href="#signout">Sign Out</a></li>
      </ul><br>
    </div>

    <div class="col-sm-9">
    <div class="tab-content">
    
 	<div id="pantry" class="tab-pane fade in active">
  		<h3>All Pantry Items</h3>
  		<div id="pantryAlert"></div>
  		<div id="pantryDiv" class="list-group">
    	
    		
    		<div class="panel-group" id="accordion">
  			<!--JS inserts pantry here -->
  
			</div>

	
	 	</div>
	
	

	</div>
	
	<div id="addItem" class="tab-pane fade">
	
		<h3>Add New Item</h3>
		<hr>
		<div id="addItem-messages"></div>
    	
    	<form id="ajax-addItem" action="additem.php" method="post">
  		<br>
 		 <label for="addItemName">Name</label><br>
  		<input id="addItemName" type="text" name="name">
 		<br>
  		<br>
  		<label for="addItemQuantity">Quantity</label><br>
  		<input id="addItemQuantity" type="text" name="quantity">
 		<br>
  		<br>
  		<label for="addItemExp">Expiration Date</label><br>
  		<input id="addItemExp" type="text" name="exp">
 		<br>
  		<br>
  		<label for="addItemCategory">Category</label><br>
  		<select name="category" id="addItemCategory" class="categorySelect">
 	
		</select>
		<br>
		<br>
  		<button class="btn btn-default" type="submit">Submit</button>
	</form> 
  
    </div>
    
    <div id="createcategory" class="tab-pane fade">
    
    	<h3>Create New Category</h3>
		<hr>
		<div id="addCategory-messages"></div>
    
    	<form id="addCategory" action="addcategory.php" method="post">
    		<br>
    			<label for="categoryName">Category</label><br>
    		<input id="categoryName" type="text" name="name">
    		<br>
    		<br>
    		<button id="addCatButton" class="btn btn-default" type="submit">Submit</button>
		</form>
    
    </div>
    
    <div id="categoryview" class="tab-pane fade">
    
    <br>
    <br>
    
    <select name="category" id="categoryspinner" class="categorySelect">
 	
	</select>
	
	<hr>
	
		<div class="panel-group categoryaccordion" id="accordion">
  			<!--JS inserts pantry here -->
  
			</div>
    
    </div>
    
    <div id="signout" class="tab-pane fade">
    
    <?php
    	session_start();
    	unset($_SESSION['username']);
    	header("Location: loginpantry.html");
    	echo "hi";
    ?>
    </div>
    
  	</div>
  	
  	
    
    
    
    </div>
            </div>
          </div>



<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Edit Item
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
            
            	<div id="modalAlert"></div>
                
                <form id="modalForm" action="edititem.php" method="post" role="form">
                 <div class="form-group">
                      <input type="text" class="form-control"
                          id="modalID" name="modalID" />
                  </div>
                  <div class="form-group">
                    <label for="modalItemName">Item Name</label>
                      <input type="text" class="form-control"
                      id="modalItemName" name="modalItemName"/>
                  </div>
                  <div class="form-group">
                    <label for="modalQuantity">Quantity</label>
                      <input type="text" class="form-control"
                          id="modalQuantity" name="modalQuantity" />
                  </div>
                   <div class="form-group">
                    <label for="modalExpDate">Expiration Date</label>
                      <input type="text" class="form-control"
                      id="modalExpDate" name="modalExpDate"/>
                  </div>
                   <div class="form-group">
                    <label for="modalCategory">Category</label><br>
                     <select name="category" id="modalCategory" class="categorySelect">
 	
					</select>
                  </div>
               
                  <button id="editButton" type="button" class="btn btn-default">Submit</button>
                </form>
                
                
            </div>
        
        </div>
    </div>
</div>


</body>
</html>