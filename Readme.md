## Instalasi

1. Backend:
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

2. Frontend:
```bash
cd ../frontend
npm install
```

## Menjalankan Aplikasi

1. Jalankan backend:
```bash
cd backend
php artisan serve
```

2. Jalankan frontend (Laravel Vite, source di `frontend/resources/js`):
```bash
cd frontend
npm run dev
```

## Menjalankan Testing

1. Backend test:
```bash
cd backend
php artisan test
```

2. Frontend test:
```bash
cd frontend
npm test -- --run
```
