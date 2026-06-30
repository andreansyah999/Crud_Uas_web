@extends('layouts.app')

@section('title', 'Experience - Andreansyah Portfolio & Pemain Olahraga')

@section('styles')
<style>
    /* Section Title Styling */
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

    /* Experience Skill Pills */
    .skill-card {
        border-radius: 16px;
        padding: 1.2rem 1rem;
        transition: var(--transition-smooth);
        height: 100%;
        background: var(--bg-primary);
        border: 1px solid var(--border-color);
        box-shadow: var(--card-shadow);
    }
    
    .skill-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--card-shadow-hover);
        border-color: rgba(99, 102, 241, 0.3);
    }

    /* Premium Vertical Timeline Styling */
    .timeline-wrapper {
        position: relative;
        padding-left: 20px;
        margin-top: 1rem;
    }
    
    .timeline-wrapper::before {
        content: '';
        position: absolute;
        left: 5px;
        top: 10px;
        bottom: 10px;
        width: 2px;
        background-color: #cbd5e1; /* Abu-abu tipis track */
        transition: var(--transition-smooth);
    }
    
    [data-theme="dark"] .timeline-wrapper::before {
        background-color: #334155;
    }
    
    .timeline-card-item {
        position: relative;
        padding-left: 25px;
        margin-bottom: 2.5rem;
    }
    
    .timeline-card-item:last-child {
        margin-bottom: 0;
    }
    
    .timeline-card-dot {
        position: absolute;
        left: -24px;
        top: 6px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: #4f46e5; /* Primary accent dot */
        border: 2px solid var(--bg-primary);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.25);
        z-index: 2;
        transition: var(--transition-smooth);
    }
    
    .timeline-card-item:hover .timeline-card-dot {
        background-color: #06b6d4; /* Secondary accent dot on hover */
        transform: scale(1.2);
        box-shadow: 0 0 0 4px rgba(6, 182, 212, 0.3);
    }
    
    .timeline-card-badge {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 0.3rem 0.75rem;
        border-radius: 30px;
        margin-bottom: 0.6rem;
        background-color: rgba(99, 102, 241, 0.08);
        color: #4f46e5;
        border: 1px solid rgba(79, 70, 229, 0.15);
        transition: var(--transition-smooth);
    }
    
    [data-theme="dark"] .timeline-card-badge {
        background-color: rgba(129, 140, 248, 0.15);
        color: #818cf8;
        border: 1px solid rgba(129, 140, 248, 0.2);
    }
    
    .timeline-card-item:hover .timeline-card-badge {
        background-color: #4f46e5;
        color: #ffffff;
        border-color: transparent;
    }
    
    .timeline-card-title {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        font-size: 1.15rem;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }
    
    .timeline-card-company {
        font-weight: 600;
        font-size: 0.9rem;
        color: #4f46e5;
        margin-bottom: 0.6rem;
    }
    
    [data-theme="dark"] .timeline-card-company {
        color: #818cf8;
    }
    
    .timeline-card-desc {
        font-size: 0.875rem;
        line-height: 1.6;
        color: var(--text-secondary);
        text-align: justify;
    }
</style>
@endsection

@section('content')
    <!-- Experience Section -->
    <section class="main-content" id="experience">
        <div class="container">
            <h2 class="section-title">Experience</h2>
            <div class="row mt-4">
                <!-- Timeline Card (Riwayat Pengalaman) -->
                <div class="col-lg-7 mb-4">
                    <div class="card rounded-4 shadow-sm p-4 h-100 border-0" style="background: var(--card-bg); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border: 1px solid var(--border-color) !important;">
                        <h4 class="fw-bold mb-4 d-flex align-items-center gap-2" style="color: #4f46e5; font-family: 'Outfit', sans-serif;">
                            <i class="fa-solid fa-briefcase"></i>
                            <span>Riwayat Pengalaman</span>
                        </h4>
                        
                        <div class="timeline-wrapper">
                            <!-- Item 1 -->
                            <div class="timeline-card-item">
                                <div class="timeline-card-dot"></div>
                                <span class="timeline-card-badge">2025 - Sekarang</span>
                                <h5 class="timeline-card-title">Founder & Lead Developer</h5>
                                <div class="timeline-card-company">Solusi Mudah Payment</div>
                                <p class="timeline-card-desc mb-0">
                                    Merancang dan mengelola platform layanan payment server dan digital payment mikro. Bertanggung jawab penuh atas manajemen harga, operasional transaksi produk digital, serta merancang proposal ekspansi bisnis ke dalam ekosistem digital terintegrasi (Sobat Ojek, Solusi Mart, dan Solusi Pay).
                                </p>
                            </div>
                            
                            <!-- Item 2 -->
                            <div class="timeline-card-item">
                                <div class="timeline-card-dot"></div>
                                <span class="timeline-card-badge">2024 - Sekarang</span>
                                <h5 class="timeline-card-title">System Information Student & Full-Stack Developer</h5>
                                <div class="timeline-card-company">Universitas Pamulang (Studi Akademik)</div>
                                <p class="timeline-card-desc mb-0">
                                    Mengembangkan berbagai aplikasi berbasis web dan desktop sebagai bagian dari studi akademik Sistem Informasi. Berhasil membangun sistem manajemen kampus (CRUD data dosen), aplikasi OOP Java untuk sistem perpustakaan, serta web e-commerce Toko Sepatu Sport menggunakan Laravel 12.
                                </p>
                            </div>
                            
                            <!-- Item 3 -->
                            <div class="timeline-card-item">
                                <div class="timeline-card-dot"></div>
                                <span class="timeline-card-badge">2026</span>
                                <h5 class="timeline-card-title">Data Exploration & Graphic Design Specialist</h5>
                                <div class="timeline-card-company">Proyek Independen / Freelance</div>
                                <p class="timeline-card-desc mb-0">
                                    Melakukan eksplorasi, pembersihan (cleaning), dan analisis dataset penjualan menggunakan bahasa Python dan library Pandas di PyCharm. Aktif mendesain aset grafis digital, branding identitas bisnis, dan ID card profesional menggunakan Adobe Illustrator.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Technology Stack Card -->
                <div class="col-lg-5 mb-4">
                    <div class="card rounded-4 shadow-sm p-4 h-100 border-0" style="background: var(--card-bg); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border: 1px solid var(--border-color) !important;">
                        <h4 class="fw-bold mb-4 d-flex align-items-center gap-2" style="color: #4f46e5; font-family: 'Outfit', sans-serif;">
                            <i class="fa-solid fa-code"></i>
                            <span>Keahlian Teknologi</span>
                        </h4>
                        <p class="text-secondary small mb-4" style="color: var(--text-secondary) !important;">Berikut adalah beberapa teknologi utama yang saya gunakan untuk mendesain dan mengembangkan sistem informasi:</p>
                        
                        <div class="row g-3">
                            <div class="col-6 col-sm-4">
                                <div class="skill-card text-center">
                                    <i class="fa-brands fa-laravel text-danger fa-2x mb-2"></i>
                                    <h6 class="fw-semibold mb-0 small" style="color: var(--text-primary);">Laravel 12</h6>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="skill-card text-center">
                                    <i class="fa-brands fa-php text-primary fa-2x mb-2"></i>
                                    <h6 class="fw-semibold mb-0 small" style="color: var(--text-primary);">PHP 8.2+</h6>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="skill-card text-center">
                                    <i class="fa-brands fa-js text-warning fa-2x mb-2"></i>
                                    <h6 class="fw-semibold mb-0 small" style="color: var(--text-primary);">Javascript</h6>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="skill-card text-center">
                                    <i class="fa-brands fa-css3-alt text-info fa-2x mb-2"></i>
                                    <h6 class="fw-semibold mb-0 small" style="color: var(--text-primary);">CSS3 / grid</h6>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="skill-card text-center">
                                    <i class="fa-brands fa-bootstrap text-purple fa-2x mb-2" style="color: #7952b3;"></i>
                                    <h6 class="fw-semibold mb-0 small" style="color: var(--text-primary);">Bootstrap 5</h6>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4">
                                <div class="skill-card text-center">
                                    <i class="fa-solid fa-database text-success fa-2x mb-2"></i>
                                    <h6 class="fw-semibold mb-0 small" style="color: var(--text-primary);">MySQL / DB</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
