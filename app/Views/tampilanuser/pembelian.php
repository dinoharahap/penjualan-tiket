<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian Tiket Sepak Bola</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://wallpapercave.com/wp/wp2124274.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group label {
            flex: 1;
            min-width: 150px;
            margin-right: 10px;
        }

        .form-group input,
        .form-group select {
            flex: 2;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #00aaff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const idTiketElement = document.getElementById('Id_tiket');
            const jumlahElement = document.getElementById('Jumlah');
            const totalHargaElement = document.getElementById('Total_harga');

            function calculateTotal() {
                const selectedOption = idTiketElement.options[idTiketElement.selectedIndex];
                const ticketPrice = parseFloat(selectedOption.getAttribute('data-price'));
                const ticketQuantity = parseInt(jumlahElement.value);
                if (!isNaN(ticketPrice) && !isNaN(ticketQuantity)) {
                    const totalPrice = ticketPrice * ticketQuantity;
                    totalHargaElement.value = totalPrice;
                } else {
                    totalHargaElement.value = '';
                }
            }

            idTiketElement.addEventListener('change', calculateTotal);
            jumlahElement.addEventListener('input', calculateTotal);
        });
    </script>
</head>

<body>
    <div class="form-container">
        <h1>Form Pembelian Tiket Sepak Bola</h1>
        <form action="<?= base_url(); ?>pembelian/simpandata" method="POST" enctype="multipart/form-data">
            <!-- <div class="form-group">
                <?php
                foreach ($pembelian as $pmb) :
                    $pmb['id_pembelian'] = 1;
                    $pmb['id_pembelian']++; ?>
                    <label for="Id_pembelian"><i class="fas fa-id-card"></i> ID Pembelian</label>
                    <input type="text" id="Id_pembelian" name="Id_pembelian" value="<?= $pmb['id_pembelian'] ?>" readonly>
                <?php endforeach; ?>
            </div> -->
            <div class="form-group">
                <label for="Id_pertandingan"><i class="fas fa-ticket-alt"></i> ID Pertandingan</label>
                <input type="text" id="Id_pertandingan" name="Id_pertandingan" value="<?= $prt['id_pertandingan'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Id_tiket"><i class="fas fa-ticket-alt"></i> ID Tiket</label>
                <select id="Id_tiket" name="Id_tiket" required>
                    <option selected disabled>--PILIH TRIBUN--</option>
                    <?php foreach ($pert as $p) { ?>
                        <option value="<?= $p['id_tiket'] ?>" data-price="<?= $p['harga'] ?>"><?= $p['id_tiket'] . '-' . $p['tribun'] . '-' . $p['harga'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Jumlah"><i class="fas fa-sort-numeric-up"></i> Jumlah</label>
                <input type="number" id="Jumlah" name="Jumlah" required>
            </div>
            <div class="form-group">
                <label for="Metode_pembayaran"><i class="fas fa-credit-card"></i> Metode Pembayaran</label>
                <select id="Metode_pembayaran" name="Metode_pembayaran" required>
                    <option value="" selected disabled>--PILIH--</option>
                    <option value="DANA-08736281-A.N Dino">DANA-08736281-A.N Dino</option>
                    <option value="BCA-92038920-A.N Dino">BCA-92038920-A.N Dino</option> 
                    <option value="MANDIRI-390221-A.N Dino">MANDIRI-390221-A.N Dino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Bukti_pembayaran"><i class="fas fa-file-upload"></i> Bukti Pembayaran</label>
                <input type="file" id="Bukti_pembayaran" name="Bukti_pembayaran" required>
            </div>
            <div class="form-group">
                <label for="Total_harga"><i class="fas fa-sort-numeric-up"></i> Total Harga</label>
                <input type="text" id="Total_harga" name="Total_harga" value="" readonly>
            </div>
            <div class="form-group">
                <label for="Tanggal_pembelian"><i class="fas fa-calendar-alt"></i> Tanggal Pembelian</label>
                <input type="text" id="Tanggal_pembelian" name="Tanggal_pembelian" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Status"><i class="fas fa-info-circle"></i> Status</label>
                <select id="Status" name="Status" required>
                    <option value="PENDING" selected>PENDING</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit"><i class="fas fa-paper-plane"></i> Submit</button>
            </div>
        </form>
    </div>
</body>

</html>