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

        $section = $database->select("sections", [
            "id",
            "tag",
            "name"
        ], [
            "tag" => $tag
        ]);

        return $section[0];

    }

    function GetUserById($database, $id){

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