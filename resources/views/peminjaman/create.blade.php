
@extends('layouts.sidebar')

@section('content')
    




    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Arsip - Form Peminjaman </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" /> <!--important -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" /> -->

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar Atas Yang Ada Foto Profil -->
        
          <!-- / Navbar Atas Yang Ada Foto Profil -->

          <!-- Konten Utama -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span>Peminjaman Arsip</h4>
            <div class="row">
            <!-- Form Controls -->
            <div class="col-md-10">
            <div class="card mb-4">
              <div class="card-body">
              <form method="POST" action="{{route('peminjaman.store')}}" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                  <label for="user_id" class="form-label">Nama peminjam</label>
                  <select class="form-select" name="pegawai_id" id="pegawai_id" required>
                    <option value="" selected disabled>Pilih Nama Pegawai</option>
                    @foreach($pegawais as $pegawai)
                    @if($pegawai->status !== 'IN-AKTIF')
                      <option value="{{ $pegawai->id }}">{{ $pegawai->nama_pegawai }}</option>
                    @endif
                    @endforeach
                </select>
                
                </div>
                
                
                <div class="mb-3">
                <label for="category_id" class="form-label">Penanggung jawab</label>
                <select class="form-select" name="kearsipan_id" id="kearsipan_id" required>
                    <option value="" selected disabled>Pilih Nama pegawai</option>
                    @foreach($kearsipans as $kearsipan)
                    @if($kearsipan->status !== 'IN-AKTIF')
                        <option value="{{ $kearsipan->id }}">{{ $kearsipan->nama }} -> {{ $kearsipan->jabatan }}</option>
                    @endif
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                <label for="category_id" class="form-label">Perihal layanan</label>
                <input type="text" name="perihal" id="" class="form-control">
                </div>
                <div class="mb-3">
                <label for="category_id" class="form-label">arisp yang dipinjam</label>
                <input type="text" name="arsip_pinjam" id="" class="form-control">
                </div>

                <button class="btn btn-success" type="submit">SIMPAN</button>
            </div>
            </div>
            </div>
          </div>
          
            <!-- / Akhir Dari Konten -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , Dibuat Oleh Siswa Magang Dari SMKN 4
                  
                </div>
                <div>
                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    ></a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
<script>
    let canvas = document.getElementById("signature-pad");
    let signaturePad = new SignaturePad(canvas);
    let signatureDataInput = document.getElementById("signature-data");

    // Hapus tanda tangan
    document.getElementById("clear").addEventListener("click", function () {
        signaturePad.clear();
    });

    // Simpan tanda tangan sebelum submit form
    document.querySelector("form").addEventListener("submit", function (e) {
        if (!signaturePad.isEmpty()) {
            signatureDataInput.value = signaturePad.toDataURL(); // Simpan tanda tangan sebagai base64
        } else {
            alert("Harap tanda tangan sebelum mengirim!");
            e.preventDefault(); // Batalkan submit jika tanda tangan kosong
        }
    });
</script>
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <!-- <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script> -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
    @endsection
