<!DOCTYPE html>

<?php require_once 'inc/config.php' ?>

<html>

    <head>
    </head>

    <body>

    <?php 
        if($is_logged):
    ?>

        <header>
            <div class="htop-left">
                <span> Welcome, <?= $user->getFullName() ?> </span>
            </div>
            <div class="htop-right">
                <div class="team_status">
                    <span>Team: <?= GetUserTeam($database, $user->GetId())["name"] ?></span>
                </div>
                <button>
                    Logout
                </button>
            </div>
        </header>
    <?php endif; ?>
        
        <div id="main">