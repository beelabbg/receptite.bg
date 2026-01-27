# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 10.x recipe discovery and sharing portal (Receptite.bg) built with Tailwind CSS v4 and Vite. The project is currently in the design/prototype phase with a complete, modern frontend but minimal backend implementation.

## Development Setup

### Prerequisites
- Node.js 24.11.0 (specified in `.nvmrc`)
- PHP 8.1+
- MySQL with database `receptite` created
- Composer

### Common Commands

**Start Development:**
```bash
nvm use                        # Use Node version from .nvmrc
npm install                    # Install frontend dependencies
composer install               # Install backend dependencies
php artisan serve             # Start Laravel (http://localhost:8000)
npm run dev                   # Start Vite dev server with HMR
```

**Build Assets:**
```bash
npm run build                 # Production build (output: public/build/)
```

**Database:**
```bash
php artisan migrate           # Run migrations
php artisan migrate:fresh --seed  # Reset and seed database
```

**Local Domain:**
- Site configured for `https://receptite.test` (see `APP_URL` in `.env`)
- Use Laravel Valet or configure virtual host accordingly

## Build System Architecture

### Vite (Active Build Tool)
- **Entry Points:** `resources/assets/css/app.css` and `resources/assets/js/app.js`
- **Configuration:** `vite.config.js` with Laravel Vite plugin v2.1.0
- **Hot Module Replacement:** Enabled during development
- **Output:** `public/build/` with fingerprinted assets

### Tailwind CSS v4
- **PostCSS Plugin:** Uses `@tailwindcss/postcss` (v4 syntax)
- **Theme Configuration:** Defined in `resources/assets/css/app.css` using `@theme` directive
- **Brand Color:** `--color-brand-500: #e92d28` (red)
- **Custom Components:** `.btn-primary`, `.card`, `.header-link`, `.mobile-menu-item`, `.social-icon`

**Important:** Tailwind v4 uses a different configuration approach than v3:
- No `tailwind.config.js` file needed for basic usage
- Theme customization uses CSS variables in `@theme` blocks
- Config syntax: `@import "tailwindcss";` instead of `@tailwind` directives

### Legacy Laravel Mix
- Configuration exists in `webpack.mix.js` but is **not actively used**
- Kept for compatibility; may be removed in future

## Frontend Architecture

### Blade Component System

**Location:** `resources/views/components/`

All components follow Laravel's anonymous component pattern using `@props()` with sensible defaults:

**1. `recipe-card.blade.php`**
- Main content unit for displaying recipes
- Props: `image`, `rating`, `category`, `title`, `time`, `cuisine`, `cuisineFlag`, `servings`, `url`, `categoryColor`
- Features: Star rating, favorite/bookmark icons, hover effects
- Image aspect ratio: 3:4 (portrait orientation)

**2. `recipe-grid.blade.php`**
- Container for recipe collections
- Props: `title`, `description`, `showTabs`, `tabs`
- Grid: 4 columns on desktop (xl:grid-cols-4), responsive down to 1 column
- Uses `{{ $slot }}` for flexible content composition

**3. `hero-section.blade.php`**
- Landing page hero with search
- Props: `title`, `description`, `image`, `searchPlaceholder`
- Layout: Split image/content, fully responsive

**4. `featured-section.blade.php`**
- Content showcase with CTA
- Props: `title`, `subtitle`, `description`, `image`, `buttonText`, `buttonUrl`, `reverse`
- `reverse` prop allows alternating left/right layouts

**5. `category-icons.blade.php`**
- Grid of cuisine categories with emoji flags
- Props: `title`, `description`, `categories` (array)
- Grid: 2-9 columns depending on screen size
- Uses `@forelse` for fallback content

### Layout Structure

**Base Layout:** `resources/views/layouts/app.blade.php`
- Three-part structure: header → main → footer
- Language: Bulgarian (`lang="bg"`)
- Background: `bg-gray-50` throughout
- Vite integration via `@vite()` directive

**Partials:**
- `partials/header.blade.php` - Complex responsive navigation with mobile menu
- `partials/footer.blade.php` - Popular tags, footer links, social icons

### JavaScript

**Mobile Menu Implementation:**
- File: `resources/assets/js/app.js`
- Pure vanilla JS (no framework)
- Functionality: Toggle mobile menu, icon swap, body scroll prevention
- Event: DOMContentLoaded for initialization

## Backend Architecture (Current State)

### Controllers

**Location:** `app/Http/Controllers/`

All controllers currently return static views with no database queries:
- `HomeController` - Homepage with hero and recipe grids
- `RecipesController` - Recipe detail view
- `ArticlesController` - Article detail view
- `SectionsController` - Category listing
- `TagsController` - Tag/filter view
- `SearchController` - Search results

**Pattern:** Simple view passthrough, ready for data layer implementation

### Routes

**Web Routes:** `routes/web.php`
```
GET /           → HomeController@index
GET /recipes    → RecipesController@read
GET /section    → SectionsController@list
GET /article    → ArticlesController@read
GET /tag        → TagsController@index
GET /searcg     → SearchController@index  # Note: typo in route
```

### Database

**Current Migrations:** Only default Laravel migrations (users, password_resets, failed_jobs, personal_access_tokens)

**TODO:** Create migrations for:
- Recipes (title, description, ingredients, instructions, images, etc.)
- Articles/Blog posts
- Cuisines/Categories
- Tags
- Recipe-Tag pivot table
- User-Recipe relationships (favorites, created recipes)

## Design System Conventions

### Color Usage
- **Brand (Red):** `bg-brand-500` through `bg-brand-900` - Primary actions, category badges
- **Secondary (Purple):** Alternative accent color
- **Category Colors:** `bg-orange-500`, `bg-green-500`, `bg-yellow-500`, `bg-pink-500`, `bg-blue-500`, `bg-purple-500`

### Responsive Breakpoints
- **Mobile-first:** base (< 640px)
- **sm:** 640px - 2 columns
- **md:** 768px - Navigation changes
- **lg:** 1024px - 3 columns, desktop navigation visible
- **xl:** 1280px - 4 columns (recipe grids)

### Hover States
Consistent transition patterns:
```blade
hover:bg-brand-500 hover:text-white transition-colors duration-200
hover:scale-105 transition-transform duration-700
hover:shadow-xl transition-all duration-300
```

### Component Composition Pattern
```blade
<x-recipe-grid title="Latest Recipes" :showTabs="true">
    <x-recipe-card
        image="..."
        rating="4.8"
        category="Pasta"
        categoryColor="bg-orange-500"
        title="..."
        time="30 min"
        cuisine="Italian"
        cuisineFlag="🇮🇹"
        servings="Serves 4"
        url="/recipe/slug"
    />
</x-recipe-grid>
```

## Important Notes

### Asset Pipeline
- **Development:** Vite serves assets with HMR from `resources/assets/`
- **Production:** Built assets in `public/build/` with fingerprinted filenames
- **Manifest:** `public/build/manifest.json` generated by Vite for asset versioning

### Node Version Requirement
- **Must use Node 24.11.0** (specified in `.nvmrc`)
- Older versions will cause Vite build errors
- Use `nvm use` to switch to correct version

### Mixed Build Configuration
- Vite is the **active** build system
- Laravel Mix configuration exists but is **unused**
- Do not remove Mix files yet (may be intentionally kept for compatibility)

### Environment Configuration
- Local development uses `https://receptite.test` domain
- Database: MySQL with `receptite` database, root user, no password
- Debug mode enabled (`APP_DEBUG=true`)
- Mail: Mailpit for development email testing

## Next Implementation Steps

The frontend is complete. Backend implementation should focus on:

1. **Database Schema:**
   - Create Recipe model and migration (title, slug, description, prep_time, cook_time, servings, difficulty, cuisine_id, user_id, etc.)
   - Create Cuisine, Category, Tag models
   - Establish relationships (belongsTo, hasMany, belongsToMany)

2. **Controllers:**
   - Add Eloquent queries to existing controllers
   - Implement pagination for recipe listings
   - Add search functionality with filters

3. **API Endpoints:**
   - RESTful API in `routes/api.php` for recipe CRUD
   - Authentication using Laravel Sanctum (already installed)

4. **User Features:**
   - Authentication (login/register)
   - User profiles
   - Recipe favorites/bookmarks
   - Recipe submission

5. **Search & Filtering:**
   - Full-text search on recipes
   - Filter by cuisine, category, tags, difficulty, cook time
   - Sort options (latest, popular, rating)

## File Locations Reference

```
Key Blade Components:     resources/views/components/
Page Templates:          resources/views/*.blade.php
Layout:                  resources/views/layouts/app.blade.php
Partials:                resources/views/partials/
CSS Entry:               resources/assets/css/app.css
JS Entry:                resources/assets/js/app.js
Controllers:             app/Http/Controllers/
Routes:                  routes/web.php
Vite Config:             vite.config.js
Environment:             .env
```
