@extends('frontend.templates.default')

@section('content')
    <div class="container">
        <h5>{{ __('Login') }}</h5>
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('login') }}" class="col s12">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" name="username" type="text"
                            class="validate @error('username') invalid @enderror" value="{{ old('username') }}" required>
                        <label for="icon_prefix">{{ __('Username / Email / Phone') }}</label>
                        @error('username')
                            <span class="helper-text" role="alert" data-error="{{ $message }}"></span>
                        @enderror
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_prefix" name="password" type="password" class="@error('password') invalid @enderror"
                            value="" required autocomplete="new-password">
                        <label for="icon_prefix">{{ __('Password') }}</label>
                        @error('password')
                            <span class="helper-text" role="alert" data-error="{{ $message }}"></span>
                        @enderror
                    </div>

                    <div class="right">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="input-field col s12">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <label for="remember">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span>{{ __('Remember Me') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="input field s12 right" style="display: block;">
                        <button type="submit"
                            class="waves-effect waves-light btn red accent-1 hoverable">{{ __('Login') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

{{-- <div class="col-md-8">
    <div class="card">

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}
