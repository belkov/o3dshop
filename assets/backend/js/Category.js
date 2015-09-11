$(document).ready(function(e) {
	
	$("#parent").keyup(function(e){		
		var parentID = $(this);
		if($(this).val().length > 2){			
			$.post( "/admin/ru/Category/Show/", { func: "searchCategory", key:$(this).val()}, function( data ) {
		  		if(data.result != 1){
		  			
		  		}else{		  			
		  			$("#view-result").remove();
		  			var text = $('<div style="width:50%;border:1px solid #CCC;position:absolute;z-index:100;background:#FFF;" id="view-result">');
		  			$.each(data.data, function( index, value ) {
		  				var elem = $('<div style="cursor:pointer;width:100%;border-bottom:1px solid #CCC;padding:5px;" id="'+value.id+'" class="click-category">'+value.name+'<div>');
		  				elem.click(function(){				  							  		
					  		$("#parentIDHidden").val($(this).attr("id"));
					  		$("#parent").val($(this).text());
					  		$("#view-result").remove();
						});
					  	text.append(elem);					  	
					});
					
					text.append('</div>');					
					parentID.parent().append(text);
		  			
		  		}		  		
			}, "json");
		}		
	});
	
});