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
				<th>Nama Pembeli</th>
                <th>Nama Item</th>
                <th>Harga Item</th>
                <th>Qty</th>
                <th>Jumlah Bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($transaksi as $trx) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= date('d F Y', strtotime($trx["date_order"])); ?></td>
					<td><?= $trx["receipent_name"] ?></td>
                    <td><?= $trx["name"]; ?></td>
                    <td>Rp. <?= number_format($trx["price"]); ?></td>
                    <td><?= $trx["qty"] ?> Item</td>
                    <td>Rp. <?= number_format($trx["total_price"]); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
