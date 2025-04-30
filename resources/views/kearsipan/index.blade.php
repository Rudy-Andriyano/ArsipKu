@extends('layouts.sidebar')

@section('content')



    <title>Pegawai - Tambah, Edit dan Hapus Data Pegawai</title>

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
        
            <!-- Konten -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tambah Data/</span>Penanggung jawab arsip</h4>
                <!-- Hover Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Penanggung jawab arsip</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        Tambah Penanggung jawab arsip
                    </button>
                    </div>
                    <div class="container mb-4">
                      <form action="{{ route('kearsipan.index') }}" method="GET">
                        <div class="row g-3 align-items-center">
                          <div class="col-md-4">
                            <select name="category" class="form-select">
                              <option value="">Pilih Kategori</option>
                              <option value="nama" {{ request('category') == 'nama' ? 'selected' : '' }}>Nama</option>
                              <option value="nip" {{ request('category') == 'nip' ? 'selected' : '' }}>NIP</option>
                            </select>
                          </div>
                          <div class="col-md-4">
                            <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Ketik Yang Ingin Dicari...">
                          </div>
                          <div class="col-md-4">
                            <button type="button" class="btn btn-primary w-100">
                              <span class="tf-icons bx bx-search-alt-2"></span>&nbsp; 
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table id="datatable" class="table table-hover">
                            <thead class="text-left">
                                <tr>
                                    <th>NAMA</th>
                                    <th>NIP</th>
                                    <th>STATUS</th>
                                    <th>UBAH STATUS</th>
                                    <th>JABATAN</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>NOMOR HP</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach ($kearsipans as $kearsipan)
                                <tr>
                            <td>{{$kearsipan->nama}}</td>
                            <td>{{$kearsipan->nip}}</td>
                            <td>{{$kearsipan->status}}</td>
                            <td>
                              @if ($kearsipan->status == 'AKTIF')
                                <form action="{{ route('kearsipan.updateStatus', $kearsipan->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Status pegawai tersebut?')">AKTIF</button>
                                </form>
                                @else
                                <form action="{{ route('kearsipan.updateStatus', $kearsipan->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda Yakin Ingin Mengubah Status pegawai tersebut?')">IN AKTIF</button>
                                </form>
                                @endif 
                            </td>
                            <td>{{$kearsipan->jabatan}}</td>
                            <td>{{$kearsipan->jenis_kelamin}}</td>
                            <td>{{$kearsipan->nomor_hp}}</td>
                                <td>
                                  <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                    <a href="#editCategoryModal{{$kearsipan->id}}" data-bs-toggle="modal"class="dropdown-item"> 
                                    <i class="bx bx-edit-alt me-2"></i> Edit</a>
                                    <form action="{{route('kearsipan.destroy',$kearsipan->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit"
                                        class="dropdown-item" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')">
                                        <i class="bx bx-trash me-2"></i> Delete</button>
                                    </form>
                                    </div>
                                  </div>       
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /hover table rows -->
            </div>
            <!-- Table -->
            <!-- Modal Tambah Pegawai -->
            <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Tambah Penanggung jawab arsip</h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('kearsipan.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIP</label>
                                    <input type="text" class="form-control" name="nip" />
                                </div>
                                <div class="mb-3">
                                    <label for="namapegawai" class="form-label">Nama Pegawai</label>
                                    <input type="text" class="form-control" name="nama" />
                                </div>
                                <div class="mb-3">
                                    <label for="namapegawai" class="form-label">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="pria" id="defaultRadio1">
                                        <label class="form-check-label" for="defaultRadio1"> Laki - Laki </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="jenis_kelamin" class="form-check-input" type="radio" value="perempuan" id="defaultRadio1">
                                        <label class="form-check-label" for="defaultRadio1"> Perempuan </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" />
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">No Hp</label>
                                    <input type="text" class="form-control" name="nomor_hp" />
                                </div>
                                <div class="modal_footer mb-3">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" name="simpan" class="btn btn-primary"> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Update Pegawai -->
            @foreach ($kearsipans as $kearsipan)
            <div class="modal fade" id="editCategoryModal{{$kearsipan->id}}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel1">Edit Data Pegawai</h5>
                          <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                          ></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('kearsipan.update', $kearsipan->id)}}" method="POST">
                          @csrf
                          @method('PUT')
                      
                          <div class="mb-3">
                            <label for="nik" class="form-label">NIP</label>
                            <input type="text" class="form-control" name="nip" value="{{$kearsipan->nip}}" />
                        </div>
                        <div class="mb-3">
                            <label for="namapegawai" class="form-label">Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama" value="{{$kearsipan->nama}}"/>
                        </div>
                        <div class="mb-3">
                            <label for="namapegawai" class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input name="jenis_kelamin" class="form-check-input" type="radio" value="pria" id="defaultRadio1"
                                {{$kearsipan->jenis_kelamin == 'pria' ? 'checked':''}} >
                                <label class="form-check-label" for="defaultRadio1"> Laki - Laki </label>
                            </div>
                            <div class="form-check">
                                <input name="jenis_kelamin" class="form-check-input" type="radio" value="perempuan" id="defaultRadio1"
                                {{$kearsipan->jenis_kelamin == 'perempuan' ? 'checked':''}}>
                                <label class="form-check-label" for="defaultRadio1"> Perempuan </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="{{$kearsipan->jabatan}}"/>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">No Hp</label>
                            <input type="text" class="form-control" name="nomor_hp" value="{{$kearsipan->nomor_hp}}"/>
                        </div>
                        <div class="modal_footer mb-3">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="simpan" class="btn btn-warning"> Simpan</button>
                        </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
            @endforeach


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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.min.js"></script>

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