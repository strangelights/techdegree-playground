<?php

// Dat Boi
$josh = new Person("Atlanta, GA", true, true);
$josh->set_name("Josh");
$josh->set_age(33,"1/18/1987");
$josh->set_ssn("Wouldn't you like to know weatherboy!");
$my_name = $josh->get_name();
$my_age = $josh->get_age();
$my_dob = $josh->get_dob();
$my_ssn = $josh->get_ssn();
$my_location = $josh->get_location();
$am_i_coding = $josh->get_coding();
$am_i_getting_it = $josh->get_getting_it();


// echo "<br><sup>Hello, my name is $my_name and I am $my_age years old. I was born on $my_dob and I currently live in $my_location.</sup>", 
// "<sup>Today? $am_i_coding and $am_i_getting_it</sup>",
// "<sup> My SSN, you ask? $my_ssn</sup><br>";

// Dat Bish
$ashley = new Person("Atlanta, GA", false, true);
$ashley->set_name("Ashley");
$ash_name = $ashley->get_name();
$ash_location = $ashley->get_location();
$is_ash_coding = $ashley->get_coding();
$butisshegetitdoh = $ashley->get_getting_it();