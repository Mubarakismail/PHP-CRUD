<?php
require 'users/users.php';

$users = getUsers();

include('Partials/header.php');
?>

<div class="container">
    <p>
        <a href="create.php" class="btn btn-success">Create New User</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td>
                        <?php if (isset($user['extension'])) : ?>
                            <img src="<?php echo "users/images/" . $user['id'] . '.' . $user['extension']; ?>" style="width: 60px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-info">Show</a>
                        <a href="update.php?id=<?php echo $user['id']; ?>" class="btn btn-outline-secondary">Update</a>
                        <form action="delete.php" method="post" style="display: inline-block;">
                            <input type="hidden" value="<?php echo $user['id']; ?>" name="id">
                            <button class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include('Partials/footer.php'); ?>