<?php $this->load->view("partials/header") ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Update Profile Image</h2>
            
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php echo form_open_multipart('UserProfileController/upload_profile_image', ['class' => 'border p-4 shadow-sm rounded']); ?>
                <div class="mb-3">
                    <label for="userfile" class="form-label">Choose Profile Image</label>
                    <input type="file" name="userfile" id="userfile" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Upload Image</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php $this->load->view("partials/footer") ?>
