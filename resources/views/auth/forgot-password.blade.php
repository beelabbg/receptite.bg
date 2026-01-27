@extends('layouts.app')

@section('title', 'Забравена парола - ' . config('app.name'))

@section('content')
<div class="container py-12">
    <div class="auth-container">
        <h1>Забравена парола</h1>

        <div class="card p-6">
            <p class="text-gray-600 mb-6">
                Въведете имейл адреса си и ще ви изпратим линк за възстановяване на паролата.
            </p>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Имейл адрес</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="form-input @error('email') is-invalid @enderror"
                           required autofocus>
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-full">
                    Изпрати линк за възстановяване
                </button>

                <div class="form-links">
                    <a href="{{ route('login') }}">Обратно към входа</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
