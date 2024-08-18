<?php $this->load->view("/partials/header.php"); ?>

<div class="container mx-auto px-4 py-8">
  <h1 class="text-2xl font-bold mb-6 text-center">Edit Employee</h1>

  <?php if ($flash_message): ?>
    <div class="alert alert-info">
      <?= $flash_message; ?>
    </div>
  <?php endif; ?>

  <form action="<?= site_url('EmployeeController/update/' . $employee->id); ?>" method="POST" enctype="multipart/form-data">

    <div class="form-group">
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" id="first_name" name="first_name" value="<?= set_value('first_name', $employee->first_name); ?>" required>
    </div>
    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" id="last_name" name="last_name" value="<?= set_value('last_name', $employee->last_name); ?>" required>
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username', $employee->username); ?>" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email', $employee->email); ?>" required>
    </div>
    <div class="form-group">
      <label for="role_id">Role</label>
      <select class="form-control" id="role_id" name="role_id">
        <option value="1" <?= $employee->role_id == 1 ? 'selected' : ''; ?>>Admin</option>
        <option value="2" <?= $employee->role_id == 2 ? 'selected' : ''; ?>>Employee</option>
      </select>
    </div>

    <div class="form-group">
      <label for="schedule_id">Schedule</label>
      <select class="form-control" id="schedule_id" name="schedule_id">
        <?php foreach ($schedules as $schedule): ?>
          <option value="<?= $schedule['id']; ?>" <?= $schedule['id'] == $employee->schedule_id ? 'selected' : ''; ?>>
            <?= $schedule['name']; ?> (<?= date('h:i A', strtotime($schedule['start_time'])); ?> - <?= date('h:i A', strtotime($schedule['end_time'])); ?>)
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="userfile">Profile Image</label>
      <input type="file" class="form-control-file" id="userfile" name="userfile">
      <input type="hidden" name="existing_image" value="<?= $employee->profile_image; ?>">
      <?php if ($employee->profile_image): ?>
        <img src="<?= base_url('uploads/' . $employee->profile_image); ?>" alt="Profile Image" class="mt-2" style="max-width: 200px;">
      <?php else: ?>
        <img src="<?= base_url('uploads/default.png'); ?>" alt="Default Image" class="mt-2" style="max-width: 200px;">
      <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>

  </form>

</div>

<?php $this->load->view("/partials/footer.php"); ?>
