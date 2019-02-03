<?php
	include_once "header.php";
?>
<style type="text/css">
	#cr{
		float: right;
		font-size: 22;
		cursor: pointer;
	}
	#mod{
		background-color: #ff9933;
		color: white;
		display: none; 
		margin-top: 20%;
		margin-left: 35%;
		height: 180px;
		width: 500px;
	}.adbtns {	
   		height: 50px;
    	width: 170px;
   		background-color: #4CAF50;
  		border-radius: 15px;
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
		font-size: 18px;
	}
	.panel{
		height: 75vh;
		width: 250px;
		float: right;
		margin-top: 150px;
		margin-left: 60%;
	}
</style>
	<table id = "customers">
	<tr>
		<th>ID</th>
		<th>First Name</th>
	    <th>Last Name</th>
	    <th>Contact</th>
		<th>Email ID</th>
	    <th>Report</th>
	</tr>
	<?php
	$i = 0;
	if(isset($_SESSION['u_name'])){
	    $dbservername = "localhost";
        $dbPassword = "";
        $dbUsername = "root";
        $dbname = "saksham";

		$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbname);

	    $s1 = "select * from employee_details;";
	    $s2 = "select * from wrk_hrs";
	    $rst = mysqli_query($conn,$s1);
	    $cnt = mysqli_num_rows($rst);
	    $rr = mysqli_fetch_assoc($rst);

	    $rchk = 1;
	    $s11 = "select * from efficiency where Empid=".$_SESSION['u_id'].";";

		$rst8 = mysqli_query($conn,$s11);

		$rr7 = mysqli_fetch_assoc($rst8);

      echo'<div id="mod">';
	  echo "<div id = 'cr' onclick = 'hde()'>X</div>";
      echo "<div class = 'uid1'>Efficiency: ".$rr7['efficiency in %']."</div>";
      echo "<div class = 'uid1'>Hours per Week: ".$rr7['Average']."</div>";
      echo "<div class = 'uid1'>Average Time per task: ".$rr7['Average Timetaken']."</div>";
      echo "<div class = 'uid1'>Overall FeedBack: ".$rr7['feedback']."</div>"; 
      echo "</div>";
	    if($rchk>0)
	    	{
	    	 while($rr = mysqli_fetch_assoc($rst))
	    	 {
	    	 	echo "<tr><td>".$rr['Empid']."</td><td>".$rr['First Name']."</td><td>".$rr['Last Name']."</td><td>".$rr['Contact']."</td><td>".$rr['Email ID']."</td><td>".'<a href = "#" onclick = "shower()">View Report</a>'."</td></tr>";
	    	 }
	        }
	    	 echo "</table>";
	    
	}
    ?>
    <div id = "entryform">
    	<form id = "adminform" action = "entry.php" method = "POST" >
    		
    	</form>
    </div>
        <div class = "panel">
    	<div class = "adbtns" onclick="show()"><a id = "id0vw" class = "adlink" href = "#" >View Empoyees</a></div>
    	<div class = "adbtns"><a class = "adlink" href = "#" onclick="enter()">Add Empoyees</a></div>
    	<div class = "adbtns"><a class = "adlink" href = "#">Remove Empoyees</a></div>
    	<div class = "adbtns"><a class = "adlink" href = "#">Option 4</a></div>
   </div>
   <script type="text/javascript">
   	function show() {
   		document.getElementById("customers").style.display = "block";
   	}
   	function shower(){
   		document.getElementById("mod").style.display = "block";
   	}
   	function hde{
   		document.getElementById("cr").style.display = "none"
   	}
   </script>
<?php
	include_once "footer.php";
	?>