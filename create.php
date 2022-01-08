<?php

include('Partials/header.php');
require __DIR__ . '/users/users.php';

$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
];

$errors = [
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'id' => '',
];

$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = array_merge($user, $_POST);

    if (ValidationUser($user, $errors)) {
        $user = createUser($_POST);

        uploadImage($_FILES['image'], $user);

        header('Location: index.php');
    }
}

?>

<?php include('_form.php'); ?>
