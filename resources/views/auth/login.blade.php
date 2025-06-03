<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="main">
            <div class="login_form_top">
                <h1>LOGIN</h1>
                <p>email、Passwordをご入力の上、「LOGIN」ボタンをクリックしてください。</p>
            </div>
            <div class="login_form_btm">
                <form method="POST" action="{{ route('login') }}" name="login_form">
                @csrf
                    <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
                    <input type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                    <div class="login_register_button">
                        <button type="submit" name="button">LOGIN</button>
                        <button type="button" name="button" onclick="window.location.href = '{{ route('register') }}'">Register</button>
                    </div>
                </form>
            </div>
    </div>
</x-guest-layout>