<?php 
    $pestaña = "index";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("src/headers.html"); ?>
    <link rel="stylesheet" href="utilities/fontAwesome_css/all.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="components/navbar/navbar.css">
    <link rel="stylesheet" href="components/navbar/navbar-sm.css">
    <link rel="stylesheet" href="components/backdrop/backdrop.css">
    <link rel="stylesheet" href="components/sideDrawer/sideDrawer.css">
    <link rel="stylesheet" href="components/carousel/carousel.css">
    <link rel="stylesheet" href="components/carousel/carousel-sm.css">
    <link rel="stylesheet" href="components/us/us.css">
    <link rel="stylesheet" href="components/cardlist/cardlist.css">
    <link rel="stylesheet" href="components/cardlist/cardlist-sm.css">
    <link rel="stylesheet" href="components/contact/contact.css">
    <link rel="stylesheet" href="components/contact/contact-sm.css">

    <link rel="stylesheet" href="components/footer/footer.css">
    <title>ESTANCIA 25</title>
</head>
<body>
    <?php
    include("components/navbar/navbar.php");
    include("components/backdrop/backdrop.html");
    include("components/sideDrawer/sideDrawer.php");
    include("components/carousel/carousel.html");
    include("components/us/us.html");
    include("components/cardlist/cardlist.php");
    include("components/contact/contact.php");
    
    include("components/footer/footer.html");
    
    
    ?>
    <!--Adding some javascript for components here-->
    <script src="utilities/jquery.js"></script>
    <script src="index.js"></script>
    <script src="components/carousel/carousel.js"></script>
</body>
</html>