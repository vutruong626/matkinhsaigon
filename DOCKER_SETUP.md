# 🐳 Docker Setup cho MKSG Laravel Project

## 📋 Yêu cầu hệ thống

- Docker
- Docker Compose
- Git

## 🚀 Cách khởi động nhanh

### 1. Clone và setup project
```bash
# Clone project (nếu chưa có)
git clone <repository-url>
cd mksg-v2

# Copy file .env
cp .env.example .env
```

### 2. Cấu hình .env cho Docker
Cập nhật file `.env` với các thông tin sau:
```env
APP_NAME=MKSG
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8003

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=mksg_db
DB_USERNAME=mksg_user
DB_PASSWORD=password

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

CACHE_DRIVER=redis
SESSION_DRIVER=redis
```

### 3. Khởi động Docker containers
```bash
# Build và khởi động tất cả services
docker-compose up -d --build

# Hoặc khởi động từng service
docker-compose up -d db redis
docker-compose up -d app nginx
```

### 4. Setup Laravel
```bash
# Generate application key
docker-compose exec app php artisan key:generate

# Install dependencies
docker-compose exec app composer install

# Set permissions
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
docker-compose exec app chmod -R 775 storage bootstrap/cache

# Run migrations
docker-compose exec app php artisan migrate

# Clear cache
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear
```

## 🌐 Truy cập ứng dụng

- **Website:** http://localhost:8000
- **phpMyAdmin:** http://localhost:8080
  - Server: `db`
  - Username: `mksg_user`
  - Password: `password`

## 📁 Cấu trúc Docker

```
docker/
├── nginx/conf.d/app.conf     # Cấu hình Nginx
├── php/local.ini             # Cấu hình PHP
├── mysql/my.cnf              # Cấu hình MySQL
├── supervisor/supervisord.conf # Cấu hình Supervisor
├── start.sh                  # Script khởi động
└── README.md                 # Hướng dẫn chi tiết
```

## 🔧 Các lệnh hữu ích

### Laravel Commands
```bash
# Artisan commands
docker-compose exec app php artisan migrate
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache

# Composer commands
docker-compose exec app composer install
docker-compose exec app composer update
docker-compose exec app composer dump-autoload
```

### Container Management
```bash
# Xem logs
docker-compose logs -f app
docker-compose logs -f nginx
docker-compose logs -f db

# Truy cập container
docker-compose exec app bash
docker-compose exec db mysql -u mksg_user -p mksg_db

# Restart services
docker-compose restart app
docker-compose restart nginx
```

### Database
```bash
# Backup database
docker-compose exec db mysqldump -u mksg_user -p mksg_db > backup.sql

# Restore database
docker-compose exec -T db mysql -u mksg_user -p mksg_db < backup.sql
```

## 🛠️ Troubleshooting

### 1. Permission Issues
```bash
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
docker-compose exec app chmod -R 775 storage bootstrap/cache
```

### 2. Port Conflicts
Nếu port 8000, 3306, 6379, 8080 đã được sử dụng, thay đổi trong `docker-compose.yml`:
```yaml
ports:
  - "8001:80"    # Thay 8000 thành 8001
  - "3307:3306"  # Thay 3306 thành 3307
```

### 3. Rebuild Containers
```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

### 4. Clear All Data
```bash
docker-compose down -v
docker system prune -a
```

## 📊 Monitoring

### Xem resource usage
```bash
docker stats
```

### Xem disk usage
```bash
docker system df
```

## 🔒 Security Notes

- Đổi mật khẩu mặc định trong production
- Không expose ports không cần thiết
- Sử dụng secrets cho sensitive data
- Regular backup database

## 📚 Tham khảo

- [Laravel Documentation](https://laravel.com/docs)
- [Docker Documentation](https://docs.docker.com/)
- [Docker Compose Documentation](https://docs.docker.com/compose/)
