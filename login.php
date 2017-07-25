<?php
   include("config.php");
   if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
   }

   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      $myserver = mysqli_real_escape_string($conn,$_POST['login_server']); 
      
      $sql1 = "SELECT * FROM `students_data` WHERE `passwordsha1` = ('$mypassword') AND `webmail_id` = '$myusername' AND `server` = '$myserver'";

      $sql2 = "SELECT * FROM `admin_data` WHERE `passwordsha1` = ('$mypassword') AND `webmail_id` = '$myusername' AND `server` = '$myserver'";


      //$sql = "SELECT * FROM login2 WHERE username = '$username' and passcode = '$password'";
      $result1 = mysqli_query($conn,$sql1);
      $result2 = mysqli_query($conn,$sql2);

      $count=0;
      $row;
      $mark; //mark represent which table in database we are accessing 
      if(mysqli_num_rows($result1) == 1)
      {//for student
         $row = mysqli_fetch_assoc($result1);
         $count = 1;
         $mark=1;
      }
      else if(mysqli_num_rows($result2) == 1) 
      {//for faculty
         $row = mysqli_fetch_assoc($result2);
         $count=1;
         $mark=2;
      } 

      // $count = mysqli_num_rows($result1);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
          //$_SESSION("myusername");
         $_SESSION['login_user'] = $myusername;
         $_SESSION['user_data'] = $row;
         echo $row['name'];

         if($mark==1)
            header("location: student.php");
         else if($mark==2)
            header("location: teacher.php");
      }else {
         header("location: loginerror.php");
      }
   }
?>