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
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>View User : <?php echo $user['name']; ?></h3>
                </div>
                <div class="card-body">
                    <a class="btn btn-secondary" href="update.php?id=<?php echo $user['id']; ?>">Update</a>
                    <form action="delete.php" method="post" style="display: inline-block;">
                        <input type="hidden" value="<?php echo $user['id']; ?>" name="id">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <table class="table" style="margin-top: 10px;">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td><?php echo $user['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><?php echo $user['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $user['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><?php echo $user['phone']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('Partials/footer.php') ?>