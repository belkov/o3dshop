<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 20:39:08
         compiled from "./templates/Web/Form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53818632555f148d11e1cc9-97782375%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f13091e40b4956c998d4e007cd49bb996bd7ef4e' => 
    array (
      0 => './templates/Web/Form.tpl',
      1 => 1441906748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53818632555f148d11e1cc9-97782375',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f148d11f01b7_17974000',
  'variables' => 
  array (
    'ERROR' => 0,
    'FORM' => 0,
    '__bFlagIsPostBack__' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f148d11f01b7_17974000')) {function content_55f148d11f01b7_17974000($_smarty_tpl) {?><form method="POST" class="form-horizontal style-form" enctype="multipart/form-data">
	<div class="row mt">	
		<div class="col-lg-12">	
	  	<div class="form-panel">
		      <?php if (isset($_smarty_tpl->tpl_vars['ERROR']->value)&&$_smarty_tpl->tpl_vars['ERROR']->value==1) {?>		
				<div class="alert alert-danger"><b>Ошибка!</b> Вы должны заполнить все обязательные поля.</div>
			<?php }?>			
			<?php echo $_smarty_tpl->tpl_vars['FORM']->value;?>

			
			      	<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['__bFlagIsPostBack__']->value;?>
" value="true">
			    	<button type="submit" class="btn btn-theme">Сохранить</button>		  
		    
	  	</div>  	
		</div><!-- col-lg-12-->      		
	</div><!-- /row -->
</form><?php }} ?>
