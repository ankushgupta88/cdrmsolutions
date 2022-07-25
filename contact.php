<?php 
ob_start();
include ("header.php"); ?>
<title>CDRM Solutions Inc</title>
<meta name="description" content="CDRM Solutions Inc">
  <meta name="keywords" content="CDRM Solutions Inc">
  
<?php include ("header_bottom.php"); 

if(isset($_POST['send'])){
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $sub = $_POST['subject'];
    $msg = $_POST['message'];
    
    $to = "info@cdrmsolutions.com";
    $from = "info@cdrmsolutions.com";
     $subject = "Contact Us";
     
     $message = "<p><b>Name: </b>".$name."</p>";
     $message .= "<p><b>Email: </b>".$email."<p>";
     $message .= "<p><b>Subject: </b>".$sub."<p>";
     $message .= "<p><b>Message: </b>".$msg."<p>";
     
     $header = "From: ".$from. "\r\n";
     $header .= "MIME-Version: 1.0\r\n";
     $header .= "Content-type: text/html\r\n";
     
     $retval = mail ($to,$subject,$message,$header);
    
     if( $retval == true ) {
        
        header("Location: thankyou.php");
        // die('should have redirected by now');

     }else {
         $msg ="Message could not be sent...";
     }
}

?>

<!-- breadcrumb area start -->
<div class="breadcrumb-area" style="background-image:url(assets/img/page-title-bg.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h1 class="page-title">Contact</h1>
                    <ul class="page-list">
                        <li><a href="index.php">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area End -->

<!-- contact form start -->
<div class="contact-form-area pd-top-112">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section-title text-center w-100">
                    <h2 class="title">Send you <span>Enquiry</span></h2>
                    <p>CDRM Solutions Inc professionals are always available for Client queries. </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5">
                <img src="assets/img/others/21.png" alt="blog">
                <div>
                    <p>As the festive season is soon approaching, we are gearing up for it with our Christmas giveaway. We want to celebrate this Christmas with you by inviting you all to join our Christmas Lucky Draw and stand a chance to win $50</p>
                    <div class="btn-wrapper desktop-center padding-top-20">
                        <a href="javascript:void(0)" class="btn btn-red mt-0" onclick="showHide('add-details-popup')">Join Lucky Draw</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-xl-1">
                <form class="riyaqas-form-wrap mt-5 mt-lg-0" method="post">
                    <p style="color: green;"> <?php if(isset($msg)){
                        echo $msg; 
                    }?></p>
                    <div class="row custom-gutters-16">
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <input type="text" class="single-input" name="fname">
                                <label>Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <input type="email" class="single-input" name="email" required>
                                <label>E-mail</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-input-wrap">
                                <input type="text" class="single-input" name="subject">
                                <label>Subject</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="single-input-wrap">
                                <textarea class="single-input textarea" cols="20" name="message"></textarea>
                                <label class="single-input-label">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="send" class="btn btn-red mt-0" value="Send">
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- map area start -->
<div class="map-area pd-top-120">
    <div class="container">
        <div class="map-area-wrap">
            <div class="row no-gutters">
                <div class="col-lg-8">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83327.3577570667!2d-123.19394410957479!3d49.2578263206911!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548673f143a94fb3%3A0xbb9196ea9b81f38b!2sVancouver%2C%20BC%2C%20Canada!5e0!3m2!1sen!2sin!4v1628772482236!5m2!1sen!2sin" width="800" height="510" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>  
                <div class="col-lg-4 desktop-center-item">
                    <div>
                        <div class="contact-info">
                            <h4 class="title">Contact info:</h4>
                            <p class="sub-title">Client satisfaction is what we thrive for. You can easily contact us on details below</p>
                            <p><span>Address:</span> Vancouver, British Columbia, <br> Canada</p>
                            <p><span>Mobile:</span> +1 (604) 783-4003</p>
                            <p><span>E-mail:</span> info@cdrmsolutions.com</p>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
<!-- map area End -->

<?php 

echo "<div id='add-details-popup' style='display: none;'>";
include ("lottery/addQRCode.php"); 
echo "</div>";

include ("footer.php"); 

?>
