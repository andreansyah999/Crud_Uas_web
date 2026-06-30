@extends('layouts.admin')

@section('title', 'Perbarui Event - Admin Dashboard')
@section('page_title', 'PERBARUI EVENT')
@section('breadcrumb_active', 'Perbarui Event')

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
                <h4 class="fw-bold mb-4" style="font-size: 15px; color: #495057;">Form Perbarui Data Event</h4>
                
                <form action="{{ route('admin.update', $pemain->id_event) }}" method="POST" enctype="multipart/form-data" id="editPlayerForm">
                    @csrf
                    @method('PUT')
 
                    <div class="row">
                        <!-- Nama Event -->
                        <div class="col-md-6 mb-3">
                            <label for="nama_event" class="form-label fw-semibold text-secondary small">Nama Event <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_event" 
                                   id="nama_event" 
                                   class="form-control form-control-sm @error('nama_event') is-invalid @enderror" 
                                   placeholder="Contoh: Turnamen Bulutangkis Tunggal Putra" 
                                   value="{{ old('nama_event', $pemain->nama_event) }}" 
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
                                   value="{{ old('tanggal', $pemain->tanggal) }}" 
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
                                   value="{{ old('tempat', $pemain->tempat) }}" 
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
                                   value="{{ old('penanggung_jawab', $pemain->penanggung_jawab) }}" 
                                   required>
                            @error('penanggung_jawab')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gambar / Foto Event -->
                        <div class="col-12 mb-4">
                            <label for="gambar" class="form-label fw-semibold text-secondary small">Foto Event (Pilihan)</label>
                            <input type="file" 
                                   name="gambar" 
                                   id="gambar" 
                                   class="form-control form-control-sm @error('gambar') is-invalid @enderror" 
                                   accept="image/*">
                            <div class="form-text text-muted small">Biarkan kosong jika tidak ingin mengubah foto event saat ini. Format gambar: jpeg, png, jpg, gif, svg, webp. Ukuran maksimal 2MB.</div>
                            @error('gambar')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            
                            <!-- Image Preview Container -->
                            <div class="mt-3" id="previewContainer">
                                <span class="d-block text-secondary small fw-semibold mb-2">Gambar Saat Ini / Pratinjau:</span>
                                <div class="rounded border overflow-hidden shadow-sm" style="max-width: 250px; max-height: 160px; background-color: #f1f5f9;">
                                    @if($pemain->gambar)
                                        <img src="{{ asset('storage/' . $pemain->gambar) }}" id="imagePreview" class="w-100 h-100 object-fit-cover" style="object-fit: cover; max-height: 160px;" alt="Foto">
                                    @else
                                        <img src="#" id="imagePreview" class="w-100 h-100 object-fit-cover d-none" style="object-fit: cover; max-height: 160px;" alt="Foto">
                                        <div id="noPreviewText" class="p-4 text-center text-muted">
                                            <i class="fa-regular fa-image fa-2x d-block mb-1"></i>
                                            <span class="small">Belum ada foto</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
 
                        <hr class="my-3">
 
                        <!-- Action Buttons -->
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.index') }}" class="btn btn-light border py-1.5 px-3 rounded-2 fw-medium small">Batal</a>
                            <button type="submit" class="btn btn-skote-blue py-1.5 px-4 rounded-2 small">
                                <i class="fa-solid fa-floppy-disk me-2"></i>Perbarui Event
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
        const imagePreview = document.getElementById('imagePreview');
        const noPreviewText = document.getElementById('noPreviewText');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                imagePreview.src = event.target.result;
                imagePreview.classList.remove('d-none');
                if (noPreviewText) {
                    noPreviewText.classList.add('d-none');
                }
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
