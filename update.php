<?php

include('Partials/header.php');
require __DIR__ . '/users/users.php';

if (!isset($_GET['id'])) {
    include('Partials/not_found.php');
    exit;
}

$userId = $_GET['id'];

$user = getUserById($userId);

if (!$user) {
    include "Partials/not_found.php";
    exit;
}
$errors = [
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'id' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = updateUser($_POST, $userId);

    if (ValidationUser($user, $errors)) {
        uploadImage($_FILES['image'], $user);

        header('Location: index.php');
    }
}
?>

<?php include('_form.php') ?>


<?php include "Partials/footer.php"; ?>