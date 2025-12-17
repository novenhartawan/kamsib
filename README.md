# WebSec Lab – Praktikum Keamanan Web

## SQL Injection (SQLi), Cross-Site Scripting (XSS), dan IDOR

### PHP + MySQL (PHP Built-in Development Server)

⚠️ **PERINGATAN ETIKA & LEGAL**  
Project ini **SENGAJA dibuat rentan** untuk tujuan **pembelajaran keamanan siber**.

- **WAJIB** dijalankan di **localhost / lab**
- **DILARANG** menguji ke website publik atau sistem milik pihak lain
- Tujuan pembelajaran: **memahami celah & mitigasi**, bukan perusakan sistem

---

## 1. Deskripsi

WebSec Lab adalah project praktikum sederhana untuk mempelajari:

- **SQL Injection (SQLi)** — OWASP **A03: Injection**
- **Cross-Site Scripting (XSS)** (Stored & Reflected) — OWASP **A03: Injection**
- **IDOR (Insecure Direct Object Reference)** — OWASP **A01: Broken Access Control**

---

## 2. Teknologi

- **PHP ≥ 8.0**
- **MySQL / MariaDB**
- **PHP Built-in Development Server** (`php -S`)
- Browser (Chrome / Firefox)

❗ **Tidak menggunakan Apache / Nginx / XAMPP**

---

## 3. Struktur Project

```
websec-lab/
├── db.sql
├── config.php
├── login.php
├── process_login.php
├── index.php
├── profile.php
├── comments.php
├── logout.php
└── README.md
```

---

## 4. Setup Database

### Opsi A — phpMyAdmin

1. Buka `http://localhost/phpmyadmin`
2. Buat database `kamsib`
3. Import file `db.sql`

### Opsi B — MySQL CLI

```bash
mysql -u root -p
CREATE DATABASE kamsib;
USE kamsib;
SOURCE db.sql;
EXIT;
```

---

## 5. Menjalankan Aplikasi

```bash
cd project
php -S localhost:8000
```

Akses di browser:

```
http://localhost:8000/login.php
```

---

## 6. Akun Uji

| Username | Password |
| -------- | -------- |
| admin    | admin123 |
| budi     | budi123  |
| siti     | siti123  |

---

## 7. Skenario Praktikum

- **SQLi:** login dengan `' OR '1'='1`
- **IDOR:** ubah `profile.php?id=2` → `profile.php?id=1`
- **Stored XSS:** `<script>alert("Stored XSS")</script>`
- **Reflected XSS:** `<img src=x onerror=alert("Reflected XSS")>`

**“Learn security to build, not to break.”**
