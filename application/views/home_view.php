<?php $this->load->view("/partials/header.php") ?>

<div class="d-flex" id="wrapper">

<nav class="navbar bg-body-tertiary">

</nav>
    <div id="page-content-wrapper">
        <div class="container-fluid">
        <h1 class="mt-4">Dashboard <?=($username); ?></h1>
            
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <p>Welcome to your dashboard!</p>
        </div>
    </div>
</div>

<?php $this->load->view("/partials/footer.php") ?>