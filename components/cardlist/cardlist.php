<?php
    include("components/card/card.php");
    /*$card_query = " SELECT * FROM project_categories WHERE 1 ";
    $card = mysqli_query($connection, $card_query);
    foreach ($card as $i => $c) {
        $aux_card = new Card;
        $c = mysqli_fetch_array( $card );
        var_dump($c);
        $aux_card.set_id( $c['id'] );
        $aux_card.set_title( $c['title'] );
        $aux_card.set_description( $c['description'] );
        $aux_card.set_img( $c['img'] );
    }
    */
$card=new SplDoublyLinkedList();
$aux_card = new Card;
    $aux_card->set_id( 1 );
    $aux_card->set_title( "Obra publica" );
    $aux_card->set_description( "Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la descriptsionè." );
    $aux_card->set_img( "img/project_categories/project1.jpg" );
    $aux_card->set_id_cat(1);
$card->push( $aux_card );
$aux_card = new Card;
    $aux_card->set_id( 2 );
    $aux_card->set_title( "Obra privada" );
    $aux_card->set_description( "Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la descriptsionè." );
    $aux_card->set_img( "img/project_categories/project2.jpg" );
    $aux_card->set_id_cat(2);
$card->push( $aux_card );
$aux_card = new Card;
    $aux_card->set_id( 3 );
    $aux_card->set_title( "Renta e instalación de andamios" );
    $aux_card->set_description( "Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la descriptsionè." );
    $aux_card->set_img( "img/project_categories/project4.jpg" );
    $aux_card->set_id_cat(3);
$card->push( $aux_card );
$aux_card = new Card;
    $aux_card->set_id( 4 );
    $aux_card->set_title( "Estructuras de acero" );
    $aux_card->set_description( "Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la descriptsionè." );
    $aux_card->set_img( "img/project_categories/project3.jpg" );
    $aux_card->set_id_cat(4);
$card->push( $aux_card );
?>
<div id="services" class="cardlist">
    <div class="cardlist__title">
        <h1>¿Qué hacemos?</h1>
    </div>
    <div class="cardlist__container">
        <?php
        for ( $i = 0; $i <= sizeof( $card )-1; $i++ ){
        ?>
            <div class="card" name="<?php echo $card[$i]->get_id_cat()?>" onclick="redirectTo(this.name)">
                <div class="card-img">
                    <img src="<?php echo $card[$i]->get_img() ?>" alt="None" class="card-img__img"/>
                </div>
                <div class="card-info">
                    <h1 class="card-title"><?php echo $card[$i]->get_title() ?></h1>
                    <h3><?php echo $card[$i]->get_description() ?></h3>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <button onclick="window.location = 'projects.php'" class="cardlist__more">VER TODOS</button>
</div> 
<script>
    function redirectTo(categoryID){
    console.log(categoryID);
    //window.location = 'projects.php?c='+categoryID;
}
</script>