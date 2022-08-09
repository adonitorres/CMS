<?php 
//check login keys
$logged_in_user = check_login(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Let&rsquo;s Play! &dash; Home</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/ddbddb4870.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="site">
<header class="header grid">
	<a href="index.php" class="logo-sm"></a>
	<h1>Let&rsquo;s Play!</h1>
	<a class="hamburger" href="javascript:;">
		<div class="hamburger">
			<ul>
				<li class="top"></li>
				<li class="middle"></li>
				<li class="bottom"></li>
			</ul>
		</div>
	</a>

	<nav class="main-navigation flex">
		<form class="searchform flex" method="get" action="search.php">
			<label for="phrase" class="screen-reader-text">Search</label>
			<input type="search" name="phrase">
			<input class="button-style" type="submit" value="Search">
		</form>

		<ul class="profile flex">
			<?php 
			if($logged_in_user){ 
			?>
			<li class="user">
				<div>
					<a href="profile.php">
						<?php 
						show_profile_pic( $logged_in_user['profile_pic'], $logged_in_user['username'], 30 ); ?>
					</a>
					<a href="profile.php">
						<?php echo $logged_in_user['username']; ?>
					</a>
				</div>
			</li>
			<li><a href="new-game.php">New<br>Post</a></li>
			<li><a href="login.php?action=logout">Log<br>Out</a></li>

			<?php }else{ ?>

			<li><a href="register.php">Sign Up</a></li>
			<li><a href="login.php">Log In</a></li>
			<?php } ?>
		</ul>
		<ul id="mainMenu" class="main-menu">
			<li class="dhome"><a href="index.php">Home</a></li>
			<li class="dlogin"><a href="login.php">Login/Register</a></li>
			<li class="dbrowse"><a href="index.php#browse">Browse Games/GMs</a></li>
			<li class="dabout"><a href="index.php#about">About</a></li>
			<li class="dcontact"><a href="index.php#contact">Contact Us</a></li>
		</ul>
	</nav>
</header>	