# The Willows Way Project

[Web App Specification](https://docs.google.com/document/d/1b3tBOmkr6bdDUmPb3peCTT5NBZ7b902jxge4R8eGaJA/edit#heading=h.h546on3ha8gj)

[Sketch Designs](https://www.sketch.com/s/1f807a78-4352-41e0-b666-2914b7fd8def)

Built with:
- Laravel 8.54
- Laravel Breeze 1.4
- Tailwind CSS
- MySQL 8

## How to use

### 1 - Clone the repo

### 2 - Install
```bash
cd willows-way
```
```bash
composer install
```
```bash
npm install
```
### 3 - Populate your `.env` File
- Copy over the `.env.example` file to your  `.env` file.

```php
cp .env.example .env
```
  <br>
- Add your database credentials to `.env` file

### 4 - Generate your encryption key
```php
php artisan key:generate
```

### 5 - Finally, run database migrations & seeder
```php
php artisan migrate:fresh --seed
```

---

## Current test development accounts
1. Admin user
```bash
User: admin@email.com
Password: password
```
2. Assessor
```bash
User: assessor@email.com
Password: password
```
