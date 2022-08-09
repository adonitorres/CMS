<?php 
require('config.php'); 
require_once('includes/functions.php');
require('includes/header.php');
//kill the page if not logged in
if(! $logged_in_user){
	exit('This page is for logged in users only');
}
?>
		<main class="dgame">
			<section class="hero">
				<h2>Looking to start a new game?</h2>
			</section>
			<?php require('includes/parse-upload.php'); ?>
			<h2>Add Game</h2>
			<p>Look no further! Use the below form to post your details, whether you are looking for players for your game or campaign!</p>

			<?php show_feedback( $feedback, $feedback_class, $errors ); ?>

			<form class="flex" method="post" action="new-game.php" enctype="multipart/form-data">
				<label for="gametype">Select Game Type</label>
				<?php type_dropdown(); ?>

				<label for="game">Select Game</label>
				<?php game_dropdown(); ?>

				<label for="title">Title</label>
				<input type="text" name="title" placeholder="Title" required>
				<?php ?>

				<label for="details">Details</label>
				<textarea name="details" id="details" cols="70" rows="6" placeholder="Details about your game go here. Make sure to put as much info as needed here such as, how often you will meet, days available, number of players needed, your experience as a GM, etc..." required></textarea>
				<?php ?>

				<label for="uploadedfile">Upload a .jpg, .gif or .png image for your post background</label>
				<input type="file" name="uploadedfile" accept="image/*" required>

				<input type="submit" value="Submit Post">
				<input type="hidden" name="did_upload" value="1">
			</form>
			
		</main>
<?php
require('includes/footer.php'); 
		