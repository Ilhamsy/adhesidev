<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
</head>

<body>
    <div>
        <h1>Cetak Laporan</h1>
        <h4>Pilih data yang akan dicetak</h4>
    </div>
    <table class="table table-striped">
        <?php echo form_open('laporan/print'); ?>
        <tr>
            <td>
                <?php
                $options = array(
                    '' => '--Pilih Data--',
                    'tentor' => 'Data Tentor',
                    'siswa' => 'Data Siswa',
                    'kursus' => 'Data Kursus',
                    'jadwal' => 'Jadwal Bimbingan'
                );
                echo form_dropdown('data', $options, '', 'class="form-control"');
                ?>
            </td>
            <td>
                <?php echo form_submit('print', 'Print', 'class="btn btn-info"'); ?>
            </td>
        </tr>
        <?php echo form_close(); ?>
    </table>
</body>

</html>