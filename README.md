# Fws Webstudio Laravel test project.

Created for fws as a test project.

## Prerequisites
* PHP 8.2+
* Composer
* Node.js & NPM
* A relational database (MySQL, MariaDB)

## Running the app
### 1. Clone the repository
```bash
git clone [https://github.com/agostondunszt/fws-laravel-proba-projekt.git](https://github.com/agostondunszt/fws-laravel-proba-projekt.git)
cd fws-laravel-proba-projekt
```

### 2. Install Dependencies
```bash
composer install
npm install
npm run build
```

### 3. Environment Setup
Copy the .env file and fill out with your Mailing and DB info
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Storage Link (Crucial for Images)
Create a symbolic link to ensure the images (hero background, references) are publicly accessible:
```bash
php artisan storage:link
```

### 5. Database Setup & Seeding
Migrate the database with seed as it contains base images and an admin user for filament.
```bash
php artisan migrate:fresh --seed
```

### 6. Run the Application
You need to run the local development server:
```bash
php artisan serve
```

Because the contact form uses background queues to send emails, you must also run the queue worker:
```bash
php artisan queue:work
```

---

## Usage
* Access the website at `http://localhost:8000` (or at the port you've provided)
* Access the admin page at `http://localhost:8000/admin` (or at the port you've provided). The seeded credentials are: `admin@admin.com` with `password` as password.