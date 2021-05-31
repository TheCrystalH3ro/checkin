<!DOCTYPE html>

<?php require_once 'inc/config.php' ?>

<html>

    <head>
    </head>

    <body>
        
        <div id="main">

        <?php 
            if($is_logged):
        ?>

        <header>
            <div class="htop-left">
                <a href="<?= $base_url ?>"> HOME </a> </br>
                <span> Welcome, <a href="<?= $base_url ?>/profile.php?user=<?= $user->GetName() ?>"><?= $user->GetName() ?> </a></span>
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