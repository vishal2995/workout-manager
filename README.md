# Laravel Project: Workout Manager

This is a Laravel-based project. Follow the instructions below to set it up locally.

## Requirements

- PHP >= 8.2
- Composer
- MySQL or any other supported database
- Node.js and npm (optional, if using frontend assets)

## 🚀 Installation

### 🔧 Option 1: Without Docker

Follow these steps to get the project up and running:

#### 1. Clone the Repository
```bash
git clone https://github.com/vishal2995/workout-manager.git
cd workout-manager
```
### 2. Install Dependency
```bash
composer install
npm install
```

### 3. Copy .env file
```bash
cp .env.example .env
```

### 4. Basic Command 
```bash
npm run build
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

### 🔧 Option 2: With Docker

Follow these steps to get the project up and running:

```bash
docker compose up -d
```

## Admin Credentials
```bash
Use the following credentials to log in as an admin:
Email: admin@example.com
Password: password
```

## User Credentials
```bash
Use the following credentials to log in as an user:
Email: vishal@example.com
Password: password
```