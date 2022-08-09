<?php
/****************************
*	Basic PHP Form Processor	*
****************************/

//Trim removes white space after strip_tags gets rid of any html, javascript, etc tags from the input
$emailTo = "adonitorres1104@platt.edu";
$subject = "Request Services";
$fname = trim(strip_tags($_POST['fname']));
$lname = trim(strip_tags($_POST['lname']));
$email = trim(strip_tags($_POST['email']));
$phone = trim(strip_tags($_POST['phone']));
$type = trim(strip_tags($_POST['type']));
$message = trim(strip_tags($_POST['message']));

//Creating a single variable to format and hold all the inputs
$body = "
Customer Contact Form
First Name: $fname
Last Name: $lname
Email Address: $email
Phone: $phone
New Customer?: $type
Message: $message";


mail ($emailTo, $subject, $body, "From: <$email>");
mail ($email, $subject, $body, "From: <$emailTo>");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Services Success</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="png" href="images/favicon.png">
  <script src="https://kit.fontawesome.com/ddbddb4870.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <div class="banner flex">
      <a href="tel:+1619-265-0107" title="Call Us at 619-265-0107 today!">619-265-0107</a>
      <a href="https://www.google.com/maps/dir//6250+El+Cajon+Blvd,+San+Diego,+CA+92115/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x80d9569136a9ddb9:0x5ca8ceb0cded9b9e?sa=X&amp;ved=2ahUKEwijieLE9Ob3AhXnJkQIHXpHCocQwwV6BAgIEAM" target="_blank" title="Driving Directions to our Home Office!">6250 El Cajon Blvd<span>, San Diego, CA 92115</span></a>
    </div>
    <div class="navbar flex">
      <h1><a href="index.html#">Home</a></h1>
      <nav class="global">
        <ul class="topnav flex">
          <li class="nhome"><a href="index.html#"><i class="fa-solid fa-house">&nbsp;</i></a></li>
          <li class="nservices"><a href="index.html#services"><i class="fa-solid fa-screwdriver-wrench">&nbsp;</i></a></li>
          <li class="nabout"><a href="index.html#about"><i class="fa-solid fa-circle-info">&nbsp;</i></a></li>
          <li class="ncontact"><a href="index.html#request-services"><i class="fa-solid fa-comment-dots">&nbsp;</i></a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <h1 style="font-size: 2.25rem;line-height: 5rem;text-align: center;">Request Received!</h1>
    <?php
    //if the email was sent, show the success message
      echo '<div style="font-size:1.5rem;line-height:2.25rem;padding:1rem;">Thanks '.$fname.'! We have received your request.</div>';
      echo '<div style="font-size:1.5rem;line-height:2.25rem;padding:1rem;">We will get back to you at: '.$email.' or at: '.$phone.' within 24 hours.</div>';
      echo '<div style="font-size:1.5rem;line-height:2.25rem;padding:1rem;">A copy of this request was also sent to you at: '.$email.'. We look forward to speaking with you soon!</div>';
    ?>
  </main>

  <footer>
    <section>
      <div class="quick-links">
        <ul class="footernav">
          <li class="nhome"><a href="index.html" title="Plan-It Plumbing, Heating, &amp; Air &mdash; Home Page">Home</a></li>
          <li class="nservices"><a href="index.html#services" title="Our Services">Services</a></li>
          <li class="nabout"><a href="index.html#about" title="About Us">About</a></li>
          <li class="nplumbing"><a href="javascript:;" title="Plan-It Plumbing, Heating, &amp; Air &mdash; Plumbing Service Page">Plumbing</a></li>
          <li class="nheating"><a href="javascript:;" title="Plan-It Plumbing, Heating, &amp; Air &mdash; Heating Service Page">Heating</a></li>
          <li class="nair"><a href="javascript:;" title="Plan-It Plumbing, Heating, &amp; Air &mdash; Air Conditioning Service Page">A/C</a></li>
          <li class="nprojects"><a href="javascript:;" title="Plan-It Plumbing, Heating, &amp; Air &mdash; Project Planning Page">Projects</a></li>
          <li class="nfeatured"><a href="index.html#featured" title="Featured Content">Featured</a></li>
          <li class="ncoupons"><a href="index.html#coupons" title="Coupons">Coupons</a></li>
          <li class="ncontacts"><a href="index.html#request-services" title="Contact Us">Contact</a></li>
          <li class="ntestimonials"><a href="index.html#testimonials" title="Testimonials">Testimonials</a></li>
          <li class="nblog"><a href="index.html#blog" title="Blog">Blog</a></li>
          <li class="nhome"><a href="index.html" title="Plan-It Plumbing, Heating, &amp; Air &mdash; Home Page">Home</a></li>
        </ul>
      </div>
      <div class="social">
        <ul class="flex">
          <li class="facebook"><a href="https://www.facebook.com/" target="_blank" title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
          <li class="twitter"><a href="https://twitter.com/" target="_blank" title="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
          <li class="instagram"><a href="https://www.instagram.com/" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
          <li class="youtube"><a href="https://www.youtube.com/" target="_blank" title="Youtube"><i class="fa-brands fa-youtube"></i></a></li>
        </ul>
      </div>
      <div class="contact">
        <p><a href="tel:+1619-265-0107" title="Call Us at 619-265-0107 today!">619-265-0107</a></p>
        <p><a href="https://www.google.com/maps/dir//6250+El+Cajon+Blvd,+San+Diego,+CA+92115/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x80d9569136a9ddb9:0x5ca8ceb0cded9b9e?sa=X&amp;ved=2ahUKEwijieLE9Ob3AhXnJkQIHXpHCocQwwV6BAgIEAM" target="_blank" title="Driving Directions to our Home Office!">6250 El Cajon Blvd<br>San Diego, CA 92115</a></p>
      </div>
      <div class="utilities">
        <ul class="flex">
          <li class="legal"><a href="javascript:;" target="_blank" title="Legal Disclaimer">Legal</a></li>
          <li class="privacy"><a href="https://www.privacypolicies.com/live/aa6bfc50-3794-4ae3-986f-6ddc2abe9a63" target="_blank" title="Our Privacy Policy">Privacy Policy</a></li>
          <li class="site-map"><a href="javascript:;" target="_blank" title="Our Site Map">Site Map</a></li>
        </ul>
      </div>
      <div>
        <p>&copy; 2022 Plan-It Plumbing</p>
        <p>All Rights Reserved</p>
      </div>
    </section>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="scripts/scroll.js"></script>
  
</body>
</html>