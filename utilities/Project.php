<?php 
    class Img{
        private $id_img;
        private $name;

        public function get_id_img(){
            return $this->id_img;
        }
        public function set_id_img( $id_img ){
            $this->id_img = $id_img;
        }
        public function get_name(){
            return $this->name;
        }
        public function set_name( $name ){
            $this->name = $name;
        }
    }
    
    class Project extends Img{
        private $name;
        private $cover;
        private $images;

        public function __construct(){
            $this->id = -1;
            $this->name = "";
            $this->cover = "";
            $this->images = array();
        }
        public function get_id(){
            return $this->id;
        }
        public function set_id( $id ){
            $this->id = $id;
        }
        public function get_name(){
            return $this->name;
        }
        public function set_name( $name ){
            $this->name = $name;
        }
        public function get_cover(){
            return $this->cover;
        }
        public function set_cover( $cover ){
            $this->cover = $cover;
        }
        public function get_images(){
            return $this->images;
        }
        public function set_images( $images ){
            $this->images = $images;
        }
        public function add_image( $img ){
            array_push($this->images, $img );
        }
        public function get_imageAt( $i ){
            return $this->images[$i];
        }
    }
    
?>