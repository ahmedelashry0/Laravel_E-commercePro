# Laravel E-commerce Pro

A robust and feature-rich e-commerce platform built with Laravel, offering a complete solution for modern online retail businesses.

## 🚀 Features

- **User Management**
    - Customer registration and authentication
    - User profiles and order history
    - Admin dashboard for user management

- **Product Management**
    - Comprehensive product catalog
    - Categories and subcategories
    - Product variants and attributes
    - Image management
    - Inventory tracking

- **Shopping Experience**
    - Advanced search functionality
    - Shopping cart
    - Wishlist
    - Product reviews and ratings
    - Secure checkout process

- **Order Management**
    - Order processing and tracking
    - Multiple payment gateway integration
    - Order status updates
    - Invoice generation

- **Admin Features**
    - Dashboard analytics
    - Sales reports
    - Inventory management
    - Customer management
    - Order processing

## 🛠️ Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL >= 5.7
- Laravel 10.x
- Web server (Apache/Nginx)

## ⚙️ Installation

1. **Clone the repository**
```bash
git clone https://github.com/ahmedelashry0/Laravel_E-commercePro.git
cd Laravel_E-commercePro
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install NPM dependencies**
```bash
npm install
```

4. **Configure environment variables**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure your database in .env file**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. **Run migrations and seeders**
```bash
php artisan migrate --seed
```

7. **Build assets**
```bash
npm run dev
```

8. **Start the development server**
```bash
php artisan serve
```

## 🔒 Security

- Built-in Laravel security features
- XSS protection
- CSRF protection
- SQL injection prevention
- Secure password hashing

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

Permission is hereby granted, free of charge.

## 👨‍💻 Author

- **Ahmed Elashry**
    - GitHub: [@ahmedelashry0](https://github.com/ahmedelashry0)

## 🙏 Acknowledgments

- Laravel Framework
