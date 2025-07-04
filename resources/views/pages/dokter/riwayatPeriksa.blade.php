@include('layouts.header', ['title' => 'Dokter | Riwayat Periksa'])

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item"><a href="/pages/dokter" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Dashboard</p></a></li>
        <li class="nav-item"><a href="/pages/dokter/jadwalPeriksa" class="nav-link"><i class="nav-icon fas fa-calendar-week"></i><p>Jadwal Periksa</p></a></li>
        <li class="nav-item"><a href="/pages/dokter/periksaPasien" class="nav-link"><i class="nav-icon fas fa-user-injured"></i><p>Periksa Pasien</p></a></li>
        <li class="nav-item"><a href="/pages/dokter/riwayatPeriksa" class="nav-link active"><i class="nav-icon fas fa-history"></i><p>Riwayat Periksa</p></a></li>
        <li class="nav-item"><a href="/pages/dokter/profile" class="nav-link"><i class="nav-icon fas fa-user"></i><p>Edit Profile</p></a></li>
    </ul>
</nav>
</div>
</aside>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dokter</a></li>
                        <li class="breadcrumb-item active">Riwayat Periksa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header"><h3 class="card-title">Riwayat Periksa Pasien</h3></div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pasien</th>
                                <th>Keluhan</th>
                                <th>Alamat</th>
                                <th>No KTP</th>
                                <th>No Telp</th>
                                <th>No RM</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPeriksa as $periksa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $periksa->pasien->nama }}</td>
                                    <td>{{ $periksa->keluhan }}</td>
                                    <td>{{ $periksa->pasien->alamat }}</td>
                                    <td>{{ $periksa->pasien->no_ktp }}</td>
                                    <td>{{ $periksa->pasien->no_hp }}</td>
                                    <td>{{ $periksa->pasien->no_rm }}</td>
                                    <td>
                                        @if ($periksa->periksa)
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalRincian{{ $periksa->id }}">
                                                RINCIAN
                                            </button>
                                        @else
                                            <span class="text-muted">Belum diperiksa</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal Rincian -->
                    @foreach ($listPeriksa as $periksa)
                        @if ($periksa->periksa)
                            <div class="modal fade" id="modalRincian{{ $periksa->id }}" tabindex="-1"
                                aria-labelledby="modalLabel{{ $periksa->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content shadow-lg">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title fw-bold" id="modalLabel{{ $periksa->id }}">
                                                Rincian Pemeriksaan – {{ $periksa->pasien->nama }}
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-4">
                                                <h6 class="fw-semibold text-secondary">Informasi Pemeriksaan</h6>
                                                <table class="table table-bordered table-sm">
                                                    <tr>
                                                        <th class="w-25 bg-light">Tanggal Periksa</th>
                                                        <td>{{ $periksa->periksa->tgl_periksa }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-light">Catatan Dokter</th>
                                                        <td>{{ $periksa->periksa->catatan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bg-light">Biaya Pemeriksaan</th>
                                                        <td>
                                                            <span class="badge bg-success fs-6">
                                                                Rp {{ number_format($periksa->periksa->biaya_periksa, 0, ',', '.') }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div>
                                                <h6 class="fw-semibold text-secondary">Obat yang Diresepkan</h6>
                                                @if ($periksa->periksa->detailPeriksa->isEmpty())
                                                    <p class="text-muted fst-italic">Tidak ada obat yang diresepkan.</p>
                                                @else
                                                    <ul class="list-group list-group-flush">
                                                        @foreach ($periksa->periksa->detailPeriksa as $detail)
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <strong>{{ $detail->obat->nama_obat }}</strong>
                                                                    <div class="text-muted small">{{ $detail->obat->kemasan }}</div>
                                                                </div>
                                                                <span class="badge bg-primary rounded-pill">
                                                                    Rp {{ number_format($detail->obat->harga, 0, ',', '.') }}
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer bg-light">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark"></aside>

<!-- Bootstrap 5 Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@include('layouts.footer')
