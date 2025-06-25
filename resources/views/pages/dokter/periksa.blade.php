@include('layouts.header', ['title' => 'Dokter | Periksa Pasien'])

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="/pages/dokter" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Dashboard</p></a>
        </li>
        <li class="nav-item">
            <a href="/pages/dokter/jadwalPeriksa" class="nav-link"><i class="nav-icon fas fa-hospital"></i><p>Jadwal Periksa</p></a>
        </li>
        <li class="nav-item">
            <a href="/pages/dokter/periksaPasien" class="nav-link active"><i class="nav-icon fas fa-user-injured"></i><p>Periksa Pasien</p></a>
        </li>
        <li class="nav-item">
            <a href="/pages/dokter/riwayatPeriksa" class="nav-link"><i class="nav-icon fas fa-history"></i><p>Riwayat Periksa</p></a>
        </li>
        <li class="nav-item">
            <a href="/pages/dokter/profile" class="nav-link"><i class="nav-icon fas fa-user"></i><p>Edit Profile</p></a>
        </li>
    </ul>
</nav>
</div>
</aside>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h3>Periksa Pasien</h3>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <!-- Pasien Belum Diperiksa -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pasien Belum Diperiksa</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pasien</th>
                                <th>Keluhan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($belumDiperiksa as $periksa)
                                <tr>
                                    <td>{{ $periksa->no_antrian }}</td>
                                    <td>{{ $periksa->pasien->nama }}</td>
                                    <td>{{ $periksa->keluhan }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEdit{{ $periksa->id }}">Periksa</button>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalEdit{{ $periksa->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <form action="{{ route('periksaPasien.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_periksa" value="{{ $periksa->id ?? '' }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Periksa - {{ $periksa->pasien->nama }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Tanggal Periksa</label>
                                                        <input type="date" name="tgl_periksa" class="form-control"
                                                               value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Catatan</label>
                                                        <textarea name="catatan" class="form-control" rows="3" required>{{ $periksa->periksa->catatan ?? '' }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Biaya Pemeriksaan</label>
                                                        <input type="number" name="biaya_periksa" class="form-control"
                                                               value="{{ $periksa->periksa->biaya_periksa ?? 150000 }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Obat</label>
                                                        <div class="row">
                                                            @foreach(App\Models\Obat::all() as $obat)
                                                                <div class="col-md-6">
                                                                    <div class="form-check">
                                                                        <input type="hidden" name="obat" value="">
                                                                        <input class="form-check-input" type="checkbox" name="obat[]" value="{{ $obat->id }}"
                                                                            {{ isset($periksa->periksa) && $periksa->periksa->detailPeriksa->pluck('id_obat')->contains($obat->id) ? 'checked' : '' }}>
                                                                        <label class="form-check-label">{{ $obat->nama_obat }} ({{ $obat->kemasan }})</label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success" type="submit">Simpan</button>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pasien Sudah Diperiksa -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Pasien Sudah Diperiksa</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pasien</th>
                                <th>Catatan</th>
                                <th>Obat</th>
                                <th>Total Biaya</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sudahDiperiksa as $periksa)
                                <tr>
                                    <td>{{ $periksa->no_antrian }}</td>
                                    <td>{{ $periksa->pasien->nama }}</td>
                                    <td>{{ $periksa->periksa->catatan }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($periksa->periksa->detailPeriksa as $detail)
                                                <li>{{ $detail->obat->nama_obat }} (Rp{{ number_format($detail->obat->harga, 0, ',', '.') }})</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        @php
                                            $totalObat = $periksa->periksa->detailPeriksa->sum(fn($d) => $d->obat->harga);
                                            $total = 150000 + $totalObat;
                                        @endphp
                                        Rp{{ number_format($total, 0, ',', '.') }}
                                    </td>
                                    <td>-</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

@include('layouts.footer')
