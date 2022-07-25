    <!-- favicon -->
    <link rel=icon href="<?php echo SITE_URL; ?>assets/img/favicon.png" sizes="20x20" type="image/png">
    <!-- animate -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/animate.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/bootstrap.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/magnific-popup.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/owl.carousel.min.css">
    <!-- icons -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/flaticon.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/slick.css">
    <!-- animated slider -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/animated-slider.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/style.css?t=<?php echo time(); ?>">
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/responsive.css">   
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-205292949-1">
</script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-205292949-1');
        </script>
        <!-- Global site tag (gtag.js) - Google Ads: 847868929 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-847868929"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'AW-847868929');
        </script>
    </head>

    <script>
		var base_url = '<?php echo SITE_URL; ?>'; 
	</script>
<body>

<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->


<!-- topbar area start -->
<nav class="top_bar navbar navbar-area navbar-expand-lg nav-style-01" style="z-index:11; box-shadow:unset; background: transparent;">
    <div class="container nav-container">
        <div class="responsive-mobile-menu hide_mob_menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cdrm_main_menu1" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="cdrm_main_menu1">
            <ul class="text-right navbar-nav">
                <li class="remove_before">
                    <i class="fa fa-envelope" aria-hidden="true"></i> <a style="line-height:20px !important;" href="mailto: info@cdrmsolutions.com">info@cdrmsolutions.com</a>
                </li>
                <li class="remove_before">
                    <i class="fa fa-phone" aria-hidden="true"></i> <a style="line-height:20px !important;" href="tel: +1 (604) 783-4003">+1 (604) 783-4003</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- topbar area end -->

<!-- navbar area start -->
<nav class="navbar navbar-area navbar-expand-lg nav-style-01 nav-style-02">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper mobile-logo">
                <a href="<?php echo SITE_URL; ?>" class="logo">
                    <img src="<?php echo SITE_URL; ?>assets/img/logo.png" style="height:50px;" alt="logo">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cdrm_main_menu" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="cdrm_main_menu">
            <div class="logo-wrapper desktop-logo">
                <a href="<?php echo SITE_URL; ?>" class="logo">
                    <img src="<?php echo SITE_URL; ?>assets/img/logo.png" style="" alt="logo">
                </a>
            </div>
            <ul class="text-right navbar-nav">
                <li>
                    <a href="<?php echo SITE_URL; ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo SITE_URL; ?>about">About Us</a>
                </li>
                <li class="menu-item-has-children" >
                    <a href="#">Services</a>
                    <ul class="sub-menu">
                        <?php 
                        //Get all services category
                        $services_menu_query = "SELECT * FROM `services_cat` WHERE status='1' AND menu_type='service'";
                        $services_menu_result = $conn->query($services_menu_query);	
                        if($services_menu_result->num_rows >= 1){
                        while($service = $services_menu_result->fetch_assoc()) { ?>
                            <li><a href="<?php echo SITE_URL."service/".$service['slug']; ?>"><?php echo $service['name']; ?></a></li>
                        <?php } } ?>
                    </ul>
                </li> 
                <li class="menu-item-has-children" >
                    <a href="#">Resources</a>
                    <ul class="sub-menu">
                        <?php 
                        //Get all services category
                        $services_menu_query2 = "SELECT * FROM `services_cat` WHERE status='1'  AND menu_type='resource'";
                        $services_menu_result2 = $conn->query($services_menu_query2);	
                        if($services_menu_result2->num_rows >= 1){
                        while($service2 = $services_menu_result2->fetch_assoc()) { ?>
                            <li><a href="<?php echo SITE_URL."service/".$service2['slug']; ?>"><?php echo $service2['name']; ?></a></li>
                        <?php } } ?>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo SITE_URL; ?>gallery">Portfolio</a>
                </li>
                <li>
                    <a href="<?php echo SITE_URL; ?>contact">Contact Us</a>
                </li>
                <li>
                    <a href="<?php echo SITE_URL; ?>blog">Blog</a>
                </li>
                <li>
                    <a href="<?php echo SITE_URL; ?>faq">FAQ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- navbar area end -->