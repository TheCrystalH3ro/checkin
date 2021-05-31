<?php

use Checkin\User;

function GetSections($database){

        $section = $database->select("sections", [
            "id",
            "tag",
            "name"
        ]);

        return $section;

    }

    function GetUserTeam($database, $uid){

        $team = $database->select("teams", [
            "[><]user_teams" => ["id" => "team_id"],
            "[><]users" => ["user_teams.user_id" => "id"]
        ], [
            "teams.id",
            "teams.tag",
            "teams.name"
        ], [
            "users.id" => $uid
        ]);

        return $team[0];

    }

    function GetUserSection($database, $uid){

        $section = $database->select("sections", [
            "[><]checkins" => ["id" => "section_id"],
            "[><]users" => ["checkins.user_id" => "id"]
        ], [
            "sections.id",
            "sections.tag",
            "sections.name",
            "checkins.entered",
            "checkins.time",
        ], [
            "users.id" => $uid,
            "ORDER" => [
                "checkins.time" => "DESC"
            ],
            "LIMIT" => 1
        ]);

        return $section[0];

    }

    function GetSectionByTag($database, $tag){

        $tag = filter_var($tag, FILTER_SANITIZE_STRING);

        $section = $database->select("sections", [
            "id",
            "tag",
            "name"
        ], [
            "tag" => $tag
        ]);

        return $section[0];

    }

    function GetUserByName($database, $name){

        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $user = $database->select("users", [

            "id",
            "user_name",
            "first_name",
            "last_name"
        
        ], [
            "user_name" => $name,
        ]);

        if($user == NULL){
            return false;
        }

        $user_data = $user[0];

        return new User($user_data['id'], $user_data['user_name'], $user_data['first_name'], $user_data['last_name']);

    }

    function GetUserById($database, $id){

        if(filter_var($id, FILTER_VALIDATE_INT) === false){
            return false;
        }

        $user = $database->select("users", [

            "id",
            "user_name",
            "first_name",
            "last_name"
        
        ], [
            "id" => $id,
        ]);

        if($user == NULL){
            return false;
        }

        $user_data = $user[0];

        return new User($user_data['id'], $user_data['user_name'], $user_data['first_name'], $user_data['last_name']);

    }

    function GetSectionById($database, $id){

        if(filter_var($id, FILTER_VALIDATE_INT) === false){
            return false;
        }

        $section = $database->select("sections", [
            "id",
            "tag",
            "name"
        ], [
            "id" => $id
        ]);

        if($section == null){
            return false;
        }

        return $section[0];

    }

    function CheckInUser($database, $uid, $section_id, $entered = 1) {

        if(!GetUserById($database, $uid)) {
            return false;
        }

        if(!GetSectionById($database, $section_id)) {
            return false;
        }

        $database->insert("checkins", [
            "user_id" => $uid,
            "section_id" => $section_id,
            "entered" => $entered
        ]);

        return true;

    }

    function CalculateSectionTime($database, $uid){

        $sections = $database->select("sections", [
            "[><]checkins" => ["id" => "section_id"],
            "[><]users" => ["checkins.user_id" => "id"]
        ], [
            "checkins.time",
        ], [
            "users.id" => $uid,
            "ORDER" => [
                "checkins.time" => "DESC"
            ],
            "LIMIT" => 2
        ]);

        $date_a = new DateTime($sections[0]['time']);
        $date_b = new DateTime($sections[1]['time']);

        $time = date_diff($date_a, $date_b);

        return $time->format('%h:%i:%s');

    }

    function GetCurrentSectionTime($database, $uid){

        $section = $database->select("sections", [
            "[><]checkins" => ["id" => "section_id"],
            "[><]users" => ["checkins.user_id" => "id"]
        ], [
            "checkins.time",
        ], [
            "users.id" => $uid,
            "ORDER" => [
                "checkins.time" => "DESC"
            ],
            "LIMIT" => 1
        ]);

        $date_a = new DateTime(date("Y-m-d H:i:s", time()));
        $date_b = new DateTime($section[0]['time']);

        $time = date_diff($date_a, $date_b);

        return $time->format('%h:%i:%s');

    }