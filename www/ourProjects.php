<?php
require_once ('../CMS/Session.php');
require_once ('../CMS/project-model.php');
require_once ('../CMS/project-controller.php');

$project_manager = ProjectManager::getInstance();
$projects = $project_manager->getProjects();
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Modern Architecture | Projects</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400|" rel="stylesheet" type="text/css">
		<link href="../fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="../style.css">
		
		<!--[if lt IE 9]>
        <script src="../js/ie-support/html5.js"></script>
        <script src="../js/ie-support/respond.js"></script>
        <![endif]-->

	</head>
	<body>
		<div id="site-content">
			<div class="site-header">
				<div class="container">
					<a href="index.html" id="branding">
						<img src="../images/logo.png" alt="" class="logo">
						<div class="logo-text">
							<h1 class="site-title">ARCHI DESIGN</h1>
							<small class="site-description"></small>
						</div>
					</a> <!-- #branding -->

					<!-- Default snippet for navigation -->
					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.html">Home</a></li>
							<li class="menu-item current-menu-item"><a href="ourProjects.php">Our Projects</a></li>
							<li class="menu-item"><a href="about.html">About</a></li>
							<li class="menu-item"><a href="contact.html">Contact</a></li>
						</ul> <!-- .menu -->
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</div> <!-- .site-header -->

			<main class="main-content">
				
				<div class="page">
					<div class="container">
						<h2 class="entry-title">adipiscing elit sed do eiusmod tempor incididunt.</h2>
						<p>Dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p>
						<!---->
                        <?php if ($projects && count($projects) > 0): ?>
                            <div class="filter-links filterable-nav">
                                <select class="mobile-filter">
                                    <option value="*">Show all</option>
                                    <option value=".skyscraper">skyscraper</option>
                                    <option value=".shopping-center">shopping-center</option>
                                    <option value=".apartment">apartment</option>
                                </select>
                                <a href="#" class="current wow fadeInRight" data-filter="*">Show all</a>
                                <a href="#" class="wow fadeInRight" data-wow-delay=".2s" data-filter=".skyscraper">skyscraper</a>
                                <a href="#" class="wow fadeInRight" data-wow-delay=".4s" data-filter=".shopping-center">shopping-center</a>
                                <a href="#" class="wow fadeInRight" data-wow-delay=".6s" data-filter=".apartment">apartment</a>
                            </div>
                            <div class="filterable-items">
                                <?php foreach ($projects  as $project): ?>
                                    <div class="project-item filterable-item shopping-center">
                                        <figure class="featured-image">
                                            <a href="viewProject.php"><img src="images/projects/<?=$project["image_name"]?>" alt="#"></a>
                                            <figcaption>
                                                <h2 class="project-title"><a href="viewProject.php"><?=$project["name"]?></a></h2>
                                                <p><?=$project["description"]?></p>
                                                <a class="button" href="">More</a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php else: ?>
                                <h1>No Projects Here!</h1>
                        <?php endif; ?>

					</div>
				</div> <!-- .page -->

			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<div class="pull-left">

						<address>
							<strong>ARCHI DESIGN</strong>
							<p>532 Avenue Street, Omaha</p>
						</address>

						<a href="#" class="phone">+ 1 800 931 033</a>
					</div> <!-- .pull-left -->
					<div class="pull-right">

						<div class="social-links">

							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>

						</div>

					</div> <!-- .pull-right -->

					<div class="colophon">Copyright 2014 ARCHI DESIGN. Designed by <a href="http://www.vandelaydesign.com/" title="Designed by VandelayDesign.com" target="_blank">VandelayDesign.com</a>. All rights reserved.</div>

				</div> <!-- .container -->
			</footer> <!-- .site-footer -->
		</div>

		<script src="../js/jquery-1.11.1.min.js"></script>
		<script src="../js/plugins.js"></script>
		<script src="../js/app.js"></script>
		
	</body>

</html>