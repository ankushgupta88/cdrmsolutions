<?php include ("header.php"); ?>
<title>Blog</title>
<meta name="description" content="CDRM Solutions Inc is a Vancouver web design and development company focused on building high-quality websites for small businesses. For more information visit our website.">
  <meta name="keywords" content="blog">
<?php include ("header_bottom.php"); ?>

<!-- breadcrumb area start -->
<div class="breadcrumb-area" style="background-image:url(assets/img/page-title-bg.png);">
   <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Blog</h1>
                   <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
   </div>
</div>
<!-- breadcrumb area End -->

<!-- Ui element start -->
<!-- about area start -->
<div class="about-provide-area pd-top-120 bg-none">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 desktop-center-item">
                <div>
                    <div class="section-title style-two">
                        <h4 class="title">Most frequent Real answer short questions from recent exams(updated):</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about area End -->

<!--Our Mission -->

<!--Our Mission -->

<div class="sbst-service-area ">
    <div class="container">
		<div class="row">
            <?php 
            //Get all Blogs
            $blog_query = "SELECT * FROM `blogs` WHERE status='1'";
            $blog_result = $conn->query($blog_query);	
            if($blog_result->num_rows >= 1){
            while($blog = $blog_result->fetch_assoc()) { ?>
                <div class="col-lg-4">             
                    <div class="blog-box-content blog-c-i">
                        <div class="blog-img">
                            <div class="thumb">
                                <?php if($blog['blog_image']){ ?> 
                                    <img src="<?php echo UPLOAD_IMAGE_PATH.'blog/'.$blog['blog_image']; ?>" class="img-fluid" alt="<?php echo $blog['blog_image']; ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="blog-content py-4">
                            <h4><?php echo $blog['name']; ?></h4>
                           
                            <?php echo $blog['short_description']; ?>
                            <div class="btn-wrapper text-center">
                                <a href="<?php echo SITE_URL.$blog['slug']; ?>" class="btn btn-radius btn-green s-animate-3">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } } ?>
            <div class="col-md-12 col-12 mx-auto">
            <div class="Conclusio_text text-center pt-5">
                <div class="section-title mb-2"> <h4 class="pb-4 title"> Conclusion of Website Design and Development </h4> </div>
                <p> There goes a lot into managing the 5 must know essentials of website design and development. These 5 must know essentials of website design and development are interconnected and enhance the value of other essentials of web design. It is important that these elements must be seamless integrated. It is best advised that the website design and development be assigned to a team of experts with in-depth understanding of these concepts. Get hold of a credible website design and development firm and start a discussion today.   </p>
            </div>
            </div>
        </div>
    </div>
</div>

<!--End Our Mission-->
<!-- Ui element End -->

<?php include ("footer.php"); ?>