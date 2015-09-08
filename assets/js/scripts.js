$(document).ready(function($) {
	
	$("#checkboxall").change(function(){
		if($(this).is(":checked")){ 
			$(".check_id").prop("checked", true);
		}else{
			$(".check_id").prop("checked", false);
		}
	});
	
	$("#language").change(function(){
		window.location = $(this).val();
	});
	
	
});