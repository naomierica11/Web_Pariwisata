<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id_pesanan = $_GET['id'];
    
    $sql = "DELETE FROM pesanan WHERE id_pesanan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_pesanan);
    
    if ($stmt->execute()) {
        echo "<script>alert('Pesanan berhasil dihapus!'); window.location.href='daftarPesanan.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus pesanan.'); window.location.href='daftarPesanan.php';</script>";
    }
} else {
    echo "<script>alert('ID pesanan tidak valid.'); window.location.href='daftarPesanan.php';</script>";
}

$conn->close();
?>