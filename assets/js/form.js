$(document).ready(function () {
    $('.myform').on('submit', function () {

        // Add text 'loading...' right after clicking on the submit button. 
        $('.output_message').text('Loading...');
        var resource_form = $("form").serialize();
        
        $.ajax({
            // if it can't find email.php just chahge the url path to the full path, including your domain and all folders.
            url: base_url + "email.php",
            method: 'post',
            data: resource_form,
            success: function (result) {
                if (result == 1) { 
                    //$('.output_message').text('Message Sent!');
                    setTimeout(window.location.href = base_url + "thankyou.php", 1000);
                } else {
                    $('.output_message').text('Error Sending email!');
                }
            }
        });
        return false;
    });
});
