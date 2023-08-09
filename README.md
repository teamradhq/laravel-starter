# Laravel Starter

This is a starter project to use for Laravel 10.x projects. 

It includes the following:

- *Laravel*
  - [Laravel Sail](https://laravel.com/docs/10.x/sail)
  - [Laravel Breeze](https://github.com/laravel/breeze)
  - [Laravel Livewire](https://laravel-livewire.com/)
  - [Laravel Scribe](https://scribe.knuckles.wtf/)
  - [Laracasts Cypress](https://github.com/laracasts/cypress)
  - [Spatie Sortable](https://github.com/spatie/eloquent-sortable)
  - [Spatie Sluggable](https://github.com/spatie/laravel-sluggable)
  - [Spatie Roles & Permissions](https://spatie.be/docs/laravel-permission/v5/introduction)
  - [Spatie Activity Log](https://spatie.be/docs/laravel-activitylog/v4/introduction)
- *JavaScript / CSS*
  - [Alpine JS](https://alpinejs.dev/)
  - [Cypress](https://www.cypress.io/)
  - [Tailwind CSS](https://tailwindcss.com/)
  - [TypeScript](https://www.typescriptlang.org/)

## Getting Started

1. Fork this repository.
2. Install `composer`:
   ```bash
   composer install
   ```
3. Build `docker` services:
   ```bash
   sail build --no-cache
   sail up -d
   ```
4. Install `npm` packages:
   ```bash
   sail npm install
   ```
5. Start developing

## Testing

### PHPUnit

```bash
sail artisan test
```

### Cypress

```bash
npx cypress open
```
