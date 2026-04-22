# chirper

This is a trial project built (mostly) following the official [Laravel](https://laravel.com/learn/getting-started-with-laravel) guide. It has been expanded upon beyond the scope of the tutorial to become a more robust application, with the following changes made:

- CI pipeline added with GitHub actions
- Tests for critical actions added using PHPUnit
- Threaded replies

These have been done to challenge & demonstrate my PHP learning.

## Live environment

Commits pushed to `main` will auto-deploy to https://chirper-main-ylabh2.free.laravel.cloud/ using Laravel Cloud

> ⚠️ This is using a trial plan, & the application will hibernate if unused. For the initial load, give it up to 15 seconds.

## Getting started

### First-time setup

```
> composer install
> cp .env.example .env
> php artisan key:generate
> touch database/database.sqlite
> php artisan migrate
> php artisan db:seed
> composer run dev
```

### Subsequent starts

```
> composer run dev
```

## Contributing

Please don't? You probably shouldn't want to.
