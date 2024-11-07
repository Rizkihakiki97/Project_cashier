<?php
// Mendefinisikan array untuk menyimpan barang yang dibeli
$items = [
    ["name" => "ciky Zeky", "price" => 2000, "quantity" => 15],
    ["name" => "okky JELLY drnk", "price" => 3000, "quantity" => 20],
    ["name" => "ciky coklat", "price" => 2000, "quantity" => 30],
    ["name" => "coffe yuk", "price" => 4000, "quantity" => 20],
];

// Menghitung total harga
$total = 0;
foreach ($items as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Mendefinisikan pajak (misalnya 10%)
$tax = 0.1 * $total;
$grandTotal = $total + $tax;
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Kasir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .receipt {
            width: 250px;
            border: 1px solid #000;
            padding: 10px;
            margin: 20px auto;
            text-align: center;
            background-color: #f5f5f5;
        }

        .receipt h2 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .receipt .item {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .receipt .total {
            font-weight: bold;
        }

        .receipt .footer {
            font-size: 12px;
            margin-top: 15px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="receipt">
        <h2>Struk Kasir</h2>
        <p>Nama Toko: Toko Elektronik</p>
        <p>Alamat: Jl. Raya No. 123</p>
        <hr>

        <?php foreach ($items as $item): ?>
            <div class="item">
                <span><?php echo $item['name']; ?></span>
                <span><?php echo "Rp " . number_format($item['price'], 0, ',', '.'); ?></span>
                <span>x <?php echo $item['quantity']; ?></span>
                <span><?php echo "Rp " . number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?></span>
            </div>
        <?php endforeach; ?>

        <hr>
        <div class="total">
            <p>Total: <?php echo "Rp " . number_format($total, 0, ',', '.'); ?></p>
            <p>Pajak (10%): <?php echo "Rp " . number_format($tax, 0, ',', '.'); ?></p>
            <p><strong>Total Bayar: <?php echo "Rp " . number_format($grandTotal, 0, ',', '.'); ?></strong></p>
        </div>

        <div class="footer">
            <p>Terima kasih atas kunjungan Anda!</p>
            <p>Simak promo menarik kami!</p>
        </div>
    </div>

</body>

</html>