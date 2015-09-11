<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 14:37:04
         compiled from "./templates/Web/Table/Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93374611455f147c9d83702-65742440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adc96ab2aa6b92e634a10c64bee7e1a89ffa226a' => 
    array (
      0 => './templates/Web/Table/Index.tpl',
      1 => 1441885023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93374611455f147c9d83702-65742440',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f147c9da3df3_62745768',
  'variables' => 
  array (
    'bButtonAdd' => 0,
    'request_uri' => 0,
    'TITLE' => 0,
    'LINE' => 0,
    'NAVIGATION' => 0,
    'btn' => 0,
    'elem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f147c9da3df3_62745768')) {function content_55f147c9da3df3_62745768($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['bButtonAdd']->value)&&$_smarty_tpl->tpl_vars['bButtonAdd']->value==true) {?>
	<div style="float:right;margin-bottom:10px;">
		<a href="/admin/ru/<?php echo $_GET['class'];?>
/Add/?req=<?php echo $_smarty_tpl->tpl_vars['request_uri']->value;?>
" class="btn btn-theme">Добавить</a>
	</div>
<?php }?>
<form method="POST" id="frmTable" enctype="multipart/form-data"> 
	<div class="row mt">
	  <div class="col-md-12">
	      <div class="content-panel">      	
	          <table class="table table-striped table-advance table-hover">      	  	  
	              <thead>
	              <tr>
	                  <?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
 
	              </tr>
	              </thead>
	              <tbody>              
	              <?php echo $_smarty_tpl->tpl_vars['LINE']->value;?>

	              </tbody>
	          </table>
	      
			
	      </div><!-- /content-panel -->
	        
	  </div><!-- /col-md-12 -->
	
	</div><!-- /row -->

	<?php echo $_smarty_tpl->tpl_vars['NAVIGATION']->value;?>

	
	<div class="showback">
		<?php  $_smarty_tpl->tpl_vars['elem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['btn']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elem']->key => $_smarty_tpl->tpl_vars['elem']->value) {
$_smarty_tpl->tpl_vars['elem']->_loop = true;
?>		
			<button type="submit" name="b1" value="<?php echo $_smarty_tpl->tpl_vars['elem']->value;?>
" class="btn btn-theme action"><?php echo $_smarty_tpl->tpl_vars['elem']->value;?>
</button>
		<?php } ?>
	</div>
 </form><?php }} ?>
