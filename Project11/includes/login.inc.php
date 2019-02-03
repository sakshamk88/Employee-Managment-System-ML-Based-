<?php
	if(isset($_POST['linemp-submit'])){

		require "dbh.inc.php";

		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
		//if empty
		if(empty($uid)|| empty($pwd)){
			header("Location: ../Index.php?login=error1");
			exit();
		}
		else{
			$sql = "select * from login_form where Empid = '$uid' and Pass = '$pwd'";
			$rslt = mysqli_query($conn, $sql);
			$rchk = mysqli_num_rows($rslt);
			if($rchk < 1){
				echo "you have entered wrong details.";

				header("Location: ../Index.php?login=error2");

				exit();
			}
			else{
				if($row = mysqli_fetch_assoc($rslt)){
					session_start();
					$_SESSION['u_id']= $row['Empid'];
					$_SESSION['u_name']= $row['First Name'];
					$s1 = "select * from wrk_hrs where Empid = ".$_SESSION['u_id'].";";
					$rst1 = mysqli_query($conn,$s1);
                    $rr1 = mysqli_fetch_assoc($rst1);
                    $val = $rr1['Monday'].",".$rr1['Tusday'].",".$rr1['Wednesday'].",".$rr1['Thursday'].",".$rr1['Friday'].",".$rr1['Saturday']; 
                    $val1 = "".$_SESSION['u_id'].""; 
					shell_exec('test.py $val $val1');

					header("Location: ../employee.php?login=success");
					exit();
				}
			}
		}
	}
elseif(isset($_POST['linadmin-submit'])){

	require "dbh.inc.php";

	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
		//if empty
		if(empty($uid)|| empty($pwd)){
			header("Location: ../Index.php?login=error");
			exit();
		}
		else{
			$sql = "select * from login_form where Empid = '$uid' and Pass = '$pwd'";
			$rslt = mysqli_query($conn, $sql);
			$rchk = mysqli_num_rows($rslt);
			if($rchk < 1){
				echo "you have entered wrong details.";
				header("Location: ../Index.php?login=error");

				exit();
			}
			else{
				if($row = mysqli_fetch_assoc($rslt)){
					session_start();
					$_SESSION['u_id']= $row['Empid'];
					$_SESSION['u_name']= $row['First Name'];
				
					
					header("Location: ../admin.php?login=success");
					exit();
				}
			}
		}
	}
	else{
		header("Location: ../Index.php?login=error");

		exit();
	}