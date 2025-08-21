<x-guest-layout>
    <h3>Hello! let's get started
    </h3>
    <p>Sign in to continue.</p>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form  method="POST" action="{{ route('login') }}">
        @csrf
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
        <div class="row">
            {{-- <div class="input-group mb-8">
                <div class="icheck-primary">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div> --}}
            <!-- /.col -->

            <button type="submit" class="btn btn-primary ml-1 btn-lg">
                {{ __('Login') }}
            </button>

        </div>
        <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
                <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember"> Keep me
                    signed in <i class="input-helper"></i>
                    <i class="input-helper"></i></label>
            </div>
            <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot
                password?</a>
        </div>
    </form>
</x-guest-layout>
