<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pemesan = $_POST['nama_pemesan'];
    $nomor_hp = $_POST['nomor_hp'];
    $tanggal_mulai_wisata = $_POST['tanggal_mulai_wisata'];
    $durasi_wisata = $_POST['durasi_wisata'];
    $id_paket_wisata = $_POST['id_paket_wisata'];
    $layanan_penginapan = isset($_POST['layanan_penginapan']) ? 1 : 0;
    $layanan_transportasi = isset($_POST['layanan_transportasi']) ? 1 : 0;
    $layanan_makanan = isset($_POST['layanan_makanan']) ? 1 : 0;
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $harga_paket = $_POST['harga_paket'];
    $jumlah_tagihan = $_POST['jumlah_tagihan'];
    $tanggal_pesanan = date('Y-m-d H:i:s');

    $sql = "INSERT INTO pesanan (nama_pemesan, nomor_hp, tanggal_mulai_wisata, tanggal_pesanan, durasi_wisata, id_paket_wisata, layanan_penginapan, layanan_transportasi, layanan_makanan, jumlah_peserta, harga_paket, jumlah_tagihan) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssiiiiiidd", $nama_pemesan, $nomor_hp, $tanggal_mulai_wisata, $tanggal_pesanan, $durasi_wisata, $id_paket_wisata, $layanan_penginapan, $layanan_transportasi, $layanan_makanan, $jumlah_peserta, $harga_paket, $jumlah_tagihan);

    if ($stmt->execute()) {
        echo "<script>alert('Pemesanan berhasil!'); window.location.href='daftarPesanan.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan. Silakan coba lagi.'); window.location.href='formPemesanan.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>