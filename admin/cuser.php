<?php 
include('../config.php');
session_start(); 
if(!$_SESSION['admin'] && !$_SESSION['aname']){ 
    header("Location: ../index.php"); 
    exit; 
}
else
{
  $sql = "delete from faculty where username='".$_GET['username']."'";
  if(mysqli_query($db, $sql)){
    header("Location: man_fac.php"); 
  }
  else{
    echo 'there is an error deleting user';
  }
}
?>