@extends('layouts.app')

@section('title', 'About - Andreansyah Portfolio & Pemain Olahraga')

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
</style>
@endsection

@section('content')
    <!-- About Section -->
    <section class="main-content" id="about">
        <div class="container">
            <h2 class="section-title">About</h2>
            <div class="row align-items-center mt-4">
                <div class="col-lg-5 text-center mb-4 mb-lg-0">
                    <div style="background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(168, 85, 247, 0.05) 100%); border-radius: 24px; padding: 2.5rem; border: 1px solid var(--border-color);">
                        <i class="fa-solid fa-graduation-cap fa-5x text-indigo mb-3" style="color: #4f46e5;"></i>
                        <h4 class="fw-bold mb-1" style="color: var(--text-primary);">NIM: 241011750024</h4>
                        <p class="text-secondary small mb-0" style="color: var(--text-secondary) !important;">Pemrograman Web 2 - UAS</p>
                    </div>
                </div>
                <div class="col-lg-7 ps-lg-5">
                    <h3 class="fw-bold mb-3" style="font-family: 'Outfit', sans-serif; color: var(--text-primary);">Tentang Pengembang &amp; Proyek</h3>
                    <p class="text-secondary" style="color: var(--text-secondary) !important; line-height: 1.7; font-size: 0.95rem;">
                        Aplikasi ini dikembangkan oleh **ANDREANSYAH**, mahasiswa Program Studi Teknik Informatika, Universitas Pamulang. Aplikasi ini bertujuan sebagai pemenuhan syarat kelulusan mata kuliah Pemrograman Web 2 (UAS).
                    </p>
                    <p class="text-secondary" style="color: var(--text-secondary) !important; line-height: 1.7; font-size: 0.95rem;">
                        Membangun aplikasi manajemen event olahraga berbasis web menggunakan Laravel 12 dan Bootstrap 5. Aplikasi ini dirancang dengan arsitektur bersih memisahkan sisi publik (informasi event) dan sisi admin (manajemen data/CRUD). Dibangun secara mandiri dengan menerapkan sistem autentikasi kustom tanpa starter kit, manajemen penyimpanan file (file storage untuk gambar), validasi input yang ketat, serta fitur ekspor laporan data langsung ke format PDF.
                    </p>
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center gap-3">
                                <div style="background: rgba(79, 70, 229, 0.1); width: 40px; height: 40px; border-radius: 8px; color: #4f46e5;" class="d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-university"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0" style="font-size: 0.9rem; color: var(--text-primary);">Universitas</h6>
                                    <p class="small text-secondary mb-0" style="color: var(--text-secondary) !important;">Universitas Pamulang</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center gap-3">
                                <div style="background: rgba(79, 70, 229, 0.1); width: 40px; height: 40px; border-radius: 8px; color: #4f46e5;" class="d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-code-branch"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0" style="font-size: 0.9rem; color: var(--text-primary);">Kelas / Prodi</h6>
                                    <p class="small text-secondary mb-0" style="color: var(--text-secondary) !important;">Teknik Informatika S1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
