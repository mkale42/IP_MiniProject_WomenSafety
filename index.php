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
  <link rel="stylesheet" type="text/css" href="signin.css">
</head>
<body>
  <nav>
    <a href="index.php" class="logo"><img src="logo.png" height="80px"></a>
    <ul>
      <li><a href="physical.php">Physical</a></li>
      <li><a href="newsfeed.php">Mental</a></li>
      <li><a href="laws.php">Laws</a></li>
      <li><a href="ngo.php">NGO's</a></li>
      <li><a href="profile.php">Hi <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="index.php?logout=1">Logout</a></li>
    </ul>
  </nav>
  
  <div class="slideshow-container">

    <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="women.jpg" style="width:100%">
    <div class="text">women satey</div>

    </div>

    <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="women2.jpg" style="width:100%">
    <div class="text">women saftey</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="women3.jpg" style="width:100%">
    <div class="text">women saftey</div>
    </div>

    </div>
      <br>
      <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
    </div>


  

    <!-- The Band Section -->
    <div class="text1">
    <h2>WOMEN SAFTEY</h2>
    <p cla><i>Nobody can protect you better than yourself! Trust your instincts and fight back!</i></p>
    <p class="w3-justify">
      We are probably living in the worst time our modern society has ever seen in terms of women security. We aim to make women feel as strong as ever and strong enough to fight the parasites of our society, strong enough to fight the odds, strong enough to protect themselves against any sexual assaults. We aim at giving power to those without whom we cease to exist. Our idea is to design a system which shall make every place and every hour safer for women again. A system which shall re-establish how very gregarious mankind is.
      The objective of the project is to make women feel as strong as ever
      and strong enough to fight the parasites of our society, strong enough
      to fight the odds, strong enough to protect themselves against any
      sexual assaults/domestic violence and we need to make them strong
      both physically as well as mentally.
      </p>
     <h2>Women saftey in india</h2>
     <p>Women's safety is an important issue in India. In the past few years, Women Safety has become a major issue in India. The crime rates are continuously rising, and there is an increase in the number of violence against women. According to Constitution, all men and women have equal rights and have freedom from gender discrimination, yet there are multiple cases of rapes every day. No girl or woman today is safe travelling by public transport; however, the planning of the public can support the crime prevention to a great extent. Few simple measures can greatly improve the women's safety, for example, installing street lights in isolated areas, separate toilet facilities at market areas to make them feel comfortable. If you search on the internet, many cases are happening in different parts of India where women young or old are being harassed and even killed. </p>

     <br>
     <br>



    <h3>● our website is to offer women self-defence tutorials,
    newsfeed to post personal views/blogs, meeting with certified
    psychologists/therapists, list of laws related to women safety and list
    of women safety related NGOs.</h3>
  </div>


  <div class="footer row">
    <div id="socials">
      <h3>Company<span>logo</span></h3>
      <p class="footer-links">
        <a href="index.php">Home</a>
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