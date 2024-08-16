<?php $this->load->view("partials/header") ?>

<h1>Profile View</h1>
<?php ($user_id) ?>
<?php if (isset($user) && !empty($user)): ?>
    <p><strong>First Name:</strong> <?= $user["first_name"]; ?></p>
    <p><strong>Last Name:</strong> <?= $user["last_name"]; ?></p>
    <p><strong>Username:</strong> <?= $user["username"]; ?></p>
    <p><strong>Email:</strong> <?= $user["email"]; ?></p>
    <p><strong>Password:</strong> <?= $user["password"]; ?></p>
<?php else: ?>
    <p>User information is not available.</p>
<?php endif; ?>


<?php $this->load->view("partials/footer") ?>
