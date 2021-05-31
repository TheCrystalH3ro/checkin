<?php

use Checkin\User;

include 'partials/header.php' ?>

    <?php
        if(!$is_logged) {
            header('Location: http://localhost/job/checkin/checkin/login.php');
            die();
        }
    ?>


    <div class="container">
        <select name="sections" id="sections">
            <?php foreach($sections as $section): ?>

                <option value="<?= $section['tag'] ?>"><?= $section['name'] ?></option>

            <?php endforeach; ?>
        </select>
    </div>

<?php include 'partials/footer.php' ?>