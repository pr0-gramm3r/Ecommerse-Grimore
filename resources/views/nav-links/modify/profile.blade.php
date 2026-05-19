@include('includes.header')
<title>Modify Details</title>
<link rel="stylesheet" href="{{ asset('css/merch_prof_mod.css') }}">

<body>
    <div class="page">

        <div class="page-header">
            <span class="page-label">Settings</span>
            <h1 class="page-title">Modify Details</h1>
            <p class="page-sub">Choose an action below to update or remove your account.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class='bx bx-error-circle'></i>
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <i class='bx bx-check-circle'></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="select-wrap">
            <select name="modification" id="opt">
                <option value="" selected disabled>Choose your option</option>
                <option value="change">Change details</option>
                <option value="delete">Delete account</option>
            </select>
            <i class='bx bx-chevron-down'></i>
        </div>

        <div class="change form-card" style="display: none;">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-header">
                    <i class='bx bx-user'></i>
                    <h3>Update Profile</h3>
                </div>
                <p class="form-desc">Update your display name below.</p>
                <div class="field">
                    <label for="merchant_name">Enter New Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name">
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter new password">
                </div>
                <button class="btn-modify" type="submit">
                    <i class='bx bx-cog'></i> Save Changes
                </button>
            </form>
        </div>

        <div class="delete form-card" style="display: none;">
            <form action="{{ route('account.delete') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="form-header danger">
                    <i class='bx bx-trash'></i>
                    <h3>Delete Account</h3>
                </div>
                <p class="form-desc">This action is <strong>permanent</strong> and cannot be undone. All your data will be lost.</p>
                <div class="field">
                    <label for="password">Confirm Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password to confirm">
                </div>
                <button class="btn-delete" type="submit">
                    <i class='bx bx-trash'></i> Delete My Account
                </button>
            </form>
        </div>

    </div>

    <script src="{{ asset('js/modify.js') }}"></script>
</body>
</html>
