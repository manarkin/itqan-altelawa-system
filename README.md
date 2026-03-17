# Itqan Altelawa Club Management System

![Status](https://img.shields.io/badge/Status-Completed-blue)
![Course](https://img.shields.io/badge/Course-COMP3700-green)
![University](https://img.shields.io/badge/University-SQU-orange)
![Group](https://img.shields.io/badge/Group-Pink%20Pixels-pink)

## 📖 Overview

The **Itqan Altelawa Club Management System** is a web application developed for **Sultan Qaboos University** as part of the **COMP3700 - Introduction to Web Computing** course (Spring 26). 

This system is designed to support the activities of the **Itqan Altelawa Club** by providing a centralized online platform for managing users, records, and Quran recitation sessions. It aims to replace manual record-keeping and fragmented communication channels (such as Google Forms and WhatsApp) with a secure, automated digital ecosystem.

## 🎯 Project Objectives

- **Centralization:** Consolidate all recitation-related information into one secure platform.
- **Automation:** Automate the grouping of students and teachers based on level and availability.
- **Efficiency:** Simplify user registration, session assignment, and attendance tracking.
- **Communication:** Improve information flow through integrated announcements and notifications.
- **Digital Transformation:** Modernize club management practices within the university environment.

## 👥 Target Audience & Roles

The system supports three distinct user roles with specific permissions:

| Role | Responsibilities |
| :--- | :--- |
| **Student** | Register, select availability, view assigned sessions, track attendance, and view progress. |
| **Teacher** | Provide availability, view assigned groups, record attendance, and document student progress. |
| **Administrator** | Oversee operations, manage users, approve session generation, and post announcements. |

## ✨ Key Features

### 1. User Management
- Secure registration and login with password hashing.
- Role-based access control (RBAC) for Students, Teachers, and Admins.
- Profile management for updating personal details and university IDs.

### 2. Session Management
- **Automatic Grouping:** Matches teachers and students based on recitation level and time availability.
- **Schedule Visualization:** Structured timetable format based on university timings.
- **Session Details:** Displays time, location, teacher, and classmates.

### 3. Attendance & Progress
- **Attendance Tracking:** Teachers mark attendance (Present/Late/Absent) per session.
- **Progress Recording:** Teachers can add notes on student recitation progress.
- **History:** Students and admins can view historical attendance and performance data.

### 4. Communication
- **Announcements Module:** Admins and teachers can post updates regarding schedule changes or events.
- **Contact Us:** Integrated form, email, phone, and social media links for administration contact.

### 5. Dashboards & Analytics
- **Student Dashboard:** View schedule, level, and announcements.
- **Teacher Dashboard:** Monitor assigned classes and student lists.
- **Admin Dashboard:** Overview of system statistics, registration data, and session management.

## 🛠️ Tech Stack

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP
- **Database:** MySQL (Relational Database)
- **Hosting:** 
  - **Prototype:** Netlify
  - **Production:** InfinityFree (Selected for unlimited bandwidth, PHP/MySQL support, and free SSL)

## 🗄️ Database Design

The system utilizes a **Relational Database** to manage data integrity. Key tables include:

- **Users:** `user_id`, `name`, `email`, `password` (hashed), `role`.
- **Sessions:** `session_id`, `session_name`, `teacher_id`, `session_time`.
- **Attendance:** `attendance_id`, `session_id`, `student_id`, `date`, `status`.
- **Progress:** `progress_id`, `student_id`, `teacher_id`, `notes`, `date`.
- **Announcements:** `announcement_id`, `title`, `content`, `date_posted`.

## 🛡️ Security & Ethics

- **Data Privacy:** Personal information (University ID, Contact Info) is restricted to authorized users only.
- **Authentication:** Secure login systems with password hashing.
- **Input Validation:** All user inputs are validated to prevent harmful data injection.
- **Fairness:** Automated grouping reduces bias in session allocation.
- **Reliability:** Hosted on a platform with 99.9% uptime guarantee to ensure access during registration periods.

## 🚀 Installation & Usage

1. **Clone the repository:**
   ```bash
   git clone https://github.com/patataza/Itqan.git
