<?php
 if($this->session->userdata('level') == "user" ){

 ?>
<div class="container"><?= $this->session->flashdata('pesan'); ?></div>
<br /><br /><br />


             
             
            

<?php }elseif($this->session->userdata('level') == "admin"){ ?>

<div class="container"><?= $this->session->flashdata('pesan'); ?></div>

<div class="callout callout-success">
                <h4><i class=""></i><center>Selamat Datang</center> </h4>
                <marquee width="1220">Anda Login Sebagai Admin Silahkan Pilih Menu Di Samping Untuk Menggunakan Sistem</marquee>
              </div>


<?php }