# Docker Setup cho MKSG Laravel Project

## Cấu trúc thư mục Docker

```
docker/
├── nginx/
│   └── conf.d/
│       └── app.conf          # Cấu hình Nginx cho Laravel
├── php/
│   └── local.ini             # Cấu hình PHP
├── mysql/
│   └── my.cnf                # Cấu hình MySQL
├── supervisor/
│   └── supervisord.conf      # Cấu hình Supervisor
├── start.sh                  # Script khởi động
└── README.md                 # File này
```

## Các Services

### 1. App (PHP 8.0 + Laravel 9)
- **Port:** 9000 (internal)
- **Container:** mksg_app
- **Features:** PHP-FPM với các extension cần thiết cho Laravel

### 2. Nginx
- **Port:** 8000 (external)
- **Container:** mksg_nginx
- **Features:** Web server với cấu hình tối ưu cho Laravel

### 3. MySQL 8.0
- **Port:** 3306 (external)
- **Container:** mksg_db
- **Database:** mksg_db
- **User:** mksg_user
- **Password:** password
- **Root Password:** root_password

### 4. Redis
- **Port:** 6379 (external)
- **Container:** mksg_redis
- **Features:** Cache và session storage

### 5. phpMyAdmin
- **Port:** 8080 (external)
- **Container:** mksg_phpmyadmin
- **Features:** Quản lý database qua web interface

## Cách sử dụng

### 1. Khởi động tất cả services
```bash
docker-compose up -d
```

### 2. Chỉ khởi động một service cụ thể
```bash
docker-compose up -d app nginx
```

### 3. Xem logs
```bash
# Tất cả logs
docker-compose logs

# Logs của service cụ thể
docker-compose logs app
docker-compose logs nginx
docker-compose logs db
```

### 4. Truy cập vào container
```bash
# PHP container
docker-compose exec app bash

# MySQL container
docker-compose exec db mysql -u mksg_user -p mksg_db

# Nginx container
docker-compose exec nginx sh
```

### 5. Chạy Laravel commands
```bash
# Artisan commands
docker-compose exec app php artisan migrate
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:cache

# Composer commands
docker-compose exec app composer install
docker-compose exec app composer update
```

### 6. Dừng services
```bash
# Dừng tất cả
docker-compose down

# Dừng và xóa volumes
docker-compose down -v

# Dừng và xóa images
docker-compose down --rmi all
```

## Truy cập ứng dụng

- **Website:** http://localhost:8000
- **phpMyAdmin:** http://localhost:8080
  - Server: db
  - Username: mksg_user
  - Password: password

## Cấu hình Database

Thêm vào file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=mksg_db
DB_USERNAME=mksg_user
DB_PASSWORD=password
```

## Cấu hình Redis

Thêm vào file `.env`:
```env
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

## Troubleshooting

### 1. Permission issues
```bash
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
docker-compose exec app chmod -R 775 storage bootstrap/cache
```

### 2. Clear Laravel cache
```bash
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan view:clear
```

### 3. Rebuild containers
```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

### 4. Reset database
```bash
docker-compose exec app php artisan migrate:fresh --seed
```
