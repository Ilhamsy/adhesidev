<?php echo $this->session->flashdata('pesan'); ?>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Mentor</th>
            <th>Student</th>
            <th>Jadwal</th>
            <th>Course Taken</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data as $admin) : ?>
            <?php $tgl = $admin['jam']; ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $admin['nama_tentor']; ?></td>
                <td><?php echo $admin['nama']; ?></td>
                <td><?php echo date("d-m-Y, h:i A", strtotime($tgl)); ?></td>
                <td><?php echo $admin['bidang']; ?></td>

                <td>
                    <div id='isi4'>
                        <a href="<?php echo base_url('jadwal/jadwal_edit/' . $admin['id_jadwal']); ?>" class="btn btn-info">Edit</a>
                        <a href="<?php echo base_url('jadwal/jadwal_hapus/' . $admin['id_jadwal']); ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </td>
            </tr>
        <?php $no++;
        endforeach; ?>
    </tbody>
</table>

<script>
    // Your JavaScript code here
</script>