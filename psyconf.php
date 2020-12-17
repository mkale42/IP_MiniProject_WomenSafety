<?php
$db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
if (isset($_GET['approve'])) {
  $psy_id = $_GET['psy_id'];
  $approvepsy_query = "UPDATE psychologists SET approved=1 WHERE psy_id='$psy_id'";
  mysqli_query($db, $approvepsy_query);
}

if (isset($_GET['reject'])) {
  $psy_id = $_GET['psy_id'];
  $rejectpsy_query = "DELETE FROM psychologists WHERE psy_id='$psy_id'";
  mysqli_query($db, $rejectpsy_query);
}

?>