<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }

        #transaksi {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #transaksi td,
        #transaksi th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #transaksi tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #transaksi th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <h1><?= $keterangan; ?></h1>
    <br>
    <hr>
    <br>
    <table id="transaksi">
        <thead>
            <tr>
                <th>No. </th>
                <th>Tanggal</th>
                <th>Nama Customer</th>
                <th>Nomor HP</th>
                <th>Jenis Pet</th>
                <th>Paket Grooming</th>
                <th>Biaya Grooming</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($grooming as $g) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= date('d F Y', strtotime($g["date_created"])) ?></td>
                    <td><?= $g["customer_name"] ?></td>
                    <td><?= $g["customer_phone"] ?></td>
                    <td><?= $g["pet_type"] ?></td>
                    <td><?= $g["name"] ?></td>
                    <td>
                        <?php if ($g["pet_type"] == "Kucing") : ?>
                            Rp. <?= number_format($g["cost_for_cat"]) ?>
                        <?php else : ?>
                            Rp. <?= number_format($g["cost_for_dog"]) ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>