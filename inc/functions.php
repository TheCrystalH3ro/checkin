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