
# Software Engineer - Laravel VueJs Web Challenge

A webapp with both front-end and back-end parts for managing products.


## Related

[Challenge link](https://github.com/NextmediaMa/coding-challenges/tree/master/Software%20Engineer%20-%20Laravel%20VueJs)

  
[🚀 Hosted app](https://prime-stew-production.up.railway.app/)

## API Reference

### Product endpoint

#### Get all products

```http
  GET /api/product
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `sort[by]` | `string` | **Optional**. Sorting key {"name, price, created_at"} |
| `sort[order]` | `string` | **Optional**. Sorting order {"asc, desc"} |

#### Get product

```http
  GET /api/product/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `int` | **Required**. Id of product to fetch |

#### Add product

```http
  POST /api/product
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required**. Name of product |
| `description`      | `string` | **Required**. Description of product |
| `price`      | `number` | **Required**. Price of product |
| `image`      | `string` | **Required**. Image of product |
| `categories`      | `array<int>` | **Required**. Id's of categories |

### Category endpoint

#### Get all categories

```http
  GET /api/category
```

#### Get products by category

```http
  GET /api/category/${id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `int` | **Required**. Id of category that products belongs to|

#### Add category

```http
  POST /api/category
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`      | `string` | **Required**. Name of category |
| `parent_category`      | `id` | **Optional**. Id of parent category |


## Installation 

Rename `.env.example` to `.env` in you root folder, and update the following.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbName
DB_USERNAME=username
DB_PASSWORD=password
```

Then get the required dependencies:

```bash 
  composer update
  npm i
  php artisan migrate:fresh
```

## Preview

https://user-images.githubusercontent.com/57252917/118812598-2fbe1380-b8a6-11eb-83a5-cb4c1b31aea1.mp4
