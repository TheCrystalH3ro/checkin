<?php include 'partials/header.php';

    $section_list;

    foreach($sections as $section){

        $section_list[] = $section['tag'];

    }

    if(!isset($_GET['section']) || !in_array($_GET['section'], $section_list)){
        //TODO: 404 redirect
        die("Section not found!");
    }

    $section = GetSectionByTag($database, $_GET['section']);

?>

    <div class="container">

        <div class="checkin-box">
            <div class="heading">
                <h3> <?= $section['name'] ?> </h3>
            </div>

            <div class="check-body">

                <?php if($u_section == NULL || $u_section['entered'] == 0): ?>
                    <button type="submit" name="checkin-<?= $section['id'] ?>"> Check-In </button>
                <?php elseif($u_section['id'] == $section['id']): ?>
                    <button type="submit" name="checkout-<?= $section['id'] ?>"> Check-Out </button>
                <?php else: ?>
                    <p>Momentálne sa už nachádzaš v <b><?= $u_section['name'] ?></b></p>
                    <button disabled> Check-In </button>
                <?php endif ?>
            
            </div>

            <div class="check-footer">
                    <span>Go <a href="http://localhost/job/checkin/checkin/"> back </a></span>
            </div>
        </div>

    </div>

<?php include 'partials/footer.php' ?>