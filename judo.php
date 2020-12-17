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
<?php include('feedback.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Women Safety</title>
  <link rel="stylesheet" type="text/css" href="judo.css">
  <script src="https://kit.fontawesome.com/6332879932.js"></script>
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
      <li><a href="laws.php">Laws</a></li>
      <li><a href="ngo.php">NGO's</a></li>
      <li><a href="profile.php">Hi <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="judo.php?logout=1">Logout</a></li>      
    </ul>
  </nav>
  
    <div class="page-wrapper">
  
      <div class="post-slider">
      <h2>JUDO</h2>
      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>

          <div class="post-wrapper">
            <div class="post">
              <img src="judo4.jpg" class="slider-image">                
            </div>
            <div class="post">
              <img src="judo5.jpg" class="slider-image">
            </div>
            <div class="post">
              <img src="judo6.jpg" class="slider-image">                
            </div>
            <div class="post">
              <img src="ma.png" class="slider-image">               
            </div>
            <div class="post">
              <img src="ma.png" class="slider-image">              
            </div>
          </div> 
        </div>
    </div>
  
     <div class="row">
           <br><p>Judo (柔道, jūdō, Japanese pronunciation: [dʑɯꜜːdoː], lit. "gentle way") is generally categorized as a modern martial art, which has since evolved into a combat and Olympic sport. The sport was created in 1882 by Jigoro Kano (嘉納治五郎) as a physical, mental, and moral pedagogy in Japan. With its origins coming from jujutsu, judo's most prominent feature is its competitive element, where the objective is to either throw or take down an opponent to the ground, immobilize or otherwise subdue an opponent with a pin, or force an opponent to submit with a joint lock or a choke. Strikes and thrusts by hands and feet as well as weapons defences are a part of judo, but only in pre-arranged forms (kata, 形) and are not allowed in judo competition or free practice (randori, 乱取り). It was also referred to as Kanō Jiu-Jitsu until the introduction to the Olympic Games. A judo practitioner is called a "judoka", and the judo uniform is called "judogi".The philosophy and subsequent pedagogy developed for judo became the model for other modern Japanese martial arts that developed from koryū (古流, traditional schools). Judo also spawned a number of derivative martial arts across the world, such as Brazilian jiu-jitsu, Krav Maga, Sambo and ARB.</p>
      </div>
      <div class="row">
        <h2><b>Forms in judo</b></h2>
        <h3>There are ten kata that are recognized by the Kodokan today</h3>
<ul>
<li> 1. Randori-no-kata (乱取りの形, Free practice forms), comprising two kata:</li>
 <ul class="a">
 <li>Nage-no-kata (投の形, Forms of throwing) Fifteen throws, practiced both left- and right-handed, three each from the five categories of nage waza: te waza, koshi waza, ashi waza, ma sutemi waza and yoko sutemi waza.</li>
 <li>Katame-no-kata (固の形, Forms of grappling or holding). Fifteen techniques in three sets of five, illustrating the three categories of katame waza: osaekomi waza, shime waza and kansetsu waza.</li>
 </ul><br>
<li> 2. Kime-no-kata (極の形, Forms of decisiveness). Twenty techniques, illustrating the principles of defence in a combat situation, performed from kneeling and standing positions. Attacks are made unarmed and armed with a dagger and a sword. This kata utilises atemi waza, striking techniques, that are forbidden in randori.</li><br>
<li> 3. Kōdōkan goshinjutsu (講道館護身術, Kodokan skills of self-defence). The most recent recognised kata, comprising twenty-one techniques of defence against attack from an unarmed assailant and one armed with a knife, stick and pistol. This kata incorporates various jujutsu techniques such as wrist locks and atemi waza.</li><br>
<li> 4. Jū-no-kata (柔の形, Forms of gentleness & flexibility). Fifteen techniques, arranged in three sets of five, demonstrating the principle of Jū and its correct use in offence and defence.</li><br>
<li> 5. Gō-no-kata (剛の形, Forms of force). One of the oldest kata, comprising ten forms that illustrate the efficient use of force and resistance. Now rarely practiced.</li><br>
<li> 6. Itsutsu-no-kata (五の形, The five forms). An advanced kata, illustrating the principle of seiryoku zen'yō and the movements of the universe. The kata predates the creation of Kodokan and originated in Tenjin Shinyō-ryū.</li><br>
<li> 7. Koshiki-no-kata (古式の形, Traditional forms). Derived from Kitō-ryū Jujutsu, this kata was originally intended to be performed wearing armour. Kano chose to preserve it as it embodied the principles of judo.[49]
<li> 8. Seiryoku Zen'yō Kokumin Taiiku (精力善用国家体育, Maximum-efficiency national physical education). A series of exercises designed to develop the physique for judo.</li><br>
<li> 9. Joshi-goshinhō (女性護身法, Methods of self-defence for women). An exercise completed in 1943, and of which the development was ordered by Jiro Nango, the second Kodokan president.</li><br>
<li> 10. In addition, there are a number of commonly practiced kata that are not recognised by the Kodokan. Some of the more common kata include:</li><br>

<li>Go-no-sen-no-kata (後の先の形) A kata of counter techniques developed at Waseda University in Tokyo, popularised in the West by Mikinosuke Kawaishi.</li>
<li>Nage-waza-ura-no-kata (投げ技裏の形) Another kata of counter techniques, created by Kyuzo Mifune.</li>
<li>Katame-waza ura-no-kata (固め技裏の形, Forms of reversing controlling techniques) a kata of counter-attacks to controlling techniques, attributed to Kazuo Itō</li>
</ul><br><br><br><br><br>






      </div>
    <div class="video">
      <iframe width="420" height="345" src="https://www.youtube.com/embed/xy4tYSyC2lU">
      </iframe>
            <iframe width="420" height="345" src="https://www.youtube.com/embed/JraWp45msFA">
            </iframe>
                        <iframe width="420" height="345" src="https://www.youtube.com/embed/N-MQb2LEUU0">
                        </iframe><br><br><br>




    </div>

  <section>
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
    </section>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="technique.js"></script>
  <script>
  function myFunction(x) {
    x.classList.toggle("fa-thumbs-down");
    }
    </script>
</body>
</html>