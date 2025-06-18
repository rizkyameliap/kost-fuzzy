<!-- Informasi Dasar -->
<div class="row mb-4">
    <div class="col-12">
        <h5 class="text-primary border-bottom border-primary pb-2 mb-3">
            <i class="fas fa-info-circle me-2"></i>Informasi Dasar
        </h5>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label for="name" class="form-label fw-bold">
            <i class="fas fa-signature text-primary me-2"></i>Nama Properti
        </label>
        <input type="text" class="form-control form-control-sm border-2" name="name" id="name"
            placeholder="Masukkan nama properti" value="{{ old('name', $kost->name ?? '') }}">
    </div>
    <div class="col-md-4">
        <label for="owner_name" class="form-label fw-bold">
            <i class="fas fa-user text-primary me-2"></i>Nama Pemilik
        </label>
        <input type="text" class="form-control form-control-sm border-2" name="owner_name" id="owner_name"
            placeholder="Masukkan nama pemilik" value="{{ old('owner_name', $kost->owner_name ?? '') }}">
    </div>
    <div class="col-md-4">
        <label for="phone" class="form-label fw-bold">
            <i class="fas fa-phone text-primary me-2"></i>No. HP
        </label>
        <input type="tel" class="form-control form-control-sm border-2" name="phone" id="phone"
            placeholder="+62 812-3456-7890" value="{{ old('phone', $kost->phone ?? '') }}">
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="address" class="form-label fw-bold">
            <i class="fas fa-map-marker-alt text-primary me-2"></i>Alamat Lengkap
        </label>
        <textarea class="form-control border-2" name="address" id="address" rows="3" cols="2"
            placeholder="Masukkan alamat lengkap properti">{{ old('address', $kost->address ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label for="decription" class="form-label fw-bold">
            <i class="fas fa-map-marker-alt text-primary me-2"></i>Deskripsi
        </label>
        <textarea class="form-control border-2" name="description" id="description" rows="3" cols="2"
            placeholder="Masukkan deskripsi properti">{{ old('description', $kost->description ?? '') }}</textarea>
    </div>
</div>

<!-- Informasi Harga dan Jarak -->
<div class="row mb-4">
    <div class="col-12">
        <h5 class="text-primary border-bottom border-primary pb-2 mb-3">
            <i class="fas fa-chart-line me-2"></i>Harga & Lokasi
        </h5>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="price_per_year" class="form-label fw-bold">
            <i class="fas fa-money-bill-wave text-primary me-2"></i>Harga (Rp)
        </label>
        <div class="input-group input-group-sm">
            <span class="input-group-text bg-primary text-white border-primary">Rp</span>
            <input type="number" class="form-control border-2" name="price_per_year" id="price_per_year"
                placeholder="0" step="100000" value="{{ old('price_per_year', $kost->price_per_year ?? '') }}">
            <span class="input-group-text border-primary">/tahun</span>
        </div>
    </div>
    <div class="col-md-6">
        <label for="distance_to_campus" class="form-label fw-bold">
            <i class="fas fa-route text-primary me-2"></i>Jarak ke Kampus
        </label>
        <div class="input-group input-group-sm">
            <input type="number" class="form-control border-2" name="distance_to_campus" id="distance_to_campus"
                placeholder="0" step="10"
                value="{{ old('discatance_to_campus', $kost->distance_to_campus ?? '') }}">
            <span class="input-group-text bg-primary text-white border-primary">m</span>
        </div>
    </div>
</div>

<!-- Penilaian -->
<div class="row mb-4">
    <div class="col-12">
        <h5 class="text-primary border-bottom border-primary pb-2 mb-3">
            <i class="fas fa-star me-2"></i>Penilaian Properti
        </h5>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4 mb-3">
        <label for="cleanliness" class="form-label fw-bold">
            <i class="fas fa-broom text-primary me-2"></i>Kebersihan
        </label>
        <select class="form-select form-select-sm border-2" name="cleanliness" id="cleanliness">
            <option value="">Pilih tingkat kebersihan</option>
            <option value="Tidak" {{ old('food_access', $kost->food_access ?? '') ? 'selected' : '' }}>⭐ Kurang Bersih
            </option>
            <option value="Cukup" {{ old('food_access', $kost->food_access ?? '') ? 'selected' : '' }}>⭐⭐ Cukup Bersih
            </option>
            <option value="Ya" {{ old('food_access', $kost->food_access ?? '') ? 'selected' : '' }}>⭐⭐⭐ Bersih
            </option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label for="security" class="form-label fw-bold">
            <i class="fas fa-shield-alt text-primary me-2"></i>Keamanan
        </label>
        <select class="form-select form-select-sm border-2" name="security" id="security">
            <option value="">Pilih tingkat keamanan</option>
            <option value="Tidak" {{ old('food_access', $kost->food_access ?? '') ? 'selected' : '' }}>⭐ Kurang Aman
            </option>
            <option value="Ya" {{ old('food_access', $kost->food_access ?? '') ? 'selected' : '' }}>⭐⭐⭐ Aman
            </option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label for="food_access" class="form-label fw-bold">
            <i class="fas fa-road text-primary me-2"></i>Kemudahan Akses
        </label>
        <select class="form-select form-select-sm border-2" name="food_access" id="food_access">
            <option value="">Pilih kemudahan akses</option>
            <option value="Sulit" {{ old('food_access', $kost->food_access ?? '') ? 'selected' : '' }}>⭐ Sulit
                Diakses
            </option>
            <option value="Mudah" {{ old('food_access', $kost->food_access ?? '') ? 'selected' : '' }}>⭐⭐⭐ Mudah
                Diakses
            </option>
        </select>
    </div>
</div>

<!-- Fasilitas -->
<div class="row mb-4">
    <div class="col-12">
        <h5 class="text-primary border-bottom border-primary pb-2 mb-3">
            <i class="fas fa-cogs me-2"></i>Fasilitas Tersedia
        </h5>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card border-primary border-2 h-100">
            <div class="card-header bg-primary bg-opacity-10 border-primary">
                <h6 class="mb-0 text-primary fw-bold">
                    <i class="fas fa-home me-2"></i>Fasilitas Dalam Ruangan
                </h6>
            </div>
            <div class="card-body">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="ac" name="facilities[]"
                        value="AC"
                        @isset($kost)
                            {{ in_array('AC', old('facilities', $kost->facilities)) ? 'checked' : '' }}>
                        @endisset
                        <label class="form-check-label fw-semibold" for="ac">
                    <i class="fas fa-snowflake text-info me-2"></i>Air Conditioner (AC)
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="ac" name="facilities[]"
                        value="Kamar Mandi"
                        @isset($kost)
                            {{ in_array('Kamar Mandi', old('facilities', $kost->facilities)) ? 'checked' : '' }}>
                        @endisset
                        <label class="form-check-label fw-semibold" for="ac">
                    <i class="fas fa-toilet text-danger me-2"></i>Kamar Mandi
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="wifi" name="facilities[]"
                        value="Wifi"
                        @isset($kost)
                            {{ in_array('Wifi', old('facilities', $kost->facilities)) ? 'checked' : '' }}>                            
                        @endisset
                        <label class="form-check-label fw-semibold" for="wifi">
                    <i class="fas fa-wifi text-success me-2"></i>WiFi Internet
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="cctv" name="facilities[]"
                        value="Meja Belajar"
                        @isset($kost)
                            {{ in_array('Meja Belajar', old('facilities', $kost->facilities)) ? 'checked' : '' }}>                            
                        @endisset
                        <label class="form-check-label fw-semibold" for="cctv">
                    <i class="fas fa-book-open text-primary me-2"></i>Meja Belajar
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-primary border-2 h-100">
            <div class="card-header bg-primary bg-opacity-10 border-primary">
                <h6 class="mb-0 text-primary fw-bold">
                    <i class="fas fa-building me-2"></i>Fasilitas Umum
                </h6>
            </div>
            <div class="card-body">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="parkir" name="facilities[]"
                        value="Tempat Parkir"
                        @isset($kost)
                            {{ in_array('Tempat Parkir', old('facilities', $kost->facilities)) ? 'checked' : '' }}>                            
                        @endisset
                        <label class="form-check-label fw-semibold" for="parkir">
                    <i class="fas fa-car text-dark me-2"></i>Tempat Parkir
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="ruangKumpul" name="facilities[]"
                        value="Ruang Kumpul"
                        @isset($kost)
                            {{ in_array('Ruang Kumpul', old('facilities', $kost->facilities)) ? 'checked' : '' }}>                            
                        @endisset
                        <label class="form-check-label fw-semibold" for="ruangKumpul">
                    <i class="fas fa-mug-saucer text-danger me-2"></i>Ruang Kumpul
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="kulkas" name="facilities[]"
                        value="Kulkas"
                        @isset($kost)
                            {{ in_array('Kulkas', old('facilities', $kost->facilities)) ? 'checked' : '' }}>                            
                        @endisset
                        <label class="form-check-label fw-semibold" for="kulkas">
                    <i class="fas fa-ice-cream text-primary me-2"></i>Kulkas
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="tv" name="facilities[]"
                        value="Mesin Cuci"
                        @isset($kost)
                            {{ in_array('Mesin Cuci', old('facilities', $kost->facilities)) ? 'checked' : '' }}>                            
                        @endisset
                        <label class="form-check-label fw-semibold" for="tv">
                    <i class="fas fa-tshirt text-info me-2"></i>Mesin Cuci
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="dapur" name="facilities[]"
                        value="Dapur"
                        @isset($kost)
                            {{ in_array('Dapur', old('facilities', $kost->facilities ?? '')) ? 'checked' : '' }}>                            
                        @endisset
                        <label class="form-check-label fw-semibold" for="dapur">
                    <i class="fas fa-utensils text-warning me-2"></i>Dapur
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
