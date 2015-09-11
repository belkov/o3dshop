$(document).ready(function(e) {
	
	function confirmDelete() {
    	if (confirm("Вы подтверждаете действие?")) {
        	return true;
    	} else {
			return false;
    	}
	}
	
	$(".action").click(function(){
		return confirmDelete();
	});
	
});