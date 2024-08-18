<?php $this->load->view("/partials/header.php"); ?>

<div class="container mt-5">
<div class="d-flex justify-content-between align-items-center mb-4 mt-5">
        <h2 >Schedules</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createScheduleModal">
            Create Schedule
        </button>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
                <tr>
                    <td><?php echo $schedule['name']; ?></td>
                    <td><?php echo $schedule['start_time']; ?></td>
                    <td><?php echo $schedule['end_time']; ?></td>
                    <td>
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editScheduleModal" data-id="<?php echo $schedule['id']; ?>" data-name="<?php echo $schedule['name']; ?>" data-start="<?php echo $schedule['start_time']; ?>" data-end="<?php echo $schedule['end_time']; ?>">
                            Edit
                        </button>
                        <!-- Delete Button -->
                        <a href="<?php echo site_url('ScheduleController/delete_schedule/' . $schedule['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- CREATE SCHEDULE MODAL -->
<div class="modal fade" id="createScheduleModal" tabindex="-1" aria-labelledby="createScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createScheduleModalLabel">Create New Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('ScheduleController/store'); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Schedule Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="start_time" class="form-label">Start Time</label>
                    <input type="time" name="start_time" class="form-control" id="start_time" required>
                </div>
                <div class="mb-3">
                    <label for="end_time" class="form-label">End Time</label>
                    <input type="time" name="end_time" class="form-control" id="end_time" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Schedule</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- EDIT SCHEDULE MODAL -->
<div class="modal fade" id="editScheduleModal" tabindex="-1" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editScheduleModalLabel">Edit Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open('ScheduleController/update_schedule'); ?>
                <input type="hidden" name="schedule_id" id="edit_schedule_id">
                <div class="mb-3">
                    <label for="edit_name" class="form-label">Schedule Name</label>
                    <input type="text" name="name" id="edit_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="edit_start_time" class="form-label">Start Time</label>
                    <input type="time" name="start_time" id="edit_start_time" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="edit_end_time" class="form-label">End Time</label>
                    <input type="time" name="end_time" id="edit_end_time" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Schedule</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var editScheduleModal = document.getElementById('editScheduleModal');
    editScheduleModal.addEventListener('show.bs.modal', function(event) {
      var button = event.relatedTarget;
      var scheduleId = button.getAttribute('data-id');
      var name = button.getAttribute('data-name');
      var start = button.getAttribute('data-start');
      var end = button.getAttribute('data-end');

      var modal = bootstrap.Modal.getInstance(editScheduleModal);
      modal._element.querySelector('#edit_schedule_id').value = scheduleId;
      modal._element.querySelector('#edit_name').value = name;
      modal._element.querySelector('#edit_start_time').value = start;
      modal._element.querySelector('#edit_end_time').value = end;
    });
  });
</script>

<?php $this->load->view("/partials/footer.php"); ?>
