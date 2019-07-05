<?php 
    include("../../utilities/db.php");
    include("../card/card.php");
    $c = $_POST['category'];
    $p = $_POST['project'];
    //echo "MOSTRANDO A DETALLE EL PROJECTO ".$p."<br>";
    //Download teh project information
    $cProj_query = "SELECT * FROM
                        e25_project 
                    WHERE
                        id_project = {$p}  ";
    //echo $cProj_query."<br>";   
    $eProj = mysqli_query($connection, $cProj_query);
    //var_dump($eProj);
    if ( $eProj ){
        $eProj_rows = mysqli_num_rows($eProj);
        //For each project of that category build a Card
        $eP = mysqli_fetch_array($eProj, MYSQLI_ASSOC);
        $aux_card = new Card;
        $aux_card->set_id( $eP['id_project'] );
        $aux_card->set_title( $eP['name'] );
        $aux_card->set_description( $eP['description'] );
        $aux_card->set_img( $eP['img'] );
    }
    //Download the project images
    $images_query = " SELECT * FROM e25_images WHERE project_id = {$p}";
    $images = mysqli_query($connection, $images_query);
    if ( $images ){
        $images_rows = mysqli_num_rows($images);
        $il = new SplDoublyLinkedList;
        for ($i=0; $i < $images_rows; $i++) { 
            $i_name = mysqli_fetch_array($images);
            $image = $i_name['name'];
            $il->push($image);
        }
    }
?>
<div class="showP">
    <div class="showP__project">
        <div class="showP__media">
            <?php include("../projectCarousel/projectCarousel.php"); ?>
        </div>
        <div class="showP__info">
            <h1 cl class="showP__title"><?php echo $aux_card->get_title() ?></h1>
            <div class="showP__separator__container">
                <hr class="showP__separator">

            </div>
            <p class="showP__description" ><?php echo $aux_card->get_description() ?></p>
        </div>
    </div>
    <div class="showP__others">
        <!--CArousel con sugerencias-->
    </div>
</div>