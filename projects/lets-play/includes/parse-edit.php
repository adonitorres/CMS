<?php 
$errors = array();

//which post are we trying to edit?
//URL Will look like edit-post.php?post_id=X
if( isset($_GET['post_id']) ){
	$post_id = filter_var( $_GET['post_id'], FILTER_SANITIZE_NUMBER_INT );
}else{
	exit('No post to edit');
}


//parse the form if they hit submit
if( isset( $_POST['did_edit'] ) ){
	//sanitize everything
	$title 			= clean_string( $_POST['title'] );
	$body 			= clean_string( $_POST['body'] );
	$location 	= clean_string( $_POST['location'] );
	$first_session 	= clean_string( $_POST['first_session'] );
	$players_needed 	= clean_int( $_POST['players'] );
	// $type_id 	= clean_int( $_POST['type_id'] );
	// $game_id = clean_int( $_POST['game_id'] );
	$allow_comments = clean_boolean( $_POST['allow_comments'] );
	$is_published	= clean_boolean( $_POST['is_published'] );

	//validate
	$valid = true;
		//title blank or longer than 50
	if( '' == $title OR strlen( $title ) > 50){
		$valid = false;
		$errors['title'] = 'Create a title betwen 1 &ndash; 50 characters long.';
	}
		//body longer than 2500
	if( strlen( $body ) > 2500 ){
		$valid = false;
		$errors['body'] = 'Post details must be shorter than 2,500 characters';
	}
		//location blank
	if( '' == $location OR strlen( $location ) < 1 ){
		$valid = false;
		$errors['location'] = 'You must include a location for the session.';
	}
		//players needed must be positive int
	if( $players_needed < 1 ){
		$valid = false;
		$errors['players_needed'] = 'Your post needs to have at least one player.';
	}
	/*
		//type must be positive int
	if( $type_id < 1 ){
		$valid = false;
		$errors['type'] = 'Choose a Game Type for your post';
	}
	//game must be positive int
if( $game_id < 1 ){
	$valid = false;
	$errors['game_id'] = 'Choose the Game for your post';
}
*/
	//if valid, update the post in the DB
	$type_id = "";
	$game_id = "";
	if($valid){
		$result = $DB->prepare('UPDATE posts
								SET
								title 			= :title,
								body 			= :body,
								location = :location,
								players_needed = :players_needed,
								type_id 	= :type_id,
								game_id = :game_id,
								first_session = :first_session,
								allow_comments 	= :allow_comments,
								is_published 	= :is_published
								WHERE post_id 	= :post_id
								AND user_id 	= :user_id
								LIMIT 1');
		$result->execute(array(
								'title' 		=> $title,
								'body' 			=> $body,
								'location'	=> $location,
								'players_needed' => $players_needed,
								'type_id' => $type_id,
								'game_id' => $game_id,
								'first_session' => $first_session,
								'allow_comments' => $allow_comments,
								'is_published'	=> $is_published,
								'post_id'		=> $post_id,
								'user_id'		=> $logged_in_user['user_id']
						));
		if($result->rowCount()){
			//success
			$feedback = 'Changes successfully saved';
			$feedback_class = 'success';
		}else{
			//error - no changes made
			$feedback = 'No changes made to this post';
			$feedback_class = 'info';
		}
	}else{
		//not valid
		$feedback = 'Couldn\'t save your post. Please fix the following:';
		$feedback_class = 'error';
	}
	
}//end if did edit


//is the viewer of the page the author of this post? (if so, grab all the info to fill the form)
$result = $DB->prepare('SELECT * FROM posts
						WHERE post_id = :post_id
						AND user_id = :user_id
						LIMIT 1');
$result->execute(array(
					'post_id' => $post_id,
					'user_id' => $logged_in_user['user_id'], 
				));
if( $result->rowCount() ){
	$row = $result->fetch();
	//set up the variables to pre-fill the form
	extract($row);
}else{
	//security! you aren't the author of this post
	exit('You are not allowed to edit this post');
}