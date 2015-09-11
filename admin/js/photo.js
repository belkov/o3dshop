$(document).ready(function(e) {
	
	$("#all").change(function(){
		if($(this).prop("checked") == true){
			$(".checkbox").prop({'checked':'true'});
		}else{
			$(".checkbox").prop({'checked':''});
		}
	});

	$("#file").change(function(){ 	
		
		$("#parent_popup").removeClass("hidden");
		$("#popup").removeClass("hidden");	
		var formData = new FormData($('form')[0]);			
		$.ajax({
	      	type: "POST",
		    processData: false,
		    contentType: false,
		    url: "/admin/ru/Photo/Show/?upload="+parentID+"&classDiv="+class_div,
		 	dataType : "json", 
        	data:  formData 
      })
      .done(function( data ) {
		$("#null").remove();			
        $.each(data, function( index, value ) {
			  //alert( index + ": " + value );
			  $("#table tr:first").after('<tr  style="border-bottom:1px solid #EAEAE8;">'
			  +'<td  style="padding:10px;"><input type="checkbox"  class="checkbox" value="'+value.id+'"></td>'
			  +'<td  style="width:10%;padding:10px;">'
			  +'<a class="fancybox"  rel="gallery1" href="/'+value.src+'" target="_blank"><img style="height:100px;" src="/'+value.src+'"></a>'
			  +'</td>'				  
			  +'<td><input type="radio" name="main" value="'+value.id+'"></td>' 
			  +'<td style="width:90%;padding:10px;"><input type="text" name="sort['+value.id+']" value="'+value.sort+'">'
			  +'<input type="hidden" name="photo_id[]" value="'+value.id+'">'
			  +'</td>'
			  +'</tr>');
		}); 
		 $("#file").val("");
		$("#parent_popup").addClass("hidden");
		$("#popup").addClass("hidden");	
      });
		
	});
	
	$("#delete").click(function(){
		$.each($(".checkbox:checked"), function( index, value ) {
			$(value).parent().parent().remove();
		});
	});		 
	
});