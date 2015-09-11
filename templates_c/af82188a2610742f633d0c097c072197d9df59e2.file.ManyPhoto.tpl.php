<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 20:20:24
         compiled from "./templates/Web/ManyPhoto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78739683555f1714fb62524-35065649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af82188a2610742f633d0c097c072197d9df59e2' => 
    array (
      0 => './templates/Web/ManyPhoto.tpl',
      1 => 1441905624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78739683555f1714fb62524-35065649',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f1714fb9b1d4_41291621',
  'variables' => 
  array (
    'Field' => 0,
    'elem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f1714fb9b1d4_41291621')) {function content_55f1714fb9b1d4_41291621($_smarty_tpl) {?><script src="/admin/js/photo.js"></script>
<div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['Field']->value['Caption'];?>
<?php if ($_smarty_tpl->tpl_vars['Field']->value['TRUE']) {?><em class="form-req">*</em><?php }?></label>
  <div class="col-sm-10">
      <input type='file' id="file" multiple name='<?php echo $_smarty_tpl->tpl_vars['Field']->value['Name'];?>
[]'>	
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
			<?php  $_smarty_tpl->tpl_vars['elem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Field']->value['Text']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elem']->key => $_smarty_tpl->tpl_vars['elem']->value) {
$_smarty_tpl->tpl_vars['elem']->_loop = true;
?>					
				<tr>
					<td  style="width:5%;padding-left:25px;">
						<input type="checkbox" name="photo_id[]" class="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['elem']->value['id'];?>
">
					</td>
					<td style="width:10%;">
						<a class="fancybox"  rel="gallery1" href="<?php echo $_smarty_tpl->tpl_vars['elem']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['elem']->value['name'];?>
" target="_blank"><img style="height:100px;" src="<?php echo $_smarty_tpl->tpl_vars['elem']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['elem']->value['name'];?>
"></a>
					</td>
					<td>
						<input type="radio" name="main" <?php if (isset($_smarty_tpl->tpl_vars['elem']->value['main'])&&$_smarty_tpl->tpl_vars['elem']->value['main']==1) {?>checked<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['elem']->value['id'];?>
">
					</td>
					<td style="width:90%;">
						<input type="text" name="sort[<?php echo $_smarty_tpl->tpl_vars['elem']->value['id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['elem']->value['sort'];?>
">
						<input type="hidden" name="photo_id[]" value="<?php echo $_smarty_tpl->tpl_vars['elem']->value['id'];?>
">
					</td>
				</tr>
			<?php }
if (!$_smarty_tpl->tpl_vars['elem']->_loop) {
?>
				<tr id="null">
					<td colspan="4">
						Вы еще не загрузили изображений
					</td>
				</tr
			<?php } ?>
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
	<?php if (isset($_GET['id'])) {?>
		parentID = <?php echo $_GET['id'];?>
;	
	<?php }?>
	$("#parentID").val(parentID);
	class_div = '<?php echo $_GET['class'];?>
';
});
</script>
<div id="parent_popup" class="hidden">
  <div id="popup" class="hidden">    
    <p>Ожидание загрузки...</p>
  </div>
</div><?php }} ?>
