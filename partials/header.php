<!DOCTYPE html>

<?php require_once 'inc/config.php' ?>

<html>

    <head>
        <link rel="stylesheet" href="assets/style.css">
    </head>

    <body>
        
        <div id="main">

        <?php 
            if($is_logged):
        ?>

        <header>
            <div class="htop-left">
                <div class="nav-item"><a href="<?= $base_url ?>"> HOME </a> </br> </div>
                <div class="nav-item"><span> Welcome, <a href="<?= $base_url ?>profile.php?user=<?= $user->GetName() ?>"><?= $user->GetName() ?> </a></span> </div>
            </div>
            <div class="htop-right">
                <div class="team_status nav-item">
                    <span>Team: <?= GetUserTeam($database, $user->GetId())["name"] ?></span>
                </div>
                <form method="post" action="<?= $base_url ?>logout.php">
                    <button class="nav-item">
                        Logout
                    </button>
                </form>
            </div>
        </header>
    <?php endif; ?>