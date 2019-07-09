<?php 
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="manage.css">
    <link rel="stylesheet" href="utilities/management/manage_categories.css">
    <link rel="stylesheet" href="utilities/management/manage_projects.css">
    <title>Project manager</title>
</head>
<body>
    <div class="body__container">
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
        <?php //include("utilities/management/manage_projects.php"); ?>


    </div>
    <script>
        $(document).ready(function() {
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
            const projectView = document.getElementsByClassName('projectMainContainer');
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