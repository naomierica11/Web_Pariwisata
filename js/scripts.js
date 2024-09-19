$(document).ready(function() {
    const hargaLayanan = {
        penginapan: 1000000,
        transportasi: 1200000,
        makanan: 500000
    };

    function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function hitungHarga() {
        let durasi = parseInt($('#durasi_wisata').val()) || 0;
        let jumlahPeserta = parseInt($('#jumlah_peserta').val()) || 0;
        
        if (durasi && jumlahPeserta) {
            let hargaLayananTotal = 0;
            if ($('#layanan_penginapan').is(':checked')) hargaLayananTotal += hargaLayanan.penginapan;
            if ($('#layanan_transportasi').is(':checked')) hargaLayananTotal += hargaLayanan.transportasi;
            if ($('#layanan_makanan').is(':checked')) hargaLayananTotal += hargaLayanan.makanan;
            
            let hargaPaket = durasi * hargaLayananTotal;
            let totalTagihan = hargaPaket * jumlahPeserta;
            
            $('#harga_paket').val(formatRupiah(hargaPaket));
            $('#jumlah_tagihan').val(formatRupiah(totalTagihan));
        } else {
            $('#harga_paket').val('');
            $('#jumlah_tagihan').val('');
        }
    }

    $('#hitungHarga').on('click', hitungHarga);

    $('#bookingForm').on('submit', function(e) {
        if (!$('#id_paket_wisata').val()) {
            e.preventDefault();
            alert('Silakan pilih paket wisata terlebih dahulu.');
            return false;
        }

        if (!$('#layanan_penginapan').is(':checked') && !$('#layanan_transportasi').is(':checked') && !$('#layanan_makanan').is(':checked')) {
            e.preventDefault();
            alert('Silakan pilih minimal satu layanan paket.');
            return false;
        }

        hitungHarga();
        
        $('#harga_paket').val($('#harga_paket').val().replace(/[Rp. ]/g, ''));
        $('#jumlah_tagihan').val($('#jumlah_tagihan').val().replace(/[Rp. ]/g, ''));
    });
});