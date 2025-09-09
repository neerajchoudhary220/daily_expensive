<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>Login Form</title>
    @include('web.layouts.includes.css')
</head>

<body class="bg-light d-flex align-items-center" style="height:100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-4">
                        <h3 class="mb-4 text-center"><i class="bi bi-person-circle me-2"></i>Login</h3>
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <!-- Username -->
                            <div class="mb-3 input-group">
                                <span class="input-group-text bg-info text-white">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                                    id="username" placeholder="Enter username">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-3 input-group">
                                <span class="input-group-text bg-info text-white">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Enter password">
                                <span class="input-group-text" id="togglePassword" style="cursor:pointer;">
                                    <i class="bi bi-eye-fill"></i>
                                </span>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <!-- Button -->
                            <button type="submit" class="btn btn-info text-white w-100">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle icon
            const icon = togglePassword.querySelector('i');
            icon.classList.toggle('bi-eye-fill');
            icon.classList.toggle('bi-eye-slash-fill');
        });
    </script>

</body>

</html>
