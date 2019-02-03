<?php
	require "header.php";
	?>

<table id = "customers">
	<tr>
		<th>First NAme</th>
		<th>Last Name</th>
	    <th>Email</th>
	</tr>
	<?php
	if(isset($_SESSION['u_name'])){
	    $dbservername = "localhost";
        $dbPassword = "";
        $dbUsername = "root";
        $dbname = "saksham";

		$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbname);

	    $s1 = "select * from login_form where Empid = '".$_SESSION["u_id"]."';";
	    $rst = mysqli_query($conn,$s1);
        $rr = mysqli_fetch_assoc($rst);
        $s2 = "select * from wrk_hrs where Empid=".$_SESSION['u_id'].";";
        
	    $rchk = 1;
        $rst1 = mysqli_query($conn,$s2);
             $rr1 = mysqli_fetch_assoc($rst1);
             $val = $rr1['Monday'].",".$rr1['Tusday'].",".$rr1['Wednesday'].",".$rr1['Thursday'].",".$rr1['Friday'].",".$rr1['Saturday'];
             
        $s3 = "select * from Efficiency where Empid=".$_SESSION['u_id'].";";          
	    $rst2 = mysqli_query($conn,$s3);
        $rr3 = mysqli_fetch_assoc($rst2);
	    	 echo "</table>";
	    	 echo "";        
	    }
	
    ?>
<style type="text/css">
    .submenu{
    padding: 20px 25px;
    color: white;
    font-size: 18px;
}
    .menu{
    position: absolute;
    margin-top: 7%;
    width: 220px;
    background-color: #ff9933;
    text-align: left;
    height: 75vh;
}
    .visual{
			position: absolute;
			height: 55vh;
			width: 40vw;
			margin-left: 15%;
			margin-top: 10%; 
    }
    .adbtns{   
        height: 50px;
        width: 170px;
        background-color: #4CAF50;
        border-radius: 35px;
        float: right;
        margin: 15px 15px;
        padding: 10px 30px;
        cursor: pointer;
    }
    .adbtns:hover{
        opacity: .8;
    }
    .adlink{
        margin:15% 8%;
        text-decoration: none;
        color: white;
        font-size: 22px;
    }
    .panel{
        height: 75vh;
        width: 250px;
        float: right;
        margin-top: 150px;
        margin-left: 60%;
    }
</style>
    <div class = "animate">
        <?php
    	echo "<img class = 'visual' src = 'results/saksham.png'>";
        ?>
    </div>
    <div id = "inst">
    	<form id="entfrm" action="includes/entry.php" method="post">
    		<p id = "txt">NEW ENTRY</p>
    		<a href="#" id = "ext" onclick="hide()">X</a>
    		<input class="ent" placeholder="Payee Name" type="text" name="pname">
    		<input class="ent" type="text" name="amnt" placeholder="Amount" >
    		<input class="ent" type="date" name="dt" placeholder="Date">
    		<button class="btn" type="submit" name="adderbtn">Add</button>
    	</form>
    </div>
    <div class = "menu">
    	<?php
          echo "<div class = 'submenu'>".$rr['First Name']." ".$rr['Last Name']."</div><br>";
          echo "<div class = 'submenu'> Your Efficiency: ".$rr3['efficiency in %']."</div><br>";
          echo "<div class = 'submenu'> Hours per Week: ".$rr3['Average']."</div><br>";
          echo "<div class = 'submenu'> Average Time per task".$rr3['Average Timetaken']."</div><br>";
          echo "<div class = 'submenu'>Overall FeedBack: ".$rr3['feedback']."</div><br>";
          if($rr3['Outliers'] == 0)
          {
            echo "You're considered as an Outlier.";
            echo "Please respond immediately";
          }
          else
          {
            echo "You're are good to go.";
            echo "Keep it up!";
          }
          ?>
    	
    </div>
    <div class = "panel">
        <div class = "adbtns" onclick="show()"><a class = "adlink" href = "#">Check In</a></div>
        <div class = "adbtns"><a class = "adlink" href = "#">Check Out</a></div>
        <div class = "adbtns"><a class = "adlink" href = "#">Start Lunch</a></div>
        <div class = "adbtns"><a class = "adlink" href = "#">End Lunch</a></div>
        <form action="#">
            <input type="radio" name="task" value="tsk1"> Task1<br>
            <input type="radio" name="task" value="tsk2"> Task2<br>
            <input type="radio" name="task" value="tsk3"> Task3<br>  
            <input class = "adbtns" type="submit" value="Submit">
        </form>
   </div>
    <script type="text/javascript">
    	function view(){
    	document.getElementById('customers').style.display = 'inline-table';
    	}
    	function insert(){
    		document.getElementById('inst').style.display = 'block';
    	}
    	function hide(){
    		document.getElementById('customers').style.display = 'none';
    		document.getElementById('inst').style.display = 'none';	
    	}
    </script>
  <?php    
	require "footer.php";
?>