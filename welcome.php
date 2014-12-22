<?php

	session_start();
	$username = $_SESSION['username'];

?>
<html>
	<head>
		<title>CSS3_clarity</title>
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
                                    	<li><a href="Funds.php">Donate Funds</a></li>
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
								<a href="#">Hi  <?php echo $username ?> </a>
									<ul>
										<li><a href="logout.php">Logout</a></li>
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

		<!-- Banner -->		
		<div id="banner_wrapper">	
			<div class="container">					
				<div id="banner">
					<a href="#"><img src="images/UNCC_Logo_4c.jpg" height="200" width="800" alt="banner image" /></a>
				</div>	
            </div>	
        </div>			
		
		<!--  BODY CONTENT STARTS -->
		<div id="content_container">
			<div id="events_container">
    			<img id="events_image" src="images/events.jpg"/>
    			<div id="text_container">
 	   				<a href="#">
 	   					<h1 id="events_text">
    		   			ALUMNI EVENTS
	    				</h1>
 	   				</a>
	    		</div>
			</div>
		
			<div id="events_container">
    			<img id="events_image" src="images/clubs.jpg"/>
	    		<div id="text_container">
	    			<a href="#">
 		   				<h1 id="events_text">
    			   			JOIN A CLUB
	    				</h1>
	    			</a>
	    		</div>
			</div>
			
			<div id="events_container">
    			<img id="events_image" src="images/donate.jpg"/>
	    		<div id="text_container">
 	   				<a href="Funds.php">
 	   					<h1 id="events_text">
    		   				DONATE NOW
	    				</h1>
	    			</a>
	    		</div>
			</div>
			
			<div id="events_container">
    			<img id="events_image" src="images/news.jpg"/>
	    		<div id="text_container">
 	   				<a href="#">
 	   					<h1 id="events_text">
    		   				LATEST NEWS
	    				</h1>
	    			</a>
	    		</div>
			</div>
			
			<div id="events_container">
    			<img id="events_image" src="images/travel.jpg"/>
	    		<div id="text_container">
 	   				<a href="#">
 	   					<h1 id="events_text">
    		   				TRAVEL-LEARN
	    				</h1>
	    			</a>
	    		</div>
			</div>
		
			<div id="events_container">
    			<div id="ideas_button">
    				<a href="#">
    					<h1>POST IDEAS</h1>
    				</a>
				</div>	
			</div>
						
		</div>
		
		<div class="container">			
		<!-- Footer -->
			<footer>
				<p><img src="images/twitter.png" alt="twitter" />&nbsp;<img src="images/facebook.png" alt="facebook" />&nbsp;<img src="images/rss.png" alt="rss" /></p>
				<p><a href="index.html">Home</a> | <a href="examples.html">Feedback</a> | <a href="apage.html">Privacy Policy</a> | <a href="anotherpage.html">Terms & Conditions</a> | <a href="contact.php">Contact Us</a></p>
				<p>Copyright &copy; UNC Charlotte | <a href="http://fotogrph.com/">Bookmark This Page</a> | <a href="http://skeljs.org/">License</a> | <a href="http://www.css3templates.co.uk">Design from Open Source</a></p>
			</footer>		
		</div>		
	
	</body>
</html>
