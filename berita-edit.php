<?php
require_once 'koneksi.php';

$id = $_GET['id'];

// Mengambil data berita
$sql = "SELECT * FROM tb_berita WHERE id_berita = '$id'";
$query = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data berita tidak ditemukan!";
    exit;
}

// Mengambil data kategori
$sql_kategori = "SELECT * FROM tb_kategori_berita ORDER BY kategori ASC";
$query_kategori = mysqli_query($conn, $sql_kategori);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Berita</title>
</head>
<body>

    <h2>Edit Berita</h2>

    <form method="POST" action="berita-update.php" enctype="multipart/form-data">

        <input type="hidden" name="id_berita" value="<?= $data['id_berita']; ?>">

        <label>Kategori</label>
        <br>
        <select name="id_kategori" required>

            <?php while ($kategori = mysqli_fetch_assoc($query_kategori)) { ?>

                <option value="<?= $kategori['id_kategori']; ?>"
                    <?= ($kategori['id_kategori'] == $data['id_kategori']) ? 'selected' : ''; ?>>

                    <?= htmlspecialchars($kategori['kategori']); ?>

                </option>

            <?php } ?>

        </select>

        <br><br>

        <label>Judul Berita</label>
        <br>
        <input type="text" name="judul"
               value="<?= htmlspecialchars($data['judul']); ?>" required>

        <br><br>

        <label>Isi Berita</label>
        <br>
        <textarea name="isi_berita" rows="10" cols="50" required><?= htmlspecialchars($data['isi_berita']); ?></textarea>

        <br><br>

        <label>Foto Berita Saat Ini</label>
        <br>

        <?php if (!empty($data['foto_berita'])) { ?>
            <img src="uploads/<?= htmlspecialchars($data['foto_berita']); ?>"
                 width="150">
        <?php } else { ?>
            Tidak ada foto.
        <?php } ?>

        <br><br>

        <label>Ganti Foto Berita</label>
        <br>
        <input type="file" name="foto_berita" accept="image/*">

        <br><br>

        <button type="submit" name="update">Update</button>
        <a href="berita.php">Kembali</a>

    </form>

</body>
</html>