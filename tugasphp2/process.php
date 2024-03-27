<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // Hitung total belanja
    $total = $jumlah * $harga;

    // Diskon 5% jika total belanja di atas 500.000
    $diskon = ($total > 500000) ? 0.05 * $total : 0;

    // PPN 10% dari total belanja setelah diskon (jika ada)
    $ppn = 0.1 * ($total - $diskon);

    // Harga bersih
    $harga_bersih = $total - $diskon + $ppn;

    // Redirect ke halaman index.html dengan menyertakan hasil perhitungan
    header("Location: index.html?nama=$nama&produk=$produk&jumlah=$jumlah&harga=$harga&total=$total&diskon=$diskon&ppn=$ppn&harga_bersih=$harga_bersih");
    exit();
}
?>
