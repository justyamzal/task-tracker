# API Docs Usage

File utama dokumentasi API:
- `docs/openapi.yaml`

## Opsi 1 - Swagger Editor
1. Buka https://editor.swagger.io/
2. Pilih `File -> Import file`
3. Pilih `docs/openapi.yaml`

## Opsi 2 - Postman
1. Open Postman
2. `Import -> Files`
3. Pilih `docs/openapi.yaml`
4. Postman akan generate collection otomatis

## Opsi 3 - Insomnia / Bruno
- Import OpenAPI file `docs/openapi.yaml`
- Jika tool meminta format collection, lakukan convert dari OpenAPI ke Postman Collection terlebih dulu.

## Catatan Autentikasi
- Endpoint protected menggunakan bearer token Sanctum.
- Ambil token dari endpoint `POST /auth/login`.
- Pasang header:
```http
Authorization: Bearer <token>
```
