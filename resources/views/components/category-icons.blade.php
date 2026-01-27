{{-- Category Icons Section --}}
@props([
    'title' => 'Cuisines',
    'description' => 'Browse our site and discover a wide range of cuisine types, from comfort food to vegetarian, each offering easy recipes that fit a variety of tastes, dietary needs, and cooking experiences.',
    'categories' => []
])

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-3">{{ $title }}</h2>
            @if($description)
                <p class="text-gray-600 max-w-4xl mx-auto">{{ $description }}</p>
            @endif
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-9 gap-6">
            @forelse($categories as $category)
                <a href="{{ $category['url'] ?? '#' }}" class="flex flex-col items-center gap-3 group">
                    <div class="w-20 h-20 rounded-full bg-white shadow-md flex items-center justify-center group-hover:shadow-xl group-hover:bg-brand-500 transition-all duration-300">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">{{ $category['flag'] }}</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-brand-500 transition-colors">{{ $category['name'] }}</span>
                </a>
            @empty
                {{-- Default Categories --}}
                <a href="#" class="flex flex-col items-center gap-3 group">
                    <div class="w-20 h-20 rounded-full bg-white shadow-md flex items-center justify-center group-hover:shadow-xl group-hover:bg-brand-500 transition-all duration-300">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">🇺🇸</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-brand-500 transition-colors">American</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group">
                    <div class="w-20 h-20 rounded-full bg-white shadow-md flex items-center justify-center group-hover:shadow-xl group-hover:bg-brand-500 transition-all duration-300">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">🇲🇽</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-brand-500 transition-colors">Mexican</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group">
                    <div class="w-20 h-20 rounded-full bg-white shadow-md flex items-center justify-center group-hover:shadow-xl group-hover:bg-brand-500 transition-all duration-300">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">🇯🇵</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-brand-500 transition-colors">Japanese</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group">
                    <div class="w-20 h-20 rounded-full bg-white shadow-md flex items-center justify-center group-hover:shadow-xl group-hover:bg-brand-500 transition-all duration-300">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">🇮🇹</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-brand-500 transition-colors">Italian</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group">
                    <div class="w-20 h-20 rounded-full bg-white shadow-md flex items-center justify-center group-hover:shadow-xl group-hover:bg-brand-500 transition-all duration-300">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">🇫🇷</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-brand-500 transition-colors">French</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group">
                    <div class="w-20 h-20 rounded-full bg-white shadow-md flex items-center justify-center group-hover:shadow-xl group-hover:bg-brand-500 transition-all duration-300">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">🇨🇳</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-brand-500 transition-colors">Chinese</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group">
                    <div class="w-20 h-20 rounded-full bg-white shadow-md flex items-center justify-center group-hover:shadow-xl group-hover:bg-brand-500 transition-all duration-300">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">🇮🇳</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-brand-500 transition-colors">Indian</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group">
                    <div class="w-20 h-20 rounded-full bg-white shadow-md flex items-center justify-center group-hover:shadow-xl group-hover:bg-brand-500 transition-all duration-300">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">🇹🇭</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-brand-500 transition-colors">Thai</span>
                </a>
                <a href="#" class="flex flex-col items-center gap-3 group">
                    <div class="w-20 h-20 rounded-full bg-white shadow-md flex items-center justify-center group-hover:shadow-xl group-hover:bg-brand-500 transition-all duration-300">
                        <span class="text-3xl group-hover:scale-110 transition-transform duration-300">🇬🇷</span>
                    </div>
                    <span class="text-sm font-medium text-gray-700 group-hover:text-brand-500 transition-colors">Greek</span>
                </a>
            @endforelse
        </div>
    </div>
</section>
