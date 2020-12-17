<?php include('addpost.php'); ?>
<?php
  	if (!isset($_SESSION['username'])) {
    	$_SESSION['msg'] = "You must log in first";
    	header('location: login.php');
  	}
  	if (isset($_GET['logout'])) {
    	session_destroy();
    	unset($_SESSION['username']);
    	header("location: login.php");
  	}
	$db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
	$sqlu = "SELECT * FROM newsfeedu";
	$sqlp = "SELECT * FROM newsfeedp";
	$resultu = mysqli_query($db, $sqlu);
	$resultp = mysqli_query($db, $sqlp);
#	if (!mysqli_query($db, $query)) {
 #   echo "Error: " . mysqli_error($db);
#}
?>
<?php include('feedback.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Women Safety</title>
	<link rel="stylesheet" type="text/css" href="newsfeed.css">
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
			<li><a href="#">Mental</a></li>
			<?php if (!isset($_SESSION['psyid'])) { ?>
			<li><a href="contactpsy.php">Contact Psychologist</a></li>
			<?php } ?>
			<li><a href="laws.php">Laws</a></li>
			<li><a href="ngo.php">NGO's</a></li>
			<li><a href="profile.php">Hi <?php echo $_SESSION['username']; ?></a></li>
			<li><a href="newsfeed.php?logout=1">Logout</a></li>
		</ul>
	</nav>
	
	<div class="container1">
		<form method="post" action="newsfeed.php" class="posts">
			<?php include('errors.php'); ?>
	    	<label><h3>Image url</h3></label>
	    	<input type="text" id="image" name="image" placeholder="Image URL">

	    	<label><h3>Video url</h3></label>
	    	<input type="text" id="video" name="video" placeholder="Video URL">

	    	<label><h3>Text</h3></label>
	    	<textarea id="text" name="text" placeholder="Write something.." style="height:200px"></textarea>

	    	<input type="submit" name="add_post" value="ADD POST">
	  </form>
	</div>

	<div class="content clearfix">
		<div class="main-content">
	    	<h1 class="recent-post-title">POSTS</h1>
	    	<?php
				while ($postsu = $resultu -> fetch_row()) {
					$postedData = $postsu[1];
					$escapedData = mysqli_real_escape_string($db, $postedData);
					$restoredData = str_replace(array('\n','\r'), array("\n",''), $escapedData);			
			?>
	        <div class="post">
	        	<?php
	        		if (!empty($postsu[2])) {	    
	        	?>
	        	<img src="<?php echo $postsu[2]; ?>" class="post-image" >
	        	<?php
	        		}
	        	?>
	        	<?php
	        		if (!empty($postsu[3])) {	    
	        	?>
	        	<iframe src="<?php echo $postsu[3]; ?>" class="post-video"></iframe>
	        	<?php
	        		}
	        	?>	        	
	         	<div class="post-about">
		        	<p><?php echo nl2br($restoredData); ?></p>
		        	<i class="far fa-user">
		        		<?php 
		        			$sqlun = "SELECT * FROM users WHERE user_id=$postsu[4]";
		        			$resultun = mysqli_query($db, $sqlun);
		        			$nameun = $resultun -> fetch_row();
		        		?>
		        		<?php echo $nameun[2]; ?>
		        	</i>
		        </div>
		        <a href="report.php?reportu=<?php echo $postsu[0]; ?>" class="btn"><b>Report</b></a>		       
	        </div>	      
	        <?php
	    		}
	    	?>
			<?php
				while ($postsp = $resultp -> fetch_row()) {
						$postedData = $postsp[1];
						$escapedData = mysqli_real_escape_string($db, $postedData);
						$restoredData = str_replace(array('\n','\r'), array("\n",''), $escapedData);						
			?>
	        <div class="post">
	        	<?php
	        		if (!empty($postsp[2])) {	    
	        	?>
	        	<iframe src="<?php echo $postsp[2]; ?>"></iframe>
	        	<?php
	        		}
	        	?>
	        	<?php
	        		if (!empty($postsp[3])) {	    
	        	?>
	        	<iframe src="<?php echo $postsp[3]; ?>"></iframe>
	        	<?php
	        		}
	        	?>	        	
	         	<div class="post-about">
		        	<p><?php echo nl2br($restoredData); ?></p>
		        	<i class="far fa-user">
		        		<?php 
		        			$sqlpn = "SELECT * FROM psychologists WHERE psy_id=$postsp[4]";
		        			$resultpn = mysqli_query($db, $sqlpn);
		        			$namepn = $resultpn -> fetch_row();
		        		?>
		        		<?php echo $namepn[2]; ?>
		        	</i>
		        </div>		        
		        <a href="report.php?reportp=<?php echo $postsp[0]; ?>" class="btn"><b>Report</b></a>
	        </div>
	        <?php
				}
			?>
	    </div>
	</div>

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<!--<script src="script.js"></script>-->
	<script>
	function myFunction(x) {
    x.classList.toggle("fa-thumbs-down");
    }
    </script>


</body>
</html>