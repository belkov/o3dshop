<div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">{$Field.Caption}{if $Field.TRUE}<em class="form-req">*</em>{/if}</label>
  <div class="col-sm-10">
	<select name="{$Field.Name}" class="form-control">
		{foreach key=cid item=con from=$Option}
			<option value="{$cid}" {$con.Selected}>{$con.Title}</option>
		{/foreach}		
	</select>
  </div>
</div>