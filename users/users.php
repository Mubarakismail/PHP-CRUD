<?php

function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/user.json'), true);
}
function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
}
function createUser($data)
{
    $users = getUsers();
    $data['id'] = rand(100000, 200000);
    $users[] = $data;
    putJson($users);
    return $data;
}

function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }
    putJson($users);
    return $updateUser;
}
function deleteUser($id)
{
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            array_splice($users, $i, 1);
        }
    }
    putJson($users);
}

function uploadImage($file, $user)
{
    if (isset($_FILES['image']) && $_FILES['image']['tmp_name']) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        $fileName = $file['name'];

        $dotPosition = strpos($fileName, '.');

        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/{$user['id']}.$extension");
        $user['extension'] = $extension;

        updateUser($user, $user['id']);
    }
}

function putJson($users)
{
    file_put_contents(__DIR__ . '/user.json', json_encode($users, JSON_PRETTY_PRINT));
}

function ValidationUser($user, &$errors)
{
    $isValid = true;
    if (!$user['name']) {
        $isValid = false;
        $errors['name'] = "Name is required and length of name should be greater than 3 characters";
    }

    if (!$user['username'] || strlen($user['username']) < 3) {
        $isValid = false;
        $errors['username'] = "Username is required and length of username should be greater than 3 characters";
    }

    if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = "This must be a valid email";
    }
    if (!$user['phone']) {
        $isValid = false;
        $errors['phone'] = "phone number is required and must be 11 digits";
    }
    return $isValid;
}
