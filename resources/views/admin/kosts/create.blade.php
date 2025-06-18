@extends('layout.app')

@section('title', 'Form Kost')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-0">
                            <i class="fas fa-home me-3"></i>
                            Form Data Properti
                        </h2>
                        <p class="mb-0 opacity-75">Lengkapi informasi properti Anda</p>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.kosts.store') }}" method="POST">
                            @csrf
                            @include('admin.kosts.form')

                            <!-- Tombol Submit -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="reset" class="btn btn-outline-warning me-md-2 px-4">
                                            <i class="fas fa-undo me-2"></i>Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary px-5 shadow">
                                            <i class="fas fa-save me-2"></i>Simpan Data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
