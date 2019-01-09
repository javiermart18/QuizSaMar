<?php

$page_title = 'Register';
//include ('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require ('mysqli_connect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	
	// Check for a username:
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter your username.';
	} else {
		$un = mysqli_real_escape_string($dbc, trim($_POST['username']));
	}
	
	// Check for a email:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}
	
	if (empty($errors)) {
	
		// Register the user in the database...
		
		// Make the query:
		$q = "INSERT INTO users (user_id, username, pass, email, registration_date, total_points) VALUES ('0','$un', SHA1('$p'), '$e', NOW(), '0')";		
		$r = @mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
				 <p>You are now registered</p><br />';	

			// Create a session
		
		} else { // If it did not run OK.
			
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
			
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
						
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		//include ('includes/footer.html'); 
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.
	
	mysqli_close($dbc); // Close the database connection.
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="loginCSS.css" rel="stylesheet">
<style>
    
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

</style> 
</head>
<body>
    <div class="container4">
	<img src="samar.png" height="200px" width="500px"> 
    </div>
    <br>
    <div class="container1">
    	<form action="register.php" method="post">
            <center><h2>Sign Up</h2></center>
  		<div class="imgcontainer">
    	<img src="1.png" alt="Avatar" class="avatar">
  		</div>

  		<div class="container">
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>
			
			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" required>

			<label for="psw1"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="pass1" required>
			
			<label for="psw"><b>Repeat Password</b></label>
			<input type="password" placeholder="Repeat Password" name="pass2" required>
			
			<button type="submit">Sign Up</button>

  		</div> 
		</form>
    </div>
    
<div class="footer">
  <p>© 2019 QuizSaMar, Inc. All rights reserved.</p>
</div>
</body>
</html>
