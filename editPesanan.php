<?php
include('bagian/header.php');
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_pesanan = $_GET['id'];
    $sql = "SELECT * FROM pesanan WHERE id_pesanan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_pesanan);
    $stmt->execute();
    $result = $stmt->get_result();
    $pesanan = $result->fetch_assoc();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pesanan = $_POST['id_pesanan'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $nomor_hp = $_POST['nomor_hp'];
    $tanggal_mulai_wisata = $_POST['tanggal_mulai_wisata'];
    $durasi_wisata = $_POST['durasi_wisata'];
    $layanan_penginapan = isset($_POST['layanan_penginapan']) ? 1 : 0;
    $layanan_transportasi = isset($_POST['layanan_transportasi']) ? 1 : 0;
    $layanan_makanan = isset($_POST['layanan_makanan']) ? 1 : 0;
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $harga_paket = $_POST['harga_paket'];
    $jumlah_tagihan = $_POST['jumlah_tagihan'];

    $sql = "UPDATE pesanan SET nama_pemesan=?, nomor_hp=?, tanggal_mulai_wisata=?, durasi_wisata=?, 
            layanan_penginapan=?, layanan_transportasi=?, layanan_makanan=?, jumlah_peserta=?, 
            harga_paket=?, jumlah_tagihan=? WHERE id_pesanan=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiiiiiddi", $nama_pemesan, $nomor_hp, $tanggal_mulai_wisata, $durasi_wisata, 
                      $layanan_penginapan, $layanan_transportasi, $layanan_makanan, $jumlah_peserta, 
                      $harga_paket, $jumlah_tagihan, $id_pesanan);

    if ($stmt->execute()) {
        echo "<script>alert('Pesanan berhasil diperbarui!'); window.location.href='daftarPesanan.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan. Silakan coba lagi.');</script>";
    }
}
?>

<div class="container my-5">
    <h2>Edit Pesanan</h2>
    <form action="editPesanan.php" method="post" id="editForm">
        <input type="hidden" name="id_pesanan" value="<?php echo $pesanan['id_pesanan']; ?>">
        <div class="form-group">
            <label for="nama_pemesan">Nama Pemesan</label>
            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="<?php echo $pesanan['nama_pemesan']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nomor_hp">Nomor HP</label>
            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?php echo $pesanan['nomor_hp']; ?>" required>
        </div>
        <div class="form-group">
            <label for="tanggal_mulai_wisata">Tanggal Mulai Wisata</label>
            <input type="date" class="form-control" id="tanggal_mulai_wisata" name="tanggal_mulai_wisata" value="<?php echo $pesanan['tanggal_mulai_wisata']; ?>" required>
        </div>
        <div class="form-group">
            <label for="durasi_wisata">Durasi Wisata (hari)</label>
            <input type="number" class="form-control" id="durasi_wisata" name="durasi_wisata" value="<?php echo $pesanan['durasi_wisata']; ?>" required>
        </div>
        <div class="form-group">
            <label>Layanan Tambahan</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="layanan_penginapan" name="layanan_penginapan" <?php echo $pesanan['layanan_penginapan'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="layanan_penginapan">Penginapan</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="layanan_transportasi" name="layanan_transportasi" <?php echo $pesanan['layanan_transportasi'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="layanan_transportasi">Transportasi</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="layanan_makanan" name="layanan_makanan" <?php echo $pesanan['layanan_makanan'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="layanan_makanan">Makanan</label>
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah_peserta">Jumlah Peserta</label>
            <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?php echo $pesanan['jumlah_peserta']; ?>" required>
        </div>
        <div class="form-group">
            <label for="harga_paket">Harga Paket</label>
            <input type="text" class="form-control" id="harga_paket" name="harga_paket" value="<?php echo $pesanan['harga_paket']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="jumlah_tagihan">Total Tagihan</label>
            <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" value="<?php echo $pesanan['jumlah_tagihan']; ?>" readonly>
        </div>
        <button type="button" class="btn btn-secondary" id="hitungHarga">Hitung Ulang Harga</button>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<?php include('bagian/footer.php'); ?>