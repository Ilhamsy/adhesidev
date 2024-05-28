<?php echo $this->session->flashdata('pesan');?>
<table class="table table-striped">
    <form action="" method="POST">
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" value="<?php echo $data['username'];?>" class="form-control"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" value="" class="form-control"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $data['nama'];?>" class="form-control"></td>
        </tr>
        <tr>
            <td>Level Akses</td>
            <td><input type="text" name="level" value="<?php echo $data['level'];?>" class="form-control"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="kirim" value="Submit" class="btn btn-primary"></td>
        </tr>
    </form>
</table>