<a href="<?php echo base_url('siswa/siswa_tambah/'); ?>" class="btn btn-primary">Tambah</a>
<br /><br /><br />
<?php echo $this->session->flashdata('pesan'); ?>
<table class="table table-bordered table-hover table-responsive-sm">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <!-- <th>Alamat</th> -->
            <th>Tanggal Lahir</th>
            <th>Last Education</th>
            <th>Next Education</th>
            <th>University</th>
            <th>GPA/Nilai</th>
            <th>TOEFL</th>
            <th>No Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data as $admin) :
            $tgl = $admin['tgl_lahir'];
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $admin['nama']; ?></td>
                <td><?php echo ($admin['jenis_kelamin'] == "L") ? "Laki-Laki" : "Perempuan"; ?></td>
                <!-- <td><?php echo $admin['alamat']; ?></td> -->
                <td><?php echo date("d-m-Y", strtotime($tgl)); ?></td>
                <td><?php echo ($admin['last_education'] == "SMA") ? "SMA" : (($admin['last_education'] == "S1") ? "S1" : "S2"); ?></td>
                <td><?php echo ($admin['next_education'] == "S1") ? "S1" : (($admin['next_education'] == "S2") ? "S2" : "S3"); ?></td>
                <td><?php echo $admin['university']; ?></td>
                <td><?php echo $admin['nilai']; ?></td>
                <td><?php echo $admin['toefl']; ?></td>
                <td><?php echo $admin['telepon']; ?></td>
                <td>
                    <a href="<?php echo base_url('siswa/siswa_edit/' . $admin['id_siswa']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    &nbsp;&nbsp;<a href="<?php echo base_url('siswa/siswa_hapus/' . $admin['id_siswa']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php $no++;
        endforeach; ?>
    </tbody>
</table>