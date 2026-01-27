@extends('layouts.app')

@section('title', 'Редактиране на профила - ' . config('app.name'))

@section('content')
<div class="profile-container">
    <h1>Редактиране на профила</h1>

    <div class="card">
        <form method="POST" action="{{ route('profile.update') }}" class="card-body">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="first_name" class="form-label">Име</label>
                <input type="text" id="first_name" name="first_name"
                       value="{{ old('first_name', $user->first_name) }}"
                       class="form-input @error('first_name') is-invalid @enderror">
                @error('first_name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name" class="form-label">Фамилия</label>
                <input type="text" id="last_name" name="last_name"
                       value="{{ old('last_name', $user->last_name) }}"
                       class="form-input @error('last_name') is-invalid @enderror">
                @error('last_name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Имейл адрес</label>
                <input type="email" id="email" name="email"
                       value="{{ old('email', $user->email) }}"
                       class="form-input @error('email') is-invalid @enderror"
                       required>
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <p class="form-hint">При промяна ще трябва да потвърдите новия имейл адрес.</p>
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="newsletter_subscribed" name="newsletter_subscribed" value="1"
                           {{ old('newsletter_subscribed', $user->newsletter_subscribed) ? 'checked' : '' }}>
                    <label for="newsletter_subscribed">Искам да получавам бюлетин с нови рецепти и новини</label>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Запази промените</button>
                <a href="{{ route('profile.show') }}" class="btn btn-ghost">Отказ</a>
            </div>
        </form>
    </div>
</div>
@endsection
