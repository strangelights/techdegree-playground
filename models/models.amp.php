<?php

class Amp
{   
    // Properties
    protected $year;
    public $make;
    public $model;
    private $is_owned;
    public $image_url;

    // Methods
    function setYear($year): void
    {
        $this->year = $year;
    }

    function getYear(): int 
    {
        return $this->year;
    }

    function getAge(): int
    {
        // TODO: Add logic to calculate age using current year - $year
        $age = 0;
        return $age;
    }

    function setMake($make): void
    {
        $this->make = $make;
    }

    function getMake(): string
    {
        return $this->make;
    }

    function setModel($model): void
    {
        $this->model = $model;
    }

    function getModel(): string
    {
        return $this->model;
    }

    function setOwnership($is_owned): void
    {
        $this->is_owned = $is_owned;
    }

    function getOwnership(): bool
    {
        return $this->is_owned;
    }

    function setImageUrl($image_url): void
    {
        $this->image_url = $image_url;
    }

    function getImageUrl(): string
    {
        return $this->image_url;
    }
    
    // Constructors
    function __construct($make, $model)
    {
        $this->make = $make;
        $this->model = $model;
    }

}