<?php $this->load->view("/partials/header.php") ?>

<div class="d-flex" id="wrapper">

    <nav class="navbar bg-body-tertiary">

    </nav>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard <?= $username === "1" ? "admin" : "employee"; ?></h1>
            <p>Welcome to your dashboard! employee</p>
        </div>
    </div>
</div>

<?php $this->load->view("/partials/footer.php") ?>