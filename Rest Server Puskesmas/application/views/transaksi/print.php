<!DOCTYPE html>
<html>

<head>
    <title>Report of Transactions</title>
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
        <h3>Laporan Transaksi</h3>
    </center><br>
    <div id="outtable">
        <table>
            <thead>
                <tr>
                    <th class="short">No</th>
                    <th class="normal">Nama Pasien</th>
                    <th class="normal">Jenis Poliklinik</th>
                    <th class="normal">Nama Dokter</th>
                    <th class="normal">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($transaksi as $trans) : ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $trans['nama_pas'] ?></td>
                        <td><?= $trans['jenis'] ?></td>
                        <td><?= $trans['nama_dok'] ?></td>
                        <td>
                            <?php
                            $original_date = $trans['tanggal_pukul'];

                            // Creating timestamp from given date
                            $timestamp = strtotime($original_date);

                            // Creating new date format from that timestamp
                            $new_date = date("d-m-Y", $timestamp);
                            echo $new_date; // Outputs: 31-03-2019
                            ?>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>