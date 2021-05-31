<?php

use Checkin\User;

include 'partials/header.php' ?>

    <?php 

        //ENVIRONMENT

        $is_logged = 1;

        $user_data = $database->select("users", [

            "id",
            "user_name",
            "first_name",
            "last_name"

        ], [
            "id" => 0,
        ])[0];

        $user = new User($user_data['id'], $user_data['user_name'], $user_data['first_name'], $user_data['last_name']);

        echo $user->GetName() . ": " . $user->GetFullName();

    ?>

<?php include 'partials/footer.php' ?>