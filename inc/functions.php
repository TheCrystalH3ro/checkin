<?php

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

        $section = $database->select("teams", [
            "[><]checkins" => ["id" => "team_id"],
            "[><]users" => ["user_teams.user_id" => "id"]
        ], [
            "teams.id",
            "teams.tag",
            "teams.name"
        ], [
            "users.id" => $uid
        ]);

        return $section[0];

    }