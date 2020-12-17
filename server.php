<?php
//session_start();

// initializing variables
$name = "";
$email    = "";
$contact = "";
$role = "";
$certificate = "";
$bio = "";
$approved = 0;
$errors = array(); 

// connect to the database
$db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  if (empty($name)) { array_push($errors, "Name is required"); }

  $email = mysqli_real_escape_string($db, $_POST['email']);
  if (empty($email)) { array_push($errors, "Email is required"); }

  if (!isset($_POST['role'])) { array_push($errors, "Role is required"); }
  else
    $role = mysqli_real_escape_string($db, $_POST['role']);
    if ($role == 'psychologist') {
      $certificate = mysqli_real_escape_string($db, $_POST['certificate']);
      $bio = mysqli_real_escape_string($db, $_POST['bio']);
    }

  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  if (empty($contact)) { array_push($errors, "Contact is required"); }

  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  if (empty($password_1)) { array_push($errors, "Password is required"); }

  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  if ($role == 'user') {
    $user_check_query = "SELECT * FROM users WHERE email='$email' OR contact='$contact' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }

      if ($user['contact'] === $contact) {
        array_push($errors, "Contact already exists");
      }
    }
  }
  elseif ($role == 'psychologist') {
    $user_check_query = "SELECT * FROM users WHERE email='$email' OR contact='$contact' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }

      if ($user['contact'] === $contact) {
        array_push($errors, "Contact already exists");
      }
    }
  }
  else {
    $user_check_query = "SELECT * FROM admins WHERE email='$email' OR contact='$contact' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
      if ($user['email'] === $email) {
        array_push($errors, "Email already exists");
      }

      if ($user['contact'] === $contact) {
        array_push($errors, "Contact already exists");
      }
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	if ($role == 'user') {
  		$password = md5($password_1);//encrypt the password before saving in the database
    
  		$query = "INSERT INTO users (password, name, email, contact) 
  			  VALUES('$password', '$name', '$email', '$contact')";
  		mysqli_query($db, $query);
  		$_SESSION['email'] = $email;
  		$_SESSION['success'] = "You are now logged in";
  		header('location: login.php');
  	}
  	elseif ($role == 'psychologist') {
  		$password = md5($password_1);//encrypt the password before saving in the database
    
  		$query = "INSERT INTO psychologists (password, name, email, contact, certificate, bio, approved) 
  			  VALUES('$password', '$name', '$email', '$contact', '$certificate', '$bio', '$approved')";
  		mysqli_query($db, $query);
  		$_SESSION['email'] = $email;
  		$_SESSION['success'] = "You are now logged in";
  		header('location:login.php');
  	}
  	else {
  		$password = md5($password_1);//encrypt the password before saving in the database
    
  		$query = "INSERT INTO admins (password, name, email, contact) 
  			  VALUES('$password', '$name', '$email', '$contact')";
  		mysqli_query($db, $query);
  		$_SESSION['email'] = $email;
  		$_SESSION['success'] = "You are now logged in";
  		header('location:login.php');
  	}
  }
}

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $role = mysqli_real_escape_string($db, $_POST['role']);

  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (!isset($_POST['role'])) {
    array_push($errors, "Role is required");
  }

  if (count($errors) == 0) {
    if ($role == 'user') {
      $password = md5($password);
      $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
      $namequery = "SELECT name FROM users WHERE email='$email' AND password='$password'";
      $results = mysqli_query($db, $query);
      $row = $results -> fetch_row();
      $name = $row[2];
      if (mysqli_num_rows($results) == 1) {
        $userid = $row[0];
      	session_start();
        $_SESSION['userid'] = $userid;
        $_SESSION['username'] = $name;
        $_SESSION['success'] = "You are now logged in";
        header('location:index.php');
      }
      else {
          array_push($errors, "Wrong email/password combination");
      }
    }
    elseif ($role == 'psychologist') {
      $password = md5($password);
      $query = "SELECT * FROM psychologists WHERE email='$email' AND password='$password'";
      $results = mysqli_query($db, $query);
      $row = $results -> fetch_row();
      $name = $row[2];
      if (mysqli_num_rows($results) == 1) {
        $psyid = $row[0];
      	session_start();
        $_SESSION['psyid'] = $psyid;
        $_SESSION['username'] = $name;
        $_SESSION['success'] = "You are now logged in";
        header('location:psyindex.php');
      }
      else {
        array_push($errors, "Wrong email/password combination");
      }
    }
    else {
      $password = md5($password);
      $query = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
      $results = mysqli_query($db, $query);
      $row = $results -> fetch_row();
      $name = $row[2];
      if (mysqli_num_rows($results) == 1) {
        $adminid = $row[0];
      	session_start();
        $_SESSION['adminid'] = $adminid;
        $_SESSION['username'] = $name;
        $_SESSION['success'] = "You are now logged in";
        header('location:adminindex.php');
      }
      else {
        array_push($errors, "Wrong email/password combination");
      }
    }
  }
}

?>