<?php 
    include("utilities/db.php");
    if ( isset($_POST['submit__new']) ){

        $file = $_FILES['nu__cover'];

        $file_name  = $_FILES['nu__cover']['name'];
        $file_tmp   = $_FILES['nu__cover']['tmp_name'];
        $file_size  = $_FILES['nu__cover']['size'];
        $file_error = $_FILES['nu__cover']['error'];
        $file_type  = $_FILES['nu__cover']['type'];
        echo "FILENAME: ".$file_name."<br>";
        $file_ext = explode('.',$file_name);
        $fileEXT = strtolower(end($file_ext));
        $allowed = array('jpg', 'jpeg', 'png');
        if ( in_array( $fileEXT, $allowed ) ){
            //Valid extension
            if ( $file_error === 0 ){
                if ( $file_size < 2000000 ){
                    $file_name_new = uniqid('',true).".".$fileEXT;
                    $file_destination = 'img/projects/'.$file_name;
                    echo $file_destination."<br>";
                    if (move_uploaded_file($file_tmp,$file_destination) ){
                        echo "success1";
                        //We validated and moved the image. Now insert the project info
                        $nu__name = $_POST['nu__name'];
                        $nu__desc = $_POST['nu__desc'];
                        $category = $_POST['nu__cat'];
                        $insert_query = " INSERT INTO e25_project(name, description, img, category) VALUES ('{$nu__name}', '{$nu__desc}', '{$file_ext[0]}','{$category}') ";
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
    }
    mysqli_close($connection);
    header("location:manage.php");
?>