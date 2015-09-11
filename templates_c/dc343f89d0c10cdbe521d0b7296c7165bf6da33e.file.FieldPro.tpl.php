<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 19:17:01
         compiled from "./templates/Web/FieldPro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13459116755f1a04d3a69d8-64773529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc343f89d0c10cdbe521d0b7296c7165bf6da33e' => 
    array (
      0 => './templates/Web/FieldPro.tpl',
      1 => 1441901820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13459116755f1a04d3a69d8-64773529',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f1a04d490c29_16925748',
  'variables' => 
  array (
    'Field' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f1a04d490c29_16925748')) {function content_55f1a04d490c29_16925748($_smarty_tpl) {?><div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['Field']->value['Caption'];?>
<?php if ($_smarty_tpl->tpl_vars['Field']->value['TRUE']) {?><em class="form-req">*</em><?php }?></label>
  <div class="col-sm-10">
      <textarea class="form-control <?php if (isset($_smarty_tpl->tpl_vars['Field']->value['Error'])) {?>error<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['Field']->value['Name'];?>
"><?php echo $_smarty_tpl->tpl_vars['Field']->value['Value'];?>
</textarea>
  </div>
</div>
<?php }} ?>
