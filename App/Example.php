<?php

//namespace App;

class User {

    public $name ;

    function set_name($name){
        $this->name = $name;
    }

    function get_name(){
        return $this->name;
    }
}
?>