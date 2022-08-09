<?php 
require('config.php'); 
require_once('includes/functions.php');
require('includes/header.php');

//whose profile is this?
if(isset($_GET['user_id'])){
	$user_id = clean_int($_GET['user_id']);
}elseif($logged_in_user){
	$user_id = $logged_in_user['user_id'];
}else{
	exit('Invalid User Account');
}

?>
<main class="dprofile">
		<?php 
		//get the user info
		$result = $DB->prepare('SELECT * FROM  users
								WHERE user_id = ?
								LIMIT 1'); 
		$result->execute(array($user_id));

		if( $result->rowCount() >= 1 ){			
			$row = $result->fetch();
			extract($row);		
	?>
	<section class="user user-profile">
		<ul class="profile-area flex">
			<li class="profile-bg"><?php show_profile_bg($profile_bg,'Profile Background', 264); ?></li>
			<li class="profile-pic"><?php show_profile_pic($profile_pic,'Profile Picture', 228); ?></li>
			<li><h2><?php echo $username ?></h2></li>
		</ul>
		
		<ul class="options grid">
			<li class="message"><a class="button-style" href="javascript:;" title="send me a message!">Message Me!</a></li>
			<li class="edit"><a href="javascript:;" title="edit profile"></a></li>
			<li class="other">
				<a href="javascript:;" title="other options">
					<div class="meatballs">
						<ul class="flex">
							<li class="left"></li>
							<li class="center"></li>
							<li class="right"></li>
						</ul>
					</div>
				</a>
			</li>
		</ul>
		
		<p><?php echo $bio; ?></p>
		<div class="grid" id="follow-info">
			<?php follows_interface( $user_id ); ?>
		</div>
		<hr>
	</section>
	<?php
			
	//get this user's posts 	
	$result = $DB->prepare('SELECT posts.*,  game_type.type
							FROM posts, game_type
							WHERE posts.is_published = 1
							AND game_type.type_id = posts.type_id
							AND posts.user_id = ?
							ORDER BY posts.date DESC
							LIMIT 20'); 

	$result->execute(array($user_id));
	
	if( $result->rowCount() >= 1 ){			
	?>
	<div class="grid">
	<?php
			while( $row = $result->fetch() ){
				extract($row);
		?>
		<div class="one-post">
			<a href="single.php?post_id=<?php echo $post_id; ?>">
				<?php show_post_image( $image, 'small' ) ?>
			</a>
			<h2><?php echo $row['title']; ?></h2>	
			<span class="type"><?php echo $type; ?></span>
			<span class="date"><?php echo time_ago( $date ); ?></span>
		</div>		

			<?php } //end while loop?>
			</div><!-- .grid -->
		<?php }else{ ?>
		
		<div class="feedback info">
			<p>This user hasn't posted any public images</p>
		</div>

		<?php 
		}//end if posts found 
	}else{
		echo 'Sorry, that user account doesn\'t exist';
	}?>

	</main>
<?php
require('includes/footer.php');
?>	