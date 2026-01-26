@extends('layouts.app')

@section('title', 'Профилна снимка - ' . config('app.name'))

@section('content')
<div class="profile-container">
    <h1>Профилна снимка</h1>

    <div class="card">
        <div class="card-body">
            <div class="avatar-preview">
                @if ($user->avatar_url)
                    <img src="{{ $user->avatar_url }}" alt="{{ $user->full_name }}" id="avatar-preview">
                @else
                    <div class="avatar-placeholder large">{{ strtoupper(substr($user->full_name, 0, 1)) }}</div>
                @endif
            </div>

            <form method="POST" action="{{ route('profile.avatar.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="avatar" class="form-label">Изберете нова снимка</label>
                    <input type="file" id="avatar" name="avatar"
                           class="form-file @error('avatar') is-invalid @enderror"
                           accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                           data-preview="avatar-preview"
                           required>
                    @error('avatar')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                    <p class="form-hint">Максимален размер: 2MB. Позволени формати: JPEG, PNG, GIF, WebP</p>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Качи снимка</button>
                    <a href="{{ route('profile.show') }}" class="btn btn-ghost">Отказ</a>
                </div>
            </form>

            @if ($user->avatar && !str_starts_with($user->avatar, 'http'))
                <div class="delete-form">
                    <form method="POST" action="{{ route('profile.avatar.delete') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Сигурни ли сте, че искате да изтриете профилната снимка?')">
                            Изтрий снимката
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
