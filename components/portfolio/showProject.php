<?php 
    if ( isset($_GET['c']) && isset($_GET['p']) ){
        //Category and project are selectet
        ?>
        
        <?php 
    }else if( isset($_GET['c']) && !isset($_GET['p']) ) {
        //There is a category selected, but not a project
        ?>
        <div class="projectSelector">
            <div class="projectSelector__title">
        
            </div>
            <div class="projectSelector__container">
                <div class="card">
                    <div class="card-img">
                        <img src="<?php echo $card[$i]->get_img() ?>" alt="None" class="card-img__img"/>
                    </div>
                    <div class="card-info">
                        <h1 class="card-title"><?php echo $card[$i]->get_title() ?></h1>
                        <h3><?php echo $card[$i]->get_description() ?></h3>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php
    }else{
        echo "JAJJAJAJAJAJAJA NOOB";
    }
?>
