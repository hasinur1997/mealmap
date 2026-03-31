# MealMap

A WordPress plugin for meal planning and management — built with React, Tailwind CSS, and the WordPress Block Editor (Gutenberg) ecosystem.

## Features

- **Meal Calendar** — interactive calendar view powered by FullCalendar for planning meals by day
- **Meal Management** — add, edit, and delete meals with a clean modal interface
- **React-powered UI** — built with `@wordpress/element` and React Router for a seamless single-page experience
- **REST API Integration** — communicates with WordPress via `@wordpress/api-fetch`
- **Tailwind CSS Styling** — utility-first styling with PostCSS build pipeline
- **WordPress Coding Standards** — enforced via `phpcs.xml` and WPCS ruleset
- **Namespace & Autoloading** — uses PHP namespaces (`Hasinur\MealMap`) with Composer autoloading

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 7.4+, WordPress Plugin API |
| Frontend | React, React Router DOM, FullCalendar |
| Styling | Tailwind CSS, PostCSS |
| Build | @wordpress/scripts (webpack) |
| Standards | PHPCS, WordPress Coding Standards |
| Package Management | Composer (PHP), npm (JS) |

## Requirements

- WordPress 5.8 or higher
- PHP 7.4 or higher
- Node.js 16+ and npm
- Composer

## Installation

1. Clone the repository into your WordPress plugins directory:
```bash
   cd wp-content/plugins
   git clone https://github.com/hasinur1997/mealmap.git
```

2. Install PHP dependencies:
```bash
   composer install
```

3. Install JavaScript dependencies:
```bash
   npm install
```

4. Build frontend assets:
```bash
   npm run start     # development with watch
```

5. Activate the plugin via the **WordPress admin → Plugins** menu.

## Development
```bash
# Start development build with file watching
npm run start

# Check PHP coding standards
vendor/bin/phpcs --standard=phpcs.xml
```

## Project Structure
```
mealmap/
├── assets/src/        # React source files
├── build/             # Compiled JS/CSS (generated)
├── src/               # PHP source classes
├── meal-map.php       # Plugin entry point
├── composer.json      # PHP dependencies
├── package.json       # JS dependencies
├── phpcs.xml          # Coding standards config
├── tailwind.config.js # Tailwind configuration
└── postcss.config.js  # PostCSS configuration
```

## Roadmap

- [ ] User-specific meal plans
- [ ] Nutritional information per meal
- [ ] Export meal plan as PDF
- [ ] REST API endpoints for headless usage
- [ ] PHPUnit test coverage

## License

Licensed under [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html).

## Author

**Hasinur Rahman** — [hasinur.co](https://hasinur.co) · [GitHub](https://github.com/hasinur1997)