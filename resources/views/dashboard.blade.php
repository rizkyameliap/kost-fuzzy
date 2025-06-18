{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layout.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Total Kost</h5>
                            <h2>{{ $totalKosts }}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-building fa-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Kriteria Aktif</h5>
                            <h2>{{ $activeCriteria }}</h2>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-sliders-h fa-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Perhitungan Terakhir</h5>
                            <p class="mb-0">
                                @if ($lastCalculation)
                                    {{ $lastCalculation->calculated_at->format('d M Y H:i') }}
                                @else
                                    Belum ada
                                @endif
                            </p>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-calculator fa-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-calculator me-2"></i>Proses Perhitungan Fuzzy SAW
                    </h5>
                </div>
                <div class="card-body">
                    <p>Klik tombol di bawah untuk memproses perhitungan fuzzy SAW berdasarkan data kost dan kriteria yang
                        ada.</p>
                    <form action="{{ route('results.calculate') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-lg">
                            <i class="fas fa-play me-2"></i>Jalankan Perhitungan SAW
                        </button>
                    </form>
                    <a href="{{ route('results.index') }}" class="btn btn-info btn-lg ms-2">
                        <i class="fas fa-chart-bar me-2"></i>Lihat Hasil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
