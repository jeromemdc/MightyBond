<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Republic Chemical Industries Inc. - Pioneer Adhesives, Epoxies and Resins - chemical industries in the philippines</title>
    <meta name="title" content="Republic Chemical Industries Inc. - Pioneer Adhesives, Epoxies and Resins - chemical industries in the philippines"/>
    <meta name="description" content="RCI's well-known Pioneer brand of adhesives include epoxies, cyanoacrylates, plastic resin glues, rubber cements, and white glues, among others. The sealants and coating range covers every major type from butyls and acrylics to urethanes and silicones"/>
    <meta name="keywords" content="Pioneer, mighty bond, RCI, republic chemical industries, epoxies, cyanoacrylates, plastic resin glues, rubber cements, and white glues"/>
    <meta name="author" content="Republic Chemical Industries Inc."/>
    <meta name="copyright" content="Republic Chemical Industries Inc."/>

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>includes/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>includes/css/fixit.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>includes/js/jcarousel/skins/tango/skin.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>includes/js/source/jquery.fancybox.css?v=2.1.5" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>includes/css/flags.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>includes/css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>includes/slick/slick.css"/>

    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-71963091-1', 'auto');
    ga('send', 'pageview');

      

</script>

    <link rel="icon" type="image/png" href="<?=base_url()?>includes/img/favicon.ico" />

    <script type="text/javascript">
        var BASE_URL = "<?=base_url()?>";
        var code = "<?=$this->session->userdata('code'); ?>";
        var country = "<?=$this->session->userdata('country'); ?>";
    </script>
</head>
<body>
    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NXLG9K"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NXLG9K');</script>
    <!-- End Google Tag Manager -->
    <div class="container-fluid <?=($this->uri->segment(1) == 'fixit' ? 'bg-for-fixit' : ''); ?>">
        <div class="main_head row">
            <div class="container">
                <div class="main_head_socfilter">
                    <ul>
                        <li class="filter">
                            <label>
                                <span>Select Country</span>
                                <div class="dp_menu">
                                    <div class="dp_menu_select">
                                        <div id="flag" class=""></div>
                                        <span id="cname" class="cname"></span>
                                        <span class="glyphicon glyphicon-triangle-bottom"></span>
                                        <div class="dp_menu_target"></div>
                                    </div>
                                    <ul class="dp_menu_option">
                                        <?php if($this->session->userdata('code') != 'ph' && $this->session->userdata('code') != ''): ?>
                                          <li class="ph"><a href="<?=base_url()?>main/ph">Philippines</a></li>
                                      <?php endif; ?>
                                      <li class="in"><a href="<?=base_url()?>main/in">India</a></li>
                                      <li class="id"><a href="<?=base_url()?>main/id">Indonesia</a></li>
                                      <li class="sg"><a href="<?=base_url()?>main/sg">Singapore</a></li>
                                      <li class="my"><a href="<?=base_url()?>main/my">Malaysia</a></li>
                                      <li class="vn"><a href="<?=base_url()?>main/vn">Vietnam</a></li>
                                  </ul>
                              </div>

                          </label>
                      </li>
                      <li class="social">
                        <a href="https://www.facebook.com/PioneerMightyBond" class="socIco fb-top" target="_BLANK"></a>
                        <a href="https://twitter.com/MightyBondFix" class="socIco twit-top" target="_BLANK"></a>
                        <a href="https://instagram.com/pioneermightybond" class="socIco ig-top" target="_BLANK"></a>
                    </li>
                </ul>
            </div>
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_nav" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                        $url = base_url().($this->session->userdata('code') == 'ph' || $this->session->userdata('code') == '' ? '' : 'main/'.$this->session->userdata('code'));
                    ?>
                    <a class="navbar-brand" href="<?=$url?>"><img src="<?=base_url()?>includes/img/pioneer.png" alt="" /></a>
                </div>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="nav navbar-nav navbar-right">

                        <?php 
                        $nav = $this->home_model->get_categories();
                        foreach ($nav as $row): ?>
                            <li><a href="<?=base_url()?>products/<?=$row->cat_slug?>" class="<?=($this->uri->segment(2) == $row->cat_slug ? 'active': '');?>"><?=$row->cat_name?></a></li> 
                        <?php endforeach; ?>
                        <li><a href="<?=base_url()?>promos" class="<?=($this->uri->segment(1) == 'promos' ? 'active': '');?>">Pioneer Repair &amp; Reload Promo</a></li> 
                        <li><a href="<?=base_url()?>fixit" class="<?=($this->uri->segment(1) == 'fixit' ? 'active': '');?>">Fix-it Center</a></li> 
                    </ul>
                </div>
                <!-- LOGO -->
            </nav>
        </div>
    </div>

    <?php echo $this->load->view('pages/'.$page); ?>

    <footer>
        <div class="container">
            <div class="footer-nav-group">
                <h4>Product Center</h4>
                <ul class="collapse" id="nav-prod-center-links">
                    <li><a href="<?=base_url()?>products/diy" class="">Fix-its & DIY</a></li> 
                    <li><a href="<?=base_url()?>products/epoxies" class="">Epoxies </a></li> 
                    <li><a href="<?=base_url()?>products/construction" class="">Heavy Duty & Construction</a></li> 
                </ul>
            </div>
            <div class="footer-nav-group">
                <h4>Media &amp; Content</h4>
                <ul class="collapse" id="nav-media-content-links">
                    <li><a href="<?=base_url()?>news-updates">News and Updates</a></li>
                    <li><a href="<?=base_url()?>tips-tricks">Tips and Tricks</a></li>
                    <li><a href="<?=base_url()?>csr">CSR</a></li>
                    <li><a href="<?=base_url()?>commercials">Commercials</a></li>
                    <li><a href="<?=base_url()?>promos">Pioneer Repair and Reload Promo</a></li>
                </ul>
            </div>
            <div class="footer-nav-group">
                <h4>Careers</h4>
                <ul class="collapse" id="nav-career-links">
                    <li><a href="<?=base_url()?>career">Career Philosophy</a></li>
                    <li><a href="<?=base_url()?>openings">Job Openings</a></li>
                </ul>
            </div>
            <div class="footer-nav-group">
                <h4>About Us</h4>
                <ul class="collapse" id="nav-about-links">
                    <li><a href="<?=base_url()?>about">Republic Chemical Industries</a></li>
                </ul>
            </div>
            <div class="footer-nav-group">
                <h4> Contact Us </h4>
                <ul class="collapse" id="nav-contact-links">
                    <li><a href="<?=base_url()?>directory">Directory</a></li>
                    <li><a href="<?=base_url()?>contact">Contact Form</a></li>
                </ul>
            </div>
            <div class="footer-nav-group">
                <h4>Connect with Us</h4>
                <a href="https://www.facebook.com/PioneerMightyBond" class="socIco fb-bot" target="_BLANK"></a>
                <a href="https://twitter.com/MightyBondFix" class="socIco twit-bot" target="_BLANK"></a>
                <a href="https://instagram.com/pioneermightybond" class="socIco ig-bot" target="_BLANK"></a>
            </div>
            <div class="copright">&copy; 2015 Republic Chemical Insustries. All Rights Reserved</div>
        </div>
    </footer>

</div>  


<?php if($this->uri->segment(1) == 'fixit'): ?>
    <script src="<?=base_url()?>includes/js/jquery.js" type="text/javascript"></script>
    <script src="<?=base_url()?>includes/js/bootstrap.js" type="text/javascript"></script>
<?php else: ?>
    <script src="<?=base_url()?>includes/js/libs/jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>includes/js/libs/bootstrap.min.js" type="text/javascript"></script>
<?php endif; ?>

<script src="<?=base_url()?>includes/js/jcarousel/jquery.jcarousel.min.js" type="text/javascript"></script>
<!--script src="<?=base_url()?>includes/js/unicorn.js" type="text/javascript"></script-->

<script src="<?=base_url()?>includes/js/organictabs.jquery.js" type="text/javascript"></script>

<script src="<?=base_url()?>includes/js/source/jquery.fancybox.js?v=2.1.5" type="text/javascript"></script>
<script src="<?=base_url()?>includes/js/source/helpers/jquery.fancybox-media.js?v=1.0.6" type="text/javascript"></script>


<script src="<?=base_url()?>includes/slick/slick.js" type="text/javascript"></script>
<script src="<?=base_url()?>includes/js/apps.js" type="text/javascript"></script>
<script src="<?=base_url()?>includes/js/main.js" type="text/javascript"></script>

</body>
</html>