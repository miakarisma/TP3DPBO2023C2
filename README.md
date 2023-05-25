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
## Dokumentasi
- Read Data
  ![image](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/a2759577-885a-4449-80c2-f1216702734a)
  <br>
  ![DaftarProfesi](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/cb2d3100-1aa6-48ee-b6e3-04285b3accc6)
  <br>
- Create Data
  ![AddArtis](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/6769cf47-c61d-4bdd-9f89-f1ca7fa95285)
  <br>
![AddProfesi](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/bf6245ab-c7c4-4722-9db5-116d59fafa4f)
  <br>
- Update Data
  ![EditArtis](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/9380ac0a-b973-4d8b-8d74-fb54c484291a)
  <br>
  ![EditProfesi](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/9d42d0c4-fd22-400d-8b99-7c6933328c21)

- Delete Data
  ![DeleteArtis](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/463abca2-ce55-436c-94da-834d263952c5)
  <br>
  ![DeleteAgensi](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/80afc689-3a78-40d9-8d3e-7604f54740d2)

- Sort Data
  ![image](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/3b4c132e-1375-435d-b4b5-eade51bff920)

- Search Data
  ![SearchAgensi](https://github.com/miakarisma/TP3DPBO2023C2/assets/100817609/3c90bdd1-165c-444e-b2d8-aba8db2d804b)

## Video Preview
<!-- Dikarenakan ukuran file melebihi batas maksimal github, sehingga video preview diunggah pada gdrive -->
https://drive.google.com/file/d/1KaQs8T4guVfqW7kxOeCCOieSdlORkW_Z/view?usp=share_link 
