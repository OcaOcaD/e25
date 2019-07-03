<?php 
include("../../utilities/db.php");
include("../card/card.php");
$category_query = " SELECT * FROM e25_category WHERE 1 ";
$category = mysqli_query($connection, $category_query);
if ( $category ){
    $category_rows = mysqli_num_rows( $category );
    $cl = new SplDoublyLinkedList();
    for ( $i = 0; $i < $category_rows; $i++ ){
        $c = mysqli_fetch_array( $category, MYSQLI_ASSOC );
        $aux_card = new Card;
        $aux_card->set_id( $c['id_category'] );
        $aux_card->set_title( $c['name'] );
        $aux_card->set_description( $c['description'] );
        $aux_card->set_img( $c['cover'] );
        $cl->push( $aux_card );
    }
}   
?>
<div id="services" class="cardlist">
    <div class="cardlist__title">
        <h1>Selecciona un portafolio</h1>
    </div>
    <div class="cardlist__container">
        <?php
        for ( $i = 0; $i <= sizeof( $cl )-1; $i++ ){
        ?>
            <div id="<?php echo $cl[$i]->get_id() ?>" class="card" onclick="selectCategory(this.id)">
                <div class="card-img">
                    <img src="img/project_categories/<?php echo $cl[$i]->get_img(); ?>.jpg" alt="None" class="card-img__img"/>
                </div>
                <div class="card-info">
                    <h1 class="card-title"><?php echo $cl[$i]->get_title() ?></h1>
                    <h3><?php echo $cl[$i]->get_description() ?></h3>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div> 