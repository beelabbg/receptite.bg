{{-- Recipe Card Component --}}
@props([
    'image' => 'https://via.placeholder.com/600x800',
    'rating' => '4.8',
    'category' => 'Pasta',
    'title' => 'Recipe Title',
    'time' => '100 min',
    'cuisine' => 'French',
    'cuisineFlag' => '🇫🇷',
    'servings' => 'Serves 4',
    'url' => '#',
    'categoryColor' => 'bg-brand-500'
])

<a href="{{ $url }}" class="group block">
    <div class="relative  overflow-hidden transition-all duration-300">
        <!-- Image Container - Taller aspect ratio like in the reference -->
        <div class="relative overflow-hidden rounded-xl aspect-[3/4]">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

            <!-- Overlay Icons - Top Corners -->
            <div class="absolute top-5 left-5 right-5 flex items-start justify-between z-10">
                <!-- Rating Badge -->
                <div class="flex items-center gap-2 bg-white rounded-full px-4 py-2 shadow-lg">
                    <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                    </svg>
                    <span class="text-base font-bold text-gray-900">{{ $rating }}</span>
                </div>

                <!-- Action Icons - Vertical Stack -->
                <div class="flex flex-col gap-3">
                    <!-- Favorite -->
                    <button type="button" class="w-10 h-10 flex items-center justify-center bg-white rounded-full shadow-lg hover:bg-brand-500 transition-colors group/fav">
                        <svg class="w-6 h-6 fill-current text-brand-500 group-hover/fav:text-white transition-colors" viewBox="0 0 20 20">
                            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                        </svg>
                    </button>

                    <!-- Bookmark -->
                    <button type="button" class="w-10 h-10 flex items-center justify-center bg-white rounded-full shadow-lg hover:bg-brand-500 transition-colors group/book">
                        <svg class="w-6 h-6 stroke-current text-brand-500 group-hover/book:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="">
            <!-- Category Badge -->
            <div class="my-2">
                <span class="{{ $categoryColor }} text-white text-[12px] font-bold px-2 py-1.5 rounded uppercase tracking-wide">{{ $category }}</span>
            </div>

            <!-- Title -->
            <h3 class="text-xl font-bold text-gray-900 mb-6 leading-snug min-h-14 group-hover:text-brand-500 transition-colors">
                {{ $title }}
            </h3>

            <!-- Meta Info -->
            <div class="flex items-center justify-start gap-5 text-base text-gray-700 flex-wrap">
                <!-- Time -->
                <div class="flex items-center gap-1 whitespace-nowrap">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-normal text-[14px]">{{ $time }}</span>
                </div>

                <!-- Cuisine with Flag -->
                <div class="flex items-center gap-1 whitespace-nowrap">
                    <span class="text-xl leading-none">{{ $cuisineFlag }}</span>
                    <span class="font-normal text-[14px]">{{ $cuisine }}</span>
                </div>

                <!-- Servings -->
                <div class="flex items-center gap-1 whitespace-nowrap">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span class="font-normal text-[14px]">{{ $servings }}</span>
                </div>
            </div>
        </div>
    </div>
</a>
