<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  <!-- Bootstrap 5 JS Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php $role_id = $this->session->userdata('role_id'); ?>
  <?php $username = $this->session->userdata('username'); ?>

  <!-- Sidebar -->
  <div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar">
      <h4 class="text-center">
        <?= $role_id == 1 ? 'Admin' : ''; ?>
        <?= $username ?>
      </h4>
      <ul class="nav flex-column">
        <!-- ADMIN NAVBAR -->
        <?php if ($role_id == 1): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('admin_dashboard'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('employees'); ?>"><i class="fas fa-users"></i> Employees</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('schedule'); ?>"><i class="fas fa-calendar-alt"></i> Schedule</a>
          </li>
          <!-- EMPLOYEE NAVBAR -->
        <?php elseif ($role_id == 2): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('home'); ?>"><i class="fas fa-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('AttendanceController/index'); ?>"><i class="fas fa-clock"></i> Time</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('profile'); ?>"><i class="fas fa-user"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content flex-grow-1 p-3">
      <!-- STATUS MESSAGE TOAST -->
      <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="statusToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <strong class="me-auto">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Your message here.
          </div>
        </div>
      </div>

  <!-- STATUS MESSAGE TOAST -->
  <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
    <div id="statusToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notification</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Your message here.
      </div>
    </div>
  </div>
