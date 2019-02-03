<?php

if (isset($_POST['lout-submit'])) {
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../Index.php");
	exit();
}