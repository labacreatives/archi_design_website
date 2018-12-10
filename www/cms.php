<?php
/**
 * Created by PhpStorm.
 * User: ADONIAS
 * Date: 12/3/2018
 * Time: 12:15 PM
 */
require_once ('../CMS/Input.php');
require_once ('../CMS/project-controller.php');
require_once('../CMS/Validation.php');
require_once ('../CMS/Session.php');


if(!Session::exists('user_id')){
    $signinPage = pathinfo($_SERVER['SCRIPT_NAME'])["filename"];
    header("Location:signin.php?redirected-from={$signinPage}&message=Please+signin+first");
}

$Project_manager = ProjectManager::getInstance();
$Projects = $Project_manager->getProjects();
?>

<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Modern Architecture | Contact</title>

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

            <div class="mobile-navigation"></div>
        </div>
    </div> <!-- .site-header -->

    <main class="main-content">
        <div class="page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-form">
                            <h2 class="section-title">Projects</h2>
                            <div class="container">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($projects as $project):?>
                                            <tr>
                                                <td class="noBorder"><?=$project["name"]?></td>
                                                <td class="noBorder"><?=$project["client"]?></td>
                                                <td class="noBorder"><?=$project["price"]?></td>
                                                <td class="noBorder"><?=$project-["description"]?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .page -->

    </main> <!-- .main-content -->

</div>

<script src="../js/jquery-1.11.1.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script src="../js/plugins.js"></script>
<script src="../js/app.js"></script>

</body>
</html>
