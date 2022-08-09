<?php 
require('config.php'); 
require_once('includes/functions.php');
require('includes/parse-register.php');
//doctype and visible header
require('includes/header.php');
?>
<main class="dregister">
	<h2>Create Account</h2>

	<?php show_feedback( $feedback, $feedback_class, $errors ); ?>

  <p>It's free and anyone can join!</p>

	<form method="post" action="register.php">
		<label for="username">Username</label>
		<input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" class="<?php field_error( 'username', $errors ); ?>">

    <label for="fname">First Name</label>
    <input type="text" name="fname" placeholder="First Name" value="<?php echo $fname; ?>" class="<?php field_error( 'fname', $errors ); ?>">

    <label for="lname">Last Name</label>
    <input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>" class="<?php field_error( 'lname', $errors ); ?>">

		<label for="email">Email Address</label>
		<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" class="<?php field_error( 'email', $errors ); ?>">

		<label for="password">Password</label>
		<input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" class="<?php field_error( 'password', $errors ); ?>">

    <p>Birthday <a href="javascript:;" title="Please provide your birthday to ensure your user experience is best tailored for you!">?</a></p>

    <label for="dob">DOB</label>
    <input type="date" name="dob" placeholder="Birthday" value="<?php echo $dob; ?>" class="<?php field_error( 'password', $errors ); ?>">

		<p>By clicking Create Account, you agree to our <a href="includes/tos.html">Terms of Service</a>, <a href="includes/policy.php">Data Policy</a> and <a href="includes/policy.php">Cookies Policy</a>. You may receive SMS notifications from us and can opt out at any time.</p>

		<input type="submit" value="Create Account">
		<input type="hidden" name="did_register" value="1">
	</form>
</main>

<?php include('includes/footer.php'); ?>