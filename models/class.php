<?php

class Person
{
    // Properties
    public $name;
    public $age;
    protected $dob;
    private $ssn;
    public $location;
    public $is_coding;
    public $is_getting_it;

    // Methods
    function set_name($name) {
        $this->name = $name;
    }

    function get_name() {
        return $this->name;
    }
    function set_age($age,$dob) {
        $this->age = $age;
        $this->dob = $dob;
    }
    function get_age() {
        return $this->age;
    }
    function get_dob() {
        return $this->dob;
    }
    function set_ssn($ssn) {
        $this->ssn = $ssn;
    }
    function get_ssn() {
        return $this->ssn;    
    }
    function get_location() {
        return $this->location;
    }
    function get_coding() {
        if ($this->is_coding) {
            return "Yep, I'm codin'!";
        } else {
            return "Nah, no code for me today.";
        }        
    }
    function get_getting_it() {
        if ($this->is_getting_it) {
            return "Hells yeah! I'm getting it!";
        } else {
            return "Still struggling.";
        }        
    }

    // Constructors
    function __construct($location, $is_coding, $is_getting_it) {
        $this->location = $location;
        $this->is_coding = $is_coding;
        $this->is_getting_it = $is_getting_it; 
    }
}
