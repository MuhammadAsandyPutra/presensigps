<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, viewport-fit=cover">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="theme-color" content="#123B2A">

    <title>E-Presensi BPRS</title>
    <meta name="description" content="Sistem Presensi Digital BPRS">

    <link rel="icon" type="image/png"
        href="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet"
        href="{{ asset('assets/css/login.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

</head>

<body>

    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>

    <main class="login-page">
        <div class="login-container">

            <div class="login-card">

                <!-- BRAND -->
                <div class="brand-section">
                    <img
                        src="{{ asset('assets/img/IcLogin/ic_bprs.jpeg') }}"
                        alt="Logo BPRS"
                        class="brand-logo">

                    <h1 class="brand-title">E-Presensi BPRS</h1>
                    <div class="gold-line"></div>

                    <p class="brand-subtitle">
                        Sistem Informasi Kehadiran Pegawai
                    </p>
                </div>

                <!-- FORM HEADING -->
                <div class="section-heading">
                    <h2>Selamat Datang</h2>
                    <p>Silakan masuk menggunakan akun pegawai Anda.</p>
                </div>

                <!-- NOTIFICATION -->
                @if(Session::get('warning'))
                <div class="alert alert-warning" role="alert">
                    {{ Session::get('warning') }}
                </div>
                @endif

                <!-- LOGIN FORM -->
                <form action="/proseslogin" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nik" class="form-label">
                            Nomor Induk Karyawan (NIK)
                        </label>

                        <div class="input-wrapper">
                            <input
                                type="text"
                                class="form-control"
                                id="nik"
                                name="nik"
                                placeholder="Masukkan NIK Anda"
                                autocomplete="username"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">
                            Password
                        </label>

                        <div class="input-wrapper">
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Masukkan password"
                                autocomplete="current-password"
                                required>

                            <button
                                type="button"
                                class="password-toggle"
                                id="togglePassword">
                                Lihat
                            </button>
                        </div>
                    </div>

                    <div class="form-links">
                        <a href="page-forgot-password.html">
                            Lupa password?
                        </a>
                    </div>

                    <button type="submit" class="btn-login">
                        Masuk ke Akun
                    </button>
                </form>

                <!-- SECURITY -->
                <div class="security-info">
                    <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8">
                        <rect x="4" y="10" width="16" height="11" rx="2" />
                        <path d="M8 10V7a4 4 0 1 1 8 0v3" />
                        <path d="M12 14v3" />
                    </svg>

                    <span>Akses aman dan terlindungi</span>
                </div>

            </div>

            <!-- FOOTER -->
            <div class="login-footer">
                © {{ date('Y') }} <strong>E-Presensi BPRS</strong>
                <br>
                Sistem Internal Kepegawaian
            </div>

        </div>
    </main>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            this.textContent = isPassword ? 'Sembunyikan' : 'Lihat';
        });
    </script>

</body>

</html>