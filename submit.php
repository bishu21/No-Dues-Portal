<?php
   include("config.php");
   if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
   }

   if($_SERVER["REQUEST_METHOD"] == "POST") {

   
	   	$rollnum = mysqli_real_escape_string($conn,$_POST['rollnum']);   	
	   	$coursecode = mysqli_real_escape_string($conn,$_POST['coursecode']);   	
	   	$checkbox = mysqli_real_escape_string($conn,$_POST['checkbox']);
	    $comments = mysqli_real_escape_string($conn,$_POST['comments']); 
	    //$submit = mysqli_real_escape_string($conn,$_POST['rownum']); 
	    $submit=key($_POST['rownum']);
	    // $submit = mysqli_real_escape_string($conn,$_POST['rownum[$k]']); 
	    
	    echo "<script>window.alert($rollnum);</script>";
	    
	    if($checkbox==true)
	    {
	    	$sql1 = "SELECT * FROM `students_data` WHERE `roll` = '$rollnum'";
	    	$result1 = mysqli_query($conn,$sql1);
	    	$row = mysqli_fetch_assoc($result1);

	    	if($row['dept']=="CSE")
	    	{// {
	    	 $sql2 = "SELECT * FROM `cse_dues` WHERE `roll` = '$rollnum'";
	    	 $result2 = mysqli_query($conn,$sql1);
	    	 $row2 = mysqli_fetch_assoc($result2);
	    		$dept_dues = $row['dept_dues'];
	    		$row['dept_dues'] = $dept_dues - $row2[$coursecode];
	    		
	    	$sql3="UPDATE `cse_dues` SET `$coursecode` = '-1' WHERE `cse_dues`.`roll` = '$rollnum'";
	    	$result3 = mysqli_query($conn,$sql3);
	    	
	    	//header("location: teacher.php");
	    	}
	    }
	}

mysqli_close($conn);
?>