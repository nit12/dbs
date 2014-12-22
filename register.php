<?php
	
    // If the values are posted, insert them into the database.
    if (isset($_POST['pid']))
    {
        require('connect.php');
		
		$pid		=	$_POST['pid'];
		$ssn		=	$_POST['ssn'];
		$fname		=	$_POST['fname'];
		$lname		=	$_POST['lname'];
		$email		=	$_POST['email'];
		$street		=	$_POST['street'];
		$city		=	$_POST['city'];
		$state		=	$_POST['state'];
		$phoneno	=	$_POST['phoneno'];
		
		
		
		$uid		=	$_POST['uid'];
		$password	=	$_POST['password'];
		
		
	    $loginquery = "INSERT INTO `login` (PersonID,Username,Password) VALUES ('$pid','$uid','$password')";
        $result = mysql_query($loginquery);
        
		$personquery = "INSERT INTO `person` (PersonID,SSN,FirstName,LastName,Street,City,State,Phone,Email) VALUES ('$pid','$ssn','$fname','$lname','$street','$city','$state','$phone','$email')";
        $result1 = mysql_query($personquery);
		
        if($result1 && $result)
        {
           $msg = " User Registered Successfully ";
        }
		
		
		
    }
	
    ?>
    
<!DOCTYPE html>
<html>
	<head>
		<title>Registration Page</title>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,600|Source+Code+Pro" rel="stylesheet" />
        	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	
		<!--[if lte IE 8]><script src="html5shiv.js" type="text/javascript"></script><![endif]-->
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>		
		<script src="js/skel.min.js">
		{
			prefix: 'css/style',
			preloadStyleSheets: true,
			resetCSS: true,
			boxModel: 'border',
			grid: { gutters: 30 },
			breakpoints: {
				wide: { range: '1200-', containers: 1140, grid: { gutters: 50 } },
				narrow: { range: '481-1199', containers: 960 },
				mobile: { range: '-480', containers: 'fluid', lockViewport: true, grid: { collapse: true } }
			}
		}
		</script>
		<script>
			$(function() {

				// Note: make sure you call dropotron on the top level <ul>
				$('#main-nav > ul').dropotron({ 
					offsetY: -10 // Nudge up submenus by 10px to account for padding
				});

			});
		</script>
		<script>
			// DOM ready
			$(function() {
    
			// Create the dropdown base
			$("<select />").appendTo("nav");
   
			// Create default option "Go to..."
			$("<option />", {
				"selected": "selected",
				"value"   : "",
				"text"    : "Menu"
			}).appendTo("nav select");
   
			// Populate dropdown with menu items
			$("nav a").each(function() {
			var el = $(this);
			$("<option />", {
				"value"   : el.attr("href"),
				"text"    : el.text()
			}).appendTo("nav select");
			});
   
			// To make dropdown actually work
			// To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
			$("nav select").change(function() {
				window.location = $(this).find("option:selected").val();
			});
  
			});
		</script>	
	</head>
	
	<body>
		<!-- HEADER CONTENT STARTS -->
		<div id="header_container">		
		    <div class="container">
			<!-- Header -->
				<div id="header" class="row">
					<div class="4u">
						<div class="box">
							<h1><a href="index.php">UNCC Alumni<!-- <span class="header_colour">&nbsp;Alumni</span> --></a></h1>
							<h2>Click. Connect. Discover</h2>
					    </div>
					</div>
					
					<nav id="main-nav" class="8u">
						<ul>
							<li><a class="active" href="index.php">HOME</a></li>
							<li>
								<a href="examples.html">CLUBS</a>
									<ul>
										<li><a href="#">Department clubs</a></li>
										<li><a href="#">Regional clubs</a></li>
										<li><a href="#">Shared interest <br/>clubs</a></li>
										<li><a href="#">Clubs events calendar</a></li>
									</ul>	
							</li>
							
							<li>
								<a href="apage.html">ACTIVITIES</a>
									<ul>
                                    	<li><a href="Funds.php">Funds</a></li>
                                        <li><a href="searchPersons.php">Search Alumni</a></li>
										<li><a href="#">Events</a></li>
										<li><a href="#">Reunions</a></li>
										<li><a href="#">Travel/Study</a></li>
									</ul>	
							</li>
							
							<li>
								<a href="anotherpage.html">NEWS</a>
									<ul>
                                    	<li><a href="ProfNews.php">Post News</a></li>
										<li><a href="#">e News</a></li>
										<li><a href="#">Social media</a></li>
										<li><a href="#">Magazine</a></li>
									</ul>	
							</li>							
							
							<li>
								<a href="#">VOLUNTEERING</a>			
									<ul>
										<li><a href="#">Give to your University</a></li>
										<li><a href="#">Beyond University</a></li>
										<li>
											<a href="#">Volunteer Recognition</a>
												<ul>
													<li><a href="#">Awards</a></li>
													<li><a href="#">Leadership</a></li>
													<li><a href="#">Trustee Nominations</a></li>
												</ul>
										</li>
									</ul>
							</li>
							
							<li>
								<a href="#">ACCOUNT</a>
									<ul>
                                    	<li><a href="login.php">Login</a></li>
										<li><a href="#">Update details</a></li>
										<li><a href="#">Manage <br/>Communication <br/>preferences</a></li>
										<li><a href="#">Privacy Settings</a></li>
									</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>	
        </div>
		<!-- HEADER CONTENT STARTS -->
	
		<!-- BODY CONTENT STARTS-->
       	<div id="loginleftbar" style="margin-top:20px; margin-left:5%; width:15%; height: 600px; float: left; clear: both; display: inline-block">
	       	<h1><em>Alumni Number</em></h1>
    	   		<p>In the format '8-******'** .Find this on your UNCC Alumni Card or any email address from the University Alumni Office.  
				If you don't have your number, please contact us</p>
				
			<h1><em>Username</em></h1>
       			<p>We recommend that you use your registered email address. If your chosen username is already taken, you may have already registered. 
				You can use the 'forgotten password' facility to check.</p>
       	</div>  	
       	
       	<div id="register-form" style="margin-top:100px; width: 60%; text-align: center; height:900px; clear: both; display: inline-block" >
    		
			<h1 align="left">Register</h1>
             <form class="form-horizontal" action="#" method="post">
                         	   <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">Person ID </label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="personID" placeholder="ID" name="pid">
                                        </div>
	                    		 </div>
                                 
                                 <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">SSN</label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="ssn" placeholder="***-***-****" name="ssn">
                                        </div>
	                    		 </div>
                                 
                                 <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">First Name </label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="first Name" placeholder="first name" name="fname">
                                        </div>
	                    		 </div>
                                 
                                 <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">Last name </label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="last name" placeholder="last name" name="lname">
                                        </div>
	                    		 </div>
                                 
                                 <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">E mail </label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="email" placeholder="abc@gmail.com" name="email">
                                        </div>
	                    		 </div>
                                 
                                 <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">UserID</label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="UserID" placeholder="userID" name="uid">
                                        </div>
	                    		 </div>
                                 
                                 <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">Password</label>
                                        <div class="col-xs-3">
                                            <input type="password" class="form-control" id="password" placeholder="*******" name="password">
                                        </div>
	                    		 </div>
                                 
                                 
                                 
                                 <h2 align="left">ADDRESS</h2>
                                 
                                    <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">Street </label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="street" placeholder="street" name="street">
                                        </div>
	                    		 </div>
                                 
                                    <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">city </label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="city" placeholder="city" name="city">
                                        </div>
	                    		 </div>
                                    <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">State</label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="state" placeholder="state" name="state">
                                        </div>
	                    		 </div>
                                 
                                 
                                    <div class="form-group">
                                        <label for="register" class="control-label col-xs-2">phone No </label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="phoneno" placeholder="xxx-xxx-xxxx" name="phoneno">
                                        </div>
	                    		 </div>
                                 
 
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-3">
                                    <button type="submit" class="btn btn-warning">Register</button>
                                </div>
                            </div>
                       </form>
                       <?php
								if(isset($msg) & !empty($msg)){
									echo $msg;
								}
							?>
    	</div>
       	
    <!-- BODY CONTENT ENDS-->
	
	<!-- FOOTER CONTENT STARTS -->
	<div class="container">			
		<!-- Footer -->
			<footer>
				<p><img src="images/twitter.png" alt="twitter" />&nbsp;<img src="images/facebook.png" alt="facebook" />&nbsp;<img src="images/rss.png" alt="rss" /></p>
				<p><a href="index.html">Home</a> | <a href="examples.html">Feedback</a> | <a href="apage.html">Privacy Policy</a> | <a href="anotherpage.html">Terms & Conditions</a> | <a href="contact.php">Contact Us</a></p>
				<p>Copyright &copy; UNC Charlotte | <a href="http://fotogrph.com/">Bookmark This Page</a> | <a href="http://skeljs.org/">License</a> | <a href="http://www.css3templates.co.uk">Design from Open Source</a></p>
			</footer>		
	</div>	
	<!-- FOOTER CONTENT ENDS -->
	
</body>
</html>