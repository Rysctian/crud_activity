<?php $this->load->view("/partials/header.php"); ?>

<h2>Logged in as <?php 
    $role_id = $this->session->userdata("role_id");
    echo $role_id === "1" ? 'admin' : 'employee'; 
?></h2>

<?php $this->load->view("/partials/footer.php"); ?>
