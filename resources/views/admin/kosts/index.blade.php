@extends('layout.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="main-container">
            <h1 class="title-header">
                <i class="fas fa-building"></i> Data Properti Premium
            </h1>

            <div class="alert alert-info d-flex align-items-center mb-4" role="alert">
                <i class="fas fa-info-circle me-3"></i>
                <div>
                    <strong>Tips:</strong> Geser tabel ke kanan menggunakan scroll bar di bawah untuk melihat semua
                    informasi properti secara lengkap.
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-header">
                        <tr>
                            <th class="col-nama"><i class="fas fa-home me-2"></i>Nama Properti</th>
                            <th class="col-alamat"><i class="fas fa-map-marker-alt me-2"></i>Alamat</th>
                            <th class="col-pemilik"><i class="fas fa-user me-2"></i>Pemilik</th>
                            <th class="col-kontak"><i class="fas fa-phone me-2"></i>Kontak</th>
                            <th class="col-harga"><i class="fas fa-tag me-2"></i>Harga</th>
                            <th class="col-jarak"><i class="fas fa-route me-2"></i>Jarak</th>
                            <th class="col-rating"><i class="fas fa-broom me-2"></i>Kebersihan</th>
                            <th class="col-rating"><i class="fas fa-shield-alt me-2"></i>Keamanan</th>
                            <th class="col-rating"><i class="fas fa-universal-access me-2"></i>Akses</th>
                            <th class="col-fasilitas"><i class="fas fa-list me-2"></i>Fasilitas</th>
                            <th class="col-action"><i class="fas fa-cogs me-2"></i>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td>
                                <strong class="text-primary">Villa Paradise</strong>
                                <br>
                                <small class="text-muted">Villa Mewah</small>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Jl. Sunset Beach No. 15<br>
                                    <small>Seminyak, Bali</small>
                                </div>
                            </td>
                            <td>
                                <strong>Budi Santoso</strong>
                                <br>
                                <small class="text-muted">Developer</small>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <i class="fas fa-phone"></i> +62 812-3456-7890<br>
                                    <small><i class="fas fa-envelope"></i> budi@villa.com</small>
                                </div>
                            </td>
                            <td>
                                <span class="price-tag">
                                    <i class="fas fa-rupiah-sign"></i> 2.5M/bulan
                                </span>
                            </td>
                            <td>
                                <i class="fas fa-car text-primary"></i> 5 km dari pusat
                                <br>
                                <small class="text-muted">15 menit berkendara</small>
                            </td>
                            <td>
                                <span class="badge badge-excellent">
                                    <i class="fas fa-star"></i> Sangat Bersih
                                </span>
                                <div class="rating-stars mt-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-excellent">
                                    <i class="fas fa-shield-check"></i> Sangat Aman
                                </span>
                                <div class="rating-stars mt-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-excellent">
                                    <i class="fas fa-thumbs-up"></i> Mudah
                                </span>
                                <div class="rating-stars mt-1">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </td>
                            <td>
                                <ul class="facility-list">
                                    <li><i class="fas fa-swimming-pool"></i> Kolam Renang Pribadi</li>
                                    <li><i class="fas fa-wifi"></i> WiFi High Speed</li>
                                    <li><i class="fas fa-car"></i> Parkir Luas</li>
                                    <li><i class="fas fa-dumbbell"></i> Gym Pribadi</li>
                                    <li><i class="fas fa-leaf"></i> Taman Hijau</li>
                                </ul>
                            </td>
                            <td>
                                <button class="btn btn-view btn-action" data-bs-toggle="tooltip" title="Lihat Detail">
                                    <i class="fas fa-eye"></i> View
                                </button>
                                <button class="btn btn-edit btn-action" data-bs-toggle="tooltip" title="Edit Data">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-delete btn-action" data-bs-toggle="tooltip" title="Hapus Data">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr> --}}
                        @forelse ($kosts as $kost)
                            <tr>
                                <td>
                                    <strong class="text-primary">{{ $kost->name }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $kost->description }}</small>
                                </td>
                                <td>
                                    <div class="contact-info">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $kost->address }}<br>
                                        <small>Purbalingga</small>
                                    </div>
                                </td>
                                <td>
                                    <strong>{{ $kost->owner_name }}</strong>
                                    <br>
                                    <small class="text-muted">Property Manager</small>
                                </td>
                                <td>
                                    <div class="contact-info">
                                        <i class="fas fa-phone"></i> {{ $kost->phone }} <br>
                                        <small><i class="fas fa-envelope"></i> sari@skyline.com</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="price-tag">
                                        <i class="fas fa-rupiah-sign"></i>
                                        {{ Number::format($kost->price_per_year) }}/tahun
                                    </span>
                                </td>
                                <td>
                                    <i class="fa-solid fa-road text-primary"></i> {{ $kost->distance_to_campus }}m
                                    <br>
                                    <small class="text-muted">3 menit jalan kaki</small>
                                </td>
                                <td>
                                    <span class="badge badge-good">
                                        <i class="fas fa-star"></i> {{ $kost->cleanliness }}
                                    </span>
                                    <div class="rating-stars mt-1">
                                        @if ($kost->cleanliness == 'Ya')
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        @elseif ($kost->cleanliness == 'Cukup')
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @else
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-excellent">
                                        <i class="fas fa-shield-check"></i> {{ $kost->security }}
                                    </span>
                                    <div class="rating-stars mt-1">
                                        @if ($kost->security == 'Ya')
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-excellent">
                                        <i class="fas fa-thumbs-up"></i> {{ $kost->food_access }}
                                    </span>
                                    <div class="rating-stars mt-1">
                                        @if ($kost->food_access == 'Mudah')
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <ul class="facility-list">
                                        @foreach ($kost->facilities as $facility)
                                            <li><i class="fa-solid fa-cube"></i>
                                                {{ $facility }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{-- <button class="btn btn-view btn-action" data-bs-toggle="tooltip" title="Lihat Detail">
                                        <i class="fas fa-eye"></i> View
                                    </button> --}}
                                    <a href="{{ route('admin.kosts.edit', $kost->id) }}">
                                        <button class="btn btn-edit btn-action" data-bs-toggle="tooltip" title="Edit Data">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                    </a>
                                    <form action="{{ route('admin.kosts.destroy', $kost->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-delete btn-action" data-bs-toggle="tooltip"
                                            title="Hapus Data">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">no data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a href="{{ route('admin.kosts.create') }}" class="btn btn-add position-fixed bottom-0 end-0 m-4"
        data-bs-toggle="tooltip" title="Tambah Data">
        <i class="fa-solid fa-plus"></i>
    </a>

    <script>
        // Initialize Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>

@endsection
