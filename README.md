
# Starter Code Argon

<p align="center">
Laravel Version : 
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
</p>

Starter Code merupakan code awal yang digunakan dalam berbagai macam project. Dengan adanya starter code ini diharapkan developer atau pengembang dapat sedikit terbantu dikarenakan telah memiliki langkah awal dalam pengembangan sistemnya. Dalam repositori ini akan memiliki beberapa fitur dasar antara lain adalah Authentication Admin, Halaman Dashboard dengan menggunakan Argon serta CRUD dasar sebagai awal dari keseluruhan proses development atau pengembangan.

Dalam project ini menggunakan beberapa hal dasar seperti 
- [Laravel dengan](https://laravel.com/docs/9.x/) versi 9.x
- [Template Argon](https://www.creative-tim.com/product/argon-dashboard) Open Source

## Tampilan Awal Project
Tampilan Login
![Tampilan Login](markdown_asset/login_jpg.jpeg)
Tampilan Register
![Tampilan Register](markdown_asset/Web%20capture_25-1-2023_13190_127.0.0.1.jpeg)
Tampilan Dashboard
![Tampilan Dashboard](markdown_asset/Screenshot%20(35).png)
Tampilan User List
![Tampilan User List](markdown_asset/Screenshot%20(36).png)
Tampilan Product List
![Tampilan Product List](markdown_asset/Screenshot%20(37).png)
Tampilan Add Product
![Tampilan Add Product](markdown_asset/Screenshot%20(38).png)
Tampilan Detail Product
![Tampilan Detail Product](markdown_asset/Screenshot%20(39).png)
Tampilan Edit Product
![Tampilan Edit Product](markdown_asset/Screenshot%20(40).png)
Tampilan Delete Product
![Tampilan Delete Product](markdown_asset/Screenshot%20(41).png)

## Configuration Step
Dalam melakukan clonning pada repository ini ada beberapa hal yang perlu diperhatikan sebagai berikut

- Memiliki Database MySQL, PostgreSQL, MariaDB, dsb.
- Menggunakan PHP minimal version 8.*
- Menggunakan Composer atau helper lain.

Cara untuk menggunakan repository ini adalah dengan melakukan clonning terlebih dahulu dengan perintah 

    git clone https://github.com/sendyjoan/Laravel_Starter_Code_Argon

Setelah melakukan clonning maka dapat melakukan installasi pada composer dengan perintah

    composer install

Setelah semua package yang diperlukan terpasang maka yang perlu dilakukan adalah copy paste .env.example dengan nama .env yang mana nantinya akan kita gunakan sebagai file configurasi. Jangan lupa untuk melakukan configrasi database pada bagain berikut

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_argon
    DB_USERNAME=root
    DB_PASSWORD=

Setelah semua terkonfigurasi maka langkah selanjutnya adalah menjalankan perintah untuk melakukan migrasi database yaitu

    php artisan migrate

Setelah termigrasi secara penuh maka kita dapat melakukan serve kepada laravel dengan perintah 

    php artisan serve

Selanjutnya adalah kita dapat menggunakan aplikasi sesuai dengan apa yang kita inginkan.

## Contributing

Terima kasih telah berkenan untuk berkontribusi dalam pengembangan Starter Code ini. Jika anda berkenan dalam melakukan kontribusi maka anda dapat menghubungi pemilik melalui [Instagram](https://www.instagram.com/ehjohan12)