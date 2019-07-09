<?php     
include("utilities/db.php");

$carousel_dir = scandir( "img/project_categories/RENTA E INSTALACION DE ANDAMIOS" );
$imagen = array();
foreach ($carousel_dir as $key => $img) {
  //var_dump($img);
  if ( $img == "." || $img == ".." ){

  }else{
    echo $img."<br>";
    $insert_query = "INSERT INTO e25_project(name, description, img, category, order) VALUES ('{$img}',' Instalación de andamios a una altura de 14mts para la restauración de la pintura en la cúpula. Se coloco un tapanco de madera en la corniza superior para facilitar los trabajos a los restauradores. <br>La renta del andamios proporciono seguridad a los trabajadores gracias a la instalación de escaleras y barandales para el facil acceso.','portadAndamios',3, {$i})";
    $insert = mysqli_query($connection, $insert_query);
     /* $img_name = explode( ".", $img );
    echo "El primero ".$img_name[0];
    $img_name[1] = strtolower( $img_name[1] );
    echo "El segundo ".$img_name[1];
    //$img = "img/project_categories/RENTA E INSTALACION DE ANDAMIO/".$img_name[0].".".$img_name[1];*/
    array_push($imagen, $img ) ;
  }
  //echo $img."<br>";
  # code...
}
$carousel_dir = array_diff(scandir( "diseño/carousel" ), array('.', '..'));

foreach ($imagen as $i => $img) {
    
}

/*


/*
$k = 0;
    for( $i = 0; $i < 4; $i++ ){
        for ($j=0; $j < 5; $j++) { 
            $insert_query = "INSERT INTO e25_project(name, description, img, category) VALUES ('Renta e instalación de andamios en el templo del municipio de Jesus Maria',' Instalación de andamios a una altura de 14mts para la restauración de la pintura en la cúpula. Se coloco un tapanco de madera en la corniza superior para facilitar los trabajos a los restauradores. <br>La renta del andamios proporciono seguridad a los trabajadores gracias a la instalación de escaleras y barandales para el facil acceso.','portadAndamios',3)";
            $insert = mysqli_query($connection, $insert_query);
            $k++;
        }
    }
*/
?>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.</p>