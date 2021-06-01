<?php include 'partials/header.php' ?>

    <?php
        if($is_logged) {
            header('Location: '. $base_url);
            die();
        }
    ?>

    <div class="container">

        <form class="main-box" action="<?= $base_url ?>" method="post">
            <label for="username">
                <p> Username: </p>
                
               <p> <input type="text" id="username" name="username"> </p>
            </label>
            
            <div>
                <button class="btn" type="submit">Login</button>
            </div>

        </form>

    </div>

<?php include 'partials/footer.php' ?>