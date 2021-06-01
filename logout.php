<?php

require_once 'inc/config.php';

unset($_SESSION['user']);

header('Location: '. $base_url . 'login.php');
die();