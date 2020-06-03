## SK STORE - Laravel & Livewire

SK Store adalah Toko Online yang dikembangkan oleh SantriKoding dengan menggunakan Laravel & Livewire.

## Installasi SK Store

Clone dari Repository

    git clone https://gitlab.com/maulayyacyber/sk-store.git

Masuk ke Folder & Jalankan Composer

    cd sk-store && composer install

Copy .env 

    cp .env.example .env

Konfigurasi Database

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_skstore
    DB_USERNAME=root
    DB_PASSWORD=

Buat Database

    Silahkan teman-teman buat database baru di dalam http://localhost/phpmyadmin dengan nama db_sktore

Jalankan NPM

    npm install

Migrasi Database

    php artisan migrate

Menjalankan Seeder

    composer dump-autoload
    php artisan db:seed


Menjalankan Aplikasi

    php artisan serve

Website akan dijalankan menggunakan port 8000, silahkan bisa membukanya dengan mengetikan http://localhost:8000


## Roadmap Update

- Send Email Order
- Send Email Payment Confirmation
- Send Email Order Status Change
- Send Email Input Receipt/Resi Tracking
- Globa Search on Front-End 