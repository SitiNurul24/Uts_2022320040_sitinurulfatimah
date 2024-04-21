<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Booking Report</h2>
    <table>
        <thead>
            <tr>
                <th>Ruangan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Nama</th>
                <th>Detail</th>
                <th>Tanggal Pemesanan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($bookingRecords as $record): ?>
            <tr>
                <td><?= $record->roomNumber ?><br><?= $record->floorName ?> (<?= $record->floorCode ?>)<br><?= $record->sizeTitle ?></td>
                <td><?= $record->bookStartDate ?></td>
                <td><?= $record->bookEndDate ?></td>
                <td><?= $record->customerName ?><br><?= !empty($record->customerPhone)? $record->customerPhone."<br>" : ''; ?><?= $record->customerEmail ?></td>
                <td><?= $record->bookingComments ?></td>
                <td><?= $record->bookingDtm ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
