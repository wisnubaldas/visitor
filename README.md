# Aplikasi Visitor

 ### Install 
 - [x] clone repo dari git
    ```bash
    git clone https://github.com/wisnubaldas/visitor.git
    cd visitor
    ```
 - [x] instal paket dependensi laravel
    ```bash 
    composer install
    cp .env.example .env
    ```
 - [x] konfigurasi koneksi database pada file .env
	 ```bash
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=
	 ```
    jalankan perintah artisan
    ```php
        php artisan generate-key
        php artisan migrate --seed
    ```
 - [x] jalankan server
 ```php artisan serve```
 buka alamat ```localhost:8000``` di browser

 ### API
 #### Pintu masuk
 - end point ``` /api/pintu-masuk ```
 - method ```POST```
 - form data

   |id_alat|string  |
   |pintu_masuk|bolean (1,0) |
 - keterangan
   > nilai pintu masuk 1 dan 0, jika parameter nilai pintu masuk 1 nilai akan 
   > di reset menjadi 0 oleh sensor pintu masuk

#### Pintu keluar
 - end point ``` /api/pintu-keluar ```
 - method ```POST```
 - form data

   |id_alat|string  |
   |pintu_keluar|bolean (1,0) |
 - keterangan
   > nilai pintu keluar 1 dan 0, jika parameter nilai pintu keluar 1 nilai akan 
   > di reset menjadi 0 oleh sensor pintu keluar