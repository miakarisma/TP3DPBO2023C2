# TP3DPBO2023C2
## Janji
Saya Mia Karisma Haq NIM [2102165] mengerjakan soal Tugas Praktikum-3 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin
## Deskripsi Program
Buatlah program menggunakan bahasa pemrograman PHP dengan spesifikasi sebagai berikut:
- Program bebas, kecuali program Ormawa
- Menggunakan minimal 3 buah tabel
- Terdapat proses Create, Read, Update, dan Delete data
- Memiliki fungsi pencarian dan pengurutan data (kata kunci bebas)
- Menggunakan template/skin form tambah data dan ubah data yang sama
- 1 tabel pada database ditampilkan dalam bentuk bukan tabel, 2 tabel sisanya ditampilkan dalam bentuk tabel (seperti contoh saat praktikum)
- Menggunakan template/skin tabel yang sama untuk menampilkan tabel
## Desain Program
![DesainDatabase](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/7f9f8bf0-5246-4fbd-bdff-377d5863fc98)
## Penjelasan Desain Program
Program ini terdiri dari 3 tabel yaitu tabel artis, tabel profesi artis, dan tabel agensi artis.
1. Tabel Artis terdiri dari 7 atribut, dimana atribut id_artis merupakan primaary key dari tabel ini. Selain itu, terdapat foreign key pada tabel ini, yaitu id_profesi yang menghubungkan tabel ini dengan tabel profesi dengan jenis relasi many to one, dan id_agensi yang menghubungkan tabel ini dengan tabel agensi dengan jenis relasi many to one. Pada program ini satu artis hanya dapat memiliki 1 profesi dan 1 agensi, akan tetapi 1 profesi ataupun 1 agensi dapat dimiliki oleh banyak artis.
2. Tabel Profesi terdiri dari 2 atribut, dimana atribut id_profesi merupakan primary key dari tabel ini dan menjadi foreign key di tabel artis.
3. Tabel Agensi terdiri dari 2 atribut, dimana atribut id_agensi merupakan primary key dari tabel ini dan menjadi foreign key di tabel agensi.
## Penjelasan Alur
Ketika membuka program untuk pertama kali maka akan ditampilkan halaman home sebagai halaman utama dari program. Pada halaman home terdapat data daftar artis serta fitur untuk searching dan sorting. Jika user menekan salah satu data artis, maka akan ditampilkan halaman detail data dari artis tersebut. Pada halaman detail data artis, user dapat mengubah data dengan menekan tombol ubah data, atau menghapus data artis tersebut dengan menekan tombol hapus data. Selain mengubah dan menghapus data artis, user juga dapat menambah data artis dengan memilih menu tambah data pada navigation bar. Jika user memutuskan untuk mengubah data, maka user perlu memasukan data yang akan diubah. Sedangkan jika user memutuskan untuk menambah data, maka user harus mengisi data artis secara lengkap. Dan user akan dikembalikan ke halaman home jika memutuskan untuk menghapus data. Pada navigation bar juga terdapat menu daftar profesi dan daftar agensi artis yang berisi tabel data daftar profesi atau agensi. Pada kedua halaman tersebut, user dapat melakukan tambah, ubah maupun hapus data, serta terdapat fitur searching dan sorting.
## Video Preview
<!-- Dikarenakan ukuran file melebihi batas maksimal github, sehingga video preview diunggah pada gdrive -->
https://drive.google.com/file/d/1KaQs8T4guVfqW7kxOeCCOieSdlORkW_Z/view?usp=share_link 
