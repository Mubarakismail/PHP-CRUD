<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <?php if ($user['id']) : ?>
                            Update user: <?php echo $user['name']; ?>
                        <?php else : ?>
                            Create New User
                        <?php endif ?>
                    </h3>
                </div>
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control <?php echo $errors['name'] ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?php echo $errors['name']; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?php echo $user['username']; ?>" class="form-control <?php echo $errors['username'] ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?php echo $errors['username']; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $user['email']; ?>" class="form-control <?php echo $errors['email'] ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?php echo $errors['email']; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" value="<?php echo $user['phone']; ?>" class="form-control <?php echo $errors['phone'] ? 'is-invalid' : ''; ?>">
                            <div class="invalid-feedback">
                                <?php echo $errors['phone']; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <button class="btn btn-success float-right" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>