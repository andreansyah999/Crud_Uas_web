@extends('layouts.app')

@section('title', 'Contact - Andreansyah Portfolio & Pemain Olahraga')

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

    /* Contact Links */
    .social-contact-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 1rem;
        border-radius: 12px;
        background: var(--bg-primary);
        border: 1px solid var(--border-color);
        text-decoration: none;
        color: var(--text-primary);
        font-weight: 600;
        transition: var(--transition-smooth);
    }
    
    .social-contact-link:hover {
        transform: translateX(5px);
        border-color: #4f46e5;
        background: rgba(79, 70, 229, 0.05);
        color: #4f46e5;
    }
</style>
@endsection

@section('content')
    <!-- Contact Section -->
    <section class="main-content" id="contact" style="padding-bottom: 5rem;">
        <div class="container">
            <h2 class="section-title">Contact</h2>
            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="card premium-card p-4 h-100">
                        <h4 class="fw-bold mb-3" style="color: var(--text-primary); font-family: 'Outfit', sans-serif;"><i class="fa-regular fa-paper-plane me-2 text-indigo" style="color: #4f46e5;"></i>Kirim Pesan</h4>
                        <p class="text-secondary small mb-4" style="color: var(--text-secondary) !important;">Punya pertanyaan mengenai proyek ini? Silakan hubungi saya melalui formulir di bawah ini.</p>
                        
                        <form onsubmit="event.preventDefault(); alert('Pesan berhasil terkirim (Simulasi)!'); this.reset();">
                            <div class="mb-3">
                                <label class="form-label small fw-bold" style="color: var(--text-primary);">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Nama Anda..." required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold" style="color: var(--text-primary);">Alamat Email</label>
                                <input type="email" class="form-control" placeholder="email@contoh.com..." required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold" style="color: var(--text-primary);">Pesan</label>
                                <textarea class="form-control" rows="4" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-premium w-100">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="card premium-card p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <h4 class="fw-bold mb-3" style="color: var(--text-primary); font-family: 'Outfit', sans-serif;"><i class="fa-solid fa-circle-nodes me-2 text-indigo" style="color: #4f46e5;"></i>Media Sosial &amp; Kontak</h4>
                            <p class="text-secondary small mb-4" style="color: var(--text-secondary) !important;">Hubungi saya atau lihat proyek saya lainnya melalui tautan resmi di bawah ini:</p>
                            
                            <div class="d-flex flex-column gap-3 mb-4">
                                <a href="mailto:thejo1928@gmail.com" class="social-contact-link">
                                    <i class="fa-regular fa-envelope fa-lg text-danger"></i>
                                    <div>
                                        <span class="d-block small text-muted">Surel / Email</span>
                                        <span class="small" style="color: var(--text-primary);">thejo1928@gmail.com</span>
                                    </div>
                                </a>
                                <a href="https://github.com" target="_blank" class="social-contact-link">
                                    <i class="fa-brands fa-github fa-lg" style="color: var(--text-primary);"></i>
                                    <div>
                                        <span class="d-block small text-muted">GitHub</span>
                                        <span class="small" style="color: var(--text-primary);">github.com/andreansyah</span>
                                    </div>
                                </a>
                                <a href="https://wa.me/62895605903995" target="_blank" class="social-contact-link">
                                    <i class="fa-brands fa-whatsapp fa-lg text-success"></i>
                                    <div>
                                        <span class="d-block small text-muted">WhatsApp</span>
                                        <span class="small" style="color: var(--text-primary);">0895-6059-03995</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div style="background: rgba(79, 70, 229, 0.04); border: 1px dashed rgba(79, 70, 229, 0.15); border-radius: 12px;" class="p-3 text-center">
                            <span class="small" style="color: var(--text-secondary);"><i class="fa-solid fa-circle-info text-indigo me-2" style="color: #4f46e5;"></i>Silakan klik tautan di atas untuk berinteraksi secara langsung.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
