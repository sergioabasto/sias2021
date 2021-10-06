@extends('layouts.app')

@section('content')
<div class="login-box">
    <img src="img/icono.png" class="avatar" alt="Avatar Image">
    <h1>TED-LA PAZ</h1>
    <form method="POST" action="{{ route('login') }}" >
        @csrf
        <div >
            <label for="username" >CORREO ELECTRONICO</label>
            <div >
                <input id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div >
            <label for="password">CONTRASEÑA</label>
            <div >
                <input id="password" type="password"  name="password" required autocomplete="current-password">
                @error('password')
                <span  role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div >
            <div >
                <div class="form-check">
                    <!--input class="form-check-input block" type="checkbox" name="remember" id="remember" {{-- old('remember') ? 'checked' : '' --}}-->

                           <!--label for="remember">
                        {{-- __('Remember Me') --}}
                    </label-->
                </div>
            </div>
        </div>

        <div >
            <div >
                <input type="submit" value="LogIn">
                @if (Route::has('password.request'))
                <a  href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection

