<?php
//define all vars
$errors = array();
$username = '';
$fname = '';
$lname = '';
$email = '';
$password = '';
$dob = '';
//process the registration if it was submitted
if( isset($_POST['did_register']) ){
	//sanitize everything
	$username = clean_string( $_POST['username'] );
	$fname = clean_string( $_POST['fname'] );
	$lname = clean_string( $_POST['lname'] );
	$email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL );
	$password = clean_string( $_POST['password'] );
	$dob = clean_string( $_POST['dob'] );

	//if policy isn't checked, set it to 0
	if( ! isset( $_POST['policy'] ) OR $_POST['policy'] != 1 ){
		$policy = 0;
	}else{
		$policy = 1;
	}
	//validate
	$valid = true;
	//username too short or too long
	if( strlen($username) < USERNAME_MIN OR strlen($username) > USERNAME_MAX ){
		$valid = false;
		$errors['username'] = 'Username must be between ' . USERNAME_MIN . ' and ' . USERNAME_MAX . ' characters';
	}else{
		//username already taken in the DB
		$result = $DB->prepare('SELECT username
								FROM users
								WHERE username = ?
								LIMIT 1');
		$result->execute( array( $username ) );
		//if one row found, the username is taken
		if( $result->rowCount() ){
			$valid = false;
			$errors['username'] = 'That username is already taken. Try another.';
		}
	}//end username checks
	
	//invalid email
	if( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ){
		$valid = false;
		$errors['email'] = 'Invalid Email';
	}else{
		//email already registered
		$result = $DB->prepare('SELECT email
								FROM users
								WHERE email = ?
								LIMIT 1');
		$result->execute( array( $email ) );
		//if one row found, the email is taken
		if( $result->rowCount() ){
			$valid = false;
			$errors['email'] = 'That email is already registered. Try logging in.';
		}
	}//end email checks
	
	//password too short
	if( strlen( $password ) < PASSWORD_MIN ){
		$valid = false;
		$errors['password'] = 'Your password is too short. Make one at least ' .  PASSWORD_MIN . ' characters long.';
	}

	//if valid, add the user to the DB
	if( $valid ){
		$result = $DB->prepare('INSERT INTO users
								( username, first_name, last_name, email, password, dob, is_admin, join_date )
								VALUES
								( :username, :fname, :lname, :email, :hashpass, :dob, 0, NOW() )');
		$hashed_pass = password_hash( $password, PASSWORD_DEFAULT );
		$result->execute( array(
							'username' => $username,
							'fname' => $fname,
							'lname' => $lname,
							'email' => $email,
							'hashpass' => $hashed_pass,
							'dob' => $dob
						) );
		//check the query
		if( $result->rowCount() ){
			$feedback = "Congratultions on signing up and welcome to Let&rsquo;s Play!.";
			$feedback_class = 'success';
		}else{
			$feedback = 'Error creating account.';
			$feedback_class = 'error';
		}
	}else{
		$feedback = 'There were problems with your registration. Fix the following:';
		$feedback_class = 'error';
	}
}//end if did_register