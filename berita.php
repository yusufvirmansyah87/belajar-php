<?php
require_once 'koneksi.php';

$sql = "SELECT tb_berita.*, tb_kategori_berita.kategori
        FROM tb_berita
        INNER JOIN tb_kategori_berita
        ON tb_berita.id_kategori = tb_kategori_berita.id_kategori
        ORDER BY tb_berita.id_berita DESC";

$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Berita</title>
</head>
<body>

<h2>Data Berita</h2>

<a href="berita-tambah.php">+ Tambah Berita</a>

<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Foto Berita</th>
            <th>Created At</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no = 1;

        if (mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?= $no++; ?></td>

            <td><?= htmlspecialchars($data['kategori']); ?></td>

            <td><?= htmlspecialchars($data['judul']); ?></td>

            <td>
                <?php if (!empty($data['foto_berita'])) { ?>
                    <img src="uploads/<?= htmlspecialchars($data['foto_berita']); ?>"
                         width="100">
                <?php } else { ?>
                    Tidak ada foto
                <?php } ?>
            </td>

            <td><?= htmlspecialchars($data['created_at']); ?></td>

            <td>
                <a href="berita-edit.php?id=<?= $data['id_berita']; ?>">Edit</a>
                |
                <a href="berita-hapus.php?id=<?= $data['id_berita']; ?>"
                   onclick="return confirm('Yakin ingin menghapus berita ini?')">
                    Hapus
                </a>
            </td>
        </tr>

        <?php
            }
        } else {
        ?>

        <tr>
            <td colspan="6">Belum ada data berita.</td>
        </tr>

        <?php } ?>
    </tbody>
</table>

</body>
</html>