@extends('layouts.sidebar')

@section('content')



   
<title>Dashboard - Semua Arsip Yang Dipinjam </title>

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


<body>
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
    <div class="content-wrapper">
    <!-- Konten -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
          <div class="card-body ">
            <h5 class="card-title text-primary">Selamat Datang Di Peminjaman Arsip</h5>
            <p class="mb-3">
            Sistem peminjaman arsip ini dirancang untuk mempermudah pengelolaan dokumen penting. 
            Anda dapat meminjam arsip dengan cepat dan praktis melalui fitur yang tersedia.
            </p>

            <a href="{{route('peminjaman.create')}}" class="btn btn-sm btn-outline-primary">Pinjam Arsip</a>
          </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img
            src="../assets/img/illustrations/dashboard-image.png"
            height="140"
            alt="View Badge User"
            data-app-dark-img="illustrations/man-with-laptop-dark.png"
            data-app-light-img="illustrations/man-with-laptop-light.png"
            />
          </div>
          </div>
        </div>
        </div>
      </div>
      
      <div class="col-12 col-md-8 col-lg-4 order-3 order-md-1">
        <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" id="exclamation-triangle"><path fill="#FFCC00" d="M22.7,17.5l-8.1-14c-0.8-1.4-2.7-1.9-4.1-1.1C10,2.7,9.6,3.1,9.4,3.5l-8.1,14c-0.8,1.4-0.3,3.3,1.1,4.1c0.5,0.3,1,0.4,1.5,0.4h16.1c1.7,0,3-1.4,3-3C23.1,18.4,22.9,17.9,22.7,17.5z M12,18c-0.6,0-1-0.4-1-1s0.4-1,1-1s1,0.4,1,1S12.6,18,12,18z M13,13c0,0.6-0.4,1-1,1s-1-0.4-1-1V9c0-0.6,0.4-1,1-1s1,0.4,1,1V13z"></path></svg>
            </div>
            </div>
            <span class="fw-semibold d-block mb-1">Arsip Yang Belum Dikembalikan</span>
            <h3 class="card-title mb-2">{{$belumDikembalikan}}</h3>
          </div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
    <!-- Table -->
    <h4 class="fw-bold py-2 mb-4"><span class="text-muted fw-light">Dashboard</h4>
    <!-- Search bar -->
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Cari Data Peminjaman</h4>
        </div>
    <form action="{{ route('peminjaman.index') }}" method="GET" class="mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div class="col-md-4">
          <select name="category" class="form-select">
            <option value="">Select Category</option>
            <option value="arsip_pinjam" {{ request('category') == 'arsip_pinjam' ? 'selected' : '' }}>Arsip Pinjam</option>
            <option value="perihal" {{ request('category') == 'perihal' ? 'selected' : '' }}>Perihal</option>
            <option value="status" {{ request('category') == 'status' ? 'selected' : '' }}>Status</option>
          </select>
        </div>
        <div class="col-md-4">
          <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search...">
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>
    
    </div>
    <!-- /Search bar -->
    <div class="container-xxl flex-grow-1 container-p-y">
      
      
        <!--  -->
        <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4>LIST ARSIP YANG SEDANG DIPINJAM</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
          @if($peminjamans->isNotEmpty())
          <table id="datatable" class="table table-hover">
            <thead class="text-left">
            <tr>
              <th>NAMA PEGAWAI</th>
              <th>PENANGGUNG JAWAB</th>
              <th>ARSIP YANG DIPINJAM</th>
              <th>WAKTU PINJAM</th>
              <th>WAKTU KEMBALI</th>
              <th>STATUS</th>
              <th>PENGEMBALIAN</th>
              
              <th>AKSI</th>

            </tr>
          </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($peminjamans as $peminjam)
            <tr>
              <td>{{ $peminjam->pegawai->nama_pegawai }}</td>
              <td>{{ $peminjam->kearsipan->nama }}</td>
              <td>{{ $peminjam->arsip_pinjam }}</td>
              <td>{{ $peminjam->tanggal_pinjam }}</td>
                @if ($peminjam->tanggal_kembali== null )
                <td>Belum DiKembalikan</td>
                @else
                <td>{{ $peminjam->tanggal_kembali }}
                @endif
              </td>
              <td>{{ $peminjam->status}}</td>
              <td>
                @if($peminjam->status == 'dipinjam')
                  <form action="{{ route('peminjaman.updateStatus', $peminjam->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin Arsip sudah di kembalikan?')">Kembalikan</button>
                  </form>
                  @else
                  <button type="submit" class="btn btn-success" disabled>{{$peminjam->status}}</button>
                @endif

                

              </td>
    
    
                <td>
                <div class="btn-group position-relative">
                  <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                    <div class="dropdown-menu">
                      
                      

                      <a href="{{ route('generate.pdf', $peminjam->id) }}" class="dropdown-item">
                      <i class="bx bx-download me-2"></i> Download PDF
                    </a>
              
              <form action="{{route('peminjaman.destroy',$peminjam->id)}}" method="POST">
                  @csrf
                @method('DELETE')
            @if($peminjam->status == 'dipinjam')
            <a href="{{ route('peminjaman.edit', $peminjam->id) }}" class="dropdown-item"> 
              <i class="bx bx-edit-alt me-2"></i> Edit
            </a>
            <button type="submit"
          class="dropdown-item" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')">
          <i class="bx bx-trash me-2"></i> Delete</button>
                @else
                <button class="dropdown-item text-muted" disabled>
                <i class="bx bx-trash me-2"></i> DATA TIDAK BISA DIHAPUS
                </button>
                <button href="#" class="dropdown-item" disabled> 
                  <i class="bx bx-edit-alt me-2"></i> DATA TIDAK BISA DIEDIT
                </button>
            @endif
              </form>
                </div>
            </div>        
              </div>
                </td>
          @endforeach
          </tbody>
          </table>
          @else
    <p>No records found.</p>
  @endif
          </div>
        </div>
        </div>
        <!--  -->
      </div>
    </div>

    
    
    <!-- /table -->
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
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.min.js"></script>
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