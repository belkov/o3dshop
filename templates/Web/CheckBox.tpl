<div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">{$Field.Caption}{if $Field.TRUE}<em class="form-req">*</em>{/if}</label>
  <div class="col-sm-10">
	<input type="checkbox" {$Field.Text}  name="{$Field.Name}" value="1">
  </div>
</div>