<?php 
        include("utilities/db.php");
        include("utilities/Project.php");
        $cProj_query = "SELECT 
        id_project AS idp,
        name AS pname,
        description,
        img,
        category
        FROM
            e25_project
        WHERE 1";
        $projANDimages = mysqli_query($connection, $cProj_query);
        if( $projANDimages ){
            //echo "toocul<br>";
            $projANDimages_rows = mysqli_num_rows($projANDimages);
            $pl = new SplDoublyLinkedList;
            if( $projANDimages_rows >0 ){
                //echo "Más de uno<br>";
                for( $j = 0; $j < $projANDimages_rows; $j++ ){
                    //Por cada projecto...
                    $eP = mysqli_fetch_array($projANDimages, MYSQLI_ASSOC);
                    $project = new Project;
                    $project->set_id( $eP['idp'] );
                    $project->set_name( $eP['pname'] );
                    $project->set_cover( $eP['img'] );
                    //... y también sus imagenes
                    $images_query = " SELECT * FROM e25_images WHERE project_id = {$eP['idp']} ";
                    $images = mysqli_query($connection, $images_query);
                    if( $images ){
                        $images_rows = mysqli_num_rows($images);
                        for( $i = 0; $i <= $images_rows-1; $i++ ){
                            $ii = mysqli_fetch_array($images, MYSQLI_ASSOC);
                            $img_img = new Img;
                            $img_img->set_id_img( $ii['id_img'] );
                            $img_img->set_name( $ii['name'] );
                            $project->add_image( $img_img );
                        }
                    }
                    $pl->push( $project );
                }
            }
        }
        mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="utilities/jqueryUI/jquery-ui.css">
    <link rel="stylesheet" href="manage.css">
    <link rel="stylesheet" href="utilities/management/manage_categories.css">
    <link rel="stylesheet" href="utilities/management/manage_projects.css">
    <link rel="stylesheet" href="utilities/management/dragArea.css">
    <title>Project manager</title>
</head>
<body>
    <div class="body__container">
    <legend><h1>Contenido en carousel</h1></legend>
    <?php 
        include("utilities/db.php");
        $carousel_q = " SELECT * FROM `e25_carousel` WHERE 1 ";
        $carousel = mysqli_query($connection, $carousel_q);
        if ( $carousel ){
            $carousel_r = mysqli_num_rows($carousel);
            $carouselList = new SplDoublyLinkedList;
            for ($i=0; $i < $carousel_r ; $i++) { 
                $carousel_d = mysqli_fetch_array($carousel);
                $cari = new Img;
                $cari->set_id_img($carousel_d['id_img']);
                $cari->set_name($carousel_d['name']);
                $carouselList->push($cari);
            }
        }
    ?>
        <div class="carouselM">
           <ul class="carouselM_list">
                <?php
                    for ($car=0; $car < sizeof($carouselList); $car++) { 
                    ?>
                        <li class="carouselM__item">
                            <img class="carouselM_item__img" src="img/carousel/<?php echo $carouselList[$car]->get_name()?>" alt="not found">
                            <p class="carouselM_item__name"><?php echo $carouselList[$car]->get_name() ?></p>
                            <button onclick="handleDeleteCarousel(this.name)" name="<?php echo $carouselList[$car]->get_id_img() ?>" class="btn btn-danger btn-small">X</button>
                        </li>
                    <?php
                    }
                ?>
                <li>
                    <form action="utilities/management/carousel_add.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="image">
                        <button type="submit" class="btn btn-primary btn-sm">Agregar</button>
                    </form>
                </li>
           </ul>
        </div>
        <legend><h1>Proyectos y contenido</h1></legend>
        <div class="proj__and__images">
            <table class="proj__and__images_table table table-responsive-sm table-striped categories">
                <thead class="thead-dark proj__and__images_head">
                    <tr>
                        <th class="proj__and__images_project">Proyecto</th>
                        <th class="proj__and__images_images">Imagenes</th>
                    </tr>
                </thead>
                <tbody class="proj__and__images_body">
                    <?php for( $i = 0; $i < sizeof($pl); $i++ ){ ?>
                        <tr>
                            <td class="proj__and__images_project">
                                <div class="projContainer">
                                    <img class="projCover" src="img/projects/<?php echo $pl[$i]->get_cover() ?>.jpg" alt="" name="">
                                    <p class="projName"><?php echo $pl[$i]->get_name() ?></p>
                                </div>
                            </td>
                            <td class="proj__and__images_images">
                                <div class="imgList">
                                    <?php for( $j = 0; $j <= sizeof($pl[$i]->get_images())-1; $j++ ){ ?>
                                    <div class="imgContainer" style="width: auto">
                                        <img name="<?php echo $pl[$i]->get_imageAt($j)->get_id_img()?>" class="imgImg" src="img/projects/<?php echo $pl[$i]->get_imageAt($j)->get_name()?>.jpg" alt="">
                                        <button onclick="handleDeleteImage(this.name)" class="imgDelete btn btn-danger" name="<?php echo $pl[$i]->get_imageAt($j)->get_id_img()?>">X</button>
                                    </div>
                                    <?php }?>
                                </div>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>



        <legend><h1>Categorías</h1></legend>
        <?php include("utilities/management/manage_categories.php") ?>
        <legend><h1>Proyectos</h1></legend>
        <h2>Selecciona una categoría para editar sus proyectos</h2>
        <select onchange="changeProjectView(this.value)" class="category__selector" name="cover">
        <?php 
            for ( $i = 0; $i <= sizeof( $cl )-1; $i++ ){
                echo "<option value='".$cl[$i]->get_id_cat()."'>".$cl[$i]->get_title()."</option>";
            }
            
            ?>
        </select>
        <br>
        <div class="projectMainContainer">

        </div>
        <div class="projectImages">
            
        </div>
    </div>
    <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
    <!--<script src="utilities/jqueryUI/jquery-ui.js"></script>-->
    <script>
        function handleDeleteImage(id){
            console.log(id);
            let r //= confirm("Press a button!") ? true : false;
            r = true;
            if ( r ){
                $.ajax({      
                    type: "POST",
                    url: "utilities/management/proj_and_image_delete.php",
                    data: ({Imgname:id}),
                    success: function(data) {
                        //alert("Correctamente elimando. Actualiza para ver los cambios");
                    }
                })
            }
            
        }
        function handleDeleteCarousel(id){
            console.log(id);
            let r = confirm("¿Quieres borrar ésta imagen?") ? true : false;
            r = true;
            if ( r ){
                $.ajax({      
                    type: "POST",
                    url: "utilities/management/carousel_delete.php",
                    data: ({Imgname:id}),
                    success: function(data) {
                        alert("Correctamente elimando. Actualiza para ver los cambios");
                    }
                })
            }

        }
        $(document).ready(function() {



            let projectView = document.getElementsByClassName('projectMainContainer');
            $(projectView).load('utilities/management/manage_projects.php',{
                category: 1
            });

            $(document).on('click', '.discard__button',function(e) { 
                e.preventDefault();
            })
            $(document).on('click', '.erase__button',function(e) { 
                e.preventDefault();
            })
            $(document).on('click', '.update__button',function(e) { 
                e.preventDefault();
            })
        });
        function changeProjectView(c){
            console.log(c);
            let projectView = document.getElementsByClassName('projectMainContainer');
            $(projectView).load('utilities/management/manage_projects.php',{
                category: c
            });
        }

        function discardCategory(category){
            console.log("category"+category);
            var cover_class="cover_input_default";
            var title_class="title_input";
            var description_class="description_input";
            items = document.getElementsByClassName('cover_input');
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