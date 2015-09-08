<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    
    {if isset($jsfile)}
    	<script src="{$jsfile}"></script>
    {/if}
    
    {if isset($cssfile)}
    	<link href="{$cssfile}" rel="stylesheet">
    {/if}
    
    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
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

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b>SOFTDEV</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/admin/{$smarty.get.region}/Admin/Logout/">Logout</a></li>                   
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
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
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
      		{$TEXT}
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2005-2014 SOFTDEV
              <a href="basic_table.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    
    <script src="/assets/js/fancybox/jquery.fancybox.js"></script>   
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>    
    <script class="include" type="text/javascript" src="/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
     <link rel="stylesheet" href="/assets/css/datepicker.css" />
      <script src="/assets/js/bootstrap-datepicker.js"></script>
      <script src="/assets/js/scripts.js"></script>
    
    
    
    <!--common script for all pages-->
    <script src="/assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script type="text/javascript">
      $(function() {
          jQuery(".fancybox").fancybox();
      });

  </script>
  

 <script type="text/javascript">
      $(function() {
       
       var uri = '/admin/ru/{$smarty.get.class}/Show/';
       var ddd = $('a[href="'+uri+'"]').parent().parent();
  ddd.css({ 'display':'block' });   
        
        
      });

  </script>
  
  </body>
</html>