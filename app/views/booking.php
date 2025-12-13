<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>ZaraEyelash Booking</title>

  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500;600&display=swap"
    rel="stylesheet">

  <style>
    :root {
      --pink: #e91e63;
      --pink-dark: #b0134f;
      --bg: #fde7ef;
      --card: #ffffff;
      --radius: 14px;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(180deg, var(--bg), #fff);
      font-family: "Inter", sans-serif;
    }

    .card {
      width: 100%;
      max-width: 520px;
      background: var(--card);
      padding: 28px 26px;
      border-radius: var(--radius);
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.10);
    }

    .brand {
      text-align: center;
      margin-bottom: 22px;
    }

    .brand h1 {
      font-family: "Playfair Display", serif;
      font-size: 30px;
      letter-spacing: 1.5px;
      margin: 0;
      color: var(--pink-dark);
    }

    .brand p {
      margin-top: 4px;
      font-size: 12px;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: #777;
    }

    label {
      font-size: 13px;
      margin-top: 10px;
      display: block;
    }

    input,
    select,
    textarea {
      width: 100%;
      padding: 11px 12px;
      margin-top: 6px;
      border-radius: 9px;
      border: 1px solid #ddd;
      font-size: 14px;
    }

    textarea {
      min-height: 80px;
    }

    .row {
      display: flex;
      gap: 12px;
    }

    .col {
      flex: 1;
    }

    .actions {
      margin-top: 18px;
      display: flex;
      gap: 10px;
    }

    button {
      flex: 1;
      padding: 11px;
      border: none;
      border-radius: 9px;
      cursor: pointer;
      font-weight: 600;
    }

    .btn-secondary {
      background: #eee;
    }

    .btn-primary {
      background: var(--pink);
      color: white;
    }

    .btn-primary:hover {
      background: var(--pink-dark);
    }

    .success-msg {
      display: none;
      margin-top: 14px;
      background: #e6ffef;
      border: 1px solid #b6f0c9;
      padding: 10px;
      border-radius: 8px;
      text-align: center;
      color: #0b7a3a;
    }

    /* MODAL PREVIEW */
    .modal-bg {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.5);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 999;
    }

    .modal {
      background: #fff;
      border-radius: 12px;
      padding: 22px;
      width: 90%;
      max-width: 400px;
    }

    .modal h3 {
      text-align: center;
      margin-top: 0;
      color: var(--pink-dark);
    }

    .preview-item {
      font-size: 14px;
      margin-bottom: 8px;
    }

    .preview-item span {
      font-weight: 600;
      color: #333;
    }
  </style>
</head>

<body>

  <div class="card">
    <div class="brand">
      <h1>ZaraEyelash</h1>
      <p>Book Your Treatment</p>
    </div>

    <form id="bookingForm" novalidate>

      <label>Nama</label>
      <input type="text" name="nama" placeholder="Contoh: Fifin" required>

      <label>No HP</label>
      <input type="text" name="no_hp" placeholder="Contoh: 081234567890" required>

      <label>Email</label>
      <input type="email" name="email" placeholder="Contoh: fifin@gmail.com" required>

      <label>Layanan</label>
      <select name="layanan" required>
        <option value="">-- Pilih Layanan --</option>
        <option>Eyelash</option>
        <option>Nail Art</option>
        <option>Manicure</option>
        <option>Pedicure</option>
      </select>

      <div class="row">
        <div class="col">
          <label>Tanggal</label>
          <input type="date" name="tanggal" required>
        </div>
        <div class="col">
          <label>Jam</label>
          <input type="time" name="jam" required>
        </div>
      </div>

      <label>Catatan</label>
      <textarea name="catatan" placeholder="Contoh: saya ada alergi lem, dll"></textarea>

      <div class="actions">
        <button type="reset" class="btn-secondary">Reset</button>
        <button type="submit" class="btn-primary">Kirim</button>
      </div>

      <div class="success-msg" id="successMsg">
        Booking berhasil dikirim (Demo)
      </div>

    </form>
  </div>

  <!-- MODAL PREVIEW -->
  <div class="modal-bg" id="previewModal">
    <div class="modal">
      <h3>Preview Booking</h3>

      <div class="preview-item"><span>Nama:</span> <span id="pNama"></span></div>
      <div class="preview-item"><span>No HP:</span> <span id="pHp"></span></div>
      <div class="preview-item"><span>Email:</span> <span id="pEmail"></span></div>
      <div class="preview-item"><span>Layanan:</span> <span id="pLayanan"></span></div>
      <div class="preview-item"><span>Tanggal:</span> <span id="pTanggal"></span></div>
      <div class="preview-item"><span>Jam:</span> <span id="pJam"></span></div>
      <div class="preview-item"><span>Catatan:</span> <span id="pCatatan"></span></div>

      <div class="actions">
        <button class="btn-secondary" onclick="tutupPreview()">Edit</button>
        <button class="btn-primary" onclick="konfirmasiKirim()">Konfirmasi</button>
      </div>
    </div>
  </div>

  <script>
    const form = document.getElementById("bookingForm");
    const modal = document.getElementById("previewModal");
    const successMsg = document.getElementById("successMsg");

    form.addEventListener("submit", function (e) {
      e.preventDefault();
      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      pNama.textContent = form.nama.value;
      pHp.textContent = form.no_hp.value;
      pEmail.textContent = form.email.value;
      pLayanan.textContent = form.layanan.value;
      pTanggal.textContent = form.tanggal.value;
      pJam.textContent = form.jam.value;
      pCatatan.textContent = form.catatan.value || "-";

      modal.style.display = "flex";
    });

    function tutupPreview() {
      modal.style.display = "none";
    }

    function konfirmasiKirim() {
      modal.style.display = "none";
      successMsg.style.display = "block";
      form.reset();
      setTimeout(() => successMsg.style.display = "none", 3000);
    }
  </script>

</body>

</html>