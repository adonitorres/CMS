<?php 
require('config.php'); 
require_once('includes/functions.php');
require('includes/header.php');
?>
		<main class="content">
			<?php //get up to 20 published posts, newest first
			$result = $DB->prepare( 'SELECT posts.*, game_type.*, users.username, 
										users.profile_pic, users.user_id
									FROM posts, game_type, users
									WHERE posts.type_id = game_type.type_id
									AND posts.user_id = users.user_id
									AND posts.is_published = 1
									ORDER BY posts.date DESC
									LIMIT 20' );
			//run it
			$result->execute();
			//check if any rows were found
			if( $result->rowCount() >= 1 ){
				//loop it
				while( $row = $result->fetch() ){
					//print_r($row);
					//make variables from the array keys
					extract($row);
			?>
			
			<div class="posting grid">
				<a href="single.php?post_id=<?php echo $post_id; ?>">
					<?php show_post_image( $image, 'small', $title ); ?>
				</a>

				<h2><?php echo $title; ?></h2>
				<p><?php echo convert_date($date); ?></p>
				<p><?php echo $username; ?></p>
				<p><?php echo $type; ?></p>
				<p><?php echo $body; ?></p>
				<span class="date"><?php echo time_ago($date); ?></span>
			</div>

			<?php 
				} //endwhile
			}else{
				//no rows found from our query
				echo 'No posts found';
			} ?>
			

		</main>
<?php  
require('includes/footer.php'); 
?>
		