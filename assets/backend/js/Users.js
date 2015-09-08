$(document).ready(function(e) {

	$(".change_status").change(function(){		
		var id = $(this);
		$.post( "/admin/ru/Users/Show/", { func: "changeStatus", user_id:$(this).attr("id"), value:$(this).val() }, function( data ) {
		  if(data.result != 1){
		  	alert('Error обратитесь к администратору.');
		  }else if(data.result == 1){		  	
		  	id.parent().find("img").remove();
		  	id.parent().append('<img src="/img/ok.png">');
		  }
		}, "json");
	});
	
});