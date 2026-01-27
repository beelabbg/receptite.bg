{{-- Recipe Grid Component --}}
@props([
    'title' => 'Latest Recipes',
    'description' => 'Explore our latest recipe ideas and quickly browse recipes with award-winning simplicity.',
    'recipes' => [],
    'showTabs' => false,
    'tabs' => ['Latest Recipes', 'Most Popular Recipes', 'Fastest Recipes', "Editor's Choice"]
])

<section class="py-12">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-8">
            <h2 class="text-4xl font-bold text-gray-900 mb-3">{{ $title }}</h2>
            @if($description)
                <p class="text-gray-600 max-w-3xl mx-auto">{{ $description }}</p>
            @endif
        </div>

        <!-- Tabs (Optional) -->
        @if($showTabs)
            <div class="flex flex-wrap items-center justify-center gap-6 mb-10 border-b border-gray-200">
                @foreach($tabs as $index => $tab)
                    <button class="pb-3 px-2 font-semibold transition-colors {{ $index === 0 ? 'text-gray-900 border-b-2 border-gray-900' : 'text-gray-500 hover:text-gray-900' }}">
                        {{ $tab }}
                    </button>
                @endforeach
            </div>
        @endif

        <!-- Recipe Grid - 4 columns on desktop -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            {{ $slot }}
        </div>

        <!-- View More Button -->
        <div class="text-center mt-10">
            <button class="px-8 py-3 border-2 border-gray-900 text-gray-900 font-semibold rounded-lg hover:bg-gray-900 hover:text-white transition-colors duration-200">
                View all Recipes
            </button>
        </div>
    </div>
</section>
