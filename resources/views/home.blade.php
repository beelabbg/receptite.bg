@extends('layouts.app')

@section('title', 'Receptite.bg - Bulgarian Recipes & Culinary Inspiration')

@section('content')

{{-- Hero Section --}}
<x-hero-section
    title="You don't know how to make the dish you have in mind?"
    description="Here you will get everything you need. Here you'll find inspiring recipes, good advice and lots of tools that make cooking easier - all free and ready to use."
    image="https://images.unsplash.com/photo-1606787366850-de6330128bfc?w=800&h=600&fit=crop"
    searchPlaceholder="Find and make your favorite cuisine..."
/>

{{-- Latest Recipes with Tabs --}}
<x-recipe-grid
    title="Latest Recipes"
    description="Explore our latest recipe ideas and quickly browse recipes with award-winning simplicity."
    :showTabs="true"
>
    {{-- Sample Recipe Cards - Replace with dynamic data --}}
    <x-recipe-card
        image="https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=600&h=800&fit=crop"
        rating="4.8"
        category="Pasta"
        categoryColor="bg-orange-500"
        title="Creamy Garlic Mushroom Penne Pasta"
        time="30 min"
        cuisine="Lebanese"
        cuisineFlag="🇱🇧"
        servings="Serves 4"
        url="/recipe/creamy-garlic-mushroom-penne"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600&h=800&fit=crop"
        rating="4.5"
        category="Salads"
        categoryColor="bg-green-500"
        title="Zesty Lemon Quinoa with Fresh Herbs"
        time="25 min"
        cuisine="Moroccan"
        cuisineFlag="🇲🇦"
        servings="Serves 6"
        url="/recipe/zesty-lemon-quinoa"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1558030006-450675393462?w=600&h=800&fit=crop"
        rating="4.8"
        category="Meat"
        categoryColor="bg-brand-500"
        title="Smoky Barbecue Pulled Beef Sandwiches"
        time="45 min"
        cuisine="French"
        cuisineFlag="🇫🇷"
        servings="Serves 8"
        url="/recipe/smoky-barbecue-pulled-beef"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=600&h=800&fit=crop"
        rating="4.8"
        category="Breakfasts"
        categoryColor="bg-yellow-500"
        title="Fluffy Banana Pancakes with Maple Syrup"
        time="20 min"
        cuisine="Thai"
        cuisineFlag="🇹🇭"
        servings="Serves 3"
        url="/recipe/fluffy-banana-pancakes"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600&h=800&fit=crop"
        rating="4.9"
        category="Desserts"
        categoryColor="bg-pink-500"
        title="Molten Chocolate Lava Cake Dessert"
        time="50 min"
        cuisine="Ethiopian"
        cuisineFlag="🇪🇹"
        servings="Serves 2"
        url="/recipe/molten-chocolate-lava-cake"
    />
</x-recipe-grid>

{{-- Featured Section 1 --}}
<x-featured-section
    title="Discover fresh and easy"
    subtitle="recipes to inspire your meals every day."
    description="Searching our curated catalog which is being updated regularly and filled with delicacies cooked by our great chefs and community."
    image="https://images.unsplash.com/photo-1547592180-85f173990554?w=600&h=500&fit=crop"
    buttonText="Discover"
    buttonUrl="/recipes"
/>

{{-- New Recipes Section --}}
<x-recipe-grid
    title="New Recipes"
    description="Browse our latest recipes with quickfire simplicity & quickly browse recipes and obtain weekly recipes."
    :showTabs="false"
>
    <x-recipe-card
        image="https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=600&h=800&fit=crop"
        rating="4.8"
        category="Pasta"
        categoryColor="bg-orange-500"
        title="Creamy Garlic Mushroom Penne Pasta"
        time="30 min"
        cuisine="Lebanese"
        cuisineFlag="🇱🇧"
        servings="Serves 4"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600&h=800&fit=crop"
        rating="4.5"
        category="Salads"
        categoryColor="bg-green-500"
        title="Zesty Lemon Quinoa with Fresh Herbs"
        time="25 min"
        cuisine="Moroccan"
        cuisineFlag="🇲🇦"
        servings="Serves 6"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1558030006-450675393462?w=600&h=800&fit=crop"
        rating="4.8"
        category="Meat"
        categoryColor="bg-brand-500"
        title="Smoky Barbecue Pulled Beef Sandwiches"
        time="45 min"
        cuisine="French"
        cuisineFlag="🇫🇷"
        servings="Serves 8"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=600&h=800&fit=crop"
        rating="4.8"
        category="Breakfasts"
        categoryColor="bg-yellow-500"
        title="Fluffy Banana Pancakes with Maple Syrup"
        time="20 min"
        cuisine="Thai"
        cuisineFlag="🇹🇭"
        servings="Serves 3"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600&h=800&fit=crop"
        rating="4.9"
        category="Desserts"
        categoryColor="bg-pink-500"
        title="Molten Chocolate Lava Cake Dessert"
        time="50 min"
        cuisine="Ethiopian"
        cuisineFlag="🇪🇹"
        servings="Serves 2"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=600&h=800&fit=crop"
        rating="4.7"
        category="Dinner"
        categoryColor="bg-purple-500"
        title="Crispy Parmesan Garlic Roasted Potatoes"
        time="40 min"
        cuisine="Italian"
        cuisineFlag="🇮🇹"
        servings="Serves 4"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&h=800&fit=crop"
        rating="4.6"
        category="Healthy"
        categoryColor="bg-green-600"
        title="Bengali Pumpkin Squash with Seasoning"
        time="35 min"
        cuisine="Indian"
        cuisineFlag="🇮🇳"
        servings="Serves 6"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=600&h=800&fit=crop"
        rating="4.5"
        category="Seafood"
        categoryColor="bg-blue-500"
        title="Grilled Shrimp Skewers with Herbs"
        time="25 min"
        cuisine="Greek"
        cuisineFlag="🇬🇷"
        servings="Serves 5"
    />
</x-recipe-grid>

{{-- Video Recipes Section --}}
<x-recipe-grid
    title="Video Recipes"
    description="Watch and learn from our video tutorials to quickly browse recipes and visualize the cooking process."
    :showTabs="false"
>
    <x-recipe-card
        image="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600&h=800&fit=crop"
        rating="4.9"
        category="Video"
        categoryColor="bg-brand-500"
        title="Molten Chocolate Lava Cake Dessert"
        time="30 min"
        cuisine="French"
        cuisineFlag="🇫🇷"
        servings="Serves 2"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=600&h=800&fit=crop"
        rating="4.7"
        category="Video"
        categoryColor="bg-brand-500"
        title="Authentic Italian Margherita Pizza"
        time="45 min"
        cuisine="Italian"
        cuisineFlag="🇮🇹"
        servings="Serves 4"
    />

    <x-recipe-card
        image="https://images.unsplash.com/photo-1547592180-85f173990554?w=600&h=800&fit=crop"
        rating="4.8"
        category="Video"
        categoryColor="bg-brand-500"
        title="Japanese Beef Ramen Bowl"
        time="50 min"
        cuisine="Japanese"
        cuisineFlag="🇯🇵"
        servings="Serves 3"
    />
</x-recipe-grid>

{{-- Cuisines Section --}}
<x-category-icons
    title="Cuisines"
    description="Browse our site and discover a wide range of cuisine types, from comfort food to vegetarian, each offering easy recipes that fit a variety of tastes, dietary needs, and cooking experiences."
    :categories="[
        ['name' => 'American', 'flag' => '🇺🇸', 'url' => '/cuisine/american'],
        ['name' => 'Mexican', 'flag' => '🇲🇽', 'url' => '/cuisine/mexican'],
        ['name' => 'Japanese', 'flag' => '🇯🇵', 'url' => '/cuisine/japanese'],
        ['name' => 'Italian', 'flag' => '🇮🇹', 'url' => '/cuisine/italian'],
        ['name' => 'French', 'flag' => '🇫🇷', 'url' => '/cuisine/french'],
        ['name' => 'Chinese', 'flag' => '🇨🇳', 'url' => '/cuisine/chinese'],
        ['name' => 'Indian', 'flag' => '🇮🇳', 'url' => '/cuisine/indian'],
        ['name' => 'Thai', 'flag' => '🇹🇭', 'url' => '/cuisine/thai'],
        ['name' => 'Greek', 'flag' => '🇬🇷', 'url' => '/cuisine/greek'],
        ['name' => 'Spanish', 'flag' => '🇪🇸', 'url' => '/cuisine/spanish'],
        ['name' => 'Korean', 'flag' => '🇰🇷', 'url' => '/cuisine/korean'],
        ['name' => 'Turkish', 'flag' => '🇹🇷', 'url' => '/cuisine/turkish'],
        ['name' => 'Lebanese', 'flag' => '🇱🇧', 'url' => '/cuisine/lebanese'],
        ['name' => 'Moroccan', 'flag' => '🇲🇦', 'url' => '/cuisine/moroccan'],
        ['name' => 'Brazilian', 'flag' => '🇧🇷', 'url' => '/cuisine/brazilian'],
        ['name' => 'German', 'flag' => '🇩🇪', 'url' => '/cuisine/german'],
        ['name' => 'British', 'flag' => '🇬🇧', 'url' => '/cuisine/british'],
        ['name' => 'Bulgarian', 'flag' => '🇧🇬', 'url' => '/cuisine/bulgarian']
    ]"
/>

{{-- Featured Section 2 (Reversed) --}}
<x-featured-section
    title="Get the latest recipes and"
    subtitle="create culinary magic at home."
    description="Join our community and discover new cooking techniques, tips, and trends. Subscribe to our newsletter to get weekly recipe inspiration delivered to your inbox."
    image="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600&h=500&fit=crop"
    buttonText="Learn More"
    buttonUrl="/about"
    :reverse="true"
/>

{{-- CTA Section --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Add flavor, flair, and a touch of creativity to your meals.</h2>
        <p class="text-lg text-gray-600 mb-8 max-w-3xl mx-auto">Share your favorite Bulgarian recipes, discover new dishes, and connect with food lovers from around the world.</p>
        <a href="/add-recipe" class="btn-primary inline-block text-lg px-10 py-4">Share Your Recipe</a>
    </div>
</section>

@endsection
