<table class="table table-responsive">
    <form action="" method="POST">
        <tr>
            <th>Tentor</th>
            <td>
                <select class="form-control" name="nama_tentor" required>
                    <?php foreach ($nama_tentor as $row) : ?>
                        <option value="<?php echo $row['id_tentor']; ?>" <?php echo ($row['id_tentor'] == $nama_tentor) ? 'elected' : ''; ?>><?php echo $row['nama_tentor']; ?></option>
                    <?php endforeach; ?>
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
            <th>Kursus Yang Diambil</th>
            <td>
                <select class="form-control" name="nama_kursus" required>
                    <?php foreach ($nama_kursus as $row) : ?>
                        <option value="<?php echo $row['id_kursus']; ?>"><?php echo $row['nama_kursus']; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <?php
        $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
        ?>
        <tr>
            <td></td>
            <th>
                <input type="submit" name="kirim" value="Submit" class="btn btn-primary">
                &nbsp;&nbsp;<a href="<?php echo $url ?>" class="btn btn-danger">Batal</a>
            </th>
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