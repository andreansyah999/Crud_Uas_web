@extends('layouts.admin')

@section('title', 'Tambah Event Baru - Admin Dashboard')
@section('page_title', 'TAMBAH EVENT')
@section('breadcrumb_active', 'Tambah Event')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        
        <!-- Back Button -->
        <div class="mb-3">
            <a href="{{ route('admin.index') }}" class="btn btn-skote-secondary py-2 px-3 rounded-2 text-white text-decoration-none small">
                <i class="fa-solid fa-arrow-left me-2"></i>Kembali ke Kelola Event
            </a>
        </div>

        <!-- Form Card -->
        <div class="card">
            <div class="card-body">
                <h4 class="fw-bold mb-4" style="font-size: 15px; color: #495057;">Form Tambah Event Baru</h4>
                
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" id="createPlayerForm">
                    @csrf

                    <div class="row">
                        <!-- Nama Event -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_event" class="form-label fw-semibold text-secondary small">Nama Event <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_event" 
                                   id="nama_event" 
                                   class="form-control form-control-sm @error('nama_event') is-invalid @enderror" 
                                   placeholder="Contoh: Turnamen Bulutangkis Tunggal Putra" 
                                   value="{{ old('nama_event') }}" 
                                   required>
                            @error('nama_event')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Event -->
                        <div class="col-md-6 mb-3">
                            <label for="tanggal" class="form-label fw-semibold text-secondary small">Tanggal Event <span class="text-danger">*</span></label>
                            <input type="date" 
                                   name="tanggal" 
                                   id="tanggal" 
                                   class="form-control form-control-sm @error('tanggal') is-invalid @enderror" 
                                   value="{{ old('tanggal') }}" 
                                   required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tempat Event -->
                        <div class="col-md-6 mb-3">
                            <label for="tempat" class="form-label fw-semibold text-secondary small">Tempat Event <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="tempat" 
                                   id="tempat" 
                                   class="form-control form-control-sm @error('tempat') is-invalid @enderror" 
                                   placeholder="Contoh: GOR Bulutangkis Unpam" 
                                   value="{{ old('tempat') }}" 
                                   required>
                            @error('tempat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Penanggung Jawab -->
                        <div class="col-md-6 mb-3">
                            <label for="penanggung_jawab" class="form-label fw-semibold text-secondary small">Penanggung Jawab <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="penanggung_jawab" 
                                   id="penanggung_jawab" 
                                   class="form-control form-control-sm @error('penanggung_jawab') is-invalid @enderror" 
                                   placeholder="Contoh: Jonatan Christie" 
                                   value="{{ old('penanggung_jawab') }}" 
                                   required>
                            @error('penanggung_jawab')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gambar / Foto Event -->
                        <div class="col-12 mb-4">
                            <label for="gambar" class="form-label fw-semibold text-secondary small">Foto Event <span class="text-danger">*</span></label>
                            <input type="file" 
                                   name="gambar" 
                                   id="gambar" 
                                   class="form-control form-control-sm @error('gambar') is-invalid @enderror" 
                                   accept="image/*" 
                                   required>
                            <div class="form-text text-muted small">Format gambar: jpeg, png, jpg, gif, svg, webp. Ukuran maksimal 2MB.</div>
                            @error('gambar')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            
                            <!-- Image Preview Container -->
                            <div class="mt-3 d-none" id="previewContainer">
                                <span class="d-block text-secondary small fw-semibold mb-2">Pratinjau Gambar:</span>
                                <div class="rounded border overflow-hidden shadow-sm" style="max-width: 250px; max-height: 160px;">
                                    <img src="#" id="imagePreview" class="w-100 h-100 object-fit-cover" style="object-fit: cover; max-height: 160px;" alt="Pratinjau">
                                </div>
                            </div>
                        </div>

                        <hr class="my-3">

                        <!-- Action Buttons -->
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.index') }}" class="btn btn-light border py-1.5 px-3 rounded-2 fw-medium small">Batal</a>
                            <button type="submit" class="btn btn-skote-blue py-1.5 px-4 rounded-2 small">
                                <i class="fa-solid fa-floppy-disk me-2"></i>Simpan Event
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    // Live Image Preview Logic
    document.getElementById('gambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                imagePreview.src = event.target.result;
                previewContainer.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('d-none');
            imagePreview.src = '#';
        }
    });
</script>
@endsection
