<?php 
    include("utilities/db.php");
    include("utilities/bootstrapCDN.html");
    include("components/card/card.php");
    $category_query = "SELECT
                        c.id_category,
                        c.name,
                        c.description,
                        c.cover AS cover_id,
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
            $aux_card->set_id_cat( $c['id_category'] );
            $aux_card->set_id( $c['cover_id'] );
            $aux_card->set_title( $c['name'] );
            $aux_card->set_description( $c['description'] );
            $aux_card->set_img( $c['cover'] );
            $cl->push( $aux_card );
        }
    }          
?>
<table class="table table-responsive-sm table-striped categories">
    <thead class="thead-dark">
        <tr>
            <th class="cover">Portada</th>
            <th class="title">Categoría</th>
            <th class="description">Descripción</th>
            <th class="changes">Guardar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ( $i = 0; $i <= sizeof( $cl )-1; $i++ ){
            //Create a list with the projects of this category
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
                ep.category = {$cl[$i]->get_id_cat()}";
            $cProj = mysqli_query($connection, $cProj_query);
            //echo $cProj_query."<br>";
            if( $cProj ){
                //echo "toocul<br>";
                $cProj_rows = mysqli_num_rows($cProj);
                $pl = new SplDoublyLinkedList();
                if( $cProj_rows >0 ){
                    //echo "Más de uno<br>";
                    for( $j = 0; $j < $cProj_rows; $j++ ){
                        //Por cada projyecto de cla categoría...
                        $eP = mysqli_fetch_array($cProj, MYSQLI_ASSOC);
                        $aux_card = new Card;
                        $aux_card->set_id( $eP['idp'] );
                        $aux_card->set_title( $eP['pname'] );
                        $aux_card->set_description( $eP['description'] );
                        $aux_card->set_img( $eP['img'] );
                        $aux_card->set_id_cat( $eP['id_category'] );
                        $pl->push( $aux_card );
                        $category = $eP['cname'];
                    }
                    
                }else{
                    //echo "Empty<br>";
                }
            }
        ?>
            <tr class="table__category__row">
            <form class="manage__form" action="manage__update.php" method="POST">
                <td class="cover">
                    <div class="cover__container">
                        <img src="img/projects/<?php echo $cl[$i]->get_img(); ?>.jpg" alt="None" class="cover__img"/>
                    </div>
                    <input class="cover_input_default" type="text" style="display:none" value="<?php echo $cl[$i]->get_id()?>">
                    <select class="cover__selector cover_input" name="cover">
                        <option value="<?php echo $cl[$i]->get_id()?>"><?php echo $cl[$i]->get_img() ?>(Actual)</option>
                        <option value="none">None</option>
                        <?php 
                        for ($k=0; $k < sizeof($pl) ; $k++) { 
                            echo "<option value='".$pl[$k]->get_id()."'>".$pl[$k]->get_title()."</option>";
                        }
                        ?>
                    </select>
                </td>
                <td class="title">
                    <input name="title" class="full__input title_input" type="text" placeholder="<?php echo $cl[$i]->get_title() ?>" value="<?php echo $cl[$i]->get_title() ?>">
                </td>
                <td class="description">
                    <textarea name="description" class="full__input description_input" rows="3" type="text" placeholder="<?php echo $cl[$i]->get_description()?>" value="<?php echo $cl[$i]->get_description() ?>"><?php echo $cl[$i]->get_description() ?></textarea>
                </td>
                <td class="changes">
                    <button type="submit" class="btn btn-sm btn-success">Guardar cambios</button>
                    <button onclick="discardCategory(this.name)" name="<?php echo $cl[$i]->get_id_cat(); ?>" class="discard__button btn btn-sm btn-warning">Descartar cambios</button>
                </td>
                <input name="category" value="<?php echo $cl[$i]->get_id_cat(); ?>" type="text" style="display: none">
            </form>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>