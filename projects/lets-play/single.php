<?php 
require('config.php'); 
require_once('includes/functions.php');

//which post are we trying to show? URL will look like single.php?post_id=X
$post_id = filter_var($_GET['post_id'], FILTER_SANITIZE_NUMBER_INT);
//validate - make sure we got a positive integer
if($post_id < 0){
	$post_id = 0;
}

require('includes/header.php');
require('includes/parse-comment.php');

?>
<main class="content">
	<?php //the one requested post
	$result = $DB->prepare( 'SELECT posts.*, game_type.*, games.*, users.username, users.profile_pic, users.user_id
														FROM posts, game_type, games, users
														WHERE posts.type_id = game_type.type_id
														AND posts.game_id = games.game_id
														AND posts.user_id = users.user_id
														AND posts.is_published = 1
														AND posts.post_id = ?
														LIMIT 1' );
	//run it
	$result->execute(array($post_id));
	//check if any rows were found
	if( $result->rowCount() >= 1 ){
		//loop it
		while( $row = $result->fetch() ){
			//print_r($row);
			//make variables from the array keys
			extract($row);
			?>
			
			<div class="post">
				<?php show_post_image($image, 'large', $title); ?>
				<a class="join-game" href="javascript:;">Request to join</a>

				<?php edit_post_button( $post_id, $user_id ); ?>

				<span class="date">Posted <?php echo time_ago($date); ?></span>

				<section class="info grid">
					<h2><?php echo $row['title']; ?></h2>
					<h3><?php echo $title; ?></h3>
					<p>GM <?php echo $username; ?></p>
					<p><?php echo $type; ?></p>
					<p>Campaign Title</p>
					<p>(# of sessions)</p>
					<p><?php echo convert_day($first_session); ?></p>
					<p><?php echo convert_date($first_session); ?></p>
					<a href="javascript:;">Add to calendar</a>
					<p><?php echo $location; ?></p>
					<p>Players: <span># of <span><?php echo $players_needed; ?></span></span></p>
					<p><?php echo $body; ?></p>
				</section>
			</div>

			<?php 
			include('includes/comments.php');
			//only show the comment form if this post has comments enabled
			if( $allow_comments ){
				if( $logged_in_user ){
					include( 'includes/comment-form.php' );
				}else{
					echo '<span class="comment-cta">Want to leave a comment? <a href="register.php">Register</a> or <a href="login.php">Log in!</a></span>';
				}
			}else{
				echo '<div class="message">Comments Closed.</div>';
			}
		} //endwhile
	}else{
		//no rows found from our query
		echo 'No posts found';
	} ?>

</main>
<?php
require('includes/footer.php'); 
?>
