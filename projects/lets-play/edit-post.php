<?php 
require('config.php'); 
require_once('includes/functions.php');
require('includes/header.php');
//kill the page if not logged in
if(! $logged_in_user){
	exit('This page is for logged in users only');
}
?>
		<main class="content">
			<?php require('includes/parse-edit.php'); ?>
			<h2>Edit Post</h2>

			<?php show_post_image( $image ); ?>

			<?php show_feedback( $feedback, $feedback_class, $errors ); ?>

			<form method="post" action="edit-post.php?post_id=<?php echo $post_id; ?>">
				<label>Title</label>
				<input type="text" name="title" value="<?php echo $title; ?>">

				<label>Details</label>
				<textarea name="body"><?php echo $body; ?></textarea>

				<label>Game Type</label>
				<?php type_dropdown( $type_id ); ?>

				<label for="location">Location</label>
				<input type="text" name="location" value="<?php echo $location; ?>">

				<label for="first_session">First Session</label>
				<input type="date" name="first_session" value="<?php ?>">

				<label for="players">Players Needed</label>
				<input type="text" name="players" value="<?php echo $players_needed; ?>">

				<label>
					<input type="checkbox" name="allow_comments" value="1" <?php 
						checked( 1, $allow_comments ); ?>>
					Allow Comments on this post
				</label>

				<label>
					<input type="checkbox" name="is_published" value="1" <?php 
						checked( 1, $is_published ); ?>>
					Make this post public
				</label>

				<input type="submit" value="Save Post">
				<input type="hidden" name="did_edit" value="1">
			</form>
			
		</main>
<?php
require('includes/footer.php'); 
		