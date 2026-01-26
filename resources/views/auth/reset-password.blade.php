@extends('layouts.app')

@section('title', 'Нова парола - ' . config('app.name'))

@section('content')
<div class="container py-12">
    <div class="auth-container">
        <h1>Задаване на нова парола</h1>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
                <label for="email" class="form-label">Имейл адрес</label>
                <input type="email" id="email" name="email"
                       value="{{ old('email', $request->email) }}"
                       class="form-input @error('email') is-invalid @enderror"
                       required autofocus>
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Нова парола</label>
                <input type="password" id="password" name="password"
                       class="form-input @error('password') is-invalid @enderror"
                       required>
                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Потвърдете паролата</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="form-input" required>
            </div>

            <button type="submit" class="btn btn-primary w-full">
                Запази новата парола
            </button>
        </form>
    </div>
</div>
@endsection
