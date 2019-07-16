<?php
    include("components/card/card.php");
    include("utilities/db.php");
    $category_query = " SELECT
    c.id_category,
    c.name,
    c.description,
    p.img AS cover
    FROM
        e25_category AS c
    LEFT JOIN
        e25_project AS p
    ON
        c.cover = p.id_project
    WHERE 1 ";
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
        <h1>¿Qué hacemos?</h1>
    </div>
    <div class="cardlist__container">
        <?php
            for ( $i = 0; $i <= sizeof( $cl )-1; $i++ ){
            ?>
                <div id="<?php echo $cl[$i]->get_id() ?>" class="card" onclick="selectCategory(this.id)">
                    <div class="card__shadow"></div>
                    <div class="card__container">
                        <div class="card-img">
                            <img src="img/projects/<?php echo $cl[$i]->get_img(); ?>.jpg" alt="None" class="card-img__img"/>
                        </div>
                        <div class="card-info">
                            <h1 class="card-title"><?php echo $cl[$i]->get_title() ?></h1>
                            <h3 class="card-desc"><?php echo $cl[$i]->get_description() ?></h3>
                        </div>
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