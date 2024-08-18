<?php $this->load->view("/partials/header.php"); ?>

<div class="">
  <h1 class="text-center mb-4">All Employees</h1>

  <div class="table-responsive">
    <table id="employeesTable" class="table table-striped table-bordered">
      <thead class="thead-primary">
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Schedule</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($employees as $employee) : ?>
          <tr>
            <td><?= $employee->first_name; ?> <?= $employee->last_name; ?></td>
            <td><?= $employee->username; ?></td>
            <td><?= $employee->email; ?></td>
            <td><?= !empty($employee->schedule_name) ? $employee->schedule_name : '-----'; ?></td>
            <td><?= !empty($employee->start_time) && $employee->start_time !== '00:00:00' ? date('h:i A', strtotime($employee->start_time)) : '-----'; ?></td>
            <td><?= !empty($employee->end_time) && $employee->end_time !== '00:00:00' ? date('h:i A', strtotime($employee->end_time)) : '-----'; ?></td>
            <td class="text-center w-30">
              <a href="<?= site_url('EmployeeController/edit/' . $employee->id); ?>" class="btn btn-sm btn-primary">Edit</a>
              <a href="<?= site_url('EmployeeController/delete/' . $employee->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
              <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#setScheduleModal" data-employee-id="<?= $employee->id; ?>">Set Schedule</button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- MODAL SCHEDULE -->
<div class="modal fade" id="setScheduleModal" tabindex="-1" aria-labelledby="setScheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="setScheduleModalLabel">Set Schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?= form_open('EmployeeController/assignSchedule', ['id' => 'setScheduleForm']); ?>
        <input type="hidden" name="employee_id" id="employee_id">
        <div class="mb-3">
          <label for="schedule_id" class="form-label">Schedule</label>
          <select class="form-select" id="schedule_id" name="schedule_id">
            <option value="">Select Schedule</option>
            <?php if (!empty($schedules)): ?>
              <?php foreach ($schedules as $schedule): ?>
                <option value="<?= $schedule['id']; ?>">
                  <?= $schedule['name']; ?> (<?= date('h:i A', strtotime($schedule['start_time'])); ?> - <?= date('h:i A', strtotime($schedule['end_time'])); ?>)
                </option>
              <?php endforeach; ?>
            <?php else: ?>
              <option value="">No schedules available</option>
            <?php endif; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Assign Schedule</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var scheduleModal = document.getElementById('setScheduleModal');
    scheduleModal.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var employeeId = button.getAttribute('data-employee-id');
      var modal = bootstrap.Modal.getInstance(scheduleModal);
      modal._element.querySelector('#employee_id').value = employeeId;
    });
  });
</script>

<?php $this->load->view("/partials/footer.php"); ?>
