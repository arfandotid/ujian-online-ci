# ujian-online-ci
Aplikasi Ujian Online Menggunakan CodeIgniter

<h1>Cara Install</h1>
<ol>
  <li>
    <h2>Database</h2>
    Buat database dengan nama <kbd>ci_online_test</kbd>. Kemudian import database pada folder <kbd>sql</kbd>. Jangan lupa setting lagi file <kbd>config.php</kbd> nya.
  </li>
  <li>
    <h2>HTACCESS</h2>
    buat file dengan nama .htaccess pada direktori aplikasi ini, yang isinya sebagai berikut.
    <pre><code>RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]</code></pre>
  </li>
</ol>

jika sudah mengikuti langkah diatas dengan benar seharusnya aplikasi sudah berjalan dengan baik. Pastikan pada console browser tidak terdapat error.

<h3>User</h3>
<ul>
<li>Administrator <br/> Email: admin@admin.com <br/> Password : password </li>
  
</ul>

Thanks to :
<ul>
  <li>AdminLTE</li>
<li>CodeIgniter</li>
<li>Ion Auth</li>
<li>Datatables</li>
<li>Ignited Datatables</li>
<li>Select2</li>
<li>SweetAlert2</li>
<li>Bootstrap</li>
<li>JQuery</li>
<li>PACE.js</li>
<li>Codemirror</li>
<li>Bootstrap datetime-picker</li>
<li>Fontawesome</li>
<li>Ion-icons</li>
<li>Froala Editor</li>
<li>MommentJs</li>
<li>ICheck</li>
<li>frankyradio</li>
<li>and more...</li>
</ul>

