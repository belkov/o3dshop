<form method="POST" class="form-horizontal style-form" enctype="multipart/form-data">
<div class="row mt">
	
	<div class="col-lg-12">	
  	<div class="form-panel">
	      {if isset($ERROR) && $ERROR == 1}		
			<div class="alert alert-danger"><b>Ошибка!</b> Вы должны заполнить все обязательные поля.</div>
		{/if}
		
		{$FORM}
      	<input type="hidden" name="{$__bFlagIsPostBack__}" value="true">
    	<button type="submit" class="btn btn-theme">Сохранить</button>		  
  	</div>  	
	</div><!-- col-lg-12-->      		
</div><!-- /row -->

	

</form>
