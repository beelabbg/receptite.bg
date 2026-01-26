@extends('layouts.app')

@section('title', 'Моят профил - ' . config('app.name'))

@section('content')
<div class="profile-container">
    <h1>Моят профил</h1>

    <div class="profile-card">
        <div class="profile-avatar">
            @if ($user->avatar_url)
                <img src="{{ $user->avatar_url }}" alt="{{ $user->full_name }}">
            @else
                <div class="avatar-placeholder">{{ strtoupper(substr($user->full_name, 0, 1)) }}</div>
            @endif
            <a href="{{ route('profile.avatar') }}" class="btn btn-outline btn-sm mt-2">
                Промени снимката
            </a>
        </div>

        <div class="profile-info">
            <div class="info-group">
                <label>Име</label>
                <span>{{ $user->full_name }}</span>
            </div>

            <div class="info-group">
                <label>Имейл</label>
                <span class="flex items-center gap-2">
                    {{ $user->email }}
                    @if (!$user->hasVerifiedEmail())
                        <span class="badge badge-warning">Непотвърден</span>
                    @else
                        <span class="badge badge-success">Потвърден</span>
                    @endif
                </span>
            </div>

            @if ($user->first_name || $user->last_name)
                <div class="info-group">
                    <label>Пълно име</label>
                    <span>{{ $user->first_name }} {{ $user->last_name }}</span>
                </div>
            @endif

            <div class="info-group">
                <label>Бюлетин</label>
                <span>
                    @if ($user->newsletter_subscribed)
                        <span class="badge badge-success">Абониран</span>
                    @else
                        <span class="badge badge-gray">Не е абониран</span>
                    @endif
                </span>
            </div>

            <div class="info-group">
                <label>Регистриран на</label>
                <span>{{ $user->created_at->format('d.m.Y H:i') }}</span>
            </div>

            @if ($user->provider)
                <div class="info-group">
                    <label>Вход чрез</label>
                    <span class="capitalize">{{ $user->provider }}</span>
                </div>
            @endif
        </div>

        <div class="profile-actions">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary w-full">
                Редактирай профила
            </a>
            <a href="{{ route('profile.password') }}" class="btn btn-secondary w-full">
                Промени паролата
            </a>
            <a href="{{ route('recipes.my') }}" class="btn btn-outline w-full">
                Моите рецепти
            </a>
        </div>
    </div>
</div>
@endsection
