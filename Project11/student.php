<?php
	require "header.php";
	?>

<table id = "customers">
	<tr>
		<th>PAYEE</th>
		<th>Amount</th>
	    <th>Date</th>
	</tr>
	<?php
	if(isset($_SESSION['u_name'])){
	    $dbservername = "localhost";
        $dbPassword = "";
        $dbUsername = "root";
        $dbname = "student";

		$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbname);

	    $s1 = "select * from ".$_SESSION['u_name'].";";
	    $rst = mysqli_query($conn,$s1);
	    $rchk = 1;

	    if($rchk>0){
	    	 while($rr = mysqli_fetch_assoc($rst))
	    	 {
	    	 	echo "<tr><td>".$rr['payee']."</td><td>".$rr['amt']."</td><td>".$rr['date']."</td></tr>";
	    	 }
	    	 echo "</table>";
	    	 echo "";
	    }
	}
    ?>
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
    	<div class = "secnav">
    		<div id = "ins" class = "sidemenu" onclick="insert()">New Entry</div>
    		<div id = "vw" class = "sidemenu" onclick = "view()" >View Entries</div>
    		<div id  = "dl"class = "sidemenu">Delete all Entries</div>
    		<div id = "updt" class = "sidemenu">Update entry</div>
    	</div>
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