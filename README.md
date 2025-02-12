# 📋 Welcome to my Shopping List 🛒
Who hasn't gotten lost while shopping?

This app is designed to help you forget about that problem and have total control over the products you need.

## 🛠️🚀 Tech Stack
- **Frameworks:** Laravel
- **Server:** Xampp, Apache, Nodejs
- **Database:** Mysql
- **Others:** Composer, Postman

## 📊📁 DB Diagram
Below is a diagram of the database:

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1739350922/imagen_2025-02-12_100201217_fz6thx.png)

## 🔧⚙️ Installation
- Clone repository
```
git clone https://github.com/AntonioGuillen123/ShoppingList
```

- Install Composer dependencies

```
composer install
```
- Install Nodejs dependencies

```
npm install
```
- Duplicate .env.example file and rename to .env
- In this new .env, change the variables you need, but it is very important to uncomment the database connection lines that are these:
 
In DB_CONNECTION will come mysqlite, change it to the bd you use (in this case MySQL)

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shopping_list
DB_USERNAME=root
DB_PASSWORD=
```
 - Generate an App Key with this command 
```
php artisan key:generate 
```

- Execute migrations with seeders
```
php artisan migrate --seed
```

## ▶️💻 Run Locally
- How to run the Laravel server  
```
php artisan serve
```

- If you want to run all this in development environment run the following command  
```
npm run dev
```

- For production you should run the following command 
```
npm run build
```

## 🏃‍♂️🧪 Running Tests

To run test you should uncomment the following lines on the phpunit.xml file.

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1733829455/imagen_2024-12-10_121742908_b3mfqm.png)


With the following command we run the tests and we will also generate a coverage report

```bash
  php artisan test --coverage-html=coverage-report
```

If everything is correct, everything should be OK.

![image](https://res.cloudinary.com/dierpqujk/image/upload/v1739351051/imagen_2025-02-12_100410472_bqa2pm.png)


A folder called coverage-report will also have been generated with **100%** coverage.
![image](https://res.cloudinary.com/dierpqujk/image/upload/v1739350985/imagen_2025-02-12_100304726_hw0xdy.png)

## 📡🌐 Shopping List API
This API allows you to manage products and provides CRUD (Create, Read, Update, Delete) operations for them.

### Product
#### 1 Get all product entries

```http
GET /api/list

```
### 🔹Request

#### Header:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Accept`      | `string` | Must be **application/json**    |

### 🔹Response

- **Status Code:** 200
- **Content Type:** application/json

#

#### 2 Create a new product

```http
POST /api/list

```
### 🔹Request

#### Header:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Accept`      | `string` | Must be **application/json**    |

#### Body: 

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name`    | `string` | **Required.** **Max: 255.** Product name    |
| `description`    | `integer` | **Max: 255.** Product description    |

### 🔹Response

- **Status Code:** 201, 422
- **Content Type:** application/json

#### 3 Update an existing product by ID

```http
PUT /api/list/{id}

```
### 🔹Request

#### Path Parameters:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id`      | `integer` | **Required**. Product Id     |

#### Header:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Accept`      | `string` | Must be **application/json**    |

#### Body: 

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name`    | `string` | **Max: 255.** Product name    |
| `description`    | `integer` | **Max: 255.** Product description    |

### 🔹Response

- **Status Code:** 200, 404, 422
- **Content Type:** application/json

#### 4 Delete a product by ID

```http
DELETE /api/list/{id}

```
### 🔹Request

#### Path Parameters:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `id`      | `integer` | **Required**. Product Id     |

#### Header:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Accept`      | `string` | Must be **application/json**    |

### 🔹Response

- **Status Code:** 204, 404
- **Content Type:** No-Content, application/json

#### 5 Delete list

```http
DELETE /api/list

```
### 🔹Request

#### Header:

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `Accept`      | `string` | Must be **application/json**    |

### 🔹Response

- **Status Code:** 204
- **Content Type:** No-Content

## ✍️🙍 Author
- **Antonio Guillén:**  [![GitHub](https://img.shields.io/badge/GitHub-Perfil-black?style=flat-square&logo=github)](https://github.com/AntonioGuillen123)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Perfil-blue?style=flat-square&logo=linkedin)](https://www.linkedin.com/in/antonio-guillen-garcia)
[![Correo](https://img.shields.io/badge/Email-Contacto-red?style=flat-square&logo=gmail)](mailto:antonioguillengarcia123@gmail.com)

