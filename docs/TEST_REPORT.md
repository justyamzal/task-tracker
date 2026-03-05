# Test Report - Task Tracker

Tanggal: 2026-03-05

## Scope Pengujian
- Backend API Laravel (`backend`)
- Frontend Vue + Vite (`frontend`)
- Dokumentasi API dengan OpenAPI (`docs/openapi.yaml`)

## Environment
- OS: Windows
- Backend: Laravel 12.x, PHP, PostgreSQL
- Frontend: Vue 3, Vite 7, Vitest

## Hasil Automated Test

### Backend
- Command:
```bash
cd backend
php artisan test
```
- Hasil: `PASS` (3 tests passed)

### Frontend
- Command:
```bash
cd frontend
npm test -- --run
```
- Hasil: `PASS` (1 test passed)

## Hasil Build Check

### Frontend Build
- Command:
```bash
cd frontend
npm run build
```
- Hasil: `PASS` (build sukses)

## Manual Test Checklist (Ringkas)

| ID | Skenario | Expected Result | Status |
|---|---|---|---|
| M-01 | Login dengan kredensial valid | Mendapat token + user | PASS |
| M-02 | Login dengan kredensial tidak valid | HTTP 401 + pesan error | PASS |
| M-03 | Ambil daftar project dengan token | HTTP 200 + data paginate | PASS |
| M-04 | Buat task baru dengan payload valid | HTTP 201 + data task | PASS |
| M-05 | Soft delete task | HTTP 200 + pesan sukses | PASS |

## Dokumentasi API
- OpenAPI spec: `docs/openapi.yaml`
- Dapat di-import ke Swagger Editor / Postman / Insomnia / Bruno (melalui converter OpenAPI).

## Catatan
- Endpoint protected memakai `Bearer Token` (Sanctum).
- Base URL default development: `http://127.0.0.1:8000/api`
