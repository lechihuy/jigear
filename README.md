# Jigear

## Yêu cầu
- PHP 8.0 trở lên
- MySQL 5.7 trở lên
- Git
- Composer

## Tiến hành cài đặt
- Giải nén source code, hoặc clone từ đường dẫn https://github.com/lechihuy/jigear
- Chạy các lệnh sau tại đường dẫn lưu source code:
```
cd jigear
composer install
cp .env.example .env
php artisan key:generate
```

- Vào phpMyadmin hoặc dùng lệnh MySQL để tạo database `jigear` với character set `utf8mb4` và collate là `utf8mb4_unicode_ci`.  

- Mặc định  file `.env` cấu hình database như bên dưới, nếu có thay đổi gì thì có thể mở file này để chỉnh sửa
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jigear
DB_USERNAME=root
DB_PASSWORD=
```

- Sau đó chạy lệnh sau để public đường dẫn thư mục upload
```
php artisan storage:link
```

Cuối cùng để chạy dự án, thực thi lệnh sau
```
php artisan serve
```

Truy cập đường dẫn http://localhost:8000 để bắt đầu web người dùng, và http://localhost:8000/admin để bắt đầu web admin

Tài khoản user:
- Email: guest@gmail.com
- Password: password

Tài khoản admin:
- Email: huy@jigear.xyz
- Password: password

Demo: https://jigear.xyz