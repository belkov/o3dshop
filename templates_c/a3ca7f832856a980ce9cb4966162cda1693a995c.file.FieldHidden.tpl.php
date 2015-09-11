<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 22:47:03
         compiled from "./templates/Web/FieldHidden.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161870164055f1de37902881-28996508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3ca7f832856a980ce9cb4966162cda1693a995c' => 
    array (
      0 => './templates/Web/FieldHidden.tpl',
      1 => 1420585813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161870164055f1de37902881-28996508',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f1de37973020_06912788',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f1de37973020_06912788')) {function content_55f1de37973020_06912788($_smarty_tpl) {?>  <input type="hidden"  <?php echo $_smarty_tpl->tpl_vars['Field']->value['Text'];?>
  name="<?php echo $_smarty_tpl->tpl_vars['Field']->value['Name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['Field']->value['Value'];?>
"><?php }} ?>
