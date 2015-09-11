$(document).ready(function(e) {

	$(".itab").click(function(){	
		$(".tab-me").addClass('hidden');		
		$("#tab-"+$(this).attr('id').replace('click-', '')).removeClass('hidden');
		$(".itab").removeClass("itab-selected");
		$(this).addClass("itab-selected");
	});
	
	$(".tab-me").addClass('hidden');
	$("#tab-0").removeClass('hidden');
	
	$(".itab").removeClass("itab-selected");
	$("#click-0").addClass("itab-selected");
	
	function confirmDelete() {
	    if (confirm("Вы подтверждаете удаление?")) {
	        return true;
	    } else {
	        return false;
	    }
	}

	
	

	
});