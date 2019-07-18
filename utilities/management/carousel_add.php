<?php 
    
    if( isset(  $_FILES['image'] ) ){
        include("../db.php");
        $file = $_FILES['image'];

        $file_name  = $_FILES['image']['name'];
        $file_tmp   = $_FILES['image']['tmp_name'];
        $file_size  = $_FILES['image']['size'];
        $file_error = $_FILES['image']['error'];
        $file_type  = $_FILES['image']['type'];
        echo "FILENAME: ".$file_name."<br>";
        $file_ext = explode('.',$file_name);
        $fileEXT = strtolower(end($file_ext));
        $allowed = array('jpg', 'jpeg', 'png');
        if ( in_array( $fileEXT, $allowed ) ){
            //Valid extension
            if ( $file_error === 0 ){
                if ( $file_size < 2000000 ){
                    $file_name_new = uniqid('',true).".".$fileEXT;
                    $file_destination = '../../img/carousel/'.$file_name;
                    echo $file_destination."<br>";
                    if (move_uploaded_file($file_tmp,$file_destination) ){
                        echo "success1";
                        //We validated and moved the image. Now insert the project info
                        $insert_query = "INSERT INTO e25_carousel(name) VALUES ('{$file_name}')";
                        
                        $insert = mysqli_query($connection, $insert_query);
                        if( $insert ){
                            echo "NICE INSERT QUERY<br>";
                        }else{
                            echo "BAD INSERT QUERY<br>";
                        }
                    }else{
                        echo "buuuh";
                        echo print_r($_FILES);
                    }
                }else{
                    echo "Your file is too big. Please be lesser than 2000000<br>";
                }
            } else{
                echo "There was some type of error when uploading your file<br>";
            }
        } else{
            echo "You cannot upload this type of file<br>";
        }
    mysqli_close($connection);
    header("location:../../manage.php");
    }
?>