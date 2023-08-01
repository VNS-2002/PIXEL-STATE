<?php
include('conn.php');
session_start();
if(isset($_POST['submit']))
{

$username=$_POST['username'];
$password=$_POST['password'];

$query1="SELECT * FROM `user` WHERE `username`='$username' ";



$res1=mysqli_query($conn,$query1);

  if(mysqli_num_rows($res1)>0)
  {
    $data=mysqli_fetch_assoc($res1);
    if(strcmp($data['password'],$password)==0 && strcmp($data['username'],$username)==0 )
    {



      $_SESSION['username']=$username;
      $_SESSION['phone']=$data['phone'];
      $_SESSION['email']=$data['email'];

      echo('<script>alert("Login Succesfull")</script>');
    echo('<script>window.location="home.php"</script>');

    }else
    {
    echo('<script>alert("incorect password")</script>');
    echo('<script>window.location="signin.html"</script>');
   }
  } 

}else
{
  echo('<script>alert("your not that guy bro signup properly...! ")</script>');
  echo('<script>window.location="signin.html"</script>');

}

?>