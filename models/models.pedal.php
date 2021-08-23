<?php 

class Pedal
{
    public $make;
    public $model;
    
    function __construct($make, $model)
    {
        $this->make = $make;
        $this->model = $model;
    }
}