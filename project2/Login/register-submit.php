<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<link href="./.css" type="text/css" rel="stylesheet" />
	</head>
<?php
/*Check user input submitted w register.php*/ 
	if(isset($_POST["username"]) &&!empty($_POST["username"])) 
	{
		$username=$_POST["username"];
	} else {
			header("Location: errorForm.html");
			exit();
	}
	if(isset($_POST["passcode"]) &&!empty($_POST["passcode"])) 
	{
		$passcode=$_POST["passcode"];
	} else {
			header("Location: errorForm.html");
			exit();
	}
	
	$checkfile = file_get_contents('./userdata.txt');	
	$users = explode("\n",$checkfile);
	
	foreach($users as $checkUser)
	{
		$checkUser = explode(",",$checkUser);
		if($checkUser[0] != $username) 
		{
			$userinput = $username.",".$passcode.",0\n";
			file_put_contents('./userdata.txt', $userinput, FILE_APPEND);
			break;
		} else {
			header("Location: error.html");
			exit();
		}
	}
?>
	<body>
			<h1> Welcome, <?php print $username ?> </h1>;
			<p> You have been successfully registered! To play jeopardy, please <a href="login.php"> login. </a></p>
			<p> If you need a reminder, your password is <?php print $passcode?>, make sure you do not forget!</p>
	</body>
</html> 