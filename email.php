<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $to = 'info@cdrmsolutions.com';
    $subject = 'Regarding Service Enquiry';
    $from = 'admin@cdrmsolutions.com';
     
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
     
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<p style="color:#000;font-size:16px;">Name: '.$name.'</p>';
    $message .= '<p style="color:#000;font-size:16px;">Email: '.$email.'</p>';
    $message .= '<p style="color:#000;font-size:16px;">Number: '.$number.'</p></br>';
    $message .= '<p style="color:#000;font-size:16px;">Thanks</p>';
    $message .= '</body></html>';
     
    // Sending email
    $sent = mail($to, $subject, $message, $headers);
    if($sent){
        echo 1;
    } else{
        echo 0;
    }
?>