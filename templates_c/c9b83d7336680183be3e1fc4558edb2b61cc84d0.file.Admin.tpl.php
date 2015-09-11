<?php /* Smarty version Smarty-3.1.16, created on 2015-09-10 14:36:18
         compiled from "./templates/Admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156714846655f1468c309630-52804593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9b83d7336680183be3e1fc4558edb2b61cc84d0' => 
    array (
      0 => './templates/Admin.tpl',
      1 => 1441884976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156714846655f1468c309630-52804593',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_55f1468c3c2fe2_42366619',
  'variables' => 
  array (
    'jsfile' => 0,
    'cssfile' => 0,
    'menu' => 0,
    'elem' => 0,
    'elem2' => 0,
    'TEXT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f1468c3c2fe2_42366619')) {function content_55f1468c3c2fe2_42366619($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Система управления сайтом o3D</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>    
	<link href="/assets/css/bootstrap.css" rel="stylesheet">
	
	<?php if (isset($_smarty_tpl->tpl_vars['jsfile']->value)) {?>
		<script src="<?php echo $_smarty_tpl->tpl_vars['jsfile']->value;?>
"></script>
	<?php }?>
	
	<?php if (isset($_smarty_tpl->tpl_vars['cssfile']->value)) {?>
		<link href="<?php echo $_smarty_tpl->tpl_vars['cssfile']->value;?>
" rel="stylesheet">
	<?php }?>
	<link href="/admin/css/form.css" rel="stylesheet">
	<script src="/admin/js/form.js"></script>
	<script src="/admin/js/public.js"></script>
	
	<link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="/assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
	<link href="/assets/css/style.css" rel="stylesheet">
	<link href="/assets/css/style-responsive.css" rel="stylesheet">
	<script src="/lib/ckeditor/ckeditor.js"></script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<section id="container">      
	<header class="header black-bg">
	      <div class="sidebar-toggle-box">
	          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
	      </div>
	    <!--logo start-->
	    <a href="#" class="logo"><b>o3D</b></a>
	    <!--logo end-->            
	    <div class="top-menu">
	    	<ul class="nav pull-right top-menu">
	            <li><a class="logout" href="/admin/<?php echo $_GET['region'];?>
/Admin/Logout/">Logout</a></li>                   
	    	</ul>
	    </div>
	</header>
	<aside>
	  <div id="sidebar"  class="nav-collapse ">
	      <ul class="sidebar-menu" id="nav-accordion">
	      
	      	  <p class="centered"><a href="#"><img src="/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
	      	  <h5 class="centered">+38(067)7477472</h5>
	      	  <?php  $_smarty_tpl->tpl_vars['elem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elem']->key => $_smarty_tpl->tpl_vars['elem']->value) {
$_smarty_tpl->tpl_vars['elem']->_loop = true;
?>
	      	  <?php if (isset($_smarty_tpl->tpl_vars['elem']->value['items'])) {?>              	  
	          	   <li class="sub-menu">
	                  <a href="javascript:;" >                          
	                      <span><?php echo $_smarty_tpl->tpl_vars['elem']->value['item']['name'];?>
 &dArr;</span>
	                  </a>
	                  <ul class="sub">
	                  	<?php  $_smarty_tpl->tpl_vars['elem2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elem2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['elem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elem2']->key => $_smarty_tpl->tpl_vars['elem2']->value) {
$_smarty_tpl->tpl_vars['elem2']->_loop = true;
?>                      
	                      	<li><a  href="<?php echo $_smarty_tpl->tpl_vars['elem2']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['elem2']->value['name'];?>
</a></li>
	                      <?php } ?>
	                  </ul>
	              </li>              	  
	      	  <?php } else { ?>
	      	   <li class="mt">
	              <a href="<?php echo $_smarty_tpl->tpl_vars['elem']->value['item']['link'];?>
">                          
	                  <span><?php echo $_smarty_tpl->tpl_vars['elem']->value['item']['name'];?>
</span>
	              </a>
	         	 </li>              	  
	      	  <?php }?>	
	      	  <?php } ?>               
	      </ul>          
	  </div>
	</aside>
	<section id="main-content">
			<?php echo $_smarty_tpl->tpl_vars['TEXT']->value;?>

	</section>
	<footer class="site-footer">
	  <div class="text-center">
	      2005-2014 o3D
	      <a href="#" class="go-top">
	          <i class="fa fa-angle-up"></i>
	      </a>
	  </div>
	</footer>  
</section>



<script class="include" type="text/javascript" src="/assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="/assets/js/jquery.scrollTo.min.js"></script>

 <link rel="stylesheet" href="/assets/css/datepicker.css" />
  <script src="/assets/js/bootstrap-datepicker.js"></script>
  <script src="/assets/js/scripts.js"></script>



<!--common script for all pages-->
<script src="/assets/js/common-scripts.js"></script>
	<script type="text/javascript">
  $(function() {       
   	var uri = '/admin/ru/<?php echo $_GET['class'];?>
/Show/';
   	var ddd = $('a[href="'+uri+'"]').parent().parent();
		ddd.css({ 'display':'block' });   
  });
</script>

</body>
</html><?php }} ?>
