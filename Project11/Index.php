<?php
	include_once "header.php";
?>
<section>
	<div>
		<?php
			if(isset($_SESSION['u_id'])){
				echo "<script>";
				echo 'alert("You are still logged in please click on the logout button to get to the main page")';
				echo "</script>";
			}
			else{
				/*echo '<form id = lnfrm action="includes/login.inc.php" method="POST">
				<input class="ui" type="text" name="uid" placeholder="College Id">
				<input class = "ui" type="password" name="pwd" placeholder="Password">
				<button id = "bt" type="submit" name="linadmin-submit">Login as Admin</button>
				<button id = "bt" type="submit" name="linemp-submit">Login as Employee</button>
				<a href = "signup.php">Signup</a>
				</form>';*/
				echo'<div id="id01" class="modal">
  
  <form class="modal-content animate" action="includes/login.inc.php" method="POST">
    <div class="imgcontainer">
      <span onclick="hd()" class="close" title="Close Modal">&times;</span>

    <div class="container">
      <label for="uid"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uid">

      <label for="pwd"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pwd">
        
      <button class="bttns" type="submit" name="linemp-submit">Login as Employee</button>
      <button class="bttns" type="submit" name="linadmin-submit">Login as Admin</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="hd()" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById("id01");

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>';
			}
		?>
	<script>
		function hd(){
			document.getElementById("id01").style.display="none";
		}
	</script>
	</div>	
</section>
<?php
	require "footer.php";
?>