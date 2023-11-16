<?php
session_start();
	
	/* Check Login form submitted */	
	if(isset($_POST['Login'])){
		/* Define username and associated password array */
		/* You can change username and associated password array to your pref*/
		$checkFile = file_get_contents('./userdata.txt');	
		$userdata = explode("\n", $checkFile);
		/* Check and assign submitted Username and Password to new variable */
		$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
		$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
		foreach ($userdata as $users)
		{/* Check Username and Password existence in the explode array */
			$users = explode(",", $users);
			if ($users[0] == $Username && $users[1] == $Password)
			{
				/* Success: Set session variables and redirect to Protected page  */
				$_SESSION['Username'] = $Username;
				$_SESSION['Password'] = $Password;
				echo "Going to Login-Submit.php";
				header("Location: login-submit.php");
				exit;
			} else {
				/*Unsuccessful attempt: Set error message */
				$error = "<span style='color:red'>Invalid Login Details</span>";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Styles/index-c.css">
    <title>Jeopardy Login Sheet</title>
<body>
    <section>
            <div class="container">
		<?php if(isset($error)){?>
    		<div class="register">
      			<?php echo $error;?>
    		</div>
    		<?php } ?>
                <form action="" method="post">
                    <h1>Login To Play Jeopardy!</h1>
                    <div class="inputbox">
                        <input type="text"  placeholder="Username" name = "Username">
                        <label for="Username"></label>                    
                    </div>
                    <div class="inputbox">
                        <input type="text"  placeholder="Password" name = "Password">
                        <label for="Password"></label>
                    </div>
                    <input name="Login" type="submit" class="button" onclick=""> </button>
                    <div class="register">
                        <p>Don't have an account? <a href="register.php">Register here</a></p>
                    </div>
                </form>
            </div>
    </section>
</body>
</head>
</html>
