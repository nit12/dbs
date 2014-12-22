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
							<a href="index.html">UNCC Alumni<!-- <span class="header_colour">&nbsp;Alumni</span> --></a>
						</h1>
						<h2>Click. Connect. Discover</h2>
					</div>
				</div>

				<nav id="main-nav" class="8u">
					<ul>
						<li><a class="active" href="index.html">HOME</a></li>
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
								<li><a href="#">Events</a></li>
								<li><a href="#">Reunions</a></li>
								<li><a href="#">Travel/Study</a></li>
							</ul></li>

						<li><a href="anotherpage.html">NEWS</a>
							<ul>
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


	<!-- Profile displaying part -->
	<div id="profile_viewer">
		<div class="container">
			<section class="8u">
				
				<?php
				$person_id = $_GET ['person_id'];
				if (is_null ( $person_id )) {
					
					echo '<p style="color: red;">Error in showing profile !</p>';
				} else {
					
					// set up the connection first
					require ('connect.php');
					
					$query = "SELECT * FROM `person` WHERE PersonID LIKE '%$person_id%';";
					
					// fire query
					$result = mysql_query ( $query );
					
					if ($result) {
						$count = mysql_num_rows ( $result );
						
						if ($count == 0) {
							$msg = "No resutls were found using passed PersonID !";
							echo '<p style="color: red;">' . $msg . '</p>';
						} else {
							// DIsplay results string
							
							while ( $row = mysql_fetch_array ( $result ) ) {
								
								$person_id = $row ['PersonID'];
								$ssn = $row ['SSN'];
								$fname = $row ['FirstName'];
								$lname = $row ['LastName'];
								$street = $row ['Street'];
								$city = $row ['City'];
								$state = $row ['State'];
								$phone = $row ['Phone'];
								$email = $row ['Email'];
								
								echo "<h2>";
								echo $fname;
								echo " ";
								
								echo $lname;
								echo "</h2>";
								// echo '<p><a href="viewsingleprofile.php>fsdfgsdfg</a>';
								// echo "</p>";
								
								echo "<p><b> SSN </b>: Can not disclose";
								echo "</p>";
								echo "<p><b> Address </b>: ";
								echo $street;
								echo "</p><p>";
								echo $city;
								echo ", ";
								echo $state;
								echo "</p><p><b> Phone </b>: ";
								echo $phone;
								echo "</p>";
								echo "<p><b> Email </b>: ";
								echo $email;
								echo "</p>";
							}
							
							// Finding whether he/she is student / prefessor / staff
							$query_student = "SELECT * FROM `student` WHERE PersonID LIKE '%$person_id%';";
							$result_student = mysql_query ( $query_student );
							$count_student = mysql_num_rows ( $result_student );
							
							$query_prof = "SELECT * FROM `professor` WHERE PersonID LIKE '%$person_id%';";
							$result_prof = mysql_query ( $query_prof );
							$count_prof = mysql_num_rows ( $result_prof );
							
							$query_staff = "SELECT * FROM `staff` WHERE PersonID LIKE '%$person_id%';";
							$result_staff = mysql_query ( $query_staff );
							$count_staff = mysql_num_rows ( $result_staff );
							
							if ($result_student && $count_student > 0) {
								// he is student
								echo "<br><p><u>His/ Her Student details</u> : </p>";
								while ( $row = mysql_fetch_array ( $result_student ) ) {
									
									$grad_year = $row ['GraduationYear'];
									$major = $row ['Major'];
									$m_advisor = $row ['MajorAdvisor'];
									
									echo "<p> Major : ";
									echo $major;
									echo "</p>";
									
									echo "<p> Advisor : ";
									echo $m_advisor;
									echo "</p>";
									
									echo "<p> Year of graduation : ";
									echo $grad_year;
									echo "</p>";
									
									echo "<br>";
								}
							} else if ($result_prof && $count_prof > 0) {
								// He if professor
								
								echo "<br><p><u>His/ Her Professor details</u> : </p>";
								while ( $row = mysql_fetch_array ( $result_prof ) ) {
									
									$dep = $row ['Department'];
									$doj = $row ['DateOfJoining'];
									
									echo "<p> Department : ";
									echo $dep;
									echo "</p>";
									
									echo "<p> Date Of Joining : ";
									echo $doj;
									echo "</p>";
									
									echo "<br>";
								}
							} else if ($result_staff && $count_staff > 0) {
								// he is taff
								echo "<br><p><u>His/ Her Staff details</u> : </p>";
								while ( $row = mysql_fetch_array ( $result_staff ) ) {
									
									$dep = $row ['Department'];
									
									
									echo "<p> Department : ";
									echo $dep;
									echo "</p>";
									
																		
									echo "<br>";
								}
							} else {
								// he is no - one, he? error
								echo "<p>He is alien, OMG </p>";
							}
						}
					} else {
						
						echo '<p style="color: red;">Error in searching the database !</p>';
					}
					// echo<h1>Profile</h1>
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
