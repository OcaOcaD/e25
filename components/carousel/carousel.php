<?php 
    include("utilities/db.php");
    $carousel_q = " SELECT * FROM `e25_carousel` WHERE 1 ";
    $carousel = mysqli_query($connection, $carousel_q);
    if ( $carousel ){
        $carousel_r = mysqli_num_rows($carousel);
        $cl = new SplDoublyLinkedList;
        for ($i=0; $i < $carousel_r ; $i++) { 
            $carousel_d = mysqli_fetch_array($carousel);
            $cl->push($carousel_d['name']);
        }
    }
    mysqli_close($connection);
?>
<div id="carousel" class="carousel-wrapper">
    <div class="carousel">
        <?php
        for ( $i = 0; $i < sizeof($cl); $i++ ){
            $initial = ( $i == 0 ) ? " initial" : null;
            echo "<img class='carousel__photo".$initial."' src='img/carousel/".$cl[$i]."'>";
        }
        ?>   
        <div class="carousel__button--next"></div>
        <div class="carousel__button--prev"></div>
    </div>
</div>