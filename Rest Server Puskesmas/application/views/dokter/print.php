<!DOCTYPE html>
<html>

<head>
    <title>List of Doctors</title>
    <style type="text/css">
        #outtable {
            /* padding: 5px; */
            border: 1px solid #e3e3e3;
            width: 700px;
            /* border-radius: 2px; */
        }

        .short {
            width: 50px;
        }

        .normal {
            width: 137px;
        }

        table {
            border-collapse: collapse;
            font-family: Calibri;
            color: #5E5B5C;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5;
        }
    </style>
</head>

<body>
    <center>
        <h3>Daftar Dokter</h3>
    </center><br>
    <div id="outtable">
        <table>
            <thead>
                <tr>
                    <th class="short">No</th>
                    <th class="normal">NIP</th>
                    <th class="normal">Nama Dokter</th>
                    <th class="normal">JK</th>
                    <th class="normal">Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($dokter as $dok) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $dok['nip'] ?></td>
                        <td><?= $dok['nama_dok'] ?></td>
                        <td><?= $dok['jenis_kelamin'] ?></td>
                        <td><?= $dok['alamat'] ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>