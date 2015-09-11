<div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">{$Field.Caption}{if $Field.TRUE}<em class="form-req">*</em>{/if}</label>
  <div class="col-sm-10">
      <textarea  id="{$Field.Name}" name="{$Field.Name}" >{$Field.Value}</textarea>
  </div>
</div>

<script>
	CKEDITOR.replace('{$Field.Name}');
</script>