<?php 
$temp = $_POST['Imgname'];
include("../db.php");
$delete_img_query = " DELETE FROM `e25_carousel` WHERE id_img = {$temp} ";
$delete_img = mysqli_query($connection, $delete_img_query);
if( $delete_img ){
    echo $temp;
    
}else{
}
mysqli_close($connection);
?>