<?php 
include('bagian/header.php');
include('koneksi.php');

$sql = "SELECT * FROM pesanan ORDER BY id_pesanan DESC";
$result = $conn->query($sql);
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Daftar Pesanan</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Pemesan</th>
                    <th>Nomor HP</th>
                    <th>Tanggal Mulai</th>
                    <th>Durasi</th>
                    <th>Paket</th>
                    <th>Layanan</th>
                    <th>Jumlah Peserta</th>
                    <th>Total Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_pesanan"] . "</td>";
                        echo "<td>" . $row["nama_pemesan"] . "</td>";
                        echo "<td>" . $row["nomor_hp"] . "</td>";
                        echo "<td>" . $row["tanggal_mulai_wisata"] . "</td>";
                        echo "<td>" . $row["durasi_wisata"] . " hari</td>";
                        echo "<td>" . ($row["id_paket_wisata"] == 1 ? "CIC" : "Rancaupas") . "</td>";
                        $layanan = [];
                        if ($row["layanan_penginapan"]) $layanan[] = "Penginapan";
                        if ($row["layanan_transportasi"]) $layanan[] = "Transportasi";
                        if ($row["layanan_makanan"]) $layanan[] = "Makanan";
                        echo "<td>" . implode(", ", $layanan) . "</td>";
                        echo "<td>" . $row["jumlah_peserta"] . "</td>";
                        echo "<td>Rp " . number_format($row["jumlah_tagihan"], 0, ',', '.') . "</td>";
                        echo "<td>
                                <a href='editPesanan.php?id=" . $row["id_pesanan"] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <button onclick='konfirmasiHapus(" . $row["id_pesanan"] . ")' class='btn btn-danger btn-sm'>Hapus</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10' class='text-center'>Tidak ada pesanan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function konfirmasiHapus(id) {
    if (confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) {
        window.location.href = 'hapusPesanan.php?id=' + id;
    }
}
</script>

<?php 
$conn->close();
include('bagian/footer.php'); 
?>