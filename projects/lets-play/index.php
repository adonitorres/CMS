<?php 
require('config.php'); 
require_once('includes/functions.php');
require('includes/header.php');
?>
		<main class="content">
			<section class="hero">
				<div>
					<div class="flex">
						<h2>Let&rsquo;s Play!</h2>
						<h3>Tabletop Games</h3>
						<p>Find your next game!</p>
						<ul>
							<li class="dgames"><a class="button-style" href="index.php#browse">Browse Games</a></li>
							<li class="dgms"><a class="button-style" href="new-game.php">Post a Game</a></li>
						</ul>
					</div>
				</div>
			</section>
			<section id="about" class="about">
				<h3>About Let&rsquo;s Play!</h3>
				<p>Let&rsquo;s Play! is your go-to spot to meet with local GMs searching for players, players who need games, and discuss tabletop roleplaying games in general.<br><br>Stop spending all that time reading the books and making up characters, and actually PLAY!</p>
				<img src="images/about-hero-mb.jpg" alt="view of table with dice and character sheets">
				<p>Our site is dedicated to providing an easy and fun place to find a game to play, or manage your own game for others to enjoy.<br><br>Whether you are a new player, or an experienced dungeon crawler, we have the game, players, or GM for you!</p>
			</section>
			<section id="browse" class="browse">
				<h3>Browse Games &amp; GMs</h3>
				<p>Whether you are looking to join a new campaign, a one-shot session, or an ongoing campaign, you have come to the right place!</p>
				<ul class="flex">
					<li class="dgames"><a href="browse.php"><span>Browse<br>Games</span></a></li>
					<li class="dgms"><a href="javascript:;"><span>Browse<br>GMs</span></a></li>
				</ul>
			</section>
			<section id="contact" class="contact">
				<h3>Contact Us</h3>
				<p>Join our communties to stay in touch with the latest events and discussion with other local players and GMs!</p>
				<form method="post" action="index.php#contact">
					<div class="fname">
						<label for="fname">First Name</label>
						<input type="text" name="fname" placeholder="First Name">
					</div>
					
					<div class="lname">
						<label for="lname">First Name</label>
						<input type="text" placeholder="Last Name">
					</div>
					
					<div class="email">
						<label for="email">First Name</label>
						<input type="email" placeholder="Email">
					</div>

					<div class="policy">
						<p>By clicking Submit, you agree to our <a href="includes/tos.html">Terms of Service</a>, <a href="javascript:;">Data Policy</a> and <a href="javascript:;">Cookies Policy</a>. You may receive SMS Notifications from us and can opt out any time.</p>
					</div>
					
					<div class="submit">
						<label for="submit">Submit</label>
						<input class="button-style" type="submit" placeholder="Submit">
					</div>

					<input type="hidden" class="did_submit">
				</form>
			</section>

		</main>
<?php
require('includes/footer.php'); 
?>
		