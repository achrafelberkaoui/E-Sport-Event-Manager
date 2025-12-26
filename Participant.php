<?php
abstract class Participant{	
    protected $name, $id;
    public function __construct($name){
        $this->name = $name;
    }
}