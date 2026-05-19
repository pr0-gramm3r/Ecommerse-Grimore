@include('includes.authheader')

<a href="{{ route('home') }}" style="text-decoration: none; color: white; font-family: sans-serif; margin: 20px 10px;">Back to Home</a>

    <section>
        @if (isset($success))
            <div class="alert alert-success">
                {{ $success }}
            </div>
        @endif
        @if (isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif
        <div class="signup-box">
            <form action="{{ route('signup') }}" method="POST">
                @csrf
                <h1 class="signup">Register</h1>
                <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" required>
                    <label for="name">Full Name</label>
                </div>
                <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" required>
                    <label for="email">Email</label> 
                </div>
                <div class="input-box">
                    <i class= "fas fa-eye-slash toggle-eye"></i>
                    <input type="password" id="pass" name="password" required minlength="6">
                    <label for="password">Password</label> 
                </div>
                <div class="input-box">
                    <input type="password" name="password_confirmation" required minlength="6">
                    <label for="password_confirmation">Confirm Password</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-link">
                    <p>Already have an account?
                        <a href="{{ route('login') }}" id="link">Login</a>
                    </p>
                </div>
            </form> 
            <h3 style="color: white; font-family: Arial, sans-serif; margin: 20px;">OR</h3>
            <a href="{{ route('auth.google', ['type' => 'merchant']) }}" class="google-btn">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google">
            </a>
        </div>
    </section>
    <script src="{{ asset('js/auth.js') }}"></script>
@include('includes.footer')