{{-- Featured Content Section --}}
@props([
    'title' => 'Discover fresh and easy',
    'subtitle' => 'recipes to inspire your meals every day.',
    'description' => 'Searching our curated catalog which is being updated regularly and filled with delicacies cooked by our great chefs and community.',
    'image' => 'https://via.placeholder.com/500x400',
    'buttonText' => 'Discover',
    'buttonUrl' => '#',
    'reverse' => false
])

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col {{ $reverse ? 'lg:flex-row-reverse' : 'lg:flex-row' }} items-center gap-12 bg-gray-100 rounded-2xl p-8 lg:p-12">
            <!-- Image -->
            <div class="flex-1">
                <div class="relative">
                    <img src="{{ $image }}" alt="{{ $title }}" class="w-full rounded-xl shadow-lg">
                </div>
            </div>

            <!-- Content -->
            <div class="flex-1 text-center lg:text-left">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">
                    {{ $title }}
                </h2>
                <h3 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    {{ $subtitle }}
                </h3>
                <p class="text-lg text-gray-600 mb-8 max-w-xl {{ $reverse ? 'lg:ml-auto' : 'lg:mr-auto' }}">
                    {{ $description }}
                </p>
                <a href="{{ $buttonUrl }}" class="btn-primary inline-block px-8 py-3 text-lg">
                    {{ $buttonText }}
                </a>
            </div>
        </div>
    </div>
</section>
