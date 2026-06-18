# 🛍️ Fel Mall – Full-Stack E-Commerce Platform

A full-stack online shopping platform built with **Laravel**, **MySQL**, and **Blade Templates**. The app supports two user roles — **Admin** and **Customer** — each with their own dedicated dashboard and permissions.

---

## 🚀 Features

### 👤 Customer
- Browse and search products
- Add items to cart
- Place and track orders
- Manage personal account

### 🛠️ Admin
- Add, edit, and delete products
- Manage registered users
- View and manage all orders

---

## 🧰 Tech Stack

| Layer      | Technology              |
|------------|-------------------------|
| Back-End   | PHP, Laravel (MVC)      |
| Front-End  | Blade Templates, Bootstrap, CSS |
| Database   | MySQL                   |
| Tools      | VS Code, Git, Composer  |

---

## ⚙️ Installation & Setup

```bash
# 1. Clone the repo
git clone https://github.com/rocksassem645-star/fel-mall.git
cd fel-mall

# 2. Install PHP dependencies
composer install

# 3. Copy environment file and configure it
cp .env.example .env

# 4. Set your database credentials in .env
DB_DATABASE=fel_mall
DB_USERNAME=root
DB_PASSWORD=

# 5. Generate app key
php artisan key:generate

# 6. Run migrations
php artisan migrate

# 7. Seed the database (optional)
php artisan db:seed

# 8. Start the development server
php artisan serve
```

Then open [http://localhost:8000](http://localhost:8000) in your browser.

---

## 📁 Project Structure

```
fel-mall/
├── app/
│   ├── Http/Controllers/     # Admin & User controllers
│   └── Models/               # Eloquent models
├── database/
│   └── migrations/           # DB schema
├── resources/
│   └── views/                # Blade templates
├── routes/
│   └── web.php               # App routes
└── public/                   # Assets
```

---

## 📸 Demo

> Video demo available — see the repo media or contact me directly.

---

## 👨‍💻 Author

**Assem Mostafa**
- GitHub: [@rocksassem645-star](https://github.com/rocksassem645-star)
- LinkedIn: [assem-mostafa](https://linkedin.com/in/assem-mostafa-7902353a0)
- Email: rocksassem645@gmail.com
