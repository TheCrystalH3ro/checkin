<?php include 'partials/header.php' ?>

    <?php 
        $user = $database->select("users", ["first_name", "last_name"], ["id" => 0])[0];
        
        echo $user["first_name"] . " " . $user["last_name"];
    ?>

<?php include 'partials/footer.php' ?>