<?php 

class Pedal
{
    // Properties
    public $make;
    public $model;
    public $type;
    private $is_owned;
    public $image_url;

    // Methods
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

    function setType($type): void
    {
        $this->type = $type;
    }

    function getType(): string
    {
        return $this->type;
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
    function __construct($make, $model, $type)
    {
        $this->make = $make;
        $this->model = $model;
        $this->type = $type;
    }
}