<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>
<?php include('server.php'); ?>
<?php include('feedback.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Women Safety</title>
  <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
  <nav>
    <a href="psyindex.php" class="logo"><img src="logo.png" height="80px"></a>
    <ul>
      <li><a href="physical.php">Physical</a></li>
      <li><a href="newsfeed.php">Mental</a></li>
      <li><a href="laws.php">Laws</a></li>
      <li><a href="ngo.php">NGO's</a></li>
      <li><a href="profile.php">Hi <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="index.php?logout=1">Logout</a></li>
    </ul>
  </nav>

  <h2>REQUESTS</h2>
  <section class="ex3">
    <?php
      $db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
      $psy_id = $_SESSION['psyid'];
      $query = "SELECT * FROM contactpsy WHERE psy_id='$psy_id'";
      $result = mysqli_query($db, $query);
    ?>
    <table style="width: 100%">
      <tr>
        <th>User ID</th>
        <th>Email</th>
      </tr>
      <?php while ($contact = $result -> fetch_row()) { ?>
      <tr style="text-align: center;">
        <td><?php echo $contact[1]; ?></td>
        <td><?php echo $contact[2]; ?></td>
      </tr>
      <?php } ?>
    </table>
  </section>

  <div class="footer row">
    <div id="socials">
      <h3>Company<span>logo</span></h3>
      <p class="footer-links">
        <a href="#">Home</a>
        <a href="physical.php">Physical</a>
        <a href="newsfeed.php">Mental</a>
        <a href="laws.php">Laws</a>
        <a href="ngo.php">NGO's</a>
      </p>
      <p class="footer-company-name">Company Name © 2015</p>
      <div class="footer-icons">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
      </div>
    </div>
    <div id="feedback">
      <p>Feedback</p>
      <form action="#" method="post">    
        <?php include('errors.php'); ?> 
        <input type="text" name="email" placeholder="Email">
        <textarea name="feedback" placeholder="Feedback"></textarea>
        <br>
        <button type="submit" name="feedbackform">Send</button>
      </form>
    </div>
  </div>
</body>
</html>