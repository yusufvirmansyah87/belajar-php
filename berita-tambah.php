<?php
require_once 'koneksi.php';

$sql = "SELECT * FROM tb_kategori_berita ORDER BY kategori ASC";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
</head>
<body>

    <h2>Tambah Berita</h2>

    <form method="POST" action="berita-simpan.php" enctype="multipart/form-data">

        <label>Kategori</label>
        <br>
        <select name="id_kategori" required>
            <option value="">-- Pilih Kategori --</option>

            <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                <option value="<?= $data['id_kategori']; ?>">
                    <?= htmlspecialchars($data['kategori']); ?>
                </option>
            <?php } ?>

        </select>

        <br><br>

        <label>Judul Berita</label>
        <br>
        <input type="text" name="judul" required>

        <br><br>

        <label>Isi Berita</label>
        <br>
        <textarea name="isi_berita" rows="10" cols="50" required></textarea>

        <br><br>

        <label>Foto Berita</label>
        <br>
        <input type="file" name="foto_berita" accept="image/*" required>

        <br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="berita.php">Kembali</a>

    </form>

</body>
</html>
