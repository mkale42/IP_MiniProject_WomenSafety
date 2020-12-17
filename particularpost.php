<?php
	session_start();
	if (isset($_GET['logout'])) {
    	session_destroy();
    	unset($_SESSION['username']);
    	header("location: login.php");
  	}
	$db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
	if (isset($_GET['post_id'])) {
		$post_id = $_GET['post_id'];
		$sqlu = "SELECT * FROM newsfeedu WHERE post_id='$post_id'";
		$resultu = mysqli_query($db, $sqlu);
		$postsu = $resultu -> fetch_row();
		$postedData = $postsu[1];
		$escapedData = mysqli_real_escape_string($db, $postedData);
		$restoredData = str_replace(array('\n','\r'), array("\n",''), $escapedData);				
	}
	elseif (isset($_GET['postp_id'])) {
		$postp_id = $_GET['postp_id'];
		$sqlp = "SELECT * FROM newsfeedp WHERE postp_id='$postp_id'";
		$resultp = mysqli_query($db, $sqlp);
		$postsp = $resultp -> fetch_row();
		$postedData = $postsp[1];
		$escapedData = mysqli_real_escape_string($db, $postedData);
		$restoredData = str_replace(array('\n','\r'), array("\n",''), $escapedData);			
	}	
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
		<a href="adminindex.php" class="logo"><img src="logo.png" height="80px"></a>
		<ul>		
			<li><a href="">Hi <?php echo $_SESSION['username']; ?></a></li>
			<li><a href="particularpost.php?logout=1">Logout</a></li>
		</ul>
	</nav>
	
	<div class="content clearfix">
		<div class="main-content">
	    	<h1 class="recent-post-title">POSTS</h1>
	    	<?php if (isset($_GET['post_id'])) {	 
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
	        	<iframe src="<?php echo $postsu[3]; ?>"></iframe>
	        	<?php
	        		}
	        	?>	        	
	         	<div class="post-about">
		        	<p><?php echo nl2br($restoredData); ?></p>
		        	<i class="far fa-user">
		        		Gaurav
		        	</i>
		        </div>
		        <a href="report.php?reportu=<?php echo $postsu[0]; ?>" class="btn"><b>Report</b></a>		       
	        </div>
	        <?php
	    		}
	    	?>	      	        
	    	<?php if (isset($_GET['postp_id'])) {	    		
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
		        		Gaurav
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