<?php

require_once 'inc/config.php';

if(!isset($_POST['checkin']) && !isset($_POST['checkout'])){
    header('Location: '. $base_url);
    die();
}

if(isset($_POST['checkin'])) {

    if($u_section['entered'] == 0) {
        
        CheckInUser($database, $user->GetId(), $_POST['checkin'], 1);

    }

    header('Location: '. $base_url);
    die();

}

if($u_section['entered'] == 1 && $u_section['id'] == $_POST['checkout']){

    CheckInUser($database, $user->GetId(), $_POST['checkout'], 0);

}

header('Location: '. $base_url);
die();