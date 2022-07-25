<?php include ("../header.php"); ?>

<?php 
//Get slug from url
$slug = $_GET['slug'];  
//Get all services
$service_query = "SELECT * FROM `services` WHERE slug='$slug' AND status='1'"; 
$service_result = $conn->query($service_query);	
if($service_result->num_rows >= 1){
    $single_service = $service_result->fetch_assoc();
    ?>
    <title><?php echo $single_service['name']; ?></title>
    <meta name="description" content="<?php echo $single_service['meta_description']; ?>">
    <meta name="keywords" content="<?php echo $single_service['meta_keyword']; ?>">
    <?php include ("../header_bottom.php"); ?>

    <!-- Ui element start -->
    <div class="work-processing-area pd-top-120">
        <div class="container">
            <div class="row justify-content-center pd-top-40 pd-bottom-40">
                <div class="col-xl-8 col-lg-10">
                    <div class="section-title">
                        <h2 class="title"> <span> <?php echo $single_service['name']; ?></span></h2>
                        <p><?php echo $single_service['description']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center custom-gutters-16 single-work-processing">
                <div class="col-xl-5 col-md-6 order-lg-12">
                    <div class="thumb swp-right-thumb">
                        <?php if($single_service['image']){ ?> 
                            <img src="<?php echo UPLOAD_IMAGE_PATH.'service/'.$single_service['image']; ?>" alt="<?php echo $single_service['image']; ?>">
                        <?php } ?>
                    </div>
                </div>
            
            </div>      
        </div>
    </div>
    <!-- Ui element End -->
<?php } else { ?>
    <?php include ("../header_bottom.php"); ?>
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
<?php include ("../footer.php"); ?>