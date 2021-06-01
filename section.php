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

            <form method="post" action="<?= $base_url ?>checkin.php">

                <div class="check-body">

                    <?php if($u_section == NULL || $u_section['entered'] == 0): ?>
                        <button class="btn" type="submit" name="checkin" value="<?= $section['id'] ?>"> Check-In </button>
                    <?php elseif($u_section['id'] == $section['id']): ?>
                        <button class="btn" type="submit" name="checkout" value="<?= $section['id'] ?>"> Check-Out </button>
                    <?php else: ?>
                        <p>Momentálne sa už nachádzaš v <b><?= $u_section['name'] ?></b></p>
                        <button class="btn" disabled> Check-In </button>
                    <?php endif ?>
                
                </div>

            </form>

            <div class="check-footer">
                    <span>Go <a href="<?= $base_url ?>"> back </a></span>
            </div>
        </div>

    </div>

<?php include 'partials/footer.php' ?>