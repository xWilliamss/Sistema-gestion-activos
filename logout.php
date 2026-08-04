<?php

session_start();
require_once __DIR__ . '/config/auth.php';
require_post();
verify_csrf();

$_SESSION = [];
session_destroy();

header('Location: login.php');
exit();
