<?php include 'partials/header.php'; ?>

<?php
    $section_list;

    foreach($sections as $section){

        $section_list[] = $section['tag'];

    }

    if(!isset($_GET['section']) || !in_array($_GET['section'], $section_list)){
        //TODO: 404 redirect
        die("Section not found!");
    }

    $log_section = GetSectionByTag($database, $_GET['section']);

    $log_data = GetSectionHistory($database, $log_section['id'], date("Y-m-d") . " 00:00:00");

?>

<div class="container">

    <div class="log-box">


        <?php foreach($log_data as $data): ?>

            <p> [<?= $data['time'] ?>]: <?= $data['user_name'] ?> <?= ($data['entered']) ? 'entered' : 'left' ?> <?= $log_section['name'] ?> </p>

        <?php endforeach; ?>

    </div>
    
</div>


<?php include 'partials/footer.php' ?>