<?php 
    include("utilities/db.php");
    $category    = $_POST['category'];
    $cover       = $_POST['cover'];
    $cover = (int)$cover;
    $title       = $_POST['title'];
    $description = $_POST['description'];
    if ( $cover == "none" ){
        $cover = -1;
    }
    //We got the new info. Now lets updte the category table
    $upcat_query = " UPDATE e25_category SET name = '{$title}', description='{$description}', cover={$cover} WHERE id_category = {$category}";
    $upcat = mysqli_query($connection, $upcat_query);
    mysqli_close($connection);
    if ( $upcat ){
        header("location:manage.php");
    }else{
        echo "No se pudo, bro<br>";
        echo $upcat_query;
    }
?>