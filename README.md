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

```GET __HOST/api/product/all```

#### Insert product

```POST __HOST/api/product/add```

data: ```{ "name": "", "description": "", "price": 0, "image": "" }```