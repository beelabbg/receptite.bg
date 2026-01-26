@extends('layouts.app')

@section('title', 'Редактирай рецепта - ' . config('app.name'))

@section('content')
<div class="recipe-form-container">
    <h1>Редактирай рецепта</h1>

    <form method="POST" action="{{ route('recipes.update', $recipe) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="form-label">Заглавие *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $recipe->title) }}"
                   class="form-input @error('title') is-invalid @enderror" required>
            @error('title')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id" class="form-label">Категория</label>
            <select id="category_id" name="category_id"
                    class="form-select @error('category_id') is-invalid @enderror">
                <option value="">-- Изберете категория --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $recipe->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Кратко описание</label>
            <textarea id="description" name="description" rows="3"
                      class="form-textarea @error('description') is-invalid @enderror">{{ old('description', $recipe->description) }}</textarea>
            @error('description')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="ingredients" class="form-label">Съставки</label>
            <textarea id="ingredients" name="ingredients" rows="8"
                      class="form-textarea @error('ingredients') is-invalid @enderror">{{ old('ingredients', $recipe->ingredients) }}</textarea>
            @error('ingredients')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="instructions" class="form-label">Начин на приготвяне</label>
            <textarea id="instructions" name="instructions" rows="10"
                      class="form-textarea @error('instructions') is-invalid @enderror">{{ old('instructions', $recipe->instructions) }}</textarea>
            @error('instructions')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Снимка</label>
            @if ($recipe->image)
                <div class="current-image">
                    <img src="{{ $recipe->image->url }}" alt="{{ $recipe->title }}"
                         class="w-full max-w-xs rounded-lg">
                    <p>Текуща снимка</p>
                </div>
            @endif
            <input type="file" id="image" name="image"
                   class="form-file @error('image') is-invalid @enderror"
                   accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
            @error('image')
                <p class="form-error">{{ $message }}</p>
            @enderror
            <p class="form-hint">Качете нова снимка за да замените текущата. Максимален размер: 4MB.</p>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="prep_time_minutes" class="form-label">Подготовка (мин)</label>
                <input type="number" id="prep_time_minutes" name="prep_time_minutes"
                       value="{{ old('prep_time_minutes', $recipe->prep_time_minutes) }}"
                       class="form-input @error('prep_time_minutes') is-invalid @enderror"
                       min="0" max="1440">
                @error('prep_time_minutes')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="cook_time_minutes" class="form-label">Готвене (мин)</label>
                <input type="number" id="cook_time_minutes" name="cook_time_minutes"
                       value="{{ old('cook_time_minutes', $recipe->cook_time_minutes) }}"
                       class="form-input @error('cook_time_minutes') is-invalid @enderror"
                       min="0" max="1440">
                @error('cook_time_minutes')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="servings" class="form-label">Порции</label>
                <input type="number" id="servings" name="servings"
                       value="{{ old('servings', $recipe->servings) }}"
                       class="form-input @error('servings') is-invalid @enderror"
                       min="1" max="100">
                @error('servings')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="difficulty" class="form-label">Трудност *</label>
            <select id="difficulty" name="difficulty" class="form-select" required>
                <option value="easy" {{ old('difficulty', $recipe->difficulty) === 'easy' ? 'selected' : '' }}>Лесна</option>
                <option value="medium" {{ old('difficulty', $recipe->difficulty) === 'medium' ? 'selected' : '' }}>Средна</option>
                <option value="hard" {{ old('difficulty', $recipe->difficulty) === 'hard' ? 'selected' : '' }}>Трудна</option>
            </select>
            @error('difficulty')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="tags" class="form-label">Тагове</label>
            <input type="text" id="tags" name="tags"
                   value="{{ old('tags', is_array($recipe->tags) ? implode(', ', $recipe->tags) : $recipe->tags) }}"
                   class="form-input @error('tags') is-invalid @enderror"
                   placeholder="таг1, таг2, таг3">
            @error('tags')
                <p class="form-error">{{ $message }}</p>
            @enderror
            <p class="form-hint">Разделете таговете със запетая</p>
        </div>

        <div class="form-actions">
            <button type="submit" name="publish" value="0" class="btn btn-secondary">
                Запази като чернова
            </button>
            @if (!$recipe->active)
                <button type="submit" name="publish" value="1" class="btn btn-primary">
                    Публикувай
                </button>
            @else
                <button type="submit" class="btn btn-primary">
                    Запази промените
                </button>
            @endif
            <a href="{{ route('recipes.my') }}" class="btn btn-ghost">Отказ</a>
        </div>
    </form>
</div>
@endsection
