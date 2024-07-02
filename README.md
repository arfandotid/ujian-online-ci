# Aplikasi Ujian Online Menggunakan CodeIgniter 3

> [!NOTE]
> Disarankan menggunakan PHP versi 7.
> Tidak dapat berjalan di PHP versi 8 ke atas

# Cara Install

1. Buat database dengan nama **_ci_online_test_**.
2. Kemudian import database pada folder **_sql_**.
3. Ubah **_base_url_** setting file **_config.php_**.
4. dan juga ubah **_date_default_timezone_set_** pada **_config.php_**.<br/>

# Install di CPanel Hosting

1. Lakukan seperti cara diatas, namun perlu mengubah file **_.htaccess_**.
2. Jika di dalam folder project tidak terdapat file **_.htaccess_** silahkan dibuat saja.
3. Kemudian bisa isi dengan kode berikut ini :

```
 <IfModule mod_rewrite.c>
 RewriteEngine On
 RewriteBase /
 RewriteCond %{REQUEST_FILENAME} !-f
 RewriteCond %{REQUEST_FILENAME} !-d
 RewriteRule ^(.\*)$ index.php?/$1 [L]
 </IfModule>
```

# Install di NGINX

1. Lakukan cara install seperti biasa.
2. Ubah setting pada file `/etc/nginx/sites-available/default`.
3. Lalu tambahkan kode berikut ini :

```
location /NAMA_FOLDER_PROJECT {
    try_files $uri $uri/ /NAMA_FOLDER_PROJECT/index.php;
}
```

4. Sesuaikan `NAMA_FOLDER_PROJECT` dengan nama folder aplikasi ujian online anda.

Jika sudah mengikuti langkah diatas dengan benar seharusnya aplikasi sudah berjalan dengan baik. Pastikan pada console browser tidak terdapat error.

### User

1. Administrator \
   Email: admin@admin.com \
   Password : password

### Thanks to :

- AdminLTE
- CodeIgniter
- Ion Auth
- Datatables
- Ignited Datatables
- Select2
- SweetAlert2
- Bootstrap
- JQuery
- PACE.js
- Codemirror
- Bootstrap datetime-picker
- Fontawesome
- Ion-icons
- Froala Editor
- MommentJs
- ICheck
- frankyradio
- and more...
