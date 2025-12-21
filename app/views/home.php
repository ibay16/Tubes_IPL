<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
  <title>Zara Eyelash - Beauty & Treatment</title>
  <style>
    body {
      background: linear-gradient(180deg, #fde7ef, #fff);
    }

    :root {
      --btn-pink: #F5AFAF;
      --btn-pink-hover: #ee9a9a;
    }

    .navbar-color {
      background-color: #FDACAC;
    }

    .footer_color {
      background-color: #FDACAC;
    }


    /* Semua button */
    .btn {
      background-color: var(--btn-pink) !important;
      border-color: var(--btn-pink) !important;
      color: #000 !important;
    }

    /* Hover */
    .btn:hover {
      background-color: var(--btn-pink-hover) !important;
      border-color: var(--btn-pink-hover) !important;
      color: #000 !important;
    }

    /* Outline button (btn-outline-*) */
    .btn[class*="btn-outline"] {
      background-color: transparent !important;
      color: #000 !important;
      border: 2px solid var(--btn-pink) !important;
    }

    .btn[class*="btn-outline"]:hover {
      background-color: var(--btn-pink) !important;
      color: #000 !important;
    }

    /* Style untuk Carousel Item */
    .c_itm {
      height: 600px;
      position: relative;
    }

    /* Style untuk Gambar di Carousel */
    .c_img {
      height: 100%;
      object-fit: cover;
      filter: brightness(0.8);
    }

    /* Overlay untuk teks agar lebih terbaca */
    .c_itm::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.3);
      z-index: 1;
    }

    /* Memastikan caption di atas overlay */
    .carousel-caption {
      z-index: 2;
      padding-bottom: 5rem;
    }

    /* Card Styling */
    .card-img-top-custom {
      height: 50%;
      object-fit: cover;
    }

    .card-galery {
      height: 100%;
      width: 100%;
      object-fit: cover;
    }

    .card-galery-wrapper {
      height: 250px;
      width: 250px;
    }

    /* Footer Spacing */
    .footer-section {
      padding: 3rem 0;
    }
  </style>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-lg navbar-light navbar-color sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-dark" href="#"><i class="bi bi-star-fill text-warning me-2"></i> Zara Eyelash</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active fw-bold" aria-current="page" href="index.php?page=booking"><i class="bi bi-calendar-check me-1"></i> Go Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=admin"><i class="bi bi-person-fill-lock me-1"></i> Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- carousel -->
  <div class="container-fluid p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active c_itm">
          <img src="public/img/carousel1.jpeg" class="d-block w-100 c_img" alt="Nail Art Treatment" />
          <div class="carousel-caption d-block">
            <h1 class="display-4 fw-bold mb-3">Tampil Memukau dengan Nail Art Terbaru</h1>
            <p class="lead d-none d-sm-block">Ragam desain kuku yang cantik dan elegan, dikerjakan oleh profesional.</p>
            <a href="index.php?page=booking" class="btn btn-primary btn-lg mt-3 shadow-lg">Pesan Sekarang</a>
          </div>
        </div>

        <div class="carousel-item c_itm">
          <img src="public/img/carousel2.jpeg" class="d-block w-100 c_img" alt="Spa and Massage" />
          <div class="carousel-caption d-block">
            <h1 class="display-4 fw-bold mb-3">Percantik Matamu dengan Eyelash Terbaik</h1>
            <p class="lead d-none d-sm-block">Sentuhan lembut untuk tampilan natural setiap hari.</p>
            <a href="index.php?page=booking" class="btn btn-warning btn-lg mt-3 shadow-lg text-dark">Pesan Sekarang</a>
          </div>
        </div>

        <div class="carousel-item c_itm">
          <img src="public/img/carousel3.jpeg" class="d-block w-100 c_img" alt="Classic Nail Design" />
          <div class="carousel-caption d-block">
            <h1 class="display-4 fw-bold mb-3">Nail Art Stylish, Percaya Diri Meningkat</h1>
            <p class="lead d-none d-sm-block">Desain trendi dengan hasil maksimal.</p>
            <a href="index.php?page=booking" class="btn btn-outline-light btn-lg mt-3 shadow-lg">Pesan Sekarang</a>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <!-- treetment -->

  <div class="container mt-5 mb-5">
    <h2 class="text-center mb-4 fw-bold text-dark">💖 Layanan Perawatan Unggulan Kami</h2>
    <p class="text-center text-muted mb-5">Pilih perawatan kecantikan yang sesuai dengan kebutuhan dan gaya Anda.</p>

    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center mt-4">
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <img src="public/img/card1.jpeg" class="card-img-top card-img-top-custom" alt="Eyelash Extension" />
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-primary">Classic Eyelash Extension</h5>
            <p class="card-text text-muted">Bulu mata lentik alami untuk tampilan natural sehari-hari.</p>
            <a href="#" class="btn btn-outline-primary mt-2">Book Treatments</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <img src="public/img/card2.jpeg" class="card-img-top card-img-top-custom" alt="Premium Nail Art" />
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-success">Natural Eyelash Extension</h5>
            <p class="card-text text-muted">Memberi efek rapi dan ringan dengan hasil yang terlihat natural.</p>
            <a href="#" class="btn btn-outline-success mt-2">Book Treatments</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <img src="public/img/card3.jpeg" class="card-img-top card-img-top-custom" alt="Spa Manicure" />
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-danger">Volume Eyelash Extension</h5>
            <p class="card-text text-muted">Bulu mata lebih tebal dan dramatis tanpa terasa berat.</p>
            <a href="#" class="btn btn-outline-danger mt-2">Book Treatments</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center mt-4">
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <img src="public/img/card4.jpeg" class="card-img-top card-img-top-custom" alt="Lash Lift" />
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-info">Natural Nail Art</h5>
            <p class="card-text text-muted">Desain kuku simpel dengan warna lembut dan elegan.</p>
            <a href="#" class="btn btn-outline-info mt-2">Book Treatments</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <img src="public/img/card5.jpeg" class="card-img-top card-img-top-custom" alt="Keratin Treatment" />
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-secondary">Elegant Nail Art</h5>
            <p class="card-text text-muted">Kombinasi warna dan detail halus untuk tampilan kuku mewah.</p>
            <a href="#" class="btn btn-outline-secondary mt-2">Book Treatments</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <img src="public/img/card6.jpeg" class="card-img-top card-img-top-custom" alt="Body Massage" />
          <div class="card-body text-center">
            <h5 class="card-title fw-bold text-warning">Floral Nail Art</h5>
            <p class="card-text text-muted">Hiasan kuku bermotif bunga yang cantik dan feminin.</p>
            <a href="#" class="btn btn-outline-warning mt-2">Book Treatments</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Gallery -->
  <div class="container mb-5">
    <div class="row">
      <div class="card text-center">
        <div class="card-header" style="background-color: #FD7979;">
          <h3>Gallery Zara Eyelash</h3>
        </div>
        <div class="container">
          <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center mt-4">
            <div class="col">
              <div class="card card-galery-wrapper" style="width: 18rem;">
                <img src="public/img/galeri1.jpeg" class="card-img-top card-galery" alt="...">
                <div class="card-body"></div>
              </div>
            </div>
            <div class="col">
              <div class="card card-galery-wrapper" style="width: 18rem;">
                <img src="public/img/galeri2.jpeg" class="card-img-top card-galery" alt="...">
                <div class="card-body"></div>
              </div>
            </div>
            <div class="col">
              <div class="card card-galery-wrapper" style="width: 18rem;">
                <img src="public/img/galeri3.jpeg" class="card-img-top card-galery " alt="...">
                <div class="card-body"></div>
              </div>
            </div>
            <div class="col">
              <div class="card card-galery-wrapper" style="width: 18rem;">
                <img src="public/img/galeri4.jpeg" class="card-img-top card-galery" alt="...">
                <div class="card-body"></div>
              </div>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center mt-4">
            <div class="col">
              <div class="card card-galery-wrapper" style="width: 18rem;">
                <img src="public/img/galeri5.jpeg" class="card-img-top card-galery" alt="...">
                <div class="card-body"></div>
              </div>
            </div>
            <div class="col">
              <div class="card card-galery-wrapper" style="width: 18rem;">
                <img src="public/img/galeri6.jpeg" class="card-img-top card-galery" alt="...">
                <div class="card-body"></div>
              </div>
            </div>
            <div class="col">
              <div class="card card-galery-wrapper" style="width: 18rem;">
                <img src="public/img/galeri7.jpeg" class="card-img-top card-galery" alt="...">
                <div class="card-body"></div>
              </div>
            </div>
            <div class="col ">
              <div class="card card-galery-wrapper" style="width: 18rem;">
                <img src="public/img/galeri8.jpeg" class="card-img-top card-galery" alt="...">
                <div class="card-body"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-body-secondary">
          2 days ago
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="container my-4">
          <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
              <h3 class="mb-3">Tulis Komentar Anda</h3>
              <form action="index.php?page=home&action=sendComment" method="POST">
                <div class="mb-3">
                  <label for="reviewComment" class="form-label visually-hidden">Tulis Komentar di Sini</label>
                  <textarea
                    class="form-control"
                    name="comment_text"
                    id="reviewComment"
                    rows="5"
                    placeholder="Tulis ulasan atau komentar Anda di sini..."
                    required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer_color text-dark footer-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mb-3 mb-md-0">
          <h4 class="fw-bold text-black mb-2"><i class="bi bi-star-fill text-warning me-2"></i> Zara Eyelash</h4>
          <p class="">ZaraEyelash Indonesia is a premium beauty studio specializing in eyelash extensions, lash lift, and brow treatments.
            Located in Indonesia, ZaraEyelash was established to provide high-quality beauty services with professional standards. Since its establishment, ZaraEyelash has been known for its comfortable atmosphere, skilled therapists, and satisfying results that enhance natural beauty.</p>
          <p class="S">&copy; 2025 Zara Eyelash. All Rights Reserved.</p>
        </div>

        <div class="col-md-6">
          <h5 class="text-end text-black mb-3">Ikuti Kami</h5>
          <div class="text-end">
            <a href="#" class="text-black me-3"><i class="bi bi-whatsapp fs-3 opacity-75 hover-opacity-100"></i></a>
            <a href="#" class="text-black me-3"><i class="bi bi-instagram fs-3 opacity-75 hover-opacity-100"></i></a>
            <a href="#" class="text-black me-3"><i class="bi bi-twitter-x fs-3 opacity-75 hover-opacity-100"></i></a>
            <a href="#" class="text-black"><i class="bi bi-facebook fs-3 opacity-75 hover-opacity-100"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>