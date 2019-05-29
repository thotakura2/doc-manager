<?php
include 'config.php';
if (isset($_POST['login'])) {
	$sql= "SELECT * FROM ".$_POST['user']." where username='".$_POST['username']."' and password='".$_POST['password']."'";	
	$raw_results = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($raw_results);
	if (mysqli_num_rows($raw_results)==1) {
		echo "herre";
		if ($_POST['user']=="admin") {
			session_start(); 
			$_SESSION['admin']=$_POST['username'];
			$_SESSION['aname']=$row['name'];
			header("Location: admin/index.php");
		}
		if ($_POST['user']=="faculty") {
			echo "entered loop";
			session_start();
			$_SESSION['faculty']=$_POST['username'];
			$_SESSION['fname']=$row['fname'].' '.$row['lname'];
			header("Location: faculty/index.php");
		}
		if ($_POST['user']=="student") {
			if($row['status']==1){
			echo "entered loop";
			session_start();
			$_SESSION['student']=$_POST['username'];
			$_SESSION['sname']=$row['fname'].' '.$row['lname'];
			header("Location: student/index.php");
		}
		else{
			echo "please activate your account by contacting admin";
		}
		}
	}
	else{
		echo "<script>alert('invalid credentials');</script>";
		header("Location: index.php");
	}
}
?>