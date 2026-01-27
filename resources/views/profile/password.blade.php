@extends('layouts.app')

@section('title', 'Промяна на паролата - ' . config('app.name'))

@section('content')
<div class="profile-container">
    <h1>Промяна на паролата</h1>

    <div class="card">
        <form method="POST" action="{{ route('profile.password.update') }}" class="card-body">
            @csrf
            @method('PUT')

            @if ($user->password)
                <div class="form-group">
                    <label for="current_password" class="form-label">Текуща парола</label>
                    <input type="password" id="current_password" name="current_password"
                           class="form-input @error('current_password') is-invalid @enderror"
                           required>
                    @error('current_password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            @else
                <div class="alert alert-info mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
                    </svg>
                    <span>Регистрирали сте се чрез {{ ucfirst($user->provider) }}. Можете да зададете парола за директен вход.</span>
                </div>
            @endif

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
                <label for="password_confirmation" class="form-label">Потвърдете новата парола</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="form-input" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Промени паролата</button>
                <a href="{{ route('profile.show') }}" class="btn btn-ghost">Отказ</a>
            </div>
        </form>
    </div>
</div>
@endsection
