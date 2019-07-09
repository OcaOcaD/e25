<?php 
    include("../../utilities/db.php");
    include("../card/card.php");
    $c = $_POST['category'];
    $cProj_query = "SELECT 
                    ep.id_project AS idp,
                    ep.name AS pname,
                    ep.description,
                    ep.img,
                    ep.category,
                    ec.id_category,
                    ec.name AS cname
                    FROM
                        e25_project AS ep 
                    LEFT JOIN 
                        e25_category AS ec
                    ON ep.category = ec.id_category
                    WHERE
                        ep.category = {$c}  ";
    $eProj = mysqli_query($connection, $cProj_query);
    if ( $eProj ){
        $eProj_rows = mysqli_num_rows($eProj);
        $cl = new SplDoublyLinkedList();
        for ($i=0; $i < $eProj_rows; $i++) { 
            //For each project of that category build a Card
            $eP = mysqli_fetch_array($eProj, MYSQLI_ASSOC);
            $aux_card = new Card;
            $aux_card->set_id( $eP['idp'] );
            $aux_card->set_title( $eP['pname'] );
            $aux_card->set_description( $eP['description'] );
            $aux_card->set_img( $eP['img'] );
            $aux_card->set_id_cat( $eP['id_category'] );
            $cl->push( $aux_card );
            $category = $eP['cname'];
        }
    }
?>
<div class="cProj">
    <div class="cProj__title">
        <h1><?php echo $category ?></h1>
    </div>
    <?php
    $k = 0;
    while( isset($cl[$k]) && $cl[$k] != null ){ ?>
    <div name="<?php echo $k?>" class="cproj__row">

            <?php
            for ( $j = 0; $j <= 3 && ( isset($cl[$k]) && $cl[$k] != null ) ; $j++ ){
            ?>
                <div id="" class="project__container">
                    <div class="project__container__top">
                        <img class="project__container__img" src="img/projects/<?php echo $cl[$k]->get_img()?>.jpg" alt="">
                        <button id="<?php echo $cl[$k]->get_id()?>" name="<?php echo $cl[$k]->get_id_cat(); ?>" class="project__details" onclick="selectProject(this.name, this.id)">
                            VER DETALLES
                        </button>
                        <div class="project__shadow"></div> 
                    </div>
                    <div class="project__container__bottom">
                        <h3><?php echo $cl[$k]->get_title() ?></h3>
                    </div>    
                </div>

            <?php $k++;
            } ?>


    </div>
    <?php } ?>
</div>