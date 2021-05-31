<?php

namespace Checkin;

class User {

    public $id;
    public $name;
    public $fname;
    public $lname;

    public function __construct($id, $name, $fname, $lname){

        $this->id = $id;
        $this->name = $name;
        $this->fname = $fname;
        $this->lname = $lname;
        
    }

    public function SetFirstName($name){

        $this->fname = $name;

    }

    public function SetLastName($name){

        $this->lname = $name;

    }

    public function GetId(){

        return $this->id;

    }

    public function GetName(){

        return $this->name;

    }

    public function GetFirstName(){

        return $this->fname;

    }

    public function GetLasttName(){

        return $this->lname;

    }

    public function GetFullName(){

        return $this->fname . " " . $this->lname;

    }

}