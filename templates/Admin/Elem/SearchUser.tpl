<form method="GET" class="form-horizontal style-form" enctype="multipart/form-data">
<div class="row mt">	
	<div class="col-lg-12">	
		<div class="form-panel">
			<div class="form-group">

			</div>
			<div class="form-group">
				<label class="col-sm-2 col-sm-2 control-label">
				{if $smarty.get.class == "Users"}
				ID, email, телефон
				{elseif $smarty.get.class == "Product"}
				ID, название, домен
				{else}
				ID, Фио, email
				{/if}
				<em class="form-req">*</em></label>
				<div class="col-sm-10">
					<input type="text"  class="form-control" autocomplete="off"  name="key" value="{if isset($smarty.get.key)}{$smarty.get.key}{/if}">
				</div>
			</div>  			
			<button type="submit" class="btn btn-theme">Поиск</button>		  
		</div>  	
	</div><!-- col-lg-12-->      		
</div><!-- /row -->
</form>

