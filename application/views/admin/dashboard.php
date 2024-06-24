<?php
$userLevel = $this->session->userdata('level');

if ($userLevel === "user" || $userLevel === "admin") {
    ?>
    <div class="container"><?= $this->session->flashdata('pesan'); ?></div>

    <?php if ($userLevel === "admin") { ?>
        <div class="callout callout-success">
            <h4><i class="fas fa-smile"></i><center>Selamat Datang</center></h4>
            <p>Anda Login Sebagai Admin. Silahkan pilih menu di samping untuk menggunakan sistem.</p>
        </div>
    <?php } ?>
<?php } else { ?>
    <!-- Display an error message or redirect to a login page if the user level is invalid -->
    <p>Invalid user level.</p>
<?php } ?>