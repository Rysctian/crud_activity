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
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" placeholder="Enter your username">
                            <small class="text-danger"><?php echo form_error("username") ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Enter your password">
                            <small class="text-danger"><?php echo form_error("password") ?></small>
                        </div>
                        
                        <?php if ($this->session->flashdata('success')): ?> 
                            <div class="alert alert-success mt-3">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger mt-3">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
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

