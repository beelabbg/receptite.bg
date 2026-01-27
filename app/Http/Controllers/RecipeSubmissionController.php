<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class RecipeSubmissionController extends Controller
{
    public function index(): View
    {
        $recipes = Auth::user()->recipes()
            ->with('image')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('recipes.my-recipes', compact('recipes'));
    }

    public function create(): View
    {
        $categories = Category::active()->orderBy('name')->get();

        return view('recipes.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'ingredients' => ['nullable', 'string'],
            'instructions' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:4096'],
            'prep_time_minutes' => ['nullable', 'integer', 'min:0', 'max:1440'],
            'cook_time_minutes' => ['nullable', 'integer', 'min:0', 'max:1440'],
            'servings' => ['nullable', 'integer', 'min:1', 'max:100'],
            'difficulty' => ['required', 'in:easy,medium,hard'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'tags' => ['nullable', 'string'],
            'publish' => ['nullable', 'boolean'],
        ]);

        $recipeData = [
            'user_id' => Auth::id(),
            'slug' => Recipe::generateSlug($validated['title']),
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'ingredients' => $validated['ingredients'] ?? null,
            'instructions' => $validated['instructions'] ?? null,
            'prep_time_minutes' => $validated['prep_time_minutes'] ?? null,
            'cook_time_minutes' => $validated['cook_time_minutes'] ?? null,
            'servings' => $validated['servings'] ?? null,
            'difficulty' => $validated['difficulty'],
            'category_id' => $validated['category_id'] ?? null,
            'active' => $request->boolean('publish'),
            'published_on' => $request->boolean('publish') ? now() : null,
        ];

        if (!empty($validated['tags'])) {
            $recipeData['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        if ($recipeData['prep_time_minutes'] || $recipeData['cook_time_minutes']) {
            $recipeData['total_time_minutes'] = ($recipeData['prep_time_minutes'] ?? 0) + ($recipeData['cook_time_minutes'] ?? 0);
        }

        $recipe = Recipe::create($recipeData);

        if ($request->hasFile('image')) {
            $this->handleImageUpload($request, $recipe);
        }

        $message = $request->boolean('publish')
            ? 'Рецептата е публикувана успешно.'
            : 'Рецептата е запазена като чернова.';

        return redirect()->route('recipes.my')->with('status', $message);
    }

    public function edit(Recipe $recipe): View|RedirectResponse
    {
        if ($recipe->user_id !== Auth::id()) {
            abort(403);
        }

        $categories = Category::active()->orderBy('name')->get();

        return view('recipes.edit', compact('recipe', 'categories'));
    }

    public function update(Request $request, Recipe $recipe): RedirectResponse
    {
        if ($recipe->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'ingredients' => ['nullable', 'string'],
            'instructions' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:4096'],
            'prep_time_minutes' => ['nullable', 'integer', 'min:0', 'max:1440'],
            'cook_time_minutes' => ['nullable', 'integer', 'min:0', 'max:1440'],
            'servings' => ['nullable', 'integer', 'min:1', 'max:100'],
            'difficulty' => ['required', 'in:easy,medium,hard'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'tags' => ['nullable', 'string'],
            'publish' => ['nullable', 'boolean'],
        ]);

        $recipeData = [
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'ingredients' => $validated['ingredients'] ?? null,
            'instructions' => $validated['instructions'] ?? null,
            'prep_time_minutes' => $validated['prep_time_minutes'] ?? null,
            'cook_time_minutes' => $validated['cook_time_minutes'] ?? null,
            'servings' => $validated['servings'] ?? null,
            'difficulty' => $validated['difficulty'],
            'category_id' => $validated['category_id'] ?? null,
        ];

        if (!empty($validated['tags'])) {
            $recipeData['tags'] = array_map('trim', explode(',', $validated['tags']));
        } else {
            $recipeData['tags'] = null;
        }

        if ($recipeData['prep_time_minutes'] || $recipeData['cook_time_minutes']) {
            $recipeData['total_time_minutes'] = ($recipeData['prep_time_minutes'] ?? 0) + ($recipeData['cook_time_minutes'] ?? 0);
        }

        if ($validated['title'] !== $recipe->title) {
            $recipeData['slug'] = Recipe::generateSlug($validated['title']);
        }

        if ($request->boolean('publish') && !$recipe->active) {
            $recipeData['active'] = true;
            $recipeData['published_on'] = now();
        }

        $recipe->update($recipeData);

        if ($request->hasFile('image')) {
            $this->handleImageUpload($request, $recipe);
        }

        return redirect()->route('recipes.my')->with('status', 'Рецептата е актуализирана.');
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        if ($recipe->user_id !== Auth::id()) {
            abort(403);
        }

        $recipe->delete();

        return redirect()->route('recipes.my')->with('status', 'Рецептата е изтрита успешно.');
    }

    private function handleImageUpload(Request $request, Recipe $recipe): void
    {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('recipes', $fileName, 'public');

        $media = $recipe->user->media()->create([
            'file_name' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'type' => 'image',
            'collection' => 'recipes',
        ]);

        if ($recipe->image_id) {
            $oldMedia = $recipe->image;
            if ($oldMedia && $oldMedia->file_name) {
                Storage::disk('public')->delete($oldMedia->file_name);
            }
        }

        $recipe->update(['image_id' => $media->id]);
    }
}
