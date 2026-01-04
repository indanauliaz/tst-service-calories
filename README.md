# NutriPlate - Calorie Calculation Service

NutriPlate adalah microservice untuk menghitung total kalori makanan berdasarkan daftar bahan yang dikirimkan oleh client.
Service ini dibangun menggunakan CodeIgniter 4, dikemas dalam Docker Container, dan dijalankan pada perangkat
STB (Armbian Linux). Akses publik disediakan melalui Cloudflare Tunnel (Zero Trust).

---

## Base URL
https://cal.otwdochub.my.id

---

## Autentikasi

Setiap request ke API wajib menyertakan API Key pada header.

| Header Name | Value | Keterangan |
|------------|-------|------------|
| X-Api-Key | nutriplate | Wajib disertakan |

---

## Endpoint API

### GET /
Health Check

Digunakan untuk memastikan service berjalan dengan normal.

Response (200 OK)
```json
{
    "status": "Microservice Ready!",
    "owner": "Indi",
    "message": "Alhamdulillah"
}
```

---

### POST /index.php/calculate
Calculate Calories

Menghitung total kalori berdasarkan daftar bahan makanan.

Headers
```http
Content-Type: application/json
X-Api-Key: nutriplate
```

Request Body
```json
{
    "ingredients": [
        "chicken",
        "white rice",
        "apple"
    ]
}
```

Response Sukses (200 OK)
```json
{
    "status": "success",
    "total_calories": 929,
    "breakdown": [
        {
            "food": "chicken",
            "cal": 185
        },
        {
            "food": "white rice",
            "cal": 692
        },
        {
            "food": "apple",
            "cal": 52
        }
    ]
}
```

Response Error

400 Bad Request
-> Terjadi jika body request bukan JSON, parameter ingredients tidak ditemukan, atau format ingredients bukan array.
```json
{
    "status": 400,
    "error": 400,
    "messages": {
        "error": "Mana data ingredients-nya bro?"
    }
}
```

401 Unauthorized
-> Terjadi jika header X-Api-Key tidak disertakan atau API Key tidak valid.
```json
{
    "status": 401,
    "error": 401,
    "messages": {
        "error": "API Key tidak valid atau tidak ditemukan"
    }
}
```

404 Not Found
-> Terjadi jika endpoint tidak ditemukan.
```json
{
    "status": 404,
    "error": 404,
    "messages": {
        "error": "Endpoint tidak ditemukan"
    }
}
```

500 Internal Server Error
-> Terjadi jika terjadi kesalahan pada server.
```json
{
    "status": 500,
    "error": 500,
    "messages": {
        "error": "Terjadi kesalahan pada server"
    }
}
```

---

## Teknologi yang Digunakan

- PHP 8.1+
- CodeIgniter 4
- SQLite 3
- Docker & Docker Compose
- STB B860H (Armbian Linux)
- Cloudflare Zero Trust (Tunnel)

---

## Cara Menjalankan (Local Development)

Clone Repository
```bash
git clone https://github.com/indanauliaz/tst-service-calories.git
cd tst-service-calories
```

Jalankan Service
```bash
docker-compose up -d --build
```

Akses Service
http://localhost:8100

---

## Contoh Penggunaan (cURL)

```bash
curl -X POST https://cal.otwdochub.my.id/index.php/calculate \
     -H "Content-Type: application/json" \
     -H "X-Api-Key: nutriplate" \
     -d '{"ingredients": ["chicken", "white rice"]}'
```
