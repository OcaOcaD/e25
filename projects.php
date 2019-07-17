<?php 
    $pestaña = "projects";
    if( !isset($_GET['c']) && !isset($_GET['p']) ) {
        //NOT CATEGORY AND NOT PROJECT
        $category = null;
        $project = null;
        
    }
    if( isset( $_GET['c']) && $_GET['c'] != null && !isset($_GET['p']) ){
        //CATEGORY BUT NO PROJECT
        $category = $_GET['c'];
        $project   = null;
    }
    if ( isset($_GET['c']) && isset($_GET['p']) ){
        //Category and project are selectet
        $category = $_GET['c'];
        $project  = $_GET['p'];
    }  
    echo "<input class='info' type='text' style='display: none' name='".$category."' value='".$project."' >";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("src/headers.html"); ?>
    <link rel="stylesheet" href="utilities/fontAwesome_css/all.css">
    <link rel="stylesheet" href="projects.css">
    <link rel="stylesheet" href="components/navbar/navbar.css">
    <link rel="stylesheet" href="components/navbar/navbar-sm.css">
    <link rel="stylesheet" href="components/backdrop/backdrop.css">
    <link rel="stylesheet" href="components/sideDrawer/sideDrawer.css">
    <link rel="stylesheet" href="components/portfolio/portfolio.css">
    <link rel="stylesheet" href="components/portfolio/categoryShower.css">
    <link rel="stylesheet" href="components/portfolio/categoryShower-sm.css">
    <link rel="stylesheet" href="components/portfolio/showProject.css">
    <link rel="stylesheet" href="components/portfolio/showProject-sm.css">
    <link rel="stylesheet" href="components/projectCarousel/projectCarousel.css">
    <link rel="stylesheet" href="components/otherProjects/otherProjects.css">

    <link rel="stylesheet" href="components/footer/footer.css">
    <title>ESTANCIA 25</title>
</head>
<body>
    <?php
    include("components/navbar/navbar.php");
    include("components/backdrop/backdrop.html");
    include("components/sideDrawer/sideDrawer.php");
    echo "<div class='projectMainContainer'></div>";
    

    include("components/footer/footer.html");
    
    
    ?>
    <!--Adding some javascript for components here-->
    <script src="utilities/jquery.js"></script>
    <script src="projects.js"></script>
</body>
</html>