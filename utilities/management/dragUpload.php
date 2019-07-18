<?php 
    if( isset( $_FILES['file']['name'][0] ) ){
        $size = $_POST['size'];
        include("../db.php");
        for( $i = 0; $i < $size; $i++ ){
            $file_name  = $_FILES['file']['name'][$i];
            $file_tmp   = $_FILES['file']['tmp_name'][$i];
            $file_size  = $_FILES['file']['size'][$i];
            $file_error = $_FILES['file']['error'][$i];
            $file_type  = $_FILES['file']['type'][$i];
            echo $file_name."<br>";
            $file_ext = explode('.',$file_name);
            $fileEXT = strtolower(end($file_ext));
            $allowed = array('jpg', 'jpeg', 'png');
            if ( in_array( $fileEXT, $allowed ) ){
                //Valid extension
                if ( $file_error === 0 ){
                    if ( $file_size < 2000000 ){
                        $file_name_new = uniqid('',true).".".$fileEXT;
                        $file_destination = '../../img/projects/'.$file_name;
                        if (move_uploaded_file($file_tmp,$file_destination) ){
                            //We validated and moved the image. Now insert the project info
                            $insert_query = " INSERT INTO e25_images(project_id, name) VALUES ({$_POST['project_id']}, '{$file_ext[0]}' ) ";
                            $insert = mysqli_query($connection, $insert_query);
                            if( $insert ){
                                //echo "NICE INSERT QUERY<br>";
                            }else{
                                //echo "BAD INSERT QUERY<br>";
                            }
                        }else{
                            //echo "buuuh";
                            //echo print_r($_FILES);
                        }
                    }else{
                        //echo "Your file is too big. Please be lesser than 2000000<br>";
                    }
                } else{
                    //echo "There was some type of error when uploading your file<br>";
                }
            } else{
                //echo "You cannot upload this type of file<br>";
            }
        }
        mysqli_close($connection);
    }
?>