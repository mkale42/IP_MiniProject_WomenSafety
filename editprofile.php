<?php
	$name = "";
	$email = "";
	$contact = "";
	$password = "";
	$certificate = "";
	$bio = "";
	$db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
	if (isset($_SESSION['userid'])) {
		$userid = $_SESSION['userid'];
		$query = "SELECT * FROM users WHERE user_id='$userid'";
		$result = mysqli_query($db, $query);
		$uprofile = $result -> fetch_row();
		$name = $uprofile[2];
		$email = $uprofile[3];
		$contact = $uprofile[4];
		$password = $uprofile[1];
	}
	elseif (isset($_SESSION['adminid'])) {
		$adminid = $_SESSION['adminid'];
		$query = "SELECT * FROM admins WHERE admin_id='$adminid'";
		$result = mysqli_query($db, $query);
		$aprofile = $result -> fetch_row();
		$name = $aprofile[2];
		$email = $aprofile[3];
		$contact = $aprofile[4];
		$password = $aprofile[1];
	}
	elseif (isset($_SESSION['psyid'])) {
		$psyid = $_SESSION['psyid'];
		$query = "SELECT * FROM psychologists WHERE psy_id='$psyid'";
		$result = mysqli_query($db, $query);
		$pprofile = $result -> fetch_row();
		$name = $pprofile[2];
		$email = $pprofile[3];
		$contact = $pprofile[4];
		$password = $pprofile[1];
		$certificate = $pprofile[5];
		$bio = $pprofile[6];		
	}

	if (isset($_POST['edit_profile'])) {
		if (isset($_SESSION['userid'])) {
			$userid = $_SESSION['userid'];
			$name = mysqli_real_escape_string($db, $_POST['name']);
			$email = mysqli_real_escape_string($db, $_POST['email']);
			$contact = mysqli_real_escape_string($db, $_POST['contact']);
			$password = mysqli_real_escape_string($db, $_POST['password']);
			$password = md5($password);
			$update_query = "UPDATE users SET password='$password', name='$name', email='$email', contact='$contact' WHERE user_id='$userid'";
			mysqli_query($db, $update_query);
		}
		elseif (isset($_SESSION['adminid'])) {
			$adminid = $_SESSION['adminid'];
			$name = mysqli_real_escape_string($db, $_POST['name']);
			$email = mysqli_real_escape_string($db, $_POST['email']);
			$contact = mysqli_real_escape_string($db, $_POST['contact']);
			$password = mysqli_real_escape_string($db, $_POST['password']);
			$password = md5($password);
			$update_query = "UPDATE admins SET password='$password', name='$name', email='$email', contact='$contact' WHERE admin_id='$adminid'";
			mysqli_query($db, $update_query);
		}
		elseif (isset($_SESSION['psyid'])) {
			$psyid = $_SESSION['psyid'];
			$name = mysqli_real_escape_string($db, $_POST['name']);
			$email = mysqli_real_escape_string($db, $_POST['email']);
			$contact = mysqli_real_escape_string($db, $_POST['contact']);
			$password = mysqli_real_escape_string($db, $_POST['password']);
			$certificate = mysqli_real_escape_string($db, $_POST['certificate']);
			$bio = mysqli_real_escape_string($db, $_POST['bio']);
			$password = md5($password);
			$update_query = "UPDATE psychologists SET password='$password', name='$name', email='$email', contact='$contact', certificate='$certificate', bio='$bio' WHERE psy_id='$psyid'";
			mysqli_query($db, $update_query);
		}
	}	
?>