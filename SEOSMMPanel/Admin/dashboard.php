<!DOCTYPE html>
<html>  
	<head>  
	    <title>Admin Panel</title>  
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
		<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
		<style>
			.hide{
				display:none;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="../style.css">
	</head>  
    <body>  
        <div class="container"><br/>
			<div class="table-responsive">  
	    		<h3 align="center">Service Information</h3><br />
	    		<div id="grid_table"></div>
	   		</div>  
  		</div>
    </body>  
</html>

<script>
	$('#grid_table').jsGrid({
		width: "100%",
		height: "600px",

		filtering: true,
		inserting:true,
		editing: true,
		sorting: true,
		paging: true,
		autoload: true,
		pageSize: 10,
		pageButtonCount: 5,
		deleteConfirm: "Do you really want to delete data?",

		controller: {
			loadData: function(filter){
				return $.ajax({
					type: "GET",
					url: "fetch_data.php",
					data: filter
				});
			},
			insertItem: function(item){
       			return $.ajax({
        			type: "POST",
        			url: "fetch_data.php",
        			data:item
       			});
      		},
      		updateItem: function(item){
       			return $.ajax({
        			type: "PUT",
        			url: "fetch_data.php",
        			data: item
       			});
      		},
		    deleteItem: function(item){
		     	return $.ajax({
		        	type: "DELETE",
		        	url: "fetch_data.php",
		        	data: item
		       });
		    },
		},
		fields: [
		{
		    name: "id",
		    type: "hidden",
		    css: 'hide'
		},
		{
		    name: "Service_Name", 
		    type: "text", 
		    width: 150, 
		    validate: "required"
		},
		{
		    name: "Minimum_Order", 
		    type: "text", 
		    width: 50, 
		    validate: function(value){
			    if(value > 0){
			    	return true;
			    }
		    }
		},
		{
		    name: "Price_Per_K", 
		    type: "text", 
		    width: 50, 
		    validate: function(value){
			    if(value > 0){
			    	return true;
			    }
		    }
		},
		{
		    name: "Delivery_Per_Day", 
		    type: "text", 
		    width: 50, 
		    validate: function(value){
			    if(value > 0){
			    	return true;
			    }
		    }
		},
		{
		    name: "Max_Order", 
		    type: "text", 
		    width: 50, 
		    validate: function(value){
			    if(value > 0){
			    	return true;
			    }
		    }
		},
		
		{
		    name: "Catagory", 
		    type: "select", 
		    width: 70, 
		    items: [
		    { Name: "", Id: '' },
		    { Name: "Facebook", Id: 'Facebook' },
		    { Name: "Youtube", Id: 'Youtube' },
		    { Name: "Soundcloud", Id: 'Soundcloud' },
		    { Name: "Instagram", Id: 'Instagram' },
		    { Name: "Twitter", Id: 'Twitter' },
		    { Name: "Google", Id: 'Google' },
		    { Name: "Pinterest", Id: 'Pinterest' }
		    ], 
		    valueField: "Id", 
		    textField: "Name", 
		    validate: "required"
		},
		{
		    type: "control"
		}]
	});

</script>