<?php     
include("utilities/db.php");
$k = 0;
    for( $i = 0; $i < 4; $i++ ){
        for ($j=0; $j < 5; $j++) { 
            $insert_query = "INSERT INTO e25_project(name, description, img, category) VALUES ('Project {$k}','Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.','project{$k}','{$j}')";
            $insert = mysqli_query($connection, $insert_query);
            $k++;
        }
    }
?>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.</p>