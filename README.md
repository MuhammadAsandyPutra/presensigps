# PresensiGPS

<p align="center">
  <strong>GPS-Based Employee Attendance Management System</strong>
  <br />
  Sistem Informasi Presensi Karyawan
  <br /><br />
  <strong>PT BPRS Barkah Gemadana Banjarmasin</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-Framework-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-Backend-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/JavaScript-Frontend-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" />
</p>

---

## Overview

**PresensiGPS** is a web-based employee attendance management system developed for **PT BPRS Barkah Gemadana Banjarmasin**.

Designed to streamline employee attendance processes, PresensiGPS integrates GPS-based location validation with centralized attendance management, providing a more efficient, structured, and accessible solution for daily workforce administration.

The system helps employees record their attendance while enabling administrators to monitor attendance activities, manage employee records, process leave requests, and generate attendance reports through an integrated dashboard.

## ✨ Key Features

| Feature | Description |
|---|---|
| 📍 GPS-Based Attendance | Location-based validation for employee check-in and check-out. |
| 🕒 Attendance Tracking | Records attendance timestamps and employee attendance history. |
| 👥 Employee Management | Centralized employee information and account management. |
| 📝 Leave Management | Online leave and sick-day submissions and administration. |
| 📊 Admin Dashboard | Attendance overview and employee monitoring. |
| 📑 Attendance Reports | Structured attendance recaps and reporting by period. |

## 🛠️ Tech Stack

**Backend**
- PHP
- Laravel Framework

**Frontend**
- HTML5
- CSS3
- JavaScript
- Bootstrap
- AJAX

**Database**
- MySQL / MariaDB

**Location Services**
- HTML5 Geolocation API
- GPS Location Services

## 🏗️ Application Architecture

PresensiGPS follows the Model-View-Controller (MVC) architectural pattern provided by Laravel.

```text
PresensiGPS/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
│
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   ├── css/
│   ├── js/
│   └── assets/
│
├── resources/
│   └── views/
│
├── routes/
│   └── web.php
│
├── storage/
├── tests/
├── .env.example
└── artisan
```

## 🚀 Getting Started

Follow these steps to run PresensiGPS locally.

### Prerequisites

Make sure you have installed:

- PHP
- Composer
- MySQL or MariaDB
- Node.js and NPM (if frontend dependencies are required)

### Installation

**1. Clone the repository**

```bash
git clone <repository-url>
```

**2. Navigate to the project directory**

```bash
cd presensigps
```

**3. Install dependencies**

```bash
composer install
```

**4. Configure environment**

```bash
cp .env.example .env
```

Update your database configuration in `.env`:

```env
APP_NAME=PresensiGPS
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=presensigps
DB_USERNAME=root
DB_PASSWORD=
```

**5. Generate application key**

```bash
php artisan key:generate
```

**6. Run database migrations**

```bash
php artisan migrate
```

**7. Start the development server**

```bash
php artisan serve
```

Access the application at:

`http://127.0.0.1:8000`

## 👤 User Access

**Employee Portal**

Designed for employees to:
- Perform attendance check-in and check-out.
- View attendance history.
- Submit leave and sick-day requests.

**Administrator Portal**

Designed for administrators to:
- Manage employee information.
- Monitor employee attendance.
- Review leave and sick-day requests.
- Generate attendance reports.

## 🎯 Project Goals

PresensiGPS aims to support the digital transformation of employee attendance administration by delivering:

- Improved operational efficiency.
- More accurate attendance records.
- GPS-assisted attendance validation.
- Centralized employee attendance management.
- Simplified reporting and administrative workflows.

---

<p align="center">
  <strong>PresensiGPS</strong>
  <br />
  Built to support smarter employee attendance management.
  <br /><br />
  <sub>© PT BPRS Barkah Gemadana Banjarmasin</sub>
</p>
