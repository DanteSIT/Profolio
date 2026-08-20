<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/functions.php';

auth_logout();
header('Location: login.php');
exit;
