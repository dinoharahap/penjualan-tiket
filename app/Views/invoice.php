<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .invoice-details {
            margin-bottom: 30px;
        }

        .invoice-details p {
            margin: 10px 0;
            font-size: 16px;
        }

        .ticket {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
        }

        .ticket h2 {
            color: #333;
            text-align: center;
        }

        .ticket-info {
            margin-top: 20px;
        }

        .ticket-info p {
            margin: 10px 0;
            font-size: 16px;
        }

        .barcode {
            text-align: center;
            margin-top: 20px;
        }

        .barcode img {
            max-width: 80%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Pertandingan Sepakbola</h1>

        <div class="invoice-details">
            <p>ID Pembelian: <?= $pembelian['id_pembelian']; ?></p>
            <p>ID Pertandingan: <?= $pembelian['id_pertandingan']; ?></p>
            <p>ID Tiket: <?= $pembelian['id_tiket']; ?></p>
            <!-- Tambahkan informasi lainnya sesuai kebutuhan -->
        </div>

        <div class="ticket">
            <h2>Tiket Pertandingan</h2>
            <div class="ticket-info">
                <p>Tim Tuan Rumah : <?= $pertandingan['tim_tuan_rumah']; ?></p>
                <p>Tim Tamu : <?= $pertandingan['tim_tamu']; ?></p>
                <p>Tanggal : <?= $pertandingan['tanggal']; ?></p>
                <p>Stadion : <?= $pertandingan['stadion']; ?></p>
                <!-- Tambahkan informasi tiket lainnya -->
            </div>
            <div class="barcode">
                <img src="https://th.bing.com/th/id/OIP.v13LZtvg6zloWw39JAEnVwHaHa?rs=1&pid=ImgDetMain" alt="Barcode" height="100px">
            </div>
        </div>
    </div>
</body>

</html>