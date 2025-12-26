<?php
class Consolee {
    public function input($label){
        echo $label ." : ";
        $val = trim(fgets(STDIN));
        return $val;
    }
}