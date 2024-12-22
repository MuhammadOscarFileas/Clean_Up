<!DOCTYPE html>
<html>
<head>
  <title>Popup Example</title>
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 50%;
    }

    .modal-header {
      background-color: #007bff;
      color: white;
      padding: 10px;
      font-size: 18px;
      font-weight: bold;
    }

    .modal-body {
      padding: 20px;
    }

    .rating {
      color: #ffc107;
      font-size: 24px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="container my-5">
    <h2>Popup Example</h2>
    <button class="btn btn-primary" id="myBtn">Open Popup</button>
  </div>

  <div id="myModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span>Terimakasih Telah Menggunakan Jasa Cleanup</span>
        <span class="close">&times;</span>
      </div>
      <div class="modal-body">
        <p>Untuk Pengalaman yang Lebih Baik</p>
        <p>Beri Rating Untuk Pekerja:</p>
        <div class="rating">
          <span>&#9733;</span>
          <span>&#9733;</span>
          <span>&#9733;</span>
          <span>&#9733;</span>
          <span>&#9733;</span>
        </div>
        <h3>Detail Pesanan</h3>
        <p>Jenis: Kamar Mandi + Ruang Tamu</p>
        <p>Durasi: 3 Jam</p>
        <p>Alat: Tidak menggunakan alat</p>
        <p>Waktu: 10.00 WIB</p>
        <h3>Detail Pembayaran</h3>
        <p>Total: Rp 240.000,-</p>
        <p>Metode: Mbayar - BCA</p>
        <p>Status: Sudah Dibayarkan</p>
      </div>
    </div>
  </div>

  <script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function () {
      modal.style.display = "block";
    }

    span.onclick = function () {
      modal.style.display = "none";
    }

    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

</body>
</html>