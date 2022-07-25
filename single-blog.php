<?php include ("header.php"); ?>

<?php 
//Get slug from url
$slug = $_GET['slug'];  
//Get all blogs
$blog_query = "SELECT * FROM `blogs` WHERE slug='$slug' AND status='1'"; 
$blog_result = $conn->query($blog_query);	
if($blog_result->num_rows >= 1){
    $blog = $blog_result->fetch_assoc();
    ?>
    <title><?php echo $blog['name']; ?></title>
    <meta name="description" content="<?php echo $blog['meta_description']; ?>">
    <meta name="keywords" content="<?php echo $blog['meta_keyword']; ?>">
    <?php include ("header_bottom.php"); ?>

    <div class="work-processing-area pd-top-120">
        <div class="container">
              <div class="row justify-content-center pd-top-40 pd-bottom-40">
                <div class="col-xl-8 col-lg-10">
                    <div class="section-title">
                        <h2 class="title"> <span> <?php echo $blog['name']; ?></span></h2>
                        <p><?php echo $blog['description']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center custom-gutters-16 single-work-processing">
                <div class="col-xl-5 col-md-6 order-lg-12">
                    <div class="thumb swp-right-thumb">
                        <?php if($blog['blog_image']){ ?> 
                            <img src="<?php echo UPLOAD_IMAGE_PATH.'blog/'.$blog['blog_image']; ?>" alt="<?php echo $blog['blog_image']; ?>">
                        <?php } ?>
                    </div>
                </div>
            
            </div>      
        </div>
    </div>
<?php } else { ?>
    <?php include ("header_bottom.php"); ?>
    <div class="work-processing-area pd-top-120">
        <div class="container">
            <div class="row justify-content-center pd-top-40 pd-bottom-40">
                <div class="col-xl-8 col-lg-10">
                    <div class="section-title">
                        <h2 class="title"><span>No Record Found</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include ("footer.php"); ?>