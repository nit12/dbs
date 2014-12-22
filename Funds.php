<?php


	if(isset($_POST['submit'])){
		
				
				
				require('connect.php');
				
				// If the values are posted, insert them into the database.
				//if (isset($_POST['username']) && isset($_POST['password'])){
					
					$fid 	= $_POST['fundid'];
					$aid 	= $_POST['alumid'];
					$dept	= $_POST['department'];
					$fundamt	= $_POST['amount'];
					$pur	=	$_POST['purpose'];
					$desc	=$_POST['desc'];
			
					$query = "INSERT INTO `funds` (FundID, PersonID) VALUES ('$fid', '$aid')";
					
					$result = mysql_query($query);
					if($result){
						$msg = "Funds Donated Successfully.";
					}
		
		}
	//}
    ?>
    
<!DOCTYPE HTML>
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
										<li><a href="#">Donate Funds</a></li>
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
								<a href="contact.php">YOUR ACCOUNT</a>
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
					<a href="#"><img src="images/UNCC_Logo_4c.jpg" alt="banner image"  height="200"/></a>
				</div>	
            </div>	
        </div>			
		<div class="container">		
			
            
            <label  align="center"  for="inputNews" >Donating Funds</label>
            
                   
                    <div class="News-form">
                    
                     
                      <?php
                        if(isset($msg) & !empty($msg)){
                            echo $msg;
                        }
                     ?>
                    
                    <form class="form-horizontal" action="" method="post">
                         	   <div class="form-group">
                                        <label for="inputNews" class="control-label col-xs-2">Fund ID</label>
                                        <div class="col-xs-3">
                                            <input type="text" class="form-control" id="fundid" placeholder="fund id" name="fundid">
                                        </div>
	                    		 </div>
                         
                            <div class="form-group">
                                <label for="inputProfessor" class="control-label col-xs-2">Alumni ID</label>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="alumniid" placeholder="alumni id" name="alumid">
                                </div>
                            </div>
                            
                          
                            <div class="form-group">
                                <label for="inputtype" class="control-label col-xs-2">Department </label>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="department" placeholder="department" name="department">
                                </div>
                            </div>
                            
                            
                               <div class="form-group">
                                <label for="inputtype" class="control-label col-xs-2">Fund Amount </label>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="amount" placeholder="amount" name="amount">
                                </div>
                            </div>
                            
                            
                               <div class="form-group">
                                <label for="inputtype" class="control-label col-xs-2">Purpose </label>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" id="purpose" placeholder="purpose" name="purpose">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputdesc" class="control-label col-xs-2">Description</label>
                                <div class="col-xs-5">
                                    <textarea class="form-control" rows="4" id="desc" placeholder="description" name="desc"></textarea>
                                </div>
                            </div>
                            
                            
                         
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" class="btn btn-warning">$Donate</button>
                                </div>
                            </div>
                       </form>
                    
                    </div>
            
		        
				
			<!-- Footer -->
				<footer>
					<p><img src="images/twitter.png" alt="twitter" />&nbsp;<img src="images/facebook.png" alt="facebook" />&nbsp;<img src="images/rss.png" alt="rss" /></p>
					<p><a href="index.html">Home</a> | <a href="examples.html">Feedback</a> | <a href="apage.html">Privacy Policy</a> | <a href="anotherpage.html">Terms & Conditions</a> | <a href="contact.php">Contact Us</a></p>
					<p>Copyright &copy; UNC Charlotte | <a href="http://fotogrph.com/">Bookmark This Page</a> | <a href="http://skeljs.org/">License</a> | <a href="http://www.css3templates.co.uk">Design from Open Source</a></p>
				</footer>		
			</div>		
			
	</body>
</html>
