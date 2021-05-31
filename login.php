<?php include 'partials/header.php' ?>

    <?php
        if($is_logged) {
            header('Location: '. $base_url);
            die();
        }
    ?>

    <form action="/" method="post">
        <label for="username">Username: 
            <input type="text" id="username" name="username">
        </label>

        <button type="submit">Login</button>

    </form>

<?php include 'partials/footer.php' ?>