# Software Engineer - Laravel VueJs

Challenge link: https://github.com/NextmediaMa/coding-challenges/tree/master/Software%20Engineer%20-%20Laravel%20VueJs

Hosted app: https://prime-stew-production.up.railway.app/

# Journey

## Cmds

### Create laravel app

Install Composer first

Then ```composer create-project laravel/laravel```

### Run dev server

```php artisan serve```

### Run webpack mix watcher

```npm run hot```

### Create migrations

```php artisan make:migration <migration_name>```

### Create model

```php artisan make:model <model_name>```

### Create model with migration

```php artisan make:model <model_name> -m```

### Execute the created migrations

```php artisan migrate```

### Drop all migrations and re-migrate

```php artisan migrate:fresh```

### Create controller

```php artisan make:controller <controller_name> -r```

-r: creates some premade helper functions

### Create provider

```php artisan make:provider <provider_name>```

## Test requests

### Product route

#### Get all

```GET https://prime-stew-production.up.railway.app/api/product/all```

#### Insert product

```POST https://prime-stew-production.up.railway.app/api/product/add```

data: ```{ "name": "", "description": "", "price": 0, "image": "", "categories" : [1,...] }```

### Category route

#### Get all

```GET https://prime-stew-production.up.railway.app/api/category/all```

#### Insert category

```POST https://prime-stew-production.up.railway.app/api/category/add```

data: ```{ "name": "", "parent": 1  }```

"parent" is optional