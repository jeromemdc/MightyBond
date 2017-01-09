<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>RCI</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="<?=base_url()?>assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/style.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?=base_url()?>assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url()?>assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<script>
	var base_url = '<?=base_url()?>';
	</script>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade in page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> RCI</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?=base_url()?>assets/img/user-13.jpg" alt="" /> 
							<span class="hidden-xs">Administrator</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li><a href="<?=base_url()?>administrator/logout">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					
					<li class="<?=$this->uri->segment(2) == 'dashboard' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/dashboard"><i class="fa fa-laptop"></i> <span>Dashboard</span></a></li>
					
					
					<li class="has-sub <?=$this->uri->segment(2) == 'add_category' || $this->uri->segment(2) == 'categories' || $this->uri->segment(2) == 'edit_category'  ? 'active' : ''?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-archive"></i>
						    <span>Categories</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?=$this->uri->segment(2) == 'add_category' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/add_category">Add New Category</a></li>
						    <li class="<?=$this->uri->segment(2) == 'categories' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/categories">List of Categories</a></li>
						</ul>
					</li>

					<li class="has-sub <?=$this->uri->segment(2) == 'add_subcategory' || $this->uri->segment(2) == 'subcategories' || $this->uri->segment(2) == 'edit_subcategory'  ? 'active' : ''?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-file-o"></i>
						    <span>Subcategories</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?=$this->uri->segment(2) == 'add_subcategory' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/add_subcategory">Add New Subcategory</a></li>
						    <li class="<?=$this->uri->segment(2) == 'subcategories' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/subcategories">List of Subcategories</a></li>
						</ul>
					</li>

					<li class="has-sub <?=$this->uri->segment(2) == 'add_material' || $this->uri->segment(2) == 'materials' || $this->uri->segment(2) == 'edit_material'  ? 'active' : ''?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-th"></i>
						    <span>Materials</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?=$this->uri->segment(2) == 'add_material' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/add_material">Add New Material</a></li>
						    <li class="<?=$this->uri->segment(2) == 'materials' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/materials">List of Materials</a></li>
						</ul>
					</li>

					<li class="has-sub <?=$this->uri->segment(2) == 'add_product' || $this->uri->segment(2) == 'products' || $this->uri->segment(2) == 'edit_product'  ? 'active' : ''?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-building"></i>
						    <span>Products</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?=$this->uri->segment(2) == 'add_product' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/add_product">Add New Product</a></li>
						    <li class="<?=$this->uri->segment(2) == 'products' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/products">List of Products</a></li>
						</ul>
					</li>

					<li class="has-sub <?=$this->uri->segment(2) == 'add_news' || $this->uri->segment(2) == 'news' || $this->uri->segment(2) == 'edit_news'  ? 'active' : ''?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-newspaper-o"></i>
						    <span>News</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?=$this->uri->segment(2) == 'add_news' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/add_news">Add News / Tips</a></li>
						    <li class="<?=$this->uri->segment(2) == 'news' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/news">List of News / Tips</a></li>
						</ul>
					</li>

					<li class="has-sub <?=$this->uri->segment(2) == 'add_slider' || $this->uri->segment(2) == 'sliders' || $this->uri->segment(2) == 'edit_slider'  ? 'active' : ''?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-file-image-o"></i>
						    <span>Sliders</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?=$this->uri->segment(2) == 'add_slider' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/add_slider">Add Home Slider Image</a></li>
						    <li class="<?=$this->uri->segment(2) == 'sliders' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/sliders">List of Home Sliders</a></li>
						</ul>
					</li>

					<li class="has-sub <?=$this->uri->segment(2) == 'add_commercial' || $this->uri->segment(2) == 'commercials' || $this->uri->segment(2) == 'edit_commercial'  ? 'active' : ''?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-newspaper-o"></i>
						    <span>Commercials</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?=$this->uri->segment(2) == 'add_commercial' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/add_commercial">Add Commercial</a></li>
						    <li class="<?=$this->uri->segment(2) == 'commercials' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/commercials">List of Commercials / Tips</a></li>
						</ul>
					</li>

					<li class="has-sub <?=$this->uri->segment(2) == 'add_fixit' || $this->uri->segment(2) == 'fixit' || $this->uri->segment(2) == 'edit_fixit'  ? 'active' : ''?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-newspaper-o"></i>
						    <span>Fixit</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?=$this->uri->segment(2) == 'add_fixit' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/add_fixit">Add Fixit</a></li>
						    <li class="<?=$this->uri->segment(2) == 'fixit' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/fixit">List Fixit</a></li>
						</ul>
					</li>
					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<?php $this->load->view('administrator/'.$page); ?>
		
       
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url()?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?=base_url()?>includes/js/jquery.form.js"></script>
	<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?=base_url()?>assets/crossbrowserjs/html5shiv.js"></script>
		<script src="<?=base_url()?>assets/crossbrowserjs/respond.min.js"></script>
		<script src="<?=base_url()?>assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?=base_url()?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?=base_url()?>assets/plugins/ckeditor/ckeditor.js"></script>
	<script src="<?=base_url()?>assets/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
	<script src="<?=base_url()?>assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
	<script src="<?=base_url()?>assets/js/form-wysiwyg.demo.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/DataTables/js/jquery.dataTables.js"></script>
	<script src="<?=base_url()?>assets/plugins/DataTables/js/dataTables.tableTools.js"></script>
	<script src="<?=base_url()?>assets/plugins/DataTables/js/jquery.dataTables.rowReordering.js"></script>
	<script src="<?=base_url()?>assets/js/table-manage-tabletools.demo.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/lightbox/js/lightbox-2.6.min.js"></script>
	<script src="<?=base_url()?>assets/js/custom.js"></script>
	<script src="<?=base_url()?>assets/js/upload.js"></script>

	<script src="<?=base_url()?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageTableTools.init();
			FormWysihtml5.init();

			$('#products').dataTable().rowReordering();


		});
	</script>
</body>
</html>
