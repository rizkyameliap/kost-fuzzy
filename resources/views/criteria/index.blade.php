@extends('layout.app')

@section('title', '')

@section('content')
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Header -->
                <div class="card shadow-lg border-0 mb-4">
                    <div class="card-header bg-primary text-white py-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="mb-0">
                                    <i class="fas fa-database me-3"></i>
                                    Data Kriteria Penilaian
                                </h2>
                                <p class="mb-0 opacity-75">Kelola data kriteria untuk sistem penilaian</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-md-4 col-sm-6 mb-5">
                        <div class="card border-primary border-2 h-100">
                            <div class="d-flex card-body">
                                <div class="text-primary my-auto">
                                    <i class="fas fa-list-ol fa-3x"></i>
                                </div>
                                <div class="mx-3">
                                    <small class="text-muted">Total Kriteria</small>
                                    <h5 class="text-primary fw-bold fs-1">{{ $criteria->count() }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-5">
                        <div class="card border-success border-2 h-100">
                            <div class="d-flex card-body">
                                <div class="text-success my-auto">
                                    <i class="fas fa-arrow-up fa-3x"></i>
                                </div>
                                <div class="mx-3">
                                    <small class="text-muted">Benefit</small>
                                    <h5 class="text-success fw-bold fs-1">{{ $criteria->where('type', 'benefit')->count() }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-5">
                        <div class="card border-danger border-2 h-100">
                            <div class="d-flex card-body">
                                <div class="text-danger my-auto">
                                    <i class="fas fa-arrow-down fa-3x"></i>
                                </div>
                                <div class="mx-3">
                                    <small class="text-muted">Cost</small>
                                    <h5 class="text-danger fw-bold fs-1">{{ $criteria->where('type', 'cost')->count() }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-3 col-sm-6 mb-5">
                        <div class="card border-warning border-2 h-100">
                            <div class="d-flex card-body">
                                <div class="text-warning my-auto">
                                    <i class="fas fa-balance-scale fa-3x"></i>
                                </div>
                                <div class="mx-3">
                                    <small class="text-muted">Total Bobot</small>
                                    <h5 class="text-warning fw-bold fs-1">{{ $criteria->sum('weight') }}%</h5>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <!-- Main Table -->
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary bg-opacity-10 border-primary border-2">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="mb-0 text-primary fw-bold">
                                    <i class="fas fa-table me-2"></i>Daftar Kriteria
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white border-primary">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" class="form-control border-primary"
                                        placeholder="Cari kriteria...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" class="text-center fw-bold">
                                            <i class="fas fa-hashtag me-2"></i>Kode
                                        </th>
                                        <th scope="col" class="fw-bold">
                                            <i class="fas fa-tag me-2"></i>Nama Kriteria
                                        </th>
                                        <th scope="col" class="fw-bold">
                                            <i class="fas fa-info-circle me-2"></i>Deskripsi
                                        </th>
                                        <th scope="col" class="text-center fw-bold">
                                            <i class="fas fa-weight-hanging me-2"></i>Bobot (%)
                                        </th>
                                        <th scope="col" class="text-center fw-bold">
                                            <i class="fas fa-exchange-alt me-2"></i>Tipe
                                        </th>
                                        <th scope="col" class="text-center fw-bold">
                                            <i class="fas fa-cogs me-2"></i>Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td class="text-center fw-bold text-primary">C1</td>
                                        <td class="fw-semibold">Harga Sewa</td>
                                        <td class="text-muted">Biaya sewa bulanan properti dalam rupiah</td>
                                        <td class="text-center">
                                            <span class="badge bg-warning text-dark fs-6 px-3 py-2">20%</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-danger fs-6 px-3 py-2">
                                                <i class="fas fa-arrow-down me-1"></i>Cost
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                    data-bs-toggle="tooltip" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-success btn-sm"
                                                    data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    data-bs-toggle="tooltip" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr> --}}
                                    @forelse ($criteria as $index => $criteria)
                                        <tr>
                                            <td class="text-center fw-bold text-primary">{{ $criteria->code }}</td>
                                            <td class="fw-semibold">{{ $criteria->name }}</td>
                                            <td class="text-muted">{{ $criteria->description }}
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge bg-warning text-dark px-3 py-2">{{ $criteria->weight }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $criteria->type == 'cost' ? 'bg-danger' : 'bg-success' }} px-3 py-2">
                                                    <i class="fas fa-arrow-down me-1"></i>{{ $criteria->type }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-outline-warning btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#edit{{ $criteria->id }}"
                                                        title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-bs-toggle="tooltip" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="edit{{ $criteria->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('criteria.update') }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary bg-opacity-10">
                                                            <h1 class="modal-title fs-5 text-primary"
                                                                id="exampleModalLabel">Add Criteria</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        {{-- Isi Modal --}}
                                                        <div class="modal-body">
                                                            <div>
                                                                <div class="card-body mx-auto">
                                                                    <!-- Informasi Dasar -->
                                                                    <div class="row mb-4">
                                                                        <div class="col-12">
                                                                            <h6
                                                                                class="text-primary border-bottom border-primary pb-2 mb-3">
                                                                                <i
                                                                                    class="fas fa-clipboard-list me-2"></i>Informasi
                                                                                Dasar
                                                                                Kriteria
                                                                            </h6>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-md-4">
                                                                            <label for="kode"
                                                                                class="form-label fw-bold">
                                                                                <i
                                                                                    class="fas fa-hashtag text-primary me-2"></i>Kode
                                                                                Kriteria
                                                                            </label>
                                                                            <div class="input-group input-group-sm">
                                                                                <span
                                                                                    class="input-group-text bg-primary text-white border-primary">
                                                                                    <i class="fas fa-code"></i>
                                                                                </span>
                                                                                <input type="text"
                                                                                    class="form-control border-2 border-primary"
                                                                                    id="kode" placeholder="C1"
                                                                                    maxlength="5"
                                                                                    value="{{ $criteria->code }}">
                                                                            </div>
                                                                            <div class="form-text">
                                                                                <i
                                                                                    class="fas fa-lightbulb text-warning me-1"></i>
                                                                                Contoh: C1, C2, C3, dst.
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <label for="nama"
                                                                                class="form-label fw-bold">
                                                                                <i
                                                                                    class="fas fa-tag text-primary me-2"></i>Nama
                                                                                Kriteria
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm border-2 border-primary"
                                                                                id="nama"
                                                                                placeholder="Masukkan nama kriteria"
                                                                                value="{{ $criteria->name }}">
                                                                            <div class="form-text">
                                                                                <i
                                                                                    class="fas fa-lightbulb text-warning me-1"></i>
                                                                                Contoh: Harga Sewa, Tingkat Kebersihan, dll.
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-12">
                                                                            <label for="deskripsi"
                                                                                class="form-label fw-bold">
                                                                                <i
                                                                                    class="fas fa-align-left text-primary me-2"></i>Deskripsi
                                                                                Kriteria
                                                                            </label>
                                                                            <textarea class="form-control border-2 border-primary" id="deskripsi" rows="4"
                                                                                placeholder="Masukkan deskripsi lengkap kriteria...">{{ $criteria->description }}</textarea>
                                                                            <div class="form-text">
                                                                                <i
                                                                                    class="fas fa-lightbulb text-warning me-1"></i>
                                                                                Jelaskan secara detail mengenai kriteria ini
                                                                                dan bagaimana cara
                                                                                penilaiannya.
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Pengaturan Bobot dan Tipe -->
                                                                    <div class="row mb-4">
                                                                        <div class="col-12">
                                                                            <h6
                                                                                class="text-primary border-bottom border-primary pb-2 mb-3">
                                                                                <i
                                                                                    class="fas fa-sliders-h me-2"></i>Pengaturan
                                                                                Bobot dan Tipe
                                                                            </h6>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-md-6">
                                                                            <label for="bobot"
                                                                                class="form-label fw-bold">
                                                                                <i
                                                                                    class="fas fa-weight-hanging text-primary me-2"></i>Bobot
                                                                                Kriteria
                                                                            </label>
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="number"
                                                                                    class="form-control border-2 border-primary"
                                                                                    id="bobot" placeholder="0"
                                                                                    min="1" max="100"
                                                                                    step="0.1"
                                                                                    value="{{ $criteria->weight }}">
                                                                                <span
                                                                                    class="input-group-text bg-primary text-white border-primary">
                                                                                    <i class="fas fa-percentage"></i>
                                                                                </span>
                                                                            </div>
                                                                            <div class="form-text">
                                                                                <i
                                                                                    class="fas fa-lightbulb text-warning me-1"></i>
                                                                                Masukkan nilai antara 1-100 (dalam persen)
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="tipe"
                                                                                class="form-label fw-bold">
                                                                                <i
                                                                                    class="fas fa-exchange-alt text-primary me-2"></i>Tipe
                                                                                Kriteria
                                                                            </label>
                                                                            <select
                                                                                class="form-select form-select-sm border-2 border-primary"
                                                                                id="tipe">
                                                                                <option value="">Pilih tipe kriteria
                                                                                </option>
                                                                                <option value="benefit"
                                                                                    {{ $criteria->type == 'benefit' ? 'selected' : '' }}>
                                                                                    <i class="fas fa-arrow-up"></i> Benefit
                                                                                </option>
                                                                                <option value="cost"
                                                                                    {{ $criteria->type == 'cost' ? 'selected' : '' }}>
                                                                                    <i class="fas fa-arrow-down"></i> Cost
                                                                                </option>
                                                                            </select>
                                                                            <div class="form-text">
                                                                                <i
                                                                                    class="fas fa-lightbulb text-warning me-1"></i>
                                                                                Pilih Benefit atau Cost sesuai dengan jenis
                                                                                kriteria
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Tipe Explanation Cards -->
                                                                    <div class="row mb-4">
                                                                        <div class="col-md-6">
                                                                            <div
                                                                                class="card border-success border-2 h-100">
                                                                                <div
                                                                                    class="card-header bg-success bg-opacity-10 border-success">
                                                                                    <h6 class="mb-0 text-success fw-bold">
                                                                                        <i
                                                                                            class="fas fa-arrow-up me-2"></i>Benefit
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <p class="small mb-2">
                                                                                        <i
                                                                                            class="fas fa-check-circle text-success me-2"></i>
                                                                                        Nilai tinggi = Lebih baik
                                                                                    </p>
                                                                                    <p class="small mb-0 text-muted">
                                                                                        Contoh: Kebersihan, Keamanan,
                                                                                        Fasilitas
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="card border-danger border-2 h-100">
                                                                                <div
                                                                                    class="card-header bg-danger bg-opacity-10 border-danger">
                                                                                    <h6 class="mb-0 text-danger fw-bold">
                                                                                        <i
                                                                                            class="fas fa-arrow-down me-2"></i>Cost
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <p class="small mb-2">
                                                                                        <i
                                                                                            class="fas fa-times-circle text-danger me-2"></i>
                                                                                        Nilai rendah = Lebih baik
                                                                                    </p>
                                                                                    <p class="small mb-0 text-muted">
                                                                                        Contoh: Harga, Jarak, Biaya Tambahan
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td class="text-muted">no data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-primary bg-opacity-10 border-primary border-2">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <small class="text-muted">Menampilkan 8 dari 8 data</small>
                            </div>
                            <div class="col-md-6">
                                <nav aria-label="Table pagination">
                                    <ul class="pagination pagination-sm mb-0 justify-content-end">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection
