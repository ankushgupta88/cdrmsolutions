
<?php include ("header.php"); ?>
<title>Mobile App and Website Development Vancouver | CDRM Solutions Inc</title>
<meta name="description" content="CDRM Solutions Inc provides the one stop solution for all your IT and management issues and offers the best services related to web design & development, power platform, data analytics and system integrations consulting.">
  <meta name="keywords" content="mobile app development Vancouver, app development Vancouver, mobile app development montreal, best app developers in toronto">
<?php include ("header_bottom.php"); ?>

<!-- header area start -->
<div class="header-area header-bg" style="background-image:url(assets/img/bg/banner-bg.png);">
    <div class="container">
        <div class="banner-slider banner-slider-one">
            <?php 
            //Get all slides
            $slide_query = "SELECT * FROM `sliders` WHERE status='1'";
            $slide_result = $conn->query($slide_query);	
            if($slide_result->num_rows >= 1){
                $count = 1;
                while($slide = $slide_result->fetch_assoc()) {
            ?>
            <div class="banner-slider-item">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-6 offset-xl-1">
                        <div class="header-inner-details">
                            <div class="header-inner">
                                <h1 class="title s-animate-1"><?php echo $slide['name']; ?> <span><?php echo $slide['name_two']; ?></span></h1>
                                <p class="s-animate-2"><?php echo $slide['description']; ?></p>
                                <div class="btn-wrapper desktop-left padding-top-20">
                                    <a href="<?php echo $slide['read_more_link']; ?>" class="btn btn-radius btn-green s-animate-3">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 hidden-sm">
                        <div class="banner-thumb-wrap">
                            <div class="banner-thumb">
                                <?php if($slide['slide_image']){ ?> 
                                    <img class="header-inner-img" src="<?php echo UPLOAD_IMAGE_PATH."slider/".$slide['slide_image']; ?>" alt="<?php echo $slide['slide_image']; ?>">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $count++; } } ?>
        </div>
    </div>
</div>
<!-- header area End -->

<!-- service area start -->
<div class="service-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-10">
                <div class="section-title text-center margin-bottom-90">
                    <h2 class="title wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">Services <span>We Provide</span></h2>
                    <p class="wow animated fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">We provide what your business needs.</p>
                </div>
            </div>
        </div>
        <div class="row custom-gutters-16">
            <?php 
            //Get all services category
            $services_query = "SELECT * FROM `services_cat` WHERE status='1' AND is_home='1'";
            $services_result = $conn->query($services_query);	
            if($services_result->num_rows >= 1){
            while($service = $services_result->fetch_assoc()) { ?>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="single-service wow animated fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.1s">
                    <?php if($service['image']){ ?> 
                        <img src="<?php echo UPLOAD_IMAGE_PATH.'service/cat/'.$service['image']; ?>" alt="<?php echo $service['image']; ?>">
                    <?php } ?>
                    <h6><a href="<?php echo SITE_URL."service/list.php?slug=".$service['slug']; ?>"><?php echo $service['name']; ?></a></h6>
                    <?php echo $service['short_description']; ?>
                    <div class="read-more">
                        <a href="<?php echo SITE_URL."service/list.php?slug=".$service['slug']; ?>"><img src="<?php echo SITE_URL; ?>assets/img/service/arrow.png" alt="arrow"></a>
                    </div>
                </div>
            </div>
            <?php } } ?>
    </div>
</div>
<!-- service area End -->

<!-- soft-box area start -->
<div class="sbs-what-riyaqas pd-default-120 mg-top-105" style="background-image:url(assets/img/bg/1h1.png);">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 wow  fadeInLeft animated" data-wow-duration="1s" data-wow-delay="0.3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInLeft;">
                <div class="img-with-video">
                    <div class="img-wrap">
                        <img src="assets/img/we-provide/about-us.png" alt="video">
                        <div class="hover">
                            <a href="assets/videos/aboutus.mp4" class="video-play-btn mfp-iframe"><img src="assets/img/we-provide/3.svg" alt="video"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 desktop-center-item">
                <div class="desktop-center-area wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title style-two">
                        <h2 class="title">About <span>CDRM Solutions Inc</span></h2>
                       <p>CDRM Solutions Inc are rapidly growing one of the leading IT and Management Solutions providing company based in Vancouver, Calgary, Toronto Canada. The company has a expansive resource-pool of talent vastly experienced in designing and deploying latest IT technology and management solutions to business challenges. Adhering to highly evolved systems and process, we serve client from all parts of Canada and beyond.</p>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="riyaqas-check-list">
                                <img src="assets/img/icons/check.svg" alt="check">
                                <span>100+ Projects</span>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="riyaqas-check-list">
                                <img src="assets/img/icons/check.svg" alt="check">
                                <span>Experienced Developers</span>
                            </div>
                            
                        </div>
                        <div class="col-md-6 btn-wrapper desktop-left padding-top-20 mt-2">
                            <a href="https://cdrmsolutions.com/itCompany/about.php" class="btn btn-radius btn-green s-animate-3">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- soft-box area End -->

<!-- soft-box area start -->
<div class="sbs-provide-security pd-top-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 offset-xl-1 order-lg-12 wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="mask-bg-wrap mask-bg-img-3 mb-lg-0 mb-4">
                    <div class="thumb">
                        <img src="assets/img/we-provide/7.png" alt="video">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 order-lg-1 align-self-center wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="section-title style-two">
                    <h2 class="title">Why choose<br><span>CDRM Solutions Inc</span></h2>
                    <p>CDRM Solutions Inc is uniquely positioned due to the following factors to be the ideal solutions provider for technology and management challenges faced by business enterprise across diverse industry verticals.</p>
                    <br>
                    <ul>
                        <li>Our capability to deliver and deploy Customized Solutions for every client by researching around their business problems.</li>
                        <li>An expansive resource pool of talented and experienced team </li>
                        <li>A highly evolved Project Management methodology to deliver projects in time</li>
                        <li>Best-in-class business processes for seamless take and delivery of projects.</li>
                        <li>A well-established network of partners, vendors, suppliers for proving the best services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- soft-box area End -->

<!-- soft-box area start -->
<div class="leftside-image-area service-area sbs-business-tool pd-bottom-120 mg-top-120" style="background-image:url(assets/img/bg/1h2.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-7 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                <img src="assets/img/business-tool/business-tools.png" alt="img" class="business_tool">
            </div>
            <div class="col-xl-5 col-lg-6 desktop-center-item">
                <div class="desktop-center-area wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="section-title style-two">
                        <h2 class="title"><span>Business <br> tools</span> integration of All kind</h2>
                        <p>Business tool integration refers to a technique for establishing a balance between Information
technology and Providing solutions to the client through organization techniques. 
</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="riyaqas-check-list media">
                                <img class="media-left" src="assets/img/business-tool/pencil.svg" alt="check">
                                <span>Our team
uses Artificial intelligence to support the Clients quickly and effectively.</span>
                            </div>
                            <div class="riyaqas-check-list media">
                                <img class="media-left" src="assets/img/business-tool/search.svg" alt="check">
                                <span>AI-based solutions are Reliable and effective for a wide range of customers and companies. We
make sure that the requirements and goals of every company are met through suitable service
and technology tools.</span>
                            </div>
                            <div class="riyaqas-check-list media mg-bottom-0-991">
                                <img class="media-left" src="assets/img/business-tool/settings.svg" alt="check">
                                <span>CDRM Solutions Inc team performs research and in-depth analysis on the current situation, demands, and
goals of a company and thus, makes a fitting service to serve all the purposes.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- soft-box area End -->



<!-- testimonial area Start -->
<div class="testimonial-section sbs-testimonial-section pd-top-105 pd-bottom-60" style="background-image:url(assets/img/bg/1h3.png);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 pd-xl-5 order-lg-12 align-self-center ">
                <div class="section-title style-two mb-0">
                    <h2 class="title">What Our <span>Client Say?</span></h2>
                    <p>CDRM Solutions Inc provides services to clients to all over the globe. The clients we ave served have experienced a hassle-free path to growth and increased efficiency as promised by us.</p>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="sbs-testimonial-slider">
                    <div class="choose_slider">
                        <div class="choose_slider_items">
                            <?php 
                            //Get all testimonials
                            $testimonial_query = "SELECT * FROM `testimonials` WHERE status='1'";
                            $testimonial_result = $conn->query($testimonial_query);	
                            if($testimonial_result->num_rows >= 1){
                            ?>
                            <ul id="testimonial-slider">
                                <?php 
                                $count = 1;
                                while($testimonial = $testimonial_result->fetch_assoc()) { ?>
                                <li class="current_item">
                                    <div class="media">
                                        <?php if($testimonial['image']){ ?> 
                                            <img class="media-left" src="<?php echo UPLOAD_IMAGE_PATH."testimonial/".$testimonial['image']; ?>" alt="<?php echo $testimonial['image']; ?>">
                                        <?php } ?>
                                        <div class="media-body">
                                            <h6><?php echo $testimonial['name']; ?></h6>
                                            
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <?php echo $testimonial['description']; ?>
                                </li>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="sbs-arrowleft"><a id="btn_next" href="#"><i class="fa fa-long-arrow-left"></i></a></div>
                    <div class="sbs-arrowright"><a id="btn_prev" href="#"><i class="fa fa-long-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial area End -->

<?php 

 $szType = isset($_GET['type']) ? filter_var($_GET['type'], FILTER_SANITIZE_STRING) : ""; 
 if($szType=="add-details")
 {
    echo "<div id='add-details-popup' style='display: block;'>";
    include ("lottery/addQRCode.php"); 
    echo "</div>";
 }
 
 include ("footer.php"); ?>
