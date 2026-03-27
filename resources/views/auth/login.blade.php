@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')

<div class="brand">
    <div class="brand-icon">💕</div>
    <h1>Nabung Bareng</h1>
    <p>Masuk ke celengan kita</p>
</div>

{{-- Flash error dari redirect --}}
@if (session('error'))
    <div class="alert alert-error">
        <span>⚠️</span>
        <span>{{ session('error') }}</span>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        <span>🎉</span>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('login.post') }}">
    @csrf

    {{-- Username --}}
    <div class="form-group">
        <label for="username">Username</label>
        <input
            type="text"
            id="username"
            name="username"
            value="{{ old('username') }}"
            placeholder="username kamu"
            autocomplete="username"
            class="{{ $errors->has('username') ? 'is-invalid' : '' }}"
        >
        @error('username')
            <div class="field-error">
                <span>✕</span> {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Password --}}
    <div class="form-group">
        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            autocomplete="current-password"
            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
        >
        @error('password')
            <div class="field-error">
                <span>✕</span> {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Remember me --}}
    <div class="remember">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Ingat saya di perangkat ini</label>
    </div>

    <button type="submit" class="btn-primary">
        Masuk 💕
    </button>
</form>

<div class="divider"><span>belum punya akun?</span></div>

<div class="switch-link">
    <a href="{{ route('register') }}">Daftar sekarang →</a>
</div>

@endsection