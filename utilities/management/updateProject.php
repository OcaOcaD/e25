<?php 
$cover = $_GET['cover'];
$name = $_GET['name'];
$desc = $_GET['desc'];
$pid = $_GET['pid'];

echo "Voy a actualizar el proyecto".$pid."con el nombre: ".$name."<br>";

include("../../utilities/db.php");
    //We got the new info. Now lets updte the category table
    $upproj_query = " UPDATE e25_project SET name = '{$name}', description = '{$desc}', img = '{$cover}' WHERE id_project = {$pid} ";
    $upproj = mysqli_query($connection, $upproj_query);
    mysqli_close($connection);
    if ( $upproj ){
        echo "NICE UPDATE QUERY<br>";
    }else{
        echo "Something happened O: <br>";
        echo $upproj_query;
    }
    mysqli_close($connection);
    header("location:../../manage.php");

?>