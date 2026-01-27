@extends('layouts.app')

@section('title', 'Потвърдете имейла - ' . config('app.name'))

@section('content')
<div class="container py-12">
    <div class="auth-container">
        <h1>Потвърдете имейл адреса си</h1>

        <div class="card p-6">
            <div class="text-center mb-6">
                <svg class="w-16 h-16 mx-auto text-primary-500 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <p class="text-gray-600">
                    Благодарим ви за регистрацията! Преди да продължите, моля потвърдете имейл адреса си като кликнете на линка, който ви изпратихме.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                    <span>Нов линк за потвърждение беше изпратен на имейл адреса, който посочихте при регистрацията.</span>
                </div>
            @endif

            <div class="verify-actions">
                <form method="POST" action="{{ route('verification.send') }}" class="flex-1">
                    @csrf
                    <button type="submit" class="btn btn-primary w-full">
                        Изпрати отново линка за потвърждение
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="flex-1">
                    @csrf
                    <button type="submit" class="btn btn-ghost w-full">
                        Изход
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
