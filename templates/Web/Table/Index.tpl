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
			<button type="submit" name="b1" value="{$elem}" class="btn btn-theme">{$elem}</button>
		{/foreach}
	</div>
 </form>