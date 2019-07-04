<?php

    class Card{
        private $id;
        private $title;
        private $description;
        private $img;
        private $id_cat;
        //CTOR
        public function __construct(){
            $this->id = -1;
            $this->title = "";
            $this->description = "";
            $this->img = "";
            $this->id_cat = -1;
        }
        //GETS
        public function get_id(){
            return $this->id;
        }
        public function get_title(){
            return $this->title;
        }
        public function get_description(){
            return $this->description;
        }
        public function get_img(){
            return $this->img;
        }
        public function get_id_cat(){
            return $this->id_cat;
        }
            //SETS
            public function set_id( $id ){
            $this->id = $id;
        }
        public function set_title( $title ){
            $this->title = $title;
        }
        public function set_description( $description ){
            $this->description = $description;
        }
        public function set_img( $img ){
            $this->img = $img;
        }
        public function set_id_cat( $id_cat ){
            $this->id_cat = $id_cat;
        }
        //METHODS
        public function buildCard( $copy_card ){
            $this->id          = $copy_card.get_id();
            $this->title       = $copy_card.get_title();
            $this->description = $copy_card.get_description();
            $this->img         = $copy_card.get_img();
        }
    }
    

?>