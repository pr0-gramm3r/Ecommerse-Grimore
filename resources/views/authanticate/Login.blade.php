@include('includes.authheader')
    <section>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="login-box">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="hidden" name="redirect" value="{{ request('redirect') }}">
                <h1 class="login">Login</h1>
                <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" value="{{ old('email') }}" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-box">
                    <i class="fas fa-eye-slash toggle-eye"></i>
                    <input type="password" id="pass" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    <a href="{{ route('password.Forgot') }}">Forgot password?</a>
                </div>
                <button type="submit" class="btn"   >Login</button>
                <div class="register-link">
                    <p>Don't have account?
                        <a href="{{ route('signup') }}" id="link">Register</a>
                    </p>
                </div>
            </form>
            <h3 style="color: white; font-family: Arial, sans-serif; margin: 20px;">OR</h3>
            <a href="{{ route('auth.google', ['type' => 'user']) }}" class="google-btn">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google">
            </a>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js/msg.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}"></script>
@include('includes.footer')