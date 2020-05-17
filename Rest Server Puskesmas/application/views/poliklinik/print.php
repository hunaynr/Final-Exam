<!DOCTYPE html>
<html>

<head>
    <title>List of Polyclinics</title>
    <style type="text/css">
        #outer {
            /* padding: 5px; */
            padding-left: 170px;
            /* border-radius: 2px; */
        }

        #outtable {
            /* padding: 5px; */
            border: 1px solid #e3e3e3;
            width: 387px;
            /* border-radius: 2px; */
        }

        /* #table {
            padding: 5px;
            padding-left: 180px;
            border-radius: 2px;
        } */

        .short {
            width: 50px;
        }

        .normal {
            width: 137px;
        }

        table {
            border-collapse: collapse;
            font-family: 'Trebuchet MS';
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
        <h3>Daftar Poliklinik</h3>
    </center><br>
    <div id="outer">
        <div id="outtable">
            <table id="table">
                <thead>
                    <tr>
                        <th class="short">No</th>
                        <th class="normal">Jenis</th>
                        <th class="normal">Ruang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($poliklinik as $pol) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $pol['jenis'] ?></td>
                            <td><?= $pol['ruang'] ?></td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>