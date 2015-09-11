{if isset($bButtonAdd) && $bButtonAdd == true}
	<div style="float:right;margin-bottom:10px;">
		<a href="/admin/ru/{$smarty.get.class}/Add/?req={$request_uri}" class="btn btn-theme">Добавить</a>
	</div>
{/if}
<form method="POST" id="frmTable" enctype="multipart/form-data"> 
	<div class="row mt">
	  <div class="col-md-12">
	      <div class="content-panel">      	
	          <table class="table table-striped table-advance table-hover">      	  	  
	              <thead>
	              <tr>
	                  {$TITLE} 
	              </tr>
	              </thead>
	              <tbody>              
	              {$LINE}
	              </tbody>
	          </table>
	      
			
	      </div><!-- /content-panel -->
	        
	  </div><!-- /col-md-12 -->
	
	</div><!-- /row -->

	{$NAVIGATION}
	
	<div class="showback">
		{foreach from=$btn item=elem}		
			<button type="submit" name="b1" value="{$elem}" class="btn btn-theme action">{$elem}</button>
		{/foreach}
	</div>
 </form>