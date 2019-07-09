<?php 
    if ( isset($_GET['p']) ){
        $project = $_GET['p'];
        include("../../utilities/db.php");
        $dep_query = " DELETE FROM e25_project WHERE id_project = {$project} ";
        $dep = mysqli_query($connection, $dep_query);
        if( $dep ){
            echo "NICE DELETE QUERY<br>";
        }else{
            echo "BAD DELETE QUERY<br>";
        }
    }
    header("location:../../manage.php");
?>