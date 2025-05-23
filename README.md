# Janji
Saya Elsa Nurjanah dengan NIM 2306026 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Personal Favorite Game Management
Program ini merupakan aplikasi manajemen data game berbasis web yang dibangun menggunakan arsitektur MVVM (Model-View-ViewModel) dengan PHP Native. Aplikasi ini memungkinkan pengguna untuk melihat, menambahkan, mengedit, dan menghapus data game beserta informasi developer dan publisher-nya.

# Struktur Database
### `developer`

| Kolom      | Tipe Data      | Keterangan                                     |
| ---------- | -------------- | ---------------------------------------------- |
| `id`       | `INT`          | Primary key, auto-increment, ID unik developer |
| `name`     | `VARCHAR(100)` | Nama developer                                 |
| `location` | `VARCHAR(100)` | Lokasi developer (kota, negara)                |

### `publisher`

| Kolom      | Tipe Data      | Keterangan                                     |
| ---------- | -------------- | ---------------------------------------------- |
| `id`       | `INT`          | Primary key, auto-increment, ID unik publisher |
| `name`     | `VARCHAR(100)` | Nama publisher                                 |
| `location` | `VARCHAR(100)` | Lokasi publisher (kota, negara)                |

### `game`

| Kolom          | Tipe Data      | Keterangan                                                                |
| -------------- | -------------- | ------------------------------------------------------------------------- |
| `id`           | `INT`          | Primary key, auto-increment, ID unik game                                 |
| `name`         | `VARCHAR(100)` | Nama game                                                                 |
| `description`  | `VARCHAR(255)` | Deskripsi singkat tentang game                                            |
| `developer_id` | `INT`          | Foreign key ke `developer(id)`, menunjukkan siapa yang mengembangkan game |
| `publisher_id` | `INT`          | Foreign key ke `publisher(id)`, menunjukkan siapa yang menerbitkan game   |

# Struktur Program

### Config
- `Database.php`: Kelas dasar koneksi database

### Model
Menyimpan logika akses data, menyediakan fungsi CRUD untuk entitas tertentu, dan berhubungan langsung dengan database.
`Game.php`, `Developer.php`, `Publisher.php` terdiri dari fungsi berikut:
- `getAll()` → mengambil seluruh data tabel secara lengkap
- `getById()` → mengambil detail data tabel tertentu berdasarkan ID
- `create()`, `update()`, `delete()` → manipulasi data tabel

### View Model
Penghubung antara Model dan View dengan mengatur alur data dari dan ke database yaitu menyiapkan data dari Model agar siap ditampilkan di View dan meneruskan input dari View ke Model.
`GameViewModel.php`, `DeveloperViewModel.php`, `PublisherViewModel.php` terdiri dari fungsi berikut:
- `getList()` → mengambil seluruh data tabel untuk ditampilkan di View
- `getById()` → mengambil data tabel tertentu berdasarkan ID
- `add()`, `update()`, `delete()` → meneruskan input dari View ke Model untuk manipulasi data di database
- khusus `GameViewModel.php` juga menyertakan fungsi `getDevelopers()` dan `getPublishers()` untuk mengambil data relasi

### View
Menangani tampilan antarmuka pengguna (UI), bertanggung jawab untuk menampilkan data dan menangkap input dari pengguna tanpa berhubungan langsung dengan database.
Untuk setiap tabel (Game, Developer, Publisher), terdapat dua jenis file View:
- `xx_list.php` → menampilkan seluruh data dalam bentuk tabel, beserta tombol aksi (Edit, Delete, Add).
- `xx_form.php` → menampilkan form input untuk menambahkan atau mengedit data, menyesuaikan isinya berdasarkan data yang tersedia (untuk mode edit).

File-file ini memanfaatkan data dari ViewModel untuk ditampilkan ke pengguna, dan mengirim data kembali melalui URL dan method POST untuk diproses lebih lanjut.

### `index.php`
- Bertindak sebagai **entry point utama** aplikasi dan pengatur alur navigasi berdasarkan parameter `entity` dan `action` pada URL.
- Membaca nilai `entity` (game, developer, publisher) dan `action` (list, add, edit, save, update, delete).
- Membuat instance ViewModel yang sesuai berdasarkan entitas.
- Menjalankan fungsi pada ViewModel untuk mengambil, menyimpan, atau menghapus data.
- Memanggil file View (`xx_list.php`, `xx_form.php`) yang sesuai untuk ditampilkan ke pengguna.

# Alur Program
1. **`index.php` membaca parameter** `entity` dan `action` dari URL:

   * `entity` menunjukkan entitas yang sedang diakses (`game`, `developer`, `publisher`)
   * `action` menunjukkan aksi yang diminta (`list`, `add`, `edit`, `save`, `update`, `delete`)

2. **`index.php` membuat objek ViewModel yang sesuai**, misalnya:

   * `GameViewModel`, `DeveloperViewModel`, atau `PublisherViewModel`

3. **ViewModel memanggil fungsi di Model** yang relevan, seperti:

   * `getAll()`, `getById()`, `create()`, `update()`, `delete()`

4. **Model melakukan query ke database** melalui koneksi PDO, dan mengembalikan hasilnya ke ViewModel.

5. **ViewModel mengirim data ke View**:

   * Jika `action = list`, maka ditampilkan ke file `xx_list.php`
   * Jika `action = add` atau `edit`, maka ditampilkan ke file `xx_form.php`

6. **View (form)** menerima input dari pengguna, lalu mengirimkannya kembali melalui method `POST` ke:

   * `action = save` → untuk menambah data baru
     
   <img src="https://github.com/elsanrj/TP10DPBO2025C1/blob/main/dokumentasi/1.png">
   * `action = update` → untuk memperbarui data yang ada

   <img src="https://github.com/elsanrj/TP10DPBO2025C1/blob/main/dokumentasi/2.png">
   * `action = delete` → langsung lewat URL dan diproses oleh ViewModel

   <img src="https://github.com/elsanrj/TP10DPBO2025C1/blob/main/dokumentasi/3.png">

7. Setelah aksi `save`, `update`, atau `delete` selesai, program akan **mengalihkan kembali ke halaman `list`** agar pengguna bisa melihat hasil perubahannya.

# Dokumentasi
[![YouTube](http://i.ytimg.com/vi/joxxdW4efvQ/hqdefault.jpg)](https://youtu.be/joxxdW4efvQ)
