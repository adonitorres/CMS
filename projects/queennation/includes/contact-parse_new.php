<?php
//if they pressed the button, pull out the user inputs
if($_POST['did_send'] == 1){
    //http://www.webdeveloper.com/forum/showthread.php?224951-Sending-an-email-with-PHP-and-HTML-Forms-specifically-using-checkboxes

    // create variables from inputs and sanitize
    $senderFName= filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
    $senderLName= filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    $senderEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // IMPORTANT - Change these lines to be appropriate for your needs - IMPORTANT !!!!!!!!!!!!!!!!!!
    $to = "adonitorres1104@platt.edu";
    $from = "$senderEmail";
    $subject = "Queen Nation Newsletter Signup";
    // Modify the Body of the message however you like
    $message = "Newsletter Sign-up From:

        First Name:  $senderFName
        Last Name: $senderLName
        Email:  $senderEmail";

        // Build $headers Variable
        $headers = "From: $from\r\n";
        $headers .= "Reply-to: $senderEmail\r\n";

    //send the mail!
    $mail_sent = mail($to, $subject, $message, $headers);

    //success/error
    if($mail_sent == 1){
        //success
        $display_msg = 'Thank you for signing up '.$senderFName.'! You have been added to our newsletter distribution list!';
        $status = 'success';
        //to open a new thank you page use: header( 'Location: thankYou.html' ) ;
    }else{
        //failure
        $display_msg = 'Sorry, something went wrong, and the form was not submitted. Please try again';
        $status = 'notsent';
    }
}
?>
