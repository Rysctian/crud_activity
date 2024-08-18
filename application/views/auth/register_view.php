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
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Sign Up</h1>

                    <form action="<?php echo site_url('AuthController/register_process'); ?>" method="POST" class="mt-4">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo set_value('firstname'); ?>">
                                <small class="text-danger"><?php echo form_error("firstname") ?></small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo set_value('lastname'); ?>">
                                <small class="text-danger"><?php echo form_error("lastname") ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>">
                                <small class="text-danger"><?php echo form_error("username") ?></small>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-floating mb-3">
                                    <label for="floatingInput">Email</label>
                                    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email" value="<?php echo set_value('email'); ?>">
                                    <small class="text-danger"><?php echo form_error("email") ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <small class="text-danger"><?php echo form_error("password") ?></small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                                <small class="text-danger"><?php echo form_error("cpassword") ?></small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </form>

                    
                    <div class="text-center mt-3">
                        <a href="<?php echo site_url('login'); ?>">Already have an account? Login here</a>
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

