 **professional and complete `README.md`** tailored for your `Laravel-School-Management-System` that includes **multi-role access** for **Superadmin, Admin, Teacher, Student, Parent, and Assistant**. This description highlights modular features, Laravel components, and extensible structure — suitable for both GitHub and portfolio/demo presentations.

---

# 🎓 Laravel School Management System (Khmer + English)

A full-featured **Laravel-based School Management System** designed for schools and institutions in Cambodia and beyond. It supports multiple user roles with tailored dashboards and permissions including Superadmin, Admin, Teacher, Student, Parent, and Assistant.

> 🇰🇭 Language: Khmer + English bilingual system
> 🔐 Multi-role login system
> 📊 Role-based dashboard & data access

---

## 👥 User Roles & Dashboards

| Role           | Features                                                                |
| -------------- | ----------------------------------------------------------------------- |
| **Superadmin** | Manage entire system: users, school data, settings, backups             |
| **Admin**      | Add/edit classes, subjects, timetables, exams, manage teachers/students |
| **Teacher**    | View schedule, mark attendance, enter grades, post assignments          |
| **Student**    | View timetable, grades, subjects, assignments, attendance               |
| **Parent**     | Track child performance, attendance, grades                             |
| **Assistant**  | Assist admin/teacher with limited permissions (e.g., attendance input)  |

---

## 🧩 Core Modules

### ✅ Academic Management

* Class & Section CRUD
* Subject assignment per class
* Timetable scheduling
* Grade scales configuration

### 🧑‍🏫 Teacher Tools

* Assign subjects and classes
* Mark student attendance
* Enter exam marks
* Assign homework with file upload

### 🎓 Student Management

* Register/enroll students
* Student profile with photo, class history
* Promote students between years
* Student report card generation

### 📅 Attendance & Exams

* Daily attendance with remarks
* Monthly attendance report per student
* Exam schedule management
* Mark entry & grade calculation

### 📈 Reports & Analytics

* Class-wise performance reports
* Exportable reports: PDF, Excel
* Real-time dashboards per role

### 🧾 Fees & Payments (Optional)

* Tuition fee tracking
* Payment receipts & history
* Due date reminders

### 📬 Communication

* Send messages between roles
* Admin–Parent communication
* Broadcast notice board

---

## 🌐 Technology Stack

| Layer        | Tech Used                            |
| ------------ | ------------------------------------ |
| Backend      | Laravel 8/9/10+                      |
| Frontend     | Blade, Bootstrap, Vue.js (optional)  |
| Database     | MySQL / MariaDB                      |
| Auth         | Laravel Breeze / Jetstream / Sanctum |
| Localization | Khmer & English language files       |
| Charts       | Chart.js / ApexCharts                |

---

## 🚀 Getting Started

```bash
# 1. Clone project
git clone https://github.com/Din-Rasin/Laravel-School-Management-System-Khmer.git

# 2. Navigate & install dependencies
cd Laravel-School-Management-System
composer install
npm install && npm run dev

# 3. Set up environment
cp .env.example .env
php artisan key:generate

# 4. Configure DB in .env and run migration
php artisan migrate --seed

# 5. Serve the app
php artisan serve
```

---

## 🔐 Default Credentials

| Role       | Email                                                   | Password |
| ---------- | ------------------------------------------------------- | -------- |
| Superadmin | [superadmin@example.com](mailto:superadmin@example.com) | password |
| Admin      | [admin@example.com](mailto:admin@example.com)           | password |
| Teacher    | [teacher@example.com](mailto:teacher@example.com)       | password |
| Student    | [student@example.com](mailto:student@example.com)       | password |
| Parent     | [parent@example.com](mailto:parent@example.com)         | password |
| Assistant  | [assistant@example.com](mailto:assistant@example.com)   | password |

> You can update these in the `users` table after seeding.

---

## 📸 Screenshots

<p align="center">
  <img src="screenshots/dashboard-superadmin.png" width="600">
  <img src="screenshots/teacher-attendance.png" width="600">
  <img src="screenshots/student-portal.png" width="600">
</p>

📂 Or download demo screenshots:
[📁 View Screenshot Demo RAR](https://github.com/Din-Rasin/Laravel-School-Management-System/screenshots.rar)

---

## 📦 Optional Modules

* 🔔 Notification center (Laravel Notifications)
* 💳 Stripe or PayWay integration for school fees
* 📚 Library/book management system
* 📂 Document upload for student ID, report, etc.
* 📊 Role-based analytics with export

---

## 🧪 To-Do / Coming Soon

* [ ] Multi-school support
* [ ] Subject-wise grade weighting
* [ ] SMS gateway for alerts (e.g., Twilio, Wing)
* [ ] Mobile app version (Flutter or React Native)

---

## 🤝 Contributing

We welcome contributions!

```bash
# Fork repo
# Create your branch: git checkout -b feature/YourFeature
# Commit: git commit -am 'Add new feature'
# Push and submit PR
```

---

## 📄 License

MIT License – free to use, modify, and distribute with credit.

---

## 📬 Contact

* 👤 GitHub: [Din-Rasin](https://github.com/Din-Rasin)
* 📧 Email: denrasin2917@gmail.com
* 🌐 Demo: **

---

