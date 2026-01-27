{{-- Hero Section Component --}}
@props([
    'title' => "You don't know how to make the dish you have in mind?",
    'description' => "Here you will get everything you need. Here you'll find inspiring recipes, good advice and lots of tools that make cooking easier - all free and ready to use.",
    'image' => 'https://via.placeholder.com/600x400',
    'searchPlaceholder' => 'Find and make your favorite cuisine...'
])

<section class="bg-gray-100 py-16 md:py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <!-- Left Content -->
            <div class="flex-1 text-center lg:text-left">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $title }}
                </h1>
                <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto lg:mx-0">
                    {{ $description }}
                </p>

                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto lg:mx-0">
                    <form class="flex gap-2">
                        <div class="flex-1 relative">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input
                                type="text"
                                placeholder="{{ $searchPlaceholder }}"
                                class="w-full pl-12 pr-4 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent"
                            >
                        </div>
                        <button type="submit" class="btn-primary px-8 rounded-lg">
                            Search
                        </button>
                    </form>
                </div>

                <!-- Quick Links (Optional) -->
                <div class="mt-8 flex flex-wrap gap-3 justify-center lg:justify-start">
                    <a href="#" class="text-sm text-gray-600 hover:text-brand-500 underline">Latest Recipes</a>
                    <span class="text-gray-400">•</span>
                    <a href="#" class="text-sm text-gray-600 hover:text-brand-500 underline">Most Popular Recipes</a>
                    <span class="text-gray-400">•</span>
                    <a href="#" class="text-sm text-gray-600 hover:text-brand-500 underline">Fastest Recipes</a>
                    <span class="text-gray-400">•</span>
                    <a href="#" class="text-sm text-gray-600 hover:text-brand-500 underline">Editor's Choice</a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="flex-1 max-w-lg lg:max-w-none">
                <div class="relative">
                    <img src="{{ $image }}" alt="Hero Image" class="w-full rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </div>
</section>
