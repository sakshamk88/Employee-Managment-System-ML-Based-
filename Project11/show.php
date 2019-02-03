<?php
include_once "header.php";
include_once "includes/dbh.inc.php";

$s1 = "select * from efficiency where Empid=".$_SESSION['u_id'].";";

$rst = mysqli_query($conn,$s1);

$rs = mysqli_fetch_assoc($rst);

echo'<div id="id01" class="modal">
  
  <div class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="hd()" class="close" title="Close Modal">&times;</span>

    <div class="container">';
      echo "<div id = 'uid'>Efficiency: ".$_SESSION['efficiency in %']."</div>";
      echo "<div id = 'uid'>Hours per Week: ".$rr3['Average']."</div>";
      echo "<div id = 'uid'>Average Time per task: ".$rr3['Average Timetaken']."</div>";
      echo "<div id = 'uid'>Overall FeedBack: ".$rr3['feedback']."</div>";


      
  echo "</div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>;
?>";