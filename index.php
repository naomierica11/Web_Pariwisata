<?php include('bagian/header.php'); ?>

<div class="hero-section">
    <div class="container">
        <h1 class="display-4">Selamat Datang di Tamasya</h1>
        <p class="lead">Temukan petualangan alam yang menakjubkan bersama kami</p>
    </div>
</div>

<div class="container my-5">
    <section class="mb-5">
        <h2 class="text-center mb-4">Paket Wisata Unggulan</h2>
        <div class="row">
            <?php
            $paketWisata = [
                ['CIC', 'Nikmati keindahan alam dan kenyamanan fasilitas di Ciwangun Indah Camp', 'cic.jpg'],
                ['Rancaupas', 'Jelajahi keindahan alam dan keberagaman satwa di Rancaupas', 'ru.jpg'],
                ['eMTe Highland Resort', 'Rasakan kemewahan alam dengan fasilitas modern di eMTe Highland Resort', 'eMTe.jpg']
            ];

            foreach ($paketWisata as $index => $paket) {
                echo '<div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm hover-card">
                        <img src="img/' . $paket[2] . '" class="card-img-top" alt="' . $paket[0] . '">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">' . $paket[0] . '</h5>
                            <p class="card-text flex-grow-1">' . $paket[1] . '</p>
                            <a href="formPemesanan.php?paket=' . ($index + 1) . '" class="btn btn-primary mt-auto">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </section>

    <section>
        <h2 class="text-center mb-4">Galeri Video</h2>
        <div class="row">
            <?php
            $videos = [
                ['Explore CIC', 'ys3yAoemyN0', 'ys3yAoemyN0?si=aN2D5QNpy6qI7-oF'],
                ['Explore Rancaupas', 'QIQHsaJnam8', 'QIQHsaJnam8?si=3CkoridWvxc-hppN'],
                ['Explore eMTe Highland Resort', 'DNMEMj2VEoY', 'DNMEMj2VEoY?si=btejeCbuxYJdFcK0']
            ];

            foreach ($videos as $video) {
                echo '<div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm hover-card">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' . $video[1] . '" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">' . $video[0] . '</h5>
                            <a href="https://youtu.be/' . $video[2] . '" class="btn btn-outline-primary btn-block" target="_blank">Tonton di YouTube</a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </section>
</div>

<?php include('bagian/footer.php'); ?>