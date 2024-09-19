<?php include('bagian/header.php'); ?>

<div class="container my-5">
    <h2 class="text-center mb-4">Form Pemesanan Paket Wisata</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="booking.php" method="post" id="bookingForm" class="bg-light p-4 rounded shadow">
                <div class="form-group">
                    <label for="nama_pemesan">Nama Pemesan</label>
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tanggal_mulai_wisata">Tanggal Mulai Wisata</label>
                        <input type="date" class="form-control" id="tanggal_mulai_wisata" name="tanggal_mulai_wisata" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="durasi_wisata">Durasi Wisata (hari)</label>
                        <input type="number" class="form-control" id="durasi_wisata" name="durasi_wisata" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_paket_wisata">Pilih Paket Wisata</label>
                    <select class="form-control" id="id_paket_wisata" name="id_paket_wisata" required>
                        <option value="">Pilih Paket Wisata</option>
                        <option value="1">Ciwangun Indah Camp (CIC)</option>
                        <option value="2">Rancaupas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Layanan Tambahan</label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="layanan_penginapan" name="layanan_penginapan" value="1">
                        <label class="custom-control-label" for="layanan_penginapan">Penginapan (Rp. 1.000.000)</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="layanan_transportasi" name="layanan_transportasi" value="1">
                        <label class="custom-control-label" for="layanan_transportasi">Transportasi (Rp. 1.200.000)</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="layanan_makanan" name="layanan_makanan" value="1">
                        <label class="custom-control-label" for="layanan_makanan">Makanan (Rp. 500.000)</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jumlah_peserta">Jumlah Peserta</label>
                    <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="harga_paket">Harga Paket</label>
                        <input type="text" class="form-control" id="harga_paket" name="harga_paket" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jumlah_tagihan">Total Tagihan</label>
                        <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" readonly>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="hitungHarga">Hitung Harga</button>
                <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
            </form>
        </div>
    </div>
</div>

<?php include('bagian/footer.php'); ?>