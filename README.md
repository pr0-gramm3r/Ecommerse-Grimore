# Ecommerse

A Laravel-based fashion e-commerce web application with customer shopping flows, merchant product management, Google authentication, cart handling, and image uploads through Cloudinary.

The project is built as a server-rendered Laravel app using Blade templates, custom CSS, vanilla JavaScript, Laravel authentication, merchant guards, migrations, seeders, and Vite for frontend asset bundling.

## Features

- Customer signup, login, logout, account management, and password reset
- Google authentication for customers and merchants
- Product browsing, product detail pages, and keyword search
- Shopping cart with add, remove, quantity update, and buy-now checkout flow
- Merchant signup/login using a separate merchant guard
- Merchant dashboard for managing profile details and listed products
- Product creation with category, season, stock, price, status, keywords, and up to four images
- Cloudinary-backed image upload support
- Seeded product filters for categories and seasons
- Admin-style product listing page
- Custom Blade views, CSS, and JavaScript for the storefront experience

## Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Blade, CSS, JavaScript, Vite
- **Database:** MySQL by default
- **Auth:** Laravel auth, custom merchant guard, Laravel Socialite
- **Media:** Cloudinary Laravel SDK
- **Testing:** Pest / PHPUnit

## Project Structure

```text
app/
  Http/Controllers/     Application controllers
  Http/Middleware/      Merchant auth middleware
  Models/               Eloquent models
database/
  migrations/           Users, merchants, products, carts, orders, categories, seasons
  seeders/              Category and season seed data
public/
  css/                  Page-level stylesheets
  js/                   Page-level browser scripts
resources/views/
  authanticate/         Customer auth views
  merchant/             Merchant auth and dashboard views
  nav-links/            Storefront, cart, account, product, and search views
routes/
  web.php               Web routes for customers, merchants, products, cart, and auth
```

## Requirements

- PHP 8.2 or newer
- Composer
- Node.js and npm
- MySQL or another Laravel-supported database
- Cloudinary account, only if you want hosted image uploads
- Google OAuth credentials, only if you want Google login

## Getting Started

Clone the repository:

```bash
git clone https://github.com/pr0-gramm3r/Ecommerse.git
cd Ecommerse
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create your environment file:

```bash
cp .env.example .env
```

Generate the Laravel app key:

```bash
php artisan key:generate
```

Update `.env` with your database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerse
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations and seeders:

```bash
php artisan migrate --seed
```

Start the Laravel server:

```bash
php artisan serve
```

Start Vite in another terminal:

```bash
npm run dev
```

Open the app at:

```text
http://127.0.0.1:8000
```

## Optional Environment Setup

For Cloudinary uploads, add your Cloudinary credentials to `.env`:

```env
CLOUDINARY_CLOUD_NAME=
CLOUDINARY_API_KEY=
CLOUDINARY_API_SECRET=
```

For Google login, configure Laravel Socialite credentials:

```env
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google-callback
```

For password reset emails, replace the default log mailer with real SMTP settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"
```

## Useful Commands

Run the test suite:

```bash
php artisan test
```

Build production assets:

```bash
npm run build
```

Clear cached Laravel configuration:

```bash
php artisan optimize:clear
```

Run Laravel, queue worker, and Vite together using the Composer script:

```bash
composer run dev
```

## Main Routes

| Area | Route | Purpose |
| --- | --- | --- |
| Storefront | `/` | Home page with products, categories, and seasons |
| Products | `/product/{id}` | Product detail page |
| Search | `/search` | Search products by name or keywords |
| Customer Auth | `/login`, `/signup` | Customer login and registration |
| Cart | `/cart` | Customer cart |
| Account | `/My-account` | Customer account page |
| Merchant Auth | `/merchant/login`, `/merchant/signup` | Merchant login and registration |
| Merchant Dashboard | `/merchant/dashboard` | Merchant product/profile dashboard |
| Add Product | `/merchant/product/create` | Create a merchant product |
| Admin Products | `/products` | Product listing page |

## Seed Data

The database seeders create:

- Categories: `Men`, `Women`, `Kids`
- Seasons: `Spring`, `Summer`, `Autumn`, `Winter`
- A sample test user from the default Laravel factory

Run them any time with:

```bash
php artisan db:seed
```

## Notes

- Product images can be added either through Cloudinary uploads or image URLs.
- Merchant routes are protected with the custom `auth.merchant` middleware.
- Customer cart routes require normal Laravel authentication.
- The repository currently uses Blade pages and public CSS/JS assets rather than a SPA frontend.

## License

This project uses the MIT license inherited from the Laravel application skeleton.
