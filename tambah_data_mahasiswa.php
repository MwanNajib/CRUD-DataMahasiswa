<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="tambah.css">
</head>

<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form method="POST" action="koneksi.php">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="angkatan">Angkatan:</label>
        <input type="text" id="angkatan" name="angkatan" required><br>

        <label for="semester">Semester:</label>
        <input type="text" id="semester" name="semester" required><br>

        <label for="ipk">IPK:</label>
        <input type="text" id="ipk" name="ipk" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telepon">Telepon:</label>
        <input type="text" id="telepon" name="telepon" required><br>

        <input type="submit" class="simpan-button" value="Tambahkan">
    </form>
</body>

</html>