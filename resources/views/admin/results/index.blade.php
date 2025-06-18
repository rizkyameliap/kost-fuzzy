@extends('layout.app')

@section('title', 'Hasil Perhitungan')

@section('content')
    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="main-container p-4">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <h1 class="display-6 fw-bold text-primary mb-3">
                            <i class="fas fa-calculator header-icon"></i>
                            Hasil Perhitungan Fuzzy SAW
                        </h1>
                        <p class="lead text-muted">Simple Additive Weighting - Sistem Pendukung Keputusan</p>
                    </div>

                    <!-- Controls -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <button class="btn btn-primary pulse-animation" data-bs-toggle="modal"
                                data-bs-target="#detailModal">
                                <i class="fas fa-info-circle me-2"></i>
                                Detail
                            </button>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#fuzzyModal">
                                <i class="fas fa-list me-1"></i>
                                fuzzy value
                            </button>
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#rawModal">
                                <i class="fas fa-trophy me-1"></i>
                                normalized value
                            </button>
                        </div>
                    </div>

                    <!-- Table Container with Horizontal Scroll -->
                    <div class="table-container">
                        <div class="table-responsive">
                            <div class="table-scroll">
                                <table class="table table-hover mb-0" id="sawTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <i class="fas fa-hashtag header-icon"></i>
                                                Rank
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-tag header-icon"></i>
                                                Alternatif
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-calculator header-icon"></i>
                                                Skor SAW
                                            </th>
                                            <th class="text-center">
                                                <i class="fas fa-chart-line header-icon"></i>
                                                Date Calculated
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        @foreach ($results as $result)
                                            <tr>
                                                <td class="text-center">{{ $result->rank }}</td>
                                                <td class="text-center">{{ $result->kost->name }}</td>
                                                <td class="text-center">
                                                    {{ Number::format($result->final_score, maxPrecision: 2) }}</td>
                                                <td class="text-center">{{ $result->calculated_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="card border-0 bg-primary text-white">
                                <div class="card-body text-center">
                                    <i class="fas fa-trophy fa-2x mb-2"></i>
                                    <h5 class="card-title">Alternatif Terbaik</h5>
                                    <p class="card-text fw-bold" id="bestAlternative">
                                        @php
                                            $top = $results->firstWhere('rank', 1);
                                        @endphp
                                        @if ($top && $top->kost)
                                            {{ $top->kost->name }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-info text-white">
                                <div class="card-body text-center">
                                    <i class="fas fa-list-ol fa-2x mb-2"></i>
                                    <h5 class="card-title">Total Alternatif</h5>
                                    <p class="card-text fw-bold" id="totalAlternatives">{{ $results->count() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-success text-white">
                                <div class="card-body text-center">
                                    <i class="fas fa-chart-bar fa-2x mb-2"></i>
                                    <h5 class="card-title">Skor Tertinggi</h5>
                                    <p class="card-text fw-bold" id="highestScore">{{ $results->max('final_score') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-warning text-white">
                                <div class="card-body text-center">
                                    <i class="fas fa-balance-scale fa-2x mb-2"></i>
                                    <h5 class="card-title">Rata-rata Skor</h5>
                                    <p class="card-text fw-bold" id="averageScore">{{ $results->avg('final_score') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-info-circle me-2"></i>
                        Detail Perhitungan Fuzzy SAW
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h6 class="fw-bold text-primary">Kriteria dan Bobot:</h6>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="fas fa-chart-bar text-primary me-2"></i>C1 - Harga</span>
                            <span class="badge bg-primary">7.5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="fas fa-star text-primary me-2"></i>C2 - Jarak</span>
                            <span class="badge bg-primary">2.5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="fas fa-shipping-fast text-primary me-2"></i>C3 - Fasilitas</span>
                            <span class="badge bg-primary">7.5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="fas fa-users text-primary me-2"></i>C4 - Kebersihan</span>
                            <span class="badge bg-primary">10</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="fas fa-shield-alt text-primary me-2"></i>C5 - Keamanan</span>
                            <span class="badge bg-primary">10</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="fas fa-puzzle-piece text-primary me-2"></i>C6 - Akses</span>
                            <span class="badge bg-primary">5</span>
                        </li>
                    </ul>
                    <p class="text-muted">
                        <i class="fas fa-lightbulb text-warning me-2"></i>
                        Skor SAW dihitung dengan menjumlahkan hasil perkalian nilai normalisasi dengan bobot kriteria.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Fuzzy Modal -->
    <div class="modal fade" id="fuzzyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-primary-custom">
                            <thead>
                                <tr>
                                    <th>Alternative</th>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>C6</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matrixFuzz as $matrix => $criteria)
                                    <tr>
                                        <td>{{ $matrix }}</td>
                                        @for ($i = 1; $i < 7; $i++)
                                            <td>{{ $criteria[$i] ?? '-' }}</td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Raw Modal -->
    <div class="modal fade" id="rawModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-primary-custom">
                            <thead>
                                <tr>
                                    <th>Alternative</th>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                    <th>C6</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matrixRaw as $matrix => $criteria)
                                    <tr>
                                        <td>{{ $matrix }}</td>
                                        @for ($i = 1; $i < 7; $i++)
                                            <td>{{ $criteria[$i] ?? '-' }}</td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphic -->
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-lg-20">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-2">Grafik Hasil</h2>
                        <p class="mb-0">Nilai tertinggi ditandai dengan mahkota dan warna berbeda</p>
                    </div>
                    <div class="card-body p-4">
                        <div class="position-relative" style="height: 400px;">
                            <canvas id="myChart"></canvas>
                        </div>

                        <div class="d-flex justify-content-center gap-4 mt-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-info rounded me-2" style="width: 20px; height: 20px;"></div>
                                <span class="fw-bold">Nilai Normal</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="bg-danger rounded me-2" style="width: 20px; height: 20px;"></div>
                                <span class="fw-bold">Nilai Tertinggi</span>
                            </div>
                        </div>

                        <div class="card bg-warning text-dark mt-4">
                            <div class="card-body text-center py-3">
                                <h5 class="mb-1"><i class="fa-solid fa-crown"></i> Produk Terbaik</h5>
                                <p class="mb-0 fw-bold" id="bestProduct">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const data = {!! json_encode(
            $hasil->map(function ($item) {
                return [
                    'name' => $item->kost->name,
                    'nilai' => (float) $item->final_score,
                ];
            }),
        ) !!};
    </script>
@endsection
