<?php

include 'partials/header.php' ?>

    <?php
        if(!$is_logged) {
            header('Location: http://localhost/job/checkin/checkin/login.php');
            die();
        }
    ?>


    <div class="container">

        <?php if($u_section == NULL || $u_section['entered'] == 0): ?>

            <h3>Momentálne sa nenachádzaš v areáli</h3>

        <?php else: ?>

            <h3> Nachádzaš sa v: <?= $u_section['name'] ?></h3>

        <?php endif; ?>

        <form method="get" action="http://localhost/job/checkin/checkin/section.php">

            <select name="section" id="sections">
                <?php foreach($sections as $section): ?>

                    <option value="<?= $section['tag'] ?>"><?= $section['name'] ?></option>

                <?php endforeach; ?>
            </select>

            <button type="submit">Enter</button>

        </form>
    </div>

<?php include 'partials/footer.php' ?>