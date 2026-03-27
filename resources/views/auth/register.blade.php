@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')

<div class="brand">
    <div class="brand-icon">🩷</div>
    <h1>Buat Akun</h1>
    <p>Gabung ke celengan kita</p>
</div>

@if (session('error'))
    <div class="alert alert-error">
        <span>⚠️</span>
        <span>{{ session('error') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('register.post') }}">
    @csrf

    {{-- Nama --}}
    <div class="form-group">
        <label for="name">Nama Panggilan</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            placeholder="nama kamu"
            autocomplete="name"
            class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
        >
        @error('name')
            <div class="field-error"><span>✕</span> {{ $message }}</div>
        @enderror
    </div>

    {{-- Username --}}
    <div class="form-group">
        <label for="username">Username</label>
        <input
            type="text"
            id="username"
            name="username"
            value="{{ old('username') }}"
            placeholder="contoh: sayang123"
            autocomplete="username"
            class="{{ $errors->has('username') ? 'is-invalid' : '' }}"
        >
        @error('username')
            <div class="field-error"><span>✕</span> {{ $message }}</div>
        @enderror
        <div class="hint">Huruf, angka, tanda hubung (-) dan underscore (_) saja</div>
    </div>

    {{-- Password --}}
    <div class="form-group">
        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="minimal 6 karakter"
            autocomplete="new-password"
            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
        >
        @error('password')
            <div class="field-error"><span>✕</span> {{ $message }}</div>
        @enderror
    </div>

    {{-- Konfirmasi Password --}}
    <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            placeholder="ulangi password"
            autocomplete="new-password"
        >
    </div>

    <button type="submit" class="btn-primary">
        Daftar Sekarang 🩷
    </button>
</form>

<div class="divider"><span>sudah punya akun?</span></div>

<div class="switch-link">
    <a href="{{ route('login') }}">← Kembali ke Login</a>
</div>

@endsection