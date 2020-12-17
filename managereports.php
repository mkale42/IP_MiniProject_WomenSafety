<?php
$db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
if (isset($_GET['post_id'])) {
  $post_id = $_GET['post_id'];
  if (isset($_GET['delete'])) {
    $deletepost_query = "DELETE FROM newsfeedu WHERE post_id='$post_id'";
    mysqli_query($db, $deletepost_query);
    $deletereport_query = "DELETE FROM reports WHERE post_id='$post_id'";
    mysqli_query($db, $deletereport_query);
  }
  elseif (isset($_GET['ignore'])) {
    $deletereport_query = "DELETE FROM reports WHERE post_id='$post_id'";
    mysqli_query($db, $deletereport_query); 
  }
  
}

if (isset($_GET['postp_id'])) {
  $postp_id = $_GET['postp_id'];
  if (isset($_GET['delete'])) {
    $deletepost_query = "DELETE FROM newsfeedp WHERE postp_id='$postp_id'";
    mysqli_query($db, $deletepost_query);
    $deletereport_query = "DELETE FROM reports WHERE postp_id='$postp_id'";
    mysqli_query($db, $deletereport_query);
  }
  elseif ($_GET['ignore']) {
   $deletereport_query = "DELETE FROM reports WHERE postp_id='$postp_id'";
    mysqli_query($db, $deletereport_query); 
  }
}

?>