@extends('layouts.app')

@section('title', 'Beranda - Andreansyah Portfolio & Pemain Olahraga')

@section('styles')
<style>
    /* Hero Wavy Header */
    .hero-wavy {
        background: var(--hero-bg);
        position: relative;
        padding: 5rem 0 7rem 0;
        overflow: hidden;
        transition: var(--transition-smooth);
    }
    
    .hero-wave-svg {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 60px;
        z-index: 5;
        pointer-events: none;
    }
    
    .hero-wave-svg path {
        fill: var(--bg-secondary);
        transition: fill 0.3s ease;
    }

    /* Profile Avatar Glow */
    .profile-avatar-wrapper {
        position: relative;
        display: inline-block;
        z-index: 2;
    }
    
    .profile-avatar-wrapper::after {
        content: '';
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
        z-index: -1;
        opacity: 0.45;
        filter: blur(15px);
        animation: pulseGlow 4s infinite alternate;
    }
    
    @keyframes pulseGlow {
        0% { transform: scale(0.98); opacity: 0.4; }
        100% { transform: scale(1.03); opacity: 0.6; }
    }

    .profile-avatar-img {
        width: 240px;
        height: 240px;
        border-radius: 50%;
        object-fit: cover;
        object-position: center 15%;
        border: 6px solid var(--bg-primary);
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
    }
</style>
@endsection

@section('content')
    <!-- Hero Header -->
    <header class="hero-wavy" id="home">
        <div class="container relative z-3">
            <div class="row align-items-center justify-content-center py-4">
                <div class="col-md-5 col-lg-4 text-center mb-4 mb-md-0">
                    <div class="profile-avatar-wrapper">
                        <img src="{{ asset('uploads/andreansyah_profile.jpg') }}" class="profile-avatar-img" alt="ANDREANSYAH">
                    </div>
                </div>
                <div class="col-md-7 col-lg-6 text-center text-md-start ps-md-5">
                    <span class="badge badge-premium mb-3"><i class="fa-solid fa-sparkles me-2 text-warning"></i>Web Developer Portfolio</span>
                    <h1 class="display-4 fw-extrabold mb-2" style="font-family: 'Outfit', sans-serif; font-weight: 800; color: var(--text-primary);">
                        ANDREANSYAH
                    </h1>
                    <p class="lead mb-3" style="font-family: 'Outfit', sans-serif; font-weight: 600; background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 1.4rem; letter-spacing: 0.5px;">
                        Data Pemain Olahraga
                    </p>
                    <p class="text-secondary mb-4" style="color: var(--text-secondary) !important; font-size: 1rem; line-height: 1.6;">
                        Halo! Saya adalah pengembang web yang berfokus pada ekosistem Laravel dan modern frontend. Halaman ini memuat profil personal saya sekaligus sistem pengelolaan data pemain olahraga berbasis web.
                    </p>
                    <div>
                        <a href="{{ route('projects') }}" class="btn btn-premium btn-lg rounded-pill px-4 py-2.5 shadow-lg">
                            Lihat Projects <i class="fa-solid fa-arrow-right ms-2 small"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Curve Wave SVG Mask at the bottom -->
        <svg class="hero-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0,48 C360,110 1080,10 1440,72 L1440,120 L0,120 Z"></path>
        </svg>
    </header>
@endsection
