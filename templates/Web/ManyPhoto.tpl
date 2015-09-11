<script src="/admin/js/photo.js"></script>
<div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">{$Field.Caption}{if $Field.TRUE}<em class="form-req">*</em>{/if}</label>
  <div class="col-sm-10">
      <input type='file' id="file" multiple name='{$Field.Name}[]'>	
      <input type='hidden' id="parentID" name='parentID' value="0">	
  </div>
</div>
<div class="form-group">
	<table id="table">
		<tr>
			<td style="width:5%;padding-left:25px;">
				<input type="checkbox" id="all">
			</td>
			<td  style="width:15%;">
				Изображение
			</td>
			<td  style="width:10%;">
				На обложку
			</td>
			<td  style="width:80%;">
				Сортировка
			</td>  				
		</tr>
			{foreach from=$Field.Text item=elem name=foo}					
				<tr>
					<td  style="width:5%;padding-left:25px;">
						<input type="checkbox" name="photo_id[]" class="checkbox" value="{$elem.id}">
					</td>
					<td style="width:10%;">
						<a class="fancybox"  rel="gallery1" href="{$elem.path}/{$elem.name}" target="_blank"><img style="height:100px;" src="{$elem.path}/{$elem.name}"></a>
					</td>
					<td>
						<input type="radio" name="main" {if isset($elem.main) && $elem.main == 1}checked{/if} value="{$elem.id}">
					</td>
					<td style="width:90%;">
						<input type="text" name="sort[{$elem.id}]" value="{$elem.sort}">
						<input type="hidden" name="photo_id[]" value="{$elem.id}">
					</td>
				</tr>
			{foreachelse}
				<tr id="null">
					<td colspan="4">
						Вы еще не загрузили изображений
					</td>
				</tr
			{/foreach}
		<tr>
		<td colspan="4">
			<input type="button" class="btn btn-theme" id="delete" value="Удалить выбранные" style="margin-top:10px;margin-left:15px;">
		</td>
		</tr>
	</table>					
</div>

<script>
$(document).ready(function(e) {
	parentID = 0;
	{if isset($smarty.get.id)}
		parentID = {$smarty.get.id};	
	{/if}
	$("#parentID").val(parentID);
	class_div = '{$smarty.get.class}';
});
</script>
<div id="parent_popup" class="hidden">
  <div id="popup" class="hidden">    
    <p>Ожидание загрузки...</p>
  </div>
</div>