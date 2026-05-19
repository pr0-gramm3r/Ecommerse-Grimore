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
            <form action="{{ route('password.reset.email') }}" method="POST">
                @csrf
                <h5 class="login" style="font-size: 1.4rem;">Reset Your Password</h5>
                <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    <label for="email">Email</label>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js/msg.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}"></script>
@include('includes.footer')