$(document).ready(function(){
	
	$('#form-add').hide();
	$.get('view.php',function(data){
		
		$('#data-view').html(data);
	})
})