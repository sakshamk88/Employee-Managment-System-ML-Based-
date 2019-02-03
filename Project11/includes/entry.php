<?php
		session_start();
	    require 'dbh.inc.php';

		$pye = mysqli_real_escape_string($conn, $_POST['pname']);
		$amount = mysqli_real_escape_string($conn, $_POST['amnt']);
		$dtt = mysqli_real_escape_string($conn, $_POST['dt']);

	    $s2 = "insert into ".$_SESSION['u_name']." values('$pye',$amount,'$dtt');";
	    $rst = mysqli_query($conn,$s2);
	    
	    //if (mysqli_query($conn, $s2)) {
    	//	echo "New record created successfully";
		//} else {
    	//	echo "Error: " . $s2 . "<br>" . mysqli_error($conn);
		//	}
		header("Location: ../student.php");
		exit();	  
?>	