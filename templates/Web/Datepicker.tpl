<div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">{$Field.Caption}{if $Field.TRUE}<em class="form-req">*</em>{/if}</label>
  <div class="col-sm-10" style="position:relative; ">
      <input class="form-control" id="datetimepicker1" type="text" name="{$Field.Name}" value="{$Field.Value}"></input>
  </div>
</div>
<script>
$(document).ready(function($) {
	$('#datetimepicker1').datepicker({
	    format: 'yyyy-mm-dd'
	})
});
</script>