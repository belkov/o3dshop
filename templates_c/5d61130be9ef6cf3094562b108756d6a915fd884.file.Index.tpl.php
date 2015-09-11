<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 12:05:13
         compiled from "./templates/Admin/Pagination/Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85061606855f147c9d45ca7-58691226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d61130be9ef6cf3094562b108756d6a915fd884' => 
    array (
      0 => './templates/Admin/Pagination/Index.tpl',
      1 => 1418074603,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85061606855f147c9d45ca7-58691226',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PREV' => 0,
    'NAVIGATION' => 0,
    'NEXT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f147c9d5ff45_72840012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f147c9d5ff45_72840012')) {function content_55f147c9d5ff45_72840012($_smarty_tpl) {?><div class="showback">
<div class="btn-group">
	<?php if (isset($_smarty_tpl->tpl_vars['PREV']->value)) {?><?php echo $_smarty_tpl->tpl_vars['PREV']->value;?>
<?php }?> <?php echo $_smarty_tpl->tpl_vars['NAVIGATION']->value;?>
 <?php if (isset($_smarty_tpl->tpl_vars['NEXT']->value)) {?><?php echo $_smarty_tpl->tpl_vars['NEXT']->value;?>
<?php }?>
</div>
</div><?php }} ?>
