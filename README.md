# curhatorium-app


## Made With
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Langkah Jalankan di Localhost
### Cara Change Direktori
1.) Download folder zip dari repositori ini <br>
2.) Pindahkan folder zip yang sudah di download ke folder tujuan dan unzip <br>
3.) Kita akan lakukan change directory <br>
4.) Buka terminal, nah di terminal akan dimulai dari home <br>
5.) lakukan command 
```bash
cd
```
ke direktori yang diinginkan, jika direktori tersebut ada di direktori lain, maka tembah direktori tersebut secara satu per satu <br>
contoh: 
```bash
cd direktori_1 
cd direktori_1.1
cd direktori_1.1.1
```
6.) Jika sudah di direktori Website, kita lanjut cara jalankan localhost <br>
### Cara Jalankan Localhost
1.) Lakukan command berikut secara berurutan
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
2.) Buka link localhost
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

