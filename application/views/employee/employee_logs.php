<?php $this->load->view("partials/header.php"); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center ">Attendance Today</h2>
                    <p class="text-center text-muted">Date: <?php echo date('F j, Y'); ?></p>

                    <!-- Time In Form -->
                    <form method="POST" action="<?php echo site_url('AttendanceController/time_in'); ?>" class="mb-4">
                        <?php if ($time_in_exists): ?>
                            <div class="alert alert-success text-center fw-bolder" role="alert">
                                Time In: <?php echo date('h:i A', strtotime($time_in)); ?>
                            </div>
                        <?php else: ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                                <small id="usernameHelp" class="form-text text-muted">Please type your username to confirm your time in.</small>
                                <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary ">Time In</button>
                            </div>
                        <?php endif; ?>
                    </form>

                    <!-- Time Out Form -->
                    <form method="POST" action="<?php echo site_url('AttendanceController/time_out'); ?>">
                        <?php if ($time_in_exists): ?>
                            <?php if ($time_out_exists): ?>
                                <div class="alert alert-info text-center fw-bolder" role="alert">
                                    Time Out: <?php echo date('h:i A', strtotime($time_out)); ?>
                                </div>
                            <?php else: ?>
                                <div class="mb-3">
                                    <label for="username2" class="form-label">Username</label>
                                    <input type="text" class="form-control bold " name="username2" id="username2" placeholder="Enter your username">
                                    <small id="usernameHelp2" class="form-text text-muted">Please type your username to confirm your time out.</small>
                                    <?php echo form_error('username2', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-danger">Time Out</button>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("partials/footer.php"); ?>
