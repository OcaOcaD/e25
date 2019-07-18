<?php 
    include("../../utilities/db.php");
    include("../../components/card/card.php");
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
        ep.category = {$c}";
    $cProj = mysqli_query($connection, $cProj_query);
    //echo $cProj_query."<br>";
    if( $cProj ){
        //echo "toocul<br>";
        $cProj_rows = mysqli_num_rows($cProj);
        $pl = new SplDoublyLinkedList();
        if( $cProj_rows >0 ){
            //echo "Más de uno<br>";
            for( $j = 0; $j < $cProj_rows; $j++ ){
                //Por cada projecto de cla categoría...
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
        }
    }

?>
<form class="projects__form" action="newProject.php" method="POST" enctype="multipart/form-data">
<table class="projects table table-responsive-sm table-striped categories">
    <thead class="thead-dark">
        <tr>
            <th class="pcover">Portada</th>
            <th class="pname">Nombre</th>
            <th class="pdesc">Descripción</th>
            <!--<th class="porder">Orden</th>-->
            <th class="pchanges">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <tr class="pnewp">
            <td class="pcover"> 
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input name="nu__cover" type="file" class="custom-file-input nu__cover" id="inputGroupFile03">
                        <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                    </div>
                </div>
            </td>
            <td class="pname">
                <input name="nu__name" type="text" class="nu__name" placeholder="Nombre del proyecto">
            </td>
            <td class="pdesc">
                <textarea name="nu__desc" rows="4" type="text" class="nu__desc" placeholder="Escribe aquí una descripción"></textarea>
            </td>
            <input name="nu__cat" type="text"value="<?php echo $c?>" style="display:none;">
            <!--
            <td class="porder">
                <label for="">Last</label>
            </td>
            -->
            <td class="pchanges">
                <button onclick="//addProject(this.name)" type="submit" name="submit__new" class="addProject">Agregar</button>  
            </td>
        </tr>
        <?php 
        for( $j = 0; $j < sizeof($pl); $j++ ){
            //Download the project images
            $images_query = " SELECT * FROM e25_images WHERE project_id = {$pl[$j]->get_id()}";
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
            <tr>
                <td class="pcover">
                    <div class="pcover__container">
                        <input name="default__pid__input" class="default__pid__input" type="text" style="display: none" value="<?php echo $pl[$j]->get_id() ?>" >
                        <input name="default__img__input" class="default__img__input" type="text" style="display: none" value="<?php echo $pl[$j]->get_img() ?>" >
                        <div class="pcover__selector">
                            <select name="pcover" class="pcover_input" id="">
                                <option value="<?php echo $pl[$j]->get_img()?>"><?php echo $pl[$j]->get_img()?></option>
                                <?php 
                                for ($k=0; $k < sizeof($il) ; $k++) { 
                                    echo "<option value='".$il[$k]."'>".$il[$k]."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="pcover__img">
                            <img src="img/projects/<?php echo $pl[$j]->get_img(); ?>.jpg" alt="None" class="pcover__img__img"/>
                        </div>
                    </div>
                </td>
                <td class="pname">
                    <input name="pname" class="full__input pname_input" value="<?php echo $pl[$j]->get_title() ?>" placeholder="<?php echo $pl[$j]->get_title() ?>" type="text">
                </td>
                <td class="pdesc">
                    <textarea name="pdesc" class="full__input pdesc_input" rows="4" type="text" placeholder="<?php echo $pl[$j]->get_description()?>" value="<?php echo $pl[$j]->get_description() ?>"><?php echo $pl[$j]->get_description() ?></textarea>
                </td>
                <!--<td class="porder">
    
                </td>-->
                <td class="pchanges pchanges__td">
                    <div class="changes__buttons">
                        <div class="flevel">
                            <button onclick="updateProject(this.name)" name="<?php echo $j ?>" class="btn btn-sm btn-success update__button">Guardar cambios</button>
                            <button onclick="discardProject(this.name)" name="<?php echo $j ?>" class="btn btn-sm btn-warning erase__button">Descartar cambios</button>
                        </div>
                        <button onclick="deleteProject(this.name)" name="<?php echo $pl[$j]->get_id(); ?>" class="btn btn-sm btn-danger discard__button">Borrar</button>
                    </div>
                    <div class="drag__container">
                        <div class="drag__area">
                            <small id="<?php echo $j ?>" name="<?php echo $pl[$j]->get_id() ?>">Arrastra las imagenes del proyecto aquí</small>
                            <input type="text" id="<?php echo $pl[$j]->get_id() ?>" name="project_id" class="project_ids" style="display:none">
                        </div>
                        <div id="uploaded_files" class="drag__files">
                                
                        </div>
                        <!--<button onclick="addImages(this.name)" name="<?php echo $pl[$j]->get_id(); ?>" class="btn btn-sm btn-primary images__button">Add images</button>-->
                    </div>
                </td>
                <input type="text" class="projectid" style="display:none" value="<?php echo $pl[$j]->get_id(); ?>">
            </tr>   
        <?php 
        } ?>
    </tbody>
</table>
</form>
<script src="utilities/management/dragArea.js" ></script>
<script>
    function discardProject(project){
        console.log("project"+project);
        var projectid = "default__pid__input";
        var cover_default_class ="default__img__input";        
        var cover_class="pcover_input";
        var title_class="pname_input";
        var description_class="pdesc_input";
            items = document.getElementsByClassName(cover_class);
            actual_value = items[project].value;
            default_value =  document.getElementsByClassName(cover_default_class)[project].value;
            console.log("Valor actual: "+actual_value);
            console.log("Valor inicial: "+default_value);
            items[project].value = default_value;
            items = document.getElementsByClassName(title_class);
            actual_value = items[project].value;
            default_value = items[project].placeholder;
            console.log("Valor actual: "+actual_value);
            console.log("Valor inicial: "+default_value);
            document.getElementsByClassName(title_class)[project].value = default_value; 

            items = document.getElementsByClassName(description_class);
            actual_value = items[project].value;
            default_value = items[project].placeholder;
            console.log("Valor actual: "+actual_value);
            console.log("Valor inicial: "+default_value);
            document.getElementsByClassName(description_class)[project].value = default_value;
    }
    /*function addImages(this.name){
        window.location = 'utilities/management/addImages.php?p='+project;
    }*/
    function deleteProject(project){
        console.log("DELETING THE PROJECT "+ project);
        var r = confirm("¿De verdad quieres borrar "+project+"?");
        if (r == true) {
            console.log("You pressed OK!");
            window.location = 'utilities/management/deleteProject.php?p='+project;
        } else {
            console.log("You pressed Cancel!");
        }
        
    }
    function updateProject(project){
        console.log("UPDATE project"+project);
        cover = "pcover_input";
        name = "pname_input";
        desc = "pdesc_input";
        pid = "projectid";
        items = document.getElementsByClassName(cover);
        cover_info = items[project].value;
        console.log(cover_info);

        items = document.getElementsByClassName(name);
        name_info = items[project].value;
        console.log(name_info);

        items = document.getElementsByClassName(desc);
        desc_info = items[project].value;
        console.log(desc_info);

        items = document.getElementsByClassName(pid);
        pid_info = items[project].value;
        console.log(pid_info);

        window.location = 'utilities/management/updateProject.php?cover='+cover_info+'&name='+name_info+'&desc='+desc_info+'&pid='+pid_info;
    }


</script>