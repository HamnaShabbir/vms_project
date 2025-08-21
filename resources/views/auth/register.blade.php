<x-guest-layout>
    <h3>Hello! let's get started
    </h3>
    <p class="">Register</p>

    <form  method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-group mb-3">
            <input type="text" placeholder="Name"
                class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="email" placeholder="Email"
                class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="password" placeholder="Password"
                class="form-control @error('password') is-invalid @enderror" name="password"
                value="{{ old('password') }}" required autocomplete="password" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input id="password-confirm"  placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        {{-- <span>Your password must contain at least one lowercase letter (a-z), one uppercase letter (A-Z), one number (0-9), and one special character (e.g., !@#$%^&*).</span> --}}

            <button type="submit" class="btn btn-primary ml-1 btn-lg">
                {{ __('register') }}
            </button>

        <div class="my-2 d-flex justify-content-between align-items-center">

            <a href="{{ route('login') }}" class="auth-link text-black">Already have an account?</a>
        </div>
    </form>

</x-guest-layout>
