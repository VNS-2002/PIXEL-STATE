<?php
include('conn.php');

if (isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "") {
  include "conn.php";
  $secret = '6LeLpKMeAAAAAPviFJgBL0DsXlJF-vtUmULVecbq';
  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
  $responseData = json_decode($verifyResponse);
  if ($responseData->success) 
  {



$username=$_POST['username'];
// $phone= $_POST['phone'];
$email= $_POST['email'];
$password= $_POST['password'];

$query1="INSERT INTO `user`(`username`,  `email`, `password`) VALUES ('$username','$email','$password')";

$res1=mysqli_query($conn,$query1);

echo($query1).'<br>';
echo($res1);

echo('<script>alert("Registered successfully now please login")</script>');

echo('<script>window.location="signin.html"</script>');
  }else{
  echo('<script>alert("your not that guy bro signup properly...! ")</script>');
  echo('<script>window.location="register.html"</script>');
}
}else{
  echo('<script>alert("verification falied ")</script>');
  echo('<script>window.location="register.html"</script>');
}








?>