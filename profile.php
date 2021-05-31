<?php include 'partials/header.php'; ?>

<?php 
    if(!isset($_GET['user']) || $_GET['user'] == null){
        //TODO: 404
        header('Location: '. $base_url);
        die();
    }

    $profile = GetUserByName($database, $_GET['user']);

    if(!$profile){
        //TODO: 404
        header('Location: '. $base_url);
        die();
    }

    $section = GetUserSection($database, $profile->GetId());
?>


<div class="container">
    <div class="profile-head">
        <h3>@<?= $profile->GetName() ?></h3>
    </div>
    <div class="profile-body">
        <p><b>Name: </b><span> <?= $profile->GetFullName() ?> </span></p>
        <p><b>Team: </b><span> <?= GetUserTeam($database, $profile->GetId())['name'] ?> </span></p>
        <?php if($section != null): ?>
        <p> 
            <?php if($section['entered'] == 1): ?>
                Currently in <b><?= $section['name'] ?></b> for <?= GetCurrentSectionTime($database, $profile->GetId()) ?> .
            <?php else: ?>
                Last seen in <b><?= $section['name'] ?></b> at <?= $section['time']; ?>.
            <?php endif; ?>
        </p>
        <?php endif; ?>
    </div>
</div>

<?php include 'partials/footer.php' ?>