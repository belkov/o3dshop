<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Система управления сайтом o3D</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>    
	<link href="/assets/css/bootstrap.css" rel="stylesheet">
	
	{if isset($jsfile)}
		<script src="{$jsfile}"></script>
	{/if}
	
	{if isset($cssfile)}
		<link href="{$cssfile}" rel="stylesheet">
	{/if}
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
	            <li><a class="logout" href="/admin/{$smarty.get.region}/Admin/Logout/">Logout</a></li>                   
	    	</ul>
	    </div>
	</header>
	<aside>
	  <div id="sidebar"  class="nav-collapse ">
	      <ul class="sidebar-menu" id="nav-accordion">
	      
	      	  <p class="centered"><a href="#"><img src="/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
	      	  <h5 class="centered">+38(067)7477472</h5>
	      	  {foreach from=$menu item=elem}
	      	  {if isset($elem.items)}              	  
	          	   <li class="sub-menu">
	                  <a href="javascript:;" >                          
	                      <span>{$elem.item.name} &dArr;</span>
	                  </a>
	                  <ul class="sub">
	                  	{foreach from=$elem.items item=elem2}                      
	                      	<li><a  href="{$elem2.link}">{$elem2.name}</a></li>
	                      {/foreach}
	                  </ul>
	              </li>              	  
	      	  {else}
	      	   <li class="mt">
	              <a href="{$elem.item.link}">                          
	                  <span>{$elem.item.name}</span>
	              </a>
	         	 </li>              	  
	      	  {/if}	
	      	  {/foreach}               
	      </ul>          
	  </div>
	</aside>
	<section id="main-content">
			{$TEXT}
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
   	var uri = '/admin/ru/{$smarty.get.class}/Show/';
   	var ddd = $('a[href="'+uri+'"]').parent().parent();
		ddd.css({ 'display':'block' });   
  });
</script>

</body>
</html>