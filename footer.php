<!-- footer area start -->
<footer class="footer-area mg-top-100" style="background-image:url(<?php echo SITE_URL; ?>assets/img/bg/footer.png);">
    <div class="footer-top pd-top-50 padding-bottom-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-11">
                    <div class="footer-widget widget text-center">
                        <div class="footer_top_widget">
                            <a href="<?php echo SITE_URL; ?>" class="footer-logo"> 
                                <img src="<?php echo SITE_URL; ?>assets/img/logo.png" alt="footer logo">
                            </a>
                            <p>A trusted name for all your IT requirements with over 10 years of experience with satisfied clients over globe</p>
                        </div>
                    </div>
                    <div class="footer-widget widget widget_nav_menu text-center">
                        <ul>
                            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                            <li><a href="<?php echo SITE_URL; ?>about">About Us</a></li>
                            <!--<li><a href="service.php">Services</a></li>-->
                            <li><a href="<?php echo SITE_URL; ?>gallery">Portfolio</a></li>
                            <li><a href="<?php echo SITE_URL; ?>contact">Contact Us</a></li>
                            <li><a href="<?php echo SITE_URL; ?>blog">Blog</a></li>
                            <li><a href="<?php echo SITE_URL; ?>faq">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="copyright-inner">
                        <div class="row custom-gutters-16">
                            <div class="col-lg-7">
                                <div class="copyright-text">
                                    &copy; CDRM Solutions Inc 2021 All rights reserved.
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <ul class="social-icon text-right">
                                   
                                    <li>
                                        <a class="facebook" href="https://www.facebook.com/CDRM-solutions-Inc-104017885326371/" target="_blank"><i class="fa fa-facebook  "></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="https://twitter.com/CdrmInc" target="_blank"><i class="fa fa-twitter  "></i></a>
                                    </li>
                                    <li>
                                        <a class="linkedin" href="https://www.linkedin.com/company/79866930/admin/" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a class="pinterest" href="https://www.instagram.com/cdrmsolutions/" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->


    <!-- jquery -->
    <script src="<?php echo SITE_URL; ?>assets/js/jquery-2.2.4.min.js"></script>
    <script src="<?php echo SITE_URL; ?>assets/js/form.js"></script>
    <!-- popper -->
    <script src="<?php echo SITE_URL; ?>assets/js/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo SITE_URL; ?>assets/js/bootstrap.min.js"></script>
    <!-- magnific popup -->
    <script src="<?php echo SITE_URL; ?>assets/js/jquery.magnific-popup.js"></script>
    <!-- wow -->
    <script src="<?php echo SITE_URL; ?>assets/js/wow.min.js"></script>
    <!-- owl carousel -->
    <script src="<?php echo SITE_URL; ?>assets/js/owl.carousel.min.js"></script>
    <!-- slick slider -->
    <script src="<?php echo SITE_URL; ?>assets/js/slick.js"></script>
    <!-- cssslider slider -->
    <script src="<?php echo SITE_URL; ?>assets/js/jquery.cssslider.min.js"></script>
    <!-- waypoint -->
    <script src="<?php echo SITE_URL; ?>assets/js/waypoints.min.js"></script>
    <!-- counterup -->
    <script src="<?php echo SITE_URL; ?>assets/js/jquery.counterup.min.js"></script>
    <!-- imageloaded -->
    <script src="<?php echo SITE_URL; ?>assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- isotope -->
    <script src="<?php echo SITE_URL; ?>assets/js/isotope.pkgd.min.js"></script>
    <!-- world map -->
    <script src="<?php echo SITE_URL; ?>assets/js/worldmap-libs.js"></script>
    <script src="<?php echo SITE_URL; ?>assets/js/worldmap-topojson.js"></script>
    <script src="<?php echo SITE_URL; ?>assets/js/mediaelement.min.js"></script>
     <!-- main js -->
    <script src="<?php echo SITE_URL; ?>assets/js/main.js"></script>
    <!-- validation js -->
    <script src="<?php echo SITE_URL; ?>lottery/validation.js?t=<?php echo time(); ?>"></script>
    <script>
        $(document).ready(function(){
           
           setTimeout(function(){
               $('#preloader').hide();
           },600); 
           $('.work').click(function(){
           var url =  $(this).attr("data-url");
               window.location.href=url;
               
           });
        });
    </script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6138fb4625797d7a89fdf4b1/1ff39b3en';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>
<?php ob_flush(); ?>