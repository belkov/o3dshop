<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 20:06:17
         compiled from "./templates/Web/Select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16175122355f159248de979-20571107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f25481131b454e2f6bf58ffacea4c6c9c6b8ea79' => 
    array (
      0 => './templates/Web/Select.tpl',
      1 => 1441899794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16175122355f159248de979-20571107',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f1592495d3d4_51999216',
  'variables' => 
  array (
    'Field' => 0,
    'Option' => 0,
    'cid' => 0,
    'con' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f1592495d3d4_51999216')) {function content_55f1592495d3d4_51999216($_smarty_tpl) {?><div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['Field']->value['Caption'];?>
<?php if ($_smarty_tpl->tpl_vars['Field']->value['TRUE']) {?><em class="form-req">*</em><?php }?></label>
  <div class="col-sm-10">
	<select name="<?php echo $_smarty_tpl->tpl_vars['Field']->value['Name'];?>
" class="form-control <?php if (isset($_smarty_tpl->tpl_vars['Field']->value['Error'])) {?>error<?php }?>">
		<?php  $_smarty_tpl->tpl_vars['con'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['con']->_loop = false;
 $_smarty_tpl->tpl_vars['cid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Option']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['con']->key => $_smarty_tpl->tpl_vars['con']->value) {
$_smarty_tpl->tpl_vars['con']->_loop = true;
 $_smarty_tpl->tpl_vars['cid']->value = $_smarty_tpl->tpl_vars['con']->key;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['con']->value['Selected'];?>
><?php echo $_smarty_tpl->tpl_vars['con']->value['Title'];?>
</option>
		<?php } ?>		
	</select>
  </div>
</div><?php }} ?>
