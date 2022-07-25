<?php include ("../header.php"); ?>
<?php 
   //Get slug from url
   $slug = $_GET['slug'];
   //Get all services category
   $service_cat_query = "SELECT * FROM `services_cat` WHERE slug='$slug' AND status='1'"; 
   $service_cat_result = $conn->query($service_cat_query);	
   if($service_cat_result->num_rows >= 1){
       $service_cat = $service_cat_result->fetch_assoc();
       $category_id = $service_cat['id'];
       ?>
<title><?php echo $service_cat['name']; ?></title>
<meta name="description" content="<?php echo $service_cat['meta_description']; ?>">
<meta name="keywords" content="<?php echo $service_cat['meta_keyword']; ?>">
<?php include ("../header_bottom.php"); ?>
<!-- Ui element start -->
<div class="work-processing-area pd-top-120">
   <div class="container">
      <div class="row justify-content-center pd-top-40 pd-bottom-40">
         <div class="col-xl-8 col-lg-10">
            <div class="section-title text-center">
               <h2 class="title"><span><?php echo $service_cat['name']; ?></span>
                  <?php if($service_cat['city']){ ?>
                  <span class="city-name"> <?php echo $service_cat['city']; ?></span>
                  <?php  } ?>
               </h2>
               <p><?php echo $service_cat['description']; ?></p>
            </div>
         </div>
      </div>
      <?php 
         //Get all services according to catefory id
         $service_query = "SELECT * FROM `services` WHERE category_id='$category_id' AND status='1'"; 
         $service_result = $conn->query($service_query);	
         if($service_result->num_rows >= 1){ 
             $count = 1;
             while($service = $service_result->fetch_assoc()) { ?>
      <div class="row justify-content-center custom-gutters-16 single-work-processing">
         <div class="col-xl-5 col-md-6 <?php if($count % 2 == 0){ echo "order-lg-12"; } ?>">
            <div class="thumb swp-right-thumb">
               <?php if($service['image']){ ?> 
               <img src="<?php echo UPLOAD_IMAGE_PATH.'service/'.$service['image']; ?>" alt="<?php echo $service['image']; ?>">
               <?php } ?>
            </div>
         </div>
         <div class="col-xl-4 col-md-6 order-lg-1 desktop-center-item">
            <div class="work-processing-details">
               <div class="section-title style-four">
                  <h1 class="counting-number"><?php echo $count; ?></h1>
                  <h2 class="title"><?php echo $service['name']; ?></h2>
                  <p><?php echo $service['short_description']; ?> </p>
                  <div class="btn-wrapper desktop-left padding-top-20">
                     <a href="<?php echo SITE_URL."service/single.php?slug=".$service['slug']; ?>" class="btn btn-radius btn-green s-animate-3 text-white">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $count++; } ?>
      <?php 
      //Check if cate us resource
      if($service_cat['menu_type'] == 'resource') { ?>
      <div class="row">
         <div class="col-xl-2"> 
         </div>
         <div class="col-xl-8">
            <div class="resource-form">
               <h3 class="title mb-3 pb-3 text-center">Get in touch with us</h3>
               <form method="post" class="myform" action="resource_form">
                  <div class="form-group">
                     <input type="text" name="name" value="" class="form-control" id="exampleInputName" aria-describedby="name" placeholder="Enter Your Name" required>
                  </div>
                  <div class="form-group">
                     <input type="email" name="email" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                     <input type="text" name="number" value="" maxlength="10" class="form-control" id="exampleInputPhone" aria-describedby="phone" placeholder="Enter Your Phone No." >
                  </div>
                  <div class="btn-submit text-center">
                     <input type="submit" name="submit" value="Send" class="green-btn"> <span class="output_message">
                  </div>
               </form>
            </div>
            <?php } ?>
            <?php } else { ?>
            <div class="row justify-content-center custom-gutters-16 single-work-processing">
               <h2> No Service Found</h2>
            </div>
            <?php } ?>
         </div>
         <div class="col-xl-2">
         </div>
      </div>
   </div>
</div>
<!-- Ui element End -->
<?php } else { ?>
<?php include ("../header_bottom.php"); ?>
<!-- Ui element start -->
<div class="work-processing-area pd-top-120">
   <div class="container">
      <div class="row justify-content-center pd-top-40 pd-bottom-40">
         <div class="col-xl-8 col-lg-10">
            <div class="section-title text-center">
               <h2 class="title"> <span>No Record Found</span></h2>
            </div>
         </div>
      </div>
   </div>
</div>
<?php } ?>
<?php include ("../footer.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="main.js"></script>