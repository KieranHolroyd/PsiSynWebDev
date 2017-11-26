<?php 
session_start();
	include 'incl/db.php';
	if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
		$pw=$_POST['password'];
		$un=$_POST['username'];
		$hpw=DB::queryFirstRow("SELECT * FROM users WHERE username='$un'");
		if (password_verify($pw, $hpw['password'])) {
			if ($hpw['verified']) {
				$_SESSION['logged_in_to_addpage']=true;
				$_SESSION['username']=$hpw['username'];
				echo "Logged In. Redirecting";
				header("refresh:1;url=addpage.php");
			} else {
				echo "Not Verified. Redirecting To Home Page";
				header("refresh:3;url=index.php");
			}
		} else {
			echo "Wrong Password. Redirecting To Login Page";
			header("refresh:3;url=signin.php");
		}
	} else {
		echo "Fill In All Fields Please. Redirecting To Login Page";
		header("refresh:3;url=signin.php");
	}
?>