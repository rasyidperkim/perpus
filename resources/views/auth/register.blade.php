@extends('frontend.templates.default')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/phonecode/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/phonecode/css/demo.css') }}">
@endpush

@section('content')
    <div class="container">
        <h5>{{ __('Register') }}</h5>
        <form method="POST" action="{{ route('register') }}" class="col s12">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input id="icon_prefix" name="name" type="text" class="@error('name') invalid @enderror"
                        value="{{ old('name') }}" required>
                    <label for="icon_prefix">{{ __('Full Name') }}</label>
                    @error('name')
                        <span class="helper-text" role="alert" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" name="username" type="text" class="validate @error('username') invalid @enderror"
                        value="{{ old('username') }}" required>
                    <label for="icon_prefix">{{ __('Username') }}</label>
                    @error('username')
                        <span class="helper-text" role="alert" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_prefix" name="email" type="email" class="validate @error('email') invalid @enderror"
                        value="{{ old('email') }}" required>
                    <label for="icon_prefix">{{ __('E-Mail Address') }}</label>
                    @error('email')
                        <span class="helper-text" role="alert" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix">phone_iphone</i>
                    <input id="phone" name="phone" type="tel" class="@error('phone') invalid @enderror"
                        value="{{ old('phone') }}">
                    <label for="icon_prefix">{{ __('Phone Number') }}</label>
                    @error('phone')
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

                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_prefix" name="password_confirmation" type="password"
                        class="@error('password-confirm') invalid @enderror" value="" required autocomplete="new-password">
                    <label for="icon_prefix">{{ __('Password Confirmation') }}</label>
                    @error('password')
                        <span class="helper-text" role="alert" data-error="{{ $message }}"></span>
                    @enderror
                </div>

                <div class="input field right">
                    <input type="submit" value="Register" class="waves-effect waves-light btn red accent-1">
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('assets/phonecode/js/intlTelInput.js') }}"></script>
    <script>
        $("#phone").intlTelInput({
            utilsScript: "{{ asset('assets/phonecode/js/intlTelInput.js') }}"
        });
    </script>
@endpush
