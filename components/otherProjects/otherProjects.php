<?php 
        include("../../utilities/db.php");
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
<div class="projectRelated">
    <?php 
    $w = 100 / sizeof($cl);
    for ($i=0; $i < sizeof($cl); $i++) { 
        ?>
        <div class="related" style="width: <?php echo $w ?>%;">
            <div class="related__img">
                <img class="related__img__img" src="img/projects/<?php echo $cl[$i]->get_img()?>.jpg" alt="Similar project not found">
            </div>
            <button id="<?php echo $cl[$i]->get_id() ?>" onclick="selectProject(this.name, this.id)" name="<?php echo $c?>" class="related__buttton"><?php echo $cl[$i]->get_title() ?></button>
            <div class="related__shadow"></div>
        </div>
        <?php 
    }
    ?>
</div>