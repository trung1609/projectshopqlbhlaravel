## 🚀 Hướng dẫn cài đặt

### 1. Clone dự án
```bash
git clone https://github.com/trung1609/projectshopqlbhlaravel.git
cd projectshopqlbhlaravel
```

### 2. Cài đặt dependencies PHP
```bash
composer install
```

### 3. Cài đặt dependencies JavaScript
```bash
npm install
```

### 4. Cấu hình môi trường
```bash
# Sao chép file cấu hình
cp .env.example .env

# Tạo application key
php artisan key:generate
```

### 5. Cấu hình database trong file `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=4306
DB_DATABASE=shoplaravel
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Chạy migration
```bash
# Tạo bảng database
php artisan migrate

```

### 7. Khởi chạy ứng dụng

#### Phương pháp 1: Chạy riêng lẻ
```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite dev server
npm run dev
```

#### Phương pháp 2: Chạy đồng thời (Khuyến nghị)
```bash
composer dev
```

Ứng dụng sẽ chạy tại: `http://localhost:8000`
