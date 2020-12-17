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
    <?php if (isset($_SESSION['userid'])) { ?>
    <a href="index.php" class="logo"><img src="logo.png" height="80px"></a>
    <?php } ?>
    <?php if (isset($_SESSION['psyid'])) { ?>
    <a href="psyindex.php" class="logo"><img src="logo.png" height="80px"></a>
    <?php } ?>        
    <ul>
      <li><a href="physical.php">Physical</a></li>
      <li><a href="newsfeed.php">Mental</a></li>
      <li><a href="#">Laws</a></li>
      <li><a href="ngo.php">NGO's</a></li>
      <li><a href="profile.php">Hi <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="laws.php?logout=1">Logout</a></li>
    </ul>
  </nav>

  <h1 style="text-align: center; padding-bottom: 20px;">Laws Related To Women</h1>
  <section>
    <h2>Women-Specific Legislation</h2>
    <ul>
      <li>
        The Immoral Traffic (Prevention) Act, 1956
        <a href="http://ncw.nic.in/sites/default/files/THEIMMORALTRAFFIC%28PREVENTION%29ACT1956_2.pdf" target="_BLANK" title="PDF file that opens in a new window." role="link" style="color: blue;"> (172.32 KB)</a>
      </li>
      <li>
        The Dowry Prohibition Act, 1961 (28 of 1961)(Amended in 1986)
        <a href="http://ncw.nic.in/sites/default/files/THEDOWRYPROHIBITIONACT1961_0.pdf" target="_BLANK" title="PDF file that opens in a new window." role="link" style="color: blue;"> (239.43 KB)</a>
      </li>
      <li>
        The Indecent Representation of Women (Prohibition) Act, 1986
        <a href="http://ncw.nic.in/sites/default/files/THEIMMORALTRAFFIC%28PREVENTION%29ACT1956_0.pdf" target="_BLANK" title="PDF file that opens in a new window." role="link" style="color: blue;"> (172.32 KB)</a>
      </li>
      <li>
        The Commission of Sati (Prevention) Act, 1987 (3 of 1988)
        <a href="http://ncw.nic.in/sites/default/files/TheCommissionofSatiPreventionAct1987-of1988_0.pdf" target="_BLANK" title="PDF file that opens in a new window." role="link" style="color: blue;"> (294.55 KB)</a>
      </li>
      <li>
        Protection of Women from Domestic Violence Act, 2005
        <a href="http://ncw.nic.in/sites/default/files/TheProtectionofWomenfromDomesticViolenceAct2005_0.pdf" target="_BLANK" title="PDF file that opens in a new window." role="link" style="color: blue;"> (330.96 KB)</a>
      </li>
      <li>
        The Sexual Harassment of Women at Workplace (PREVENTION, PROHIBITION and REDRESSAL) Act, 2013
        <a href="http://ncw.nic.in/sites/default/files/SexualHarassmentofWomenatWorkPlaceAct2013_0.pdf" target="_BLANK" title="PDF file that opens in a new window." role="link" style="color: blue;"> (371.38 KB)</a>
      </li>
      <li>
        The Criminal Law (Amendment) Act, 2013 (1.72 MB) 
        <a href="http://ncw.nic.in/sites/default/files/The_Criminal_Law_Amendment_Act_2013_0.pdf" target="_BLANK" title="PDF file that opens in a new window." role="link" style="color: blue;"> (1.72 MB)</a>
      </li>
    </ul>
  </section>
  <section>
    <h2>Women Related Legislation</h2>
    <ul>
      <li>
        The Indian Penal Code,1860
        <a href="http://ncw.nic.in/sites/default/files/THEINDIANPENALCODE1860_0.pdf" target="_BLANK" title="PDF file that opens in a new window." role="link" style="color: blue;"> (989.61 KB)</a>
      </li>
      <li>
        The Indian Evidence Act,1872
        <a href="http://ncw.nic.in/sites/default/files/THEINDIANEVIDENCEACT1872_0.pdf" target="_BLANK" title="PDF file that opens in a new window." role="link" style="color: blue;"> (497.06 KB)</a>
      </li>
    </ul>
  </section>

  <div class="footer row">
    <div id="socials">
      <h3>Company<span>logo</span></h3>
      <p class="footer-links">
        <?php if (isset($_SESSION['userid'])) { ?>
        <a href="index.php">Home</a>        
        <?php } ?>
        <?php if (isset($_SESSION['psyid'])) { ?>
        <a href="psyindex.php">Home</a>
        <?php } ?>
        <a href="physical.php">Physical</a>
        <a href="newsfeed.php">Mental</a>
        <a href="#">Laws</a>
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