<?php



  session_start();

  
  session_unset();
  
  echo('<script>alert("logout successfull")</script>');
    
  echo('<script>window.location="index.html"</script>');




?>