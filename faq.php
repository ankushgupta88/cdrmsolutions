<?php include ("header.php"); ?>
<title>Website Design Development and Deployment</title>
<meta name="description" content="CDRM is a Vancouver web design and development company focused on building high-quality websites for small businesses. For more information visit our website.">
  <meta name="keywords" content="website design development deployment">
<?php include ("header_bottom.php"); ?>

<!-- breadcrumb area start -->
<div class="breadcrumb-area" style="background-image:url(assets/img/page-title-bg.png);">
   <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">FAQ</h1>
                   <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li>FAQ</li>
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
                        <h4 class="title">Most frequent Real answer short questions</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about area End -->

<!--Our Mission -->

<div class="sbst-service-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="faq-content">
                  <?php 
                  //Get all faqs
                  $faq_query = "SELECT * FROM `faqs` WHERE status='1' AND category_id='1'";
                  $faq_result = $conn->query($faq_query);	
                  $count = 1;
                  if($faq_result->num_rows >= 1){
                    while($faq = $faq_result->fetch_assoc()) { ?>
                    <p class="mb-0"> <?php echo $count."."." ".$faq['name']; ?></p>
                    <div class="anwser-desc" style="color: #01358D;"> <?php echo $faq['answer']; ?></div>
                  <?php $count++; } } ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq-content">
                  <?php 
                  //Get all faqs
                  $faq_query2 = "SELECT * FROM `faqs` WHERE status='1' AND category_id='2'";
                  $faq_result2 = $conn->query($faq_query2);	
                  $count2 = 1;
                  if($faq_result2->num_rows >= 1){
                    while($faq2 = $faq_result2->fetch_assoc()) { ?>
                    <p class="mb-0"> <?php echo $count2."."." ".$faq2['name']; ?></p>
                   <div class="anwser-desc" style="color: #01358D;"> <?php echo $faq2['answer']; ?></div>
                  <?php $count2++; } } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--End Our Mission-->
<!-- Ui element End -->

<?php include ("footer.php"); ?>