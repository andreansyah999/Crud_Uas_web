<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Rekayasa Web | SI UNPAM</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.75) 0%, rgba(88, 28, 135, 0.75) 100%), url('{{ asset("campus_bg.png") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow: hidden;
        }

        /* Floating wrapper */
        .login-wrapper {
            position: relative;
            width: 100%;
            max-width: 400px;
            padding-bottom: 25px; /* Room for floating animation */
        }

        /* Glassmorphism Card with Floating Animation */
        .login-card {
            position: relative;
            background: rgba(255, 255, 255, 0.45);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 24px;
            padding: 35px 30px;
            z-index: 2;
            animation: floatCard 6s ease-in-out infinite;
            color: #0f172a;
        }

        /* Interactive Dynamic Shadow Beneath */
        .login-shadow {
            position: absolute;
            bottom: 5px;
            left: 10%;
            right: 10%;
            height: 14px;
            background: rgba(0, 0, 0, 0.45);
            border-radius: 50%;
            z-index: 1;
            animation: shadowScale 6s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes floatCard {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-16px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        @keyframes shadowScale {
            0% {
                transform: scale(1);
                opacity: 0.4;
                filter: blur(6px);
            }
            50% {
                transform: scale(0.75);
                opacity: 0.15;
                filter: blur(12px);
            }
            100% {
                transform: scale(1);
                opacity: 0.4;
                filter: blur(6px);
            }
        }

        /* Title style with text gradient */
        .login-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 1.8rem;
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        /* Form labels */
        .form-label {
            color: #1e293b;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.875rem;
        }

        /* Glassmorphism Inputs */
        .form-control {
            border: 1.5px solid rgba(255, 255, 255, 0.4);
            background: rgba(255, 255, 255, 0.65);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            font-weight: 500;
            color: #0f172a;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.9);
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.2);
            color: #0f172a;
            outline: none;
        }

        /* Gradient Button with Glow */
        .btn-login {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 700;
            font-size: 1rem;
            width: 100%;
            margin-top: 1rem;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.35);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.5);
            color: white;
            opacity: 0.95;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* Demo credentials box */
        .demo-box {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(5px);
            border: 1px dashed rgba(255, 255, 255, 0.45);
            border-radius: 14px;
            padding: 15px;
            margin-top: 25px;
            font-size: 0.825rem;
            color: #1e293b;
        }

        .demo-title {
            font-weight: 700;
            margin-bottom: 8px;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .copyable-text {
            font-family: 'Courier New', Courier, monospace;
            background: rgba(255, 255, 255, 0.55);
            padding: 2px 6px;
            border-radius: 6px;
            font-weight: 700;
            color: #4f46e5;
            cursor: pointer;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.2s ease;
        }

        .copyable-text:hover {
            background: rgba(255, 255, 255, 0.8);
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            color: #475569;
            letter-spacing: 0.5px;
        }

        /* Glassmorphism Alert */
        .alert-glass {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #ef4444;
            border-radius: 12px;
            font-size: 0.85rem;
            backdrop-filter: blur(4px);
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <!-- Dynamic shadow under floating card -->
        <div class="login-shadow"></div>
        
        <!-- Main Float Login Card -->
        <div class="login-card">
            <div class="login-title">
                <i class="fa-solid fa-cloud-bolt text-primary" style="animation: bounce 2s infinite alternate;"></i>
                <span>Login SI</span>
            </div>

            <!-- Error Alerts -->
            @if($errors->any())
                <div class="alert alert-glass py-2 px-3 mb-3 text-center">
                    <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $errors->first() }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                
                <!-- Username / Email Input -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" 
                           name="username" 
                           id="username" 
                           class="form-control" 
                           value="{{ old('username') }}" 
                           placeholder="Masukkan username..."
                           required 
                           autofocus>
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           class="form-control" 
                           placeholder="Masukkan password..."
                           required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-login">
                    <i class="fa-solid fa-right-to-bracket me-1"></i> Masuk Aplikasi
                </button>
            </form>

            <!-- Demo Credentials Box -->
            <div class="demo-box">
                <div class="demo-title">
                    <i class="fa-solid fa-key text-warning"></i>
                    <span>Akun Demo Penguji</span>
                </div>
                <div class="mb-1">
                    <span>Username: </span>
                    <span class="user-select-all copyable-text" title="Klik untuk memblokir teks">admin</span>
                </div>
                <div>
                    <span>Password: </span>
                    <span class="user-select-all copyable-text" title="Klik untuk memblokir teks">password123</span>
                </div>
            </div>

            <div class="login-footer">
                <i class="fa-solid fa-graduation-cap me-1"></i> Rekayasa Web | SI UNPAM
            </div>
        </div>
    </div>

</body>
</html>
