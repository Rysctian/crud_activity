<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- For responsive design -->
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Login</h1>

                        <form action="<?php echo site_url('AuthController/login_process'); ?>" method="POST" class="mt-4">
                            <div class="form-group">


                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                    </div>
                                    <input name="username" placeholder="Username" type="text" value="<?php echo set_value('username'); ?>" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    <?php echo form_error('username'); ?>


                                </div>
                                <div class="form-group">

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">🔐</span>
                                    </div>
                                    <input name="password" placeholder="password" type="password" value="<?php echo set_value('password'); ?>" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    <small class="text-danger"><?php echo form_error("password") ?></small>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="<?php echo site_url('register'); ?>">Don't have an account? Register here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>