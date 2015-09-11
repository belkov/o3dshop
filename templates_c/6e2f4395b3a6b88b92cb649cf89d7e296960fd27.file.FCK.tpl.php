<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 20:05:32
         compiled from "./templates/Web/FCK.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99346282855f1714fb9e8f9-03890970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e2f4395b3a6b88b92cb649cf89d7e296960fd27' => 
    array (
      0 => './templates/Web/FCK.tpl',
      1 => 1441904731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99346282855f1714fb9e8f9-03890970',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f1714fbbf422_64110939',
  'variables' => 
  array (
    'Field' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f1714fbbf422_64110939')) {function content_55f1714fbbf422_64110939($_smarty_tpl) {?><div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['Field']->value['Caption'];?>
<?php if ($_smarty_tpl->tpl_vars['Field']->value['TRUE']) {?><em class="form-req">*</em><?php }?></label>
  <div class="col-sm-10">
      <textarea  id="<?php echo $_smarty_tpl->tpl_vars['Field']->value['Name'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['Field']->value['Name'];?>
" ><?php echo $_smarty_tpl->tpl_vars['Field']->value['Value'];?>
</textarea>
  </div>
</div>

<script>
	CKEDITOR.replace('<?php echo $_smarty_tpl->tpl_vars['Field']->value['Name'];?>
');
</script><?php }} ?>
