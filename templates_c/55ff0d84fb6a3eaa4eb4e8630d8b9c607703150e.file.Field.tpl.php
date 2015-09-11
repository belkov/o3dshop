<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 19:17:01
         compiled from "./templates/Web/Field.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92430667455f148d11a0817-79351129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55ff0d84fb6a3eaa4eb4e8630d8b9c607703150e' => 
    array (
      0 => './templates/Web/Field.tpl',
      1 => 1441901818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92430667455f148d11a0817-79351129',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f148d11ddc31_15576470',
  'variables' => 
  array (
    'Field' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f148d11ddc31_15576470')) {function content_55f148d11ddc31_15576470($_smarty_tpl) {?><div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['Field']->value['Caption'];?>
<?php if ($_smarty_tpl->tpl_vars['Field']->value['TRUE']) {?><em class="form-req">*</em><?php }?></label>
  <div class="col-sm-10">
      <input type="text" <?php echo $_smarty_tpl->tpl_vars['Field']->value['Text'];?>
 class="form-control <?php if (isset($_smarty_tpl->tpl_vars['Field']->value['Error'])) {?>error<?php }?>" autocomplete="off"  name="<?php echo $_smarty_tpl->tpl_vars['Field']->value['Name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['Field']->value['Value'];?>
">
  </div>
</div>
<?php }} ?>
