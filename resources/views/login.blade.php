<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Bumigora News</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-blue: #1a5f7a;
            --dark-blue: #0a3d62;
            --light-blue: #e8f4fc;
            --gray-800: #2d3748;
            --gray-700: #4a5568;
            --gray-200: #edf2f7;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            padding: 40px 20px;
            text-align: center;
            color: white;
        }

        .login-logo {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .login-logo i {
            font-size: 40px;
        }

        .login-body {
            padding: 40px;
        }

        .form-control {
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(26, 95, 122, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 8px;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--dark-blue) 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(26, 95, 122, 0.2);
        }

        .login-footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid var(--gray-200);
            color: var(--gray-700);
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .input-group-text {
            background-color: transparent;
            border: 2px solid var(--gray-200);
            border-right: none;
            border-radius: 10px 0 0 10px;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray-700);
            cursor: pointer;
            z-index: 10;
        }

        .password-wrapper {
            position: relative;
        }

        .forgot-password {
            text-decoration: none;
            color: var(--primary-blue);
            font-size: 14px;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            animation: fadeIn 0.6s ease-out;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-container {
                padding: 0 15px;
            }

            .login-body {
                padding: 30px 20px;
            }

            .login-header {
                padding: 30px 20px;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            .login-card {
                background: #1a202c;
                color: #e2e8f0;
            }

            .form-control {
                background-color: #2d3748;
                border-color: #4a5568;
                color: #e2e8f0;
            }

            .form-control:focus {
                background-color: #2d3748;
                border-color: var(--primary-blue);
            }

            .input-group-text {
                background-color: #2d3748;
                border-color: #4a5568;
                color: #e2e8f0;
            }

            .form-label {
                color: #e2e8f0;
            }

            .login-footer {
                border-top-color: #4a5568;
                color: #a0aec0;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h1 class="h3 mb-2">Bumigora News</h1>
                <p class="mb-0 opacity-75">Admin Panel Login</p>
            </div>

            <div class="login-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope me-2"></i>Email Address
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="admin@bumigoranews.com"
                                   required
                                   autofocus>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock me-2"></i>Password
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-key"></i>
                            </span>
                            <div class="password-wrapper w-100 position-relative">
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       placeholder="Enter your password"
                                       required>
                                <button type="button"
                                        class="password-toggle"
                                        onclick="togglePassword()">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="remember"
                                   id="remember"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                    </div>

                    <div class="text-center mb-3">
                        <a href="#" class="forgot-password">
                            <i class="fas fa-question-circle me-1"></i>Forgot Password?
                        </a>
                    </div>
                </form>
            </div>

            <div class="login-footer">
                <p class="mb-0">
                    <small>&copy; {{ date('Y') }} Bumigora News. All rights reserved.</small>
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Auto dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                e.preventDefault();
                alert('Please fill in all required fields');
            }
        });
    </script>
</body>
</html>
