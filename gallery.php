
<?php include ("header.php"); ?>
<title>CDRM Solutions Inc</title>
<meta name="description" content="CDRM Solutions Inc">
<meta name="keywords" content="CDRM Solutions Inc">
<?php include ("header_bottom.php"); ?>
<!-- breadcrumb area start -->
<div class="breadcrumb-area" style="background-image:url(assets/img/page-title-bg.png);">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="breadcrumb-inner">
               <h1 class="page-title">Gallery</h1>
               <ul class="page-list">
                  <li><a href="index.php">Home</a></li>
                  <li>Gallery</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- breadcrumb area End -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container portfolio-sec">
   <div class="row">
      <div class="col-lg-12 text-center my-2">
         <!--<h4>Isotope filter magical layouts with Bootstrap 4</h4>-->
      </div>
   </div>
   <div class="portfolio-menu mt-2 mb-4">
      <?php 
         //Get all portfolios_cat
         $portfolios_cat_query = "SELECT * FROM `portfolios_cat` WHERE status='1'";
         $portfolios_cat_result = $conn->query($portfolios_cat_query);	
         ?>
      <ul>
         <li class="btn  active" data-filter="*">See All</li>
         <?php if($portfolios_cat_result->num_rows >= 1){ 
            while($portfolios_cat = $portfolios_cat_result->fetch_assoc()) { ?>
         <li class="btn " data-filter=".<?php echo $portfolios_cat['id']; ?>"><?php echo $portfolios_cat['name']; ?></li>
         <?php } } ?>
      </ul>
   </div>
   <div class="portfolio-item row">
      <?php 
         //Get all portfolios_cat
         $portfolios_cat_query2 = "SELECT * FROM `portfolios_cat` WHERE status='1'";
         $portfolios_cat_result2 = $conn->query($portfolios_cat_query2);	
         
         //category
         if($portfolios_cat_result2->num_rows >= 1){ 
         $cat_count2 = 1;
         while($portfolios_cat2 = $portfolios_cat_result2->fetch_assoc()) { 
         $portfolio_cat_id =  $portfolios_cat2['id'];  
         
         //Get all portfolio according to cat id
         $portfolio_query = "SELECT * FROM `portfolios` WHERE category_id='$portfolio_cat_id' AND status='1'";
         $portfolio_result = $conn->query($portfolio_query);	
         
         if($portfolio_result->num_rows >= 1){ 
         while($portfolio = $portfolio_result->fetch_assoc()) { ?>
      <div class="item <?php echo $portfolio_cat_id; ?> col-lg-4 col-md-6">
         <a href="<?php if($portfolio['url']){ echo $portfolio['url']; } else { echo UPLOAD_IMAGE_PATH."portfolio/".$portfolio['image']; } ?>" class="fancylight <?php if($portfolio['url']){ } else { echo 'popup-btn'; } ?>" data-fancybox-group="light">
            <?php if($portfolio['image']){ ?> 
            <div class="content-overlay"></div>
            <img class="img-fluid" src="<?php echo UPLOAD_IMAGE_PATH."portfolio/".$portfolio['image']; ?>" alt="<?php echo $portfolio['image']; ?>">
            <div class="content-details fadeIn-top">
               <h5 class="text-light"><?php echo $portfolios_cat2['name']; ?></h5>
            </div>
            <?php } ?>
         </a>
      </div>
      <?php } } ?>
      <?php $cat_count2++; } } ?>
   </div>
</div>
<script>
   $('.portfolio-menu ul li').click(function(){
      $('.portfolio-menu ul li').removeClass('active');
      $(this).addClass('active');
      
      var selector = $(this).attr('data-filter');
      $('.portfolio-item').isotope({
         filter:selector
      });
      return  false;
   });
   $(document).ready(function() {
      var popup_btn = $('.popup-btn');
      popup_btn.magnificPopup({
            type : 'image',
            gallery : {
            enabled : true
         }
      });
   });
</script>
<?php include ("footer.php"); ?>