<?php
session_start();
$image = "";
$video    = "";
$text = "";
if (isset($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
}
if (isset($_SESSION['psyid'])) {
	$psyid = $_SESSION['psyid'];
}
$errors = array(); 

// connect to the database
$db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');

// REGISTER USER
if (isset($_POST['add_post'])) {
  // receive all input values from the form
  $image = mysqli_real_escape_string($db, $_POST['image']);

  $video = mysqli_real_escape_string($db, $_POST['video']);

  $text = mysqli_real_escape_string($db, $_POST['text']);

  if (empty($image) and empty($video) and empty($text)) {
  	array_push($errors, "Post details are required");
  }

  if (count($errors) == 0) {
  	if (isset($_SESSION['userid'])) {
  		$query = "INSERT INTO newsfeedu (txt, image, video, user_id) VALUES('$text', '$image', '$video', '$userid')";
  		mysqli_query($db, $query);
  	}
  	elseif (isset($_SESSION['psyid'])) {
  		$query = "INSERT INTO newsfeedp (txt, image, video, psy_id) VALUES('$text', '$image', '$video', '$psyid')";
  		mysqli_query($db, $query);  			
  	}
  }
} 
?>