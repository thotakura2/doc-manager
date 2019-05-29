<?php 
  $db = mysqli_connect('localhost', 'root', '', 'doc');
  if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    $sql = "SELECT * FROM faculty WHERE username='$username'";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
      echo "taken"; 
    }else{
      echo 'not_taken';
    }
    exit();
  }
  if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dept = $_POST['dept'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $results = mysqli_query($db, $sql);
    if (mysqli_num_rows($results) > 0) {
      echo "exists";  
      exit();
    }else{
      $query = "INSERT INTO `faculty`(`username`, `password`, `fname`, `lname`, `department` , `email`) VALUES ('$username','$password','$fname','$lname','$dept','$email')";
      $results = mysqli_query($db, $query);
      echo 'Saved!';
      exit();
    }
  }
  ?>