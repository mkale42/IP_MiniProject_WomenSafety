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
<?php include('managereports.php'); ?>
<?php include('psyconf.php'); ?>
<?php include('feedback.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Women Safety</title>
  <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
  <nav>
    <a href="index.php" class="logo"><img src="logo.png" height="80px"></a>
    <ul>
      <li><a href="profile.php">Hi <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="adminindex.php?logout=1">Logout</a></li>
    </ul>
  </nav>
  <h2>PSYCHOLOGIST CONFIRMATION</h2>

  <section class="ex3">
   <?php
    $db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
    $query = "SELECT * FROM psychologists WHERE approved = 0";
    $result = mysqli_query($db, $query);
   ?>
   <table style="width: 100%">
     <tr>
      <th>Name</th>
      <th>Certificate Link</th>
      <th>Action</th>
     </tr>
     <?php while ($conf = $result -> fetch_row()) { ?>
     <tr style="text-align: center;">
      <td><?php echo $conf[2]; ?></td>
      <td><a href="<?php echo $conf[5]; ?>" target = blank>View Certificate</a></td>
      <td>
        <a href="adminindex.php?approve=1&psy_id=<?php echo $conf[0]; ?>">Approve</a>
        /
        <a href="adminindex.php?reject=1&psy_id=<?php echo $conf[0]; ?>">Reject</a>
      </td>
     </tr>
    <?php } ?>
   </table>



  </section><br><br>




  <h2>FEEDBACKS</h2>

  <section class="ex3">
  <?php
    $db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
    $query = "SELECT * FROM feedbacks";
    $result = mysqli_query($db, $query);
  ?>
  <table style="width: 100%">
    <tr>
      <th>Email</th>
      <th>Feedback</th>
    </tr>
    <?php while ($fb = $result -> fetch_row()) { ?>
    <tr style="text-align: center;">
      <td><?php echo $fb[0]; ?></td>
      <td><?php echo $fb[1]; ?></td>
    </tr>
    <?php } ?>
  </table>
    



  </section><br><br>

  <h2>REPORTS</h2>



  <section class="ex3">
  <?php
    $db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
    $query = "SELECT * FROM reports";
    $result = mysqli_query($db, $query);
  ?>
  <table style="width: 100%">
    <tr>
      <th>Reporter Name</th>
      <th>Post ID</th>
      <th>Post</th>
      <th>Action</th>
    </tr>
    <?php while ($rp = $result -> fetch_row() ) {
      if ($rp[2]!=0) {
        $username_query = "SELECT * FROM users WHERE user_id=$rp[2]";
        $uresult = mysqli_query($db, $username_query);
        $urp = $uresult -> fetch_row();
      }
      elseif ($rp[3]!=0) {
        $psychologistname_query = "SELECT * FROM psychologists WHERE psy_id=$rp[3]";
        $presult = mysqli_query($db, $psychologistname_query);
        $prp = $presult -> fetch_row();
      } 
    ?>
    <tr style="text-align: center;">
      <td><?php if ($rp[2]!=0) {
        echo $urp[2];
      }
      else {
        echo $prp[2];
      }  
      ?>  
      </td>
      <td><?php if ($rp[2]!=0) {
        echo $rp[0];
      }
      else {
        echo $rp[1];
      }  
      ?>  
      </td>
      <?php if ($rp[2]!=0) {
      ?>
      <td>
        <a href="particularpost.php?post_id=<?php echo $rp[0]; ?>" target = blank>View Post</a>
      </td>
      <?php } ?>
      <?php if ($rp[3]!=0) {        
      ?>
      <td>
        <a href="particularpost.php?postp_id=<?php echo $rp[1]; ?>" target = blank>View Post</a>
      </td>
      <?php } ?>
      <?php if ($rp[2]!=0) {
      ?>
      <td>
        <a href="adminindex.php?delete=1&post_id=<?php echo $rp[0]; ?>">Delete</a>
        /
        <a href="adminindex.php?ignore=1&post_id=<?php echo $rp[0]; ?>">Ignore</a>
      </td>
      <?php } ?>
      <?php if ($rp[3]!=0) {        
      ?>
      <td>
        <a href="adminindex.php?delete=1&postp_id=<?php echo $rp[1]; ?>">Delete</a>
        /
        <a href="adminindex.php?ignore=1&postp_id=<?php echo $rp[1]; ?>">Ignore</a>
      </td>
      <?php } ?>
    </tr>
    <?php } ?>
  </table>
    





  </section><br><br>
  <div class="footer row">
    <div id="socials">
      <h3>Company<span>logo</span></h3>
      <p class="footer-links">
        <a href="adminindex.php">Home</a>        
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