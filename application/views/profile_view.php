<?php $this->load->view("partials/header") ?>

<div class="container mt-5">
    <h1 class="mb-4">Profile</h1>

    <form method="POST" enctype="multipart/form-data" action="<?php echo site_url('UserProfileController/update_profile'); ?>">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="firstname"><strong>First Name:</strong></label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= isset($data["first_name"]) ? $data["first_name"] : ''; ?>" required />
            </div>
            <div class="form-group col-md-6">
                <label for="lastname"><strong>Last Name:</strong></label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= isset($data["last_name"]) ? $data["last_name"] : ''; ?>" required />
            </div>
        </div>
        
        <div class="form-group">
            <label for="username"><strong>Username:</strong></label>
            <input type="text" class="form-control" id="username" name="username" value="<?= isset($data["username"]) ? $data["username"] : ''; ?>" required />
        </div>
        
        <div class="form-group">
            <label for="email"><strong>Email:</strong></label>
            <input type="email" class="form-control" id="email" name="email" value="<?= isset($data["email"]) ? $data["email"] : ''; ?>" required />
        </div>

        <div class="form-group">
            <label for="schedule"><strong>Schedule:</strong></label>
            <input type="text" class="form-control" id="schedule" value="<?= isset($data["schedule_name"]) ? $data["schedule_name"] . " (" . (isset($data["start_time"]) ? date('g:i A', strtotime($data["start_time"])) : 'N/A') . " - " . (isset($data["end_time"]) ? date('g:i A', strtotime($data["end_time"])) : 'N/A') . ")" : 'No Schedule'; ?>" readonly />
        </div>

        <?php if (!empty($data['profile_image'])): ?>
            <div class="form-group">
                <h5><strong>Profile Image</strong></h5>
                <img src="<?= base_url('uploads/' . $data['profile_image']); ?>" alt="Profile Image" class="img-thumbnail mb-3" width="150" />
            </div>
        <?php endif; ?>
        
        <div class="form-group ">
            <label for="userfile"><strong>Upload New Profile Image:</strong></label>
            <input type="file" class="form-control-file " id="userfile" name="userfile">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php $this->load->view("partials/footer") ?>
