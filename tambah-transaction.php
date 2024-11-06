<?php
session_start();
session_regenerate_id();
date_default_timezone_set("Asia/Jakarta");
require_once "koneksi.php";

// Waktu:
$currentTime = date("Y-m-d");

// generateTransactionCode()
function generateTransactionCode()
{

    $kode = date("Y-m-d");
    return $kode;
}
// cliclk_count
if (empty($_SESSION['click_count'])) {
    $_SESSION['click_count'] = 0;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.3/dist/css//bootstrap.min.css">
</head>

<body>

    <!-- <nav class="navbar navbar-expand-lg" style="background-color: #bee1fa;"> -->
    <div class="container justify-content-center">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card mt-5" style="width: 100%; max-width: 800px;">
                <div class="card-header">
                    <h1>Tambah Transaksi</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="">Kode Transaksi</label>
                            <input class="form-control w-50" type="text"
                                value="<?php echo "TR-" . generateTransactionCode() ?>" readonly>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="">Tanggal Transaksi</label>
                            <input class="form-control w-50" name="tanggal_transaksi" id="tanggal_transaksi" type="date"
                                value="<?php echo $currentTime ?>" readonly>
                        </div>
                        <div class="col-2 d-flex">
                            <button class="btn btn-primary btn-sm" type="button" id="counterBtn">Tambah</button>
                            <input type="number" style="width: 100px" name="countDisplay"
                                value="<?php echo $_SESSION['click_count'] ?>" id="countDisplay">
                        </div>
                        <div class="table table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Sisa Produk</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <!-- data ditambah disini -->
                                </tbody>
                                <tfoot class="text-center">
                                    <tr>
                                        <th colspan="5">Total Harga</th>
                                        <td><input type="number" id="total_harga_keseluruhan" name="total_harga"
                                                class="form-control" readonly></td>
                                    </tr>
                                    <tr>
                                        <th colspan="5">Nominal Bayar</th>
                                        <td><input type="number" id="nominal_bayar_keseluruhan" name="nominal_bayar"
                                                class="form-control" readonly></td>
                                    </tr>
                                    <tr>
                                        <th colspan="5">Kembalian</th>
                                        <td><input type="number" class="form-control" id="kembalian_keseluruhan"
                                                name="kembalian" readonly></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" name="simpan" value="Hitung">
                            <a href="kasir.php" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM kategori_barang");
    $categories = mysqli_fetch_all($query, MYSQLI_ASSOC);

    ?>




    <script src="bootstrap-5.3.3/dist/js/bootstrap.bundle.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // fungsi tambah baris
            const button = document.getElementById('counterBtn');
            const countDisplay = document.getElementById('countDisplay');
            const tbody = document.getElementById('tbody');

            button.addEventListener('click', function() {
                let currentCount = parseInt(countDisplay.value) || 0;
                currentCount++;
                countDisplay.value = currentCount;
                // Fungsi tambah td
                let newRow = "<>";
                newRow += "<td>" + currentCount + "</td>";
                newRow += "<td><select class='form-control category-select' name='id_kategori[]' required>";
                newRow += "<option value=''>--Pilih Kategori--</option>";
                <?php foreach ($categories as $category) { ?>
                    newRow +=
                        "<option value='<?php echo $category['id'] ?>'><?php echo $category['nama_kategori'] ?></option>";

                <?php
                } ?>
                newRow += "</select></td>";
                newRow += "<td><select class='form-control item-select' name='id_kategori[]' required>";
                newRow += "<option value=''>--Pilih Barang--</option>";
                newRow +=
                    "<td?><input type='number' name='jumlah[]' class='form-control jumlah-input' value='0' required></td>";
                newRow += "<td></td>";
                newRow += "<td></td>";
                newRow += "</tr>";
                tbody.insertAdjacentHTML('beforeend', newRow);
            })
        })
    </script>
</body>

</html>