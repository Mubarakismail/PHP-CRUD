<?php

include('Partials/header.php');
require __DIR__ . '/users/users.php';


if (!isset($_POST['id'])) {
    include('Partials/not_found.php');
    exit;
}

$userId = $_POST['id'];
deleteUser($userId);

header('Location: index.php');
