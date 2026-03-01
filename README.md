# 🏠 EasyColoc

EasyColoc is a web application designed to help roommates manage shared expenses and automatically calculate debts between members.

The objective is simple:

> Eliminate manual calculations and clearly answer: **"Who owes who?"**

---

## 🚀 Features

### 👥 Colocation Management
- Create a colocation
- Join using a secure join token
- Invite members via email
- Transfer ownership
- Leave a colocation
- Cancel a colocation (with automatic cleanup)

### 💰 Expense Management
- Add shared expenses
- Assign expenses to categories
- Track who paid
- Filter expenses by month
- Calculate monthly totals
- Automatically generate debts

### 📊 Debt Tracking
- View debts between members
- Mark debts as paid
- Clear balance overview

### 🛡 Admin Panel
- View total users
- View total colocations
- View banned users
- Ban / Unban users

### 🔐 Authentication & Security
- User registration & login
- Banned users restricted to login/register only
- Form Request validation system
- Role-based permissions (Admin / Owner / Member)

---

## 🛠 Tech Stack

- Laravel
- PostgreSQL
- Blade
- Tailwind CSS
- Eloquent ORM

---

## 📂 Project Structure


app/
├── Http/
│ ├── Controllers/
│ ├── Requests/
│ └── Middleware/
├── Models/
└── Providers/

routes/
└── web.php

database/
├── migrations/
└── seeders/


---

## ⚙ Installation

### 1️⃣ Clone the repository

```bash
git clone https://github.com/your-username/easycoloc.git
cd easycoloc
2️⃣ Install dependencies
composer install
npm install
3️⃣ Configure environment
cp .env.example .env

Update your database configuration inside .env:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=easycoloc
DB_USERNAME=your_username
DB_PASSWORD=your_password
4️⃣ Generate application key
php artisan key:generate
5️⃣ Run migrations
php artisan migrate
6️⃣ Start development server
php artisan serve
🧠 Business Logic Overview

Each user belongs to one colocation

One user is the owner

Expenses are shared between members

Debts are automatically calculated

When a colocation is deleted:

Related expenses and debts are removed

Users are detached from the colocation

🔐 User Roles
Role	Permissions
Admin	Manage users, ban/unban
Owner	Manage colocation, invite members, transfer ownership
Member	Add expenses, view debts
📌 Validation System

The project uses Laravel Form Requests for validation:

StoreCategoryRequest

StoreColocationRequest

StoreExpenseRequest

JoinColocationRequest

InviteColocationRequest

FilterExpensesRequest

📈 Future Improvements

Dashboard analytics

Monthly expense charts

Real-time updates (Livewire)

Email notifications

API version (SaaS ready)

Payment integration

👨‍💻 Author

Developed as a shared living financial management solution to simplify colocation expense tracking.
