@extends('layouts.app')

@section('title', 'Projects - Andreansyah Portfolio & Pemain Olahraga')

@section('styles')
<style>
    /* Section Styling */
    .section-title {
        font-family: 'Outfit', sans-serif;
        font-weight: 800;
        letter-spacing: -0.5px;
        margin-bottom: 2rem;
        position: relative;
        display: inline-block;
        color: var(--text-primary);
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        width: 50%;
        height: 4px;
        bottom: -8px;
        left: 0;
        background: var(--primary-gradient);
        border-radius: 2px;
    }

    /* Transition effect on listing image */
    .transition-transform {
        transition: transform 0.5s ease;
    }
    .premium-card:hover .transition-transform {
        transform: scale(1.05);
    }
</style>
@endsection

@section('content')
    <!-- Projects (Event Olahraga) Section -->
    <section class="main-content" id="projects" style="padding: 4rem 0;">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title mb-1">Projects</h2>
                    <p class="text-secondary mb-0" style="color: var(--text-secondary) !important;">
                        <strong>Sistem Informasi Event Olahraga</strong>. Data event pertandingan olahraga terintegrasi database (Badminton, Futsal, Marathon) untuk keperluan ujian pemrograman.
                    </p>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('projects') }}" method="GET" id="searchForm">
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-transparent border-end-0 text-muted" style="border-color: var(--border-color);"><i class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" name="search" class="form-control border-start-0" placeholder="Cari nama event, tempat, atau penanggung jawab..." value="{{ $search }}" style="border-color: var(--border-color);">
                            @if($search)
                                <a href="{{ route('projects') }}" class="btn btn-light d-flex align-items-center px-3 border-y border-end" style="border-color: var(--border-color); background: var(--bg-primary); color: var(--text-primary);" title="Clear search">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                            @endif
                            <button class="btn btn-premium px-4" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
 
            <!-- Events Grid -->
            <div class="row">
                @forelse($pemains as $pemain)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card premium-card h-100 border-0 shadow-sm">
                            <!-- Image Container -->
                            <div class="position-relative overflow-hidden" style="height: 200px; background-color: var(--bg-secondary);">
                                @if($pemain->gambar)
                                    <img src="{{ asset('storage/' . $pemain->gambar) }}" class="card-img-top h-100 w-100 object-fit-cover transition-transform" alt="{{ $pemain->nama_event }}" style="object-fit: cover;">
                                @else
                                    <div class="h-100 w-100 d-flex flex-column align-items-center justify-content-center text-muted">
                                        <i class="fa-regular fa-image fa-3x mb-2 opacity-50"></i>
                                        <span class="small">Tidak ada gambar</span>
                                    </div>
                                @endif
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-white text-dark shadow-sm fw-semibold rounded-pill px-3 py-1.5" style="font-size: 0.8rem;">
                                        <i class="fa-solid fa-hashtag text-primary me-1"></i>E{{ str_pad($pemain->id_event, 3, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Card Body -->
                            <div class="card-body p-4 d-flex flex-column">
                                <span class="badge badge-premium mb-3 d-inline-block align-self-start">
                                    <i class="fa-solid fa-calendar me-1"></i>{{ \Carbon\Carbon::parse($pemain->tanggal)->translatedFormat('d F Y') }}
                                </span>
                                <h4 class="card-title fw-bold mb-3" style="font-family: 'Outfit', sans-serif; color: var(--text-primary); font-size: 1.25rem;">
                                    {{ $pemain->nama_event }}
                                </h4>
                                
                                <div class="mt-auto">
                                    <div class="d-flex align-items-center mb-2 small" style="color: var(--text-secondary);">
                                        <i class="fa-solid fa-location-dot me-2 text-primary"></i>
                                        <span class="text-truncate">Tempat: {{ $pemain->tempat }}</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 small" style="color: var(--text-secondary);">
                                        <i class="fa-solid fa-user me-2 text-primary"></i>
                                        <span>PJ: {{ $pemain->penanggung_jawab }}</span>
                                    </div>
                                    <button class="btn btn-premium w-100 mt-2" data-bs-toggle="modal" data-bs-target="#detailModal{{ $pemain->id_event }}">
                                        <i class="fa-solid fa-circle-info me-2"></i>Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
 
                    <!-- Detail Event Modal -->
                    <div class="modal fade" id="detailModal{{ $pemain->id_event }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">
                                <div class="modal-header border-0 p-4">
                                    <h5 class="modal-title fw-bold" style="font-family: 'Outfit', sans-serif;">Detail Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="p-0" style="height: 240px; background-color: var(--bg-secondary);">
                                    @if($pemain->gambar)
                                        <img src="{{ asset('storage/' . $pemain->gambar) }}" class="h-100 w-100 object-fit-cover" alt="{{ $pemain->nama_event }}" style="object-fit: cover;">
                                    @else
                                        <div class="h-100 w-100 d-flex align-items-center justify-content-center text-muted">
                                            <i class="fa-regular fa-image fa-3x"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="modal-body p-4">
                                    <h4 class="fw-bold mb-3" style="font-family: 'Outfit', sans-serif; color: var(--text-primary);">{{ $pemain->nama_event }}</h4>
                                    
                                    <div class="mb-4">
                                        <table class="table table-borderless mb-0" style="color: var(--text-primary);">
                                            <tbody>
                                                <tr>
                                                    <td class="ps-0 py-2" style="width: 35%; color: var(--text-secondary);"><i class="fa-solid fa-hashtag text-primary me-2"></i>ID Event</td>
                                                    <td class="py-2 fw-semibold">: E{{ str_pad($pemain->id_event, 3, '0', STR_PAD_LEFT) }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-0 py-2" style="color: var(--text-secondary);"><i class="fa-solid fa-calendar-check text-primary me-2"></i>Tanggal Event</td>
                                                    <td class="py-2 fw-semibold">: {{ \Carbon\Carbon::parse($pemain->tanggal)->translatedFormat('d F Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-0 py-2" style="color: var(--text-secondary);"><i class="fa-solid fa-location-dot text-primary me-2"></i>Tempat</td>
                                                    <td class="py-2 fw-semibold">: {{ $pemain->tempat }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-0 py-2" style="color: var(--text-secondary);"><i class="fa-solid fa-user text-primary me-2"></i>Penanggung Jawab</td>
                                                    <td class="py-2 fw-semibold">: {{ $pemain->penanggung_jawab }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button class="btn btn-premium w-100 py-2" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="card premium-card p-5 border border-dashed border-2 bg-transparent max-width-600 mx-auto">
                            <i class="fa-solid fa-calendar-times fa-4x text-muted mb-3 opacity-50"></i>
                            <h4 class="fw-bold">Belum Ada Event</h4>
                            <p class="text-secondary mb-3">Tidak ada data event pertandingan olahraga yang ditemukan. Silakan tambahkan data melalui panel admin.</p>
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-premium btn-md align-self-center mt-2">
                                    <i class="fa-solid fa-lock me-2"></i>Login Admin untuk Menambahkan
                                </a>
                            @else
                                <a href="{{ route('admin.create') }}" class="btn btn-premium btn-md align-self-center mt-2">
                                    <i class="fa-solid fa-plus me-2"></i>Tambah Event Baru
                                </a>
                            @endguest
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($pemains->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $pemains->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>
@endsection
