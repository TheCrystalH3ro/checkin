<?php

require_once 'inc/config.php';

unset($_SESSION['user']);

session_unset();
session_destroy();

header('Location: '. $base_url . 'login.php');
die();