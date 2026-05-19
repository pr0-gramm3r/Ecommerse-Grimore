@include('includes.authheader')

    <section>
        <div class="signup-box">
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
            <form action="{{ route('merchant.signup') }}" method="POST">
                @csrf
                <h1 class="signup">Register ✅</h1>
                <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" name="merchant_name" required>
                    <label for="merchant_name">Name</label>
                </div>
                <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="merchant_email" required>
                    <label for="merchant_email">Email</label> 
                </div>
                <div class="input-box">
                    <i class="fas fa-phone"></i>
                    <input type="text" name="merchant_phone" required>
                    <label for="merchant_phone">Phone</label>
                </div>
                <div class="input-box">
                    <i class= "fas fa-eye-slash toggle-eye"></i>
                    <input type="password" name="merchant_password" id="pass" required minlength="6" maxlength="15">
                    <label for="merchant_password">Password</label> 
                </div>
                <div class="input-box">
                    <input type="password" name="merchant_password_confirmation" required minlength="6" maxlength="15">
                    <label for="merchant_password_confirmation">Confirm Password</label>
                </div>
                <div class="input-box">
                    <textarea name="merchant_address" id="" cols="40" rows="10" placeholder="Address*"></textarea>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-link">
                    <p>Already have an account?
                        <a href="{{ route('show.merchant.login') }}" id="link">Merchant Login</a>
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