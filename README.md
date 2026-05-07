# Gradient Builder (Laravel Technical Task)

A simple Laravel application that allows authenticated users to create, preview and manage CSS gradients.

---

## Features

- User registration and authentication (Laravel Breeze)
- Create, edit, view and delete gradients
- Live gradient preview in the UI
- Copy generated CSS
- User-specific data (no access to other users’ gradients)
- Feature tests covering creation and ownership

---

## Tech Stack

- Laravel 13
- PHP
- Blade templates
- Tailwind CSS
- SQLite (default local DB)
- PHPUnit (testing)

---

## Setup

### 1. Clone the repository

```bash
git clone https://github.com/aslivingston/base-8-innovations-tech-task.git
cd base-8-innovations-tech-task
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure database (SQLite)

```bash
touch database/database.sqlite
```

Update `.env`:

```env
DB_CONNECTION=sqlite
```

### 5. Run migrations

```bash
php artisan migrate
```

### 6. Start the app

Run both:

```bash
npm run dev
```

```bash
php artisan serve
```

Then visit:

http://127.0.0.1:8000

---

## Running Tests

```bash
php artisan test
```

---

## Key Decisions

- Laravel Breeze was used for lightweight authentication scaffolding
- Blade was chosen for simplicity and to keep everything within Laravel’s ecosystem
- Policies were used to enforce that users can only access their own gradients
- Gradient CSS generation is handled within the model for reuse and clarity
- Feature tests were added to validate key behaviour:
  - Gradient creation
  - User ownership
  - Access restrictions

---

## Assumptions

- Gradients are limited to linear gradients with two colour stops
- Users only manage their own gradients (no sharing or public visibility)
- No pagination was required due to expected small dataset size

---

## Improvements (with more time)

- Support for multiple colour stops
- Radial gradients
- Drag-and-drop gradient builder UI
- Public sharing / preview links
- Favourite / tagging system
- Pagination and search
- API endpoints (for headless use)

---

## AI Usage

AI tools were used to assist with:

- Structuring the application
- Reviewing Laravel best practices

All code was reviewed, adapted and implemented manually to ensure full understanding.
