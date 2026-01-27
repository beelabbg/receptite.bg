@extends('layouts.app')

@section('title', 'Моите рецепти - ' . config('app.name'))

@section('content')
<div class="recipes-container">
    <div class="page-header">
        <h1>Моите рецепти</h1>
        <a href="{{ route('recipes.create') }}" class="btn btn-primary">
            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Добави нова рецепта
        </a>
    </div>

    @if ($recipes->isEmpty())
        <div class="empty-state">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <p class="text-gray-500 mb-4">Все още нямате добавени рецепти.</p>
            <a href="{{ route('recipes.create') }}" class="btn btn-primary">
                Добавете първата си рецепта
            </a>
        </div>
    @else
        <div class="recipes-grid">
            @foreach ($recipes as $recipe)
                <div class="recipe-card">
                    @if ($recipe->image)
                        <img src="{{ $recipe->image->url }}" alt="{{ $recipe->title }}" class="recipe-image">
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif

                    <div class="recipe-content">
                        <h3 class="recipe-title">{{ $recipe->title }}</h3>

                        <div class="recipe-meta">
                            <span class="status status-{{ $recipe->active ? 'published' : 'draft' }}">
                                {{ $recipe->active ? 'Публикувана' : 'Чернова' }}
                            </span>
                            <span class="text-gray-400">{{ $recipe->created_at->format('d.m.Y') }}</span>
                        </div>

                        @if ($recipe->description)
                            <p class="recipe-description">{{ Str::limit($recipe->description, 80) }}</p>
                        @endif

                        <div class="recipe-actions">
                            <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-outline btn-sm">
                                Редактирай
                            </a>
                            @if ($recipe->active)
                                <a href="{{ route('recipe') }}?slug={{ $recipe->slug }}" class="btn btn-ghost btn-sm">
                                    Виж
                                </a>
                            @endif
                            <form method="POST" action="{{ route('recipes.destroy', $recipe) }}" class="ml-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-ghost btn-sm text-red-600 hover:bg-red-50"
                                        onclick="return confirm('Сигурни ли сте, че искате да изтриете тази рецепта?')">
                                    Изтрий
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $recipes->links() }}
        </div>
    @endif
</div>
@endsection
