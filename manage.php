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
                //JAIO¨ddofsdafsdf
                /*
                $cat_id = $aux_card->get_id_cat();
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
                    ep.category = {$cat_id}";
                $eProj = mysqli_query($connection, $cProj_query);
                echo $cProj_query."<br>";
                if ( $eProj ){
                    $eProj_rows = mysqli_num_rows($eProj);
                    $cl = new SplDoublyLinkedList();
                    if( $eProj_rows >0 ){
                        var_dump($eProj);
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
                    echo "Ajá y ahora...el siguiente";
                }else{
                    echo $cProj_query."<br>";
                    echo "nomia";
                }
                */
        }
    }

    //HOLAOAHOAJAOHAOHAOAHOA

                        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="manage.css">
    <title>Project manager</title>
</head>
<body>
    <div class="body__container">
        <legend><h1>Categorías</h1></legend>
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
                <form class="manage__form" action="manage__update.php" method="POST">
                    <tr class="table__category__row">
                        <td class="cover">
                            <div class="cover__container">
                                <img src="img/projects/<?php echo $cl[$i]->get_img(); ?>.jpg" alt="None" class="cover__img"/>
                            </div>
                            <input class="cover_input_default" type="text" style="display:none" value="<?php echo $cl[$i]->get_id()?>">
                            <select class="cover__selector cover_input" name="cover">
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
                            <button onclick="discardCategory(this.name)" name="<?php echo $cl[$i]->get_id_cat(); ?>" class="btn btn-sm btn-warning">Descartar cambios</button>
                        </td>
                    </tr>
                    <input name="category" value="<?php echo $cl[$i]->get_id_cat(); ?>" type="text" style="display: none">
                </form>
                <?php
                }
                ?>
            </tbody>
        </table>
        <legend><h1>Proyectos</h1></legend>
        <?php include("utilities/management/manage_projects.php"); ?>
        <table class="projects">
                
        </table>

    </div>
    <script>
        function discardCategory(category){
            console.log("category"+category);
            event.preventDefault();
            var cover_class="cover_input_default";
            var title_class="title_input";
            var description_class="description_input";
            items = document.getElementsByClassName('cover_input');
            interest = items[category-1];
            actual_value = items[category-1].value;
            default_value =  document.getElementsByClassName(cover_class)[category-1].value;
            console.log("Valor actual: "+actual_value);
            console.log("Valor inicial: "+default_value);
            console.log(items[category-1]);
            items[category-1].value = default_value;

            items = document.getElementsByClassName(title_class);
            actual_value = items[category-1].value;
            default_value = items[category-1].placeholder;
            console.log("Valor actual: "+actual_value);
            console.log("Valor inicial: "+default_value);
            console.log(items[category-1]);
            document.getElementsByClassName(title_class)[category-1].value = default_value; 

            items = document.getElementsByClassName(description_class);
            actual_value = items[category-1].value;
            default_value = items[category-1].placeholder;
            console.log("Valor actual: "+actual_value);
            console.log("Valor inicial: "+default_value);
            document.getElementsByClassName(description_class)[category-1].value = default_value;

        }
    </script>
</body>
</html>