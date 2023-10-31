# StudentSphere

Aplikasi pengelola mahasiswa untuk UTS pada mata kuliah pemrograman web lanjut.


## Installation

Untuk penginstallan aplikasi wajib memakai php versi terbaru dan memiliki sebuah software package manager seperti composer dan npm.

Untuk langkah awal clone aplikasi ini menggunakan perintah berikut :

```bash
  git clone https://github.com/Eugene702/StudentSphere.git
```

Setelah selesai melakukan clone. Selanjutnya menginstall package yang diperlukan untuk laravel. Dikarenakan pada aplikasi ini memakai teknologi SPA anda juga perlu melakukan penginstallan package pada nodeJS juga.

```bash
    composer install
```

Setelah selesai. Lanjut untuk menginstall package untuk nodeJSnya.

NPM
```bash
    npm install
```

YARN

```bash
    yarn install
```

Setelah selesai melakukan installasi. Selanjutnya silahkan duplicate file .env.example dan ubah namanya menjadi .env.

Pada baris DB_DATABASE di file .env silahkan anda sesuaikan nama database anda. Jika anda memakai database selain mysql anda bisa mengganti DB_CONNECTIONnya ke database yang anda pakai. Silahkan baca dokumen resmi laravel untuk mengetahui lebih lanjut [Laravel](https://laravel.com/docs/10.x/).

Setelah konfigurasi selesai. Selanjutnya anda perlu mengenerate sebuah key. Cukup menjalankan perintah ini : 

```bash
    php artisan key:generate
```

Setelah key dibuat. Anda perlu menambahkan table kedalam database anda. Cukup jalankan perintah dibawah ini : 

```bash
    php artisan migrate
```

Sekarang pada database anda sudah memiliki table yang baru saja anda buat dengan perintah diatas. Selanjutnya anda perlu menjalankan server untuk bisa menggunakan aplikasi web ini. Anda perlu menjalankan 2 aplikasi command line.

Pada terminal atau command line pertama. Silahkan anda gunakan perintah dibawah untuk menjalankan server laravelnya :
```bash
    php artisan serve
```

Lalu pada terminal atau command line kedua. Silahkan anda gunakan perintah dibawah untuk menjalankan vite untuk mengcompile script vuejsnya : 

NPM
```bash
   npm run dev
```

YARN
```bash
    yarn dev
```
## Authors

- [@Eugene Feilian Putra Rangga](https://www.github.com/Eugene702)

