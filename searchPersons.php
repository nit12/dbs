<?php
?>
<html>
<head>
<title>CSS3_clarity</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link
	href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,600|Source+Code+Pro"
	rel="stylesheet" />
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
						<h1>
							<a href="index.php">UNCC Alumni<!-- <span class="header_colour">&nbsp;Alumni</span> --></a>
						</h1>
						<h2>Click. Connect. Discover</h2>
					</div>
				</div>

				<nav id="main-nav" class="8u">
					<ul>
						<li><a class="active" href="index.php">HOME</a></li>
						<li><a href="examples.html">CLUBS</a>
							<ul>
								<li><a href="#">Department clubs</a></li>
								<li><a href="#">Regional clubs</a></li>
								<li><a href="#">Shared interest <br />clubs
								</a></li>
								<li><a href="#">Clubs events calendar</a></li>
							</ul></li>

						<li><a href="apage.html">ACTIVITIES</a>
							<ul>
 		                         <li><a href="funds.php">Donate Funds</a></li>
                                 <li><a href="searchPersons.php">Search Alumni</a></li>
								<li><a href="#">Events</a></li>
								<li><a href="#">Reunions</a></li>
								<li><a href="#">Travel/Study</a></li>
							</ul></li>

						<li><a href="anotherpage.html">NEWS</a>
							<ul>
                            	<li><a href="ProfNews.php">Post News</a></li>
								<li><a href="#">e News</a></li>
								<li><a href="#">Social media</a></li>
								<li><a href="#">Magazine</a></li>
							</ul></li>

						<li><a href="#">VOLUNTEERING</a>
							<ul>
								<li><a href="#">Give to your University</a></li>
								<li><a href="#">Beyond University</a></li>
								<li><a href="#">Volunteer Recognition</a>
									<ul>
										<li><a href="#">Awards</a></li>
										<li><a href="#">Leadership</a></li>
										<li><a href="#">Trustee Nominations</a></li>
									</ul></li>
							</ul></li>

						<li><a href="contact.php">YOUR ACCOUNT</a>
							<ul>
								<li><a href="#">Update details</a></li>
								<li><a href="#">Manage <br />Communication <br />preferences
								</a></li>
								<li><a href="#">Privacy Settings</a></li>
							</ul></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>



	<!-- Search Form -->
	<div id="search_form">
		<div class="container">
			<section class="8u">
				<h1>Search Person</h1>

				<form id="search_person" action="searchPersons.php" method="post">
					<div class="form_settings">


						<p>
							<span>Search</span><input class="contact" type="text"
								name="your_search_input" value="" />
						</p>


						<p style="padding-top: 15px">
							<span>&nbsp;</span><input class="submit" type="submit"
								name="search_submitted" value="Submit" />
						</p>


					</div>
				</form>
				<?php
				
				if (isset ( $_POST ['search_submitted'] )) {
					
					require ('connect.php');
					
					$search_input = $_POST ['your_search_input'];
					
					// trying query
					$searchq = preg_replace ( "#[^0-9a-z]#i", "", $search_input );
					
					$query = "SELECT * FROM `person` WHERE FirstName LIKE '%$searchq%' OR LastName LIKE '%$searchq%';";
					
					// ///////////////////////////////////////
					
					$result = mysql_query ( $query );
					
					if ($result) {
						$count = mysql_num_rows ( $result );
						
						if ($count == 0) {
							$msg = "No resutls were found !";
							echo '<p style="color: red;">' . $msg . '</p>';
						} else {
							// DIsplay results string
							//echo '<p style="color: blue;">' . $count . '</p>';
							$msg = "Search results : ";
							echo '<p style="color: green;">' . $msg . '</p>';
							
							echo "<hr>";
							echo "</br>";
							
							while ( $row = mysql_fetch_array ( $result ) ) {
								
								$person_id = $row ['PersonID'];
								$ssn = $row ['SSN'];
								$fname = $row ['FirstName'];
								$lname = $row ['LastName'];
								$street = $row['Street'];
								$city = $row['City'];
								$state = $row['State'];
								$phone = $row['Phone'];
								$email = $row['Email'];
								
	
								
								
								echo "<p> ";
								echo $fname;
								
								echo " ";
								echo $lname;
								echo "</p>";
								//echo '<p><a href="viewsingleprofile.php>fsdfgsdfg</a>';
								//echo "</p>";
								
								echo "<p> Email : ";
								echo $email;
								echo "</p>";
								echo '<a href="viewsingleprofile.php?person_id='.$person_id.'">View Profile</a>';
								
								
								echo "<hr>";
							}
						}
					} else {
						$msg = "Error in searching the input";
						echo '<p style="color: red;">' . $msg . '</p>';
					}
				}
				
				?>
			</section>
		</div>
	</div>


	<div class="container">
		<!-- Footer -->
		<footer>
			<p>
				<img src="images/twitter.png" alt="twitter" />&nbsp;<img
					src="images/facebook.png" alt="facebook" />&nbsp;<img
					src="images/rss.png" alt="rss" />
			</p>
			<p>
				<a href="index.html">Home</a> | <a href="examples.html">Feedback</a>
				| <a href="apage.html">Privacy Policy</a> | <a
					href="anotherpage.html">Terms & Conditions</a> | <a
					href="contact.php">Contact Us</a>
			</p>
			<p>
				Copyright &copy; UNC Charlotte | <a href="http://fotogrph.com/">Bookmark
					This Page</a> | <a href="http://skeljs.org/">License</a> | <a
					href="http://www.css3templates.co.uk">Design from Open Source</a>
			</p>
		</footer>
	</div>

</body>
</html>
