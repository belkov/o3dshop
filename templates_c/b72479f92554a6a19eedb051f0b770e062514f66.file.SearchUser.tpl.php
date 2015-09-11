<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 12:05:13
         compiled from "./templates/Admin/Elem/SearchUser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125995657355f147c9d11fe6-80331746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b72479f92554a6a19eedb051f0b770e062514f66' => 
    array (
      0 => './templates/Admin/Elem/SearchUser.tpl',
      1 => 1440409742,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125995657355f147c9d11fe6-80331746',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f147c9d37e79_71527838',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f147c9d37e79_71527838')) {function content_55f147c9d37e79_71527838($_smarty_tpl) {?><form method="GET" class="form-horizontal style-form" enctype="multipart/form-data">
<div class="row mt">	
	<div class="col-lg-12">	
		<div class="form-panel">
			<div class="form-group">

			</div>
			<div class="form-group">
				<label class="col-sm-2 col-sm-2 control-label">
				<?php if ($_GET['class']=="Users") {?>
				ID, email, телефон
				<?php } elseif ($_GET['class']=="Product") {?>
				ID, название, домен
				<?php } else { ?>
				ID, Фио, email
				<?php }?>
				<em class="form-req">*</em></label>
				<div class="col-sm-10">
					<input type="text"  class="form-control" autocomplete="off"  name="key" value="<?php if (isset($_GET['key'])) {?><?php echo $_GET['key'];?>
<?php }?>">
				</div>
			</div>  			
			<button type="submit" class="btn btn-theme">Поиск</button>		  
		</div>  	
	</div><!-- col-lg-12-->      		
</div><!-- /row -->
</form>

<?php }} ?>
