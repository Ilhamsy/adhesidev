<table class="table table-responsive">
    <form action="" method="POST">
        <tr>
            <th>Tentor</th>
            <td>
                <select class="form-control" name="nama_tentor" required>
                    <?php foreach ($nama_tentor as $row) :
                        if ($row['status'] == "A") { ?>
                            <option value="<?php echo $row['id_tentor']; ?>"><?php echo $row['nama_tentor']; ?></option>
                    <?php }
                    endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Siswa</th>
            <td>
                <select class="form-control" name="nama" required>
                    <?php foreach ($nama as $row) : ?>
                        <option value="<?php echo $row['id_siswa']; ?>"><?php echo $row['nama']; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Jadwal Bimbingan</th>
            <td><input type="datetime-local" name="jam" class="form-control" value="<?php echo $jam; ?>" required></td>
        </tr>
        <tr>
            <th>Kursus Yang Diambil</th>
            <td><input type="text" name="bidang" class="form-control" value="<?php echo $bidang; ?>" required></td>
        </tr>

        <tr>
            <td></td>
            <th><input type="submit" name="kirim" value="Submit" class="btn btn-primary"></th>
        </tr>
    </form>
</table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [],
            selectOverlap: function(event) {
                return event.rendering === 'background';
            }
        });

        calendar.render();
    });
</script>