<?php include('includes/contact-parse_new.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/lightslider.css">
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/lightslider.js"></script>
  <script src="js/jquery.validate_t.js"></script>
   <script src="js/validTests.js"></script>
  <title>Queen Nation - Home</title>
</head>
<body class="dnewsletterform">
  <header>
    <h1><a href="index.html">
      <div>Q</div>
      <div>N</div></a>
    </h1>
    <a class="menu" href="javascript:;">
      <div class="hamburger">
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
      </div>
    </a>
    <nav>
      <ul class="global">
        <li class="nhome"><a href="index.html">Home</a></li>
        <li class="nlineup"><a href="lineup.html">Line-Up</a></li>
        <li>&nbsp;</li>
        <li class="ngallery"><a href="gallery.html">Gallery</a></li>
        <li class="ncontact"><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <!-- set up the success message. it will create a div with class of either "success" or "notsent" -->
    <?php
      // if the variable in hidden field is true >>form has been sent and php processed it correctly
      if($_REQUEST['did_send']==1){
        // start typing an open div tage with the correct class
        echo '<div class="'.$status.'">';
        // display the correct message, using the variable you created in php file
        echo $display_msg;
      echo '</div>';
      }?>
      <!-- you will end up with a div displaying the right message
        <div class="success">your form was sent</div> or
        <div class="notsent">sorry your form was not sent</div>
        -->
  </main>

  <footer>
    <ul>
      <li><a href="https://www.facebook.com/Queen-Nation-139068526304/" target="_blank"><p>Facebook</p></a></li>
      <li><a href="https://www.instagram.com/queennationband/" target="_blank"><p>Instagram</p></a></li>
      <li><a href="https://twitter.com/queennation2013" target="_blank"><p>Twitter</p></a></li>
      <li><a href="https://www.youtube.com/user/Wix" target="_blank"><p>YouTube</p></a></li>
    </ul>
    <div>
      <a href="https://www.privacypolicies.com/live/59a33f1e-d855-42be-812a-9ac5826e63c5" target="_blank">Privacy Policy</a>
      <p>&copy;Copyright 2022.</p>
      <p>All Rights Reserved.</p>
    </div>
  </footer>
  <script src="js/menu.js"></script>
</body>
</html>