<?php include 'partials/header.php' ?>

    <?php
        if(isset($_POST['username']) && $_POST['username'] != null){
            $user = GetUserByName($database, $_POST['username']);
            
            if($user) {
                $_SESSION['user'] = $user->GetId();
                $is_logged = true;
            }

        }


        if($is_logged) {
            header('Location: '. $base_url);
            die();
        }
    ?>

    <div class="container">

        <form class="main-box" method="post">
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