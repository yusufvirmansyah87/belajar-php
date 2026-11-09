<?php
require_once 'koneksi.php';

$sql = "SELECT * FROM tb_kategori_berita ORDER BY id_kategori DESC";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori Berita</title>
</head>
<body>
<h2>Data Kategori Berita</h2>
<a href="kategori-tambah.php">+ Tambah Kategori</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Create At</th>
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
            <td><?= htmlspecialchars($data['create_at']); ?></td>
            <td>
                <a href="kategori-edit.php?id=<?= $data['id_kategori']; ?>">Edit</a>
                |
                <a href="kategori-hapus.php?id=<?= $data['id_kategori']; ?>"
                    onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                    Hapus
                </a>
            </td>
        </tr>

        <?php
            }
        } else {
        ?>

        <tr>
            <td colspan="4">Belum ada data kategori.</td>
        </tr>

        <?php } ?>
    </tbody>
</table>

</body>
</html>