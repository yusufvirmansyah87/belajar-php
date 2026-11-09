<?php
require_once "koneksi.php";

$id = $_GET['id'];

$sql = "SELECT * FROM tb_kategori_berita WHERE id_kategori = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori Berita</title>
</head>
<body>
    <h2>Edit Kategori Berita</h2>

    <form method="POST" action="kategori-update.php">

        <input type="hidden" name="id_kategori" value="<?= $data['id_kategori']; ?>">

        <label>Kategori</label>
        <br>
        <input type="text" name="kategori"
               value="<?= htmlspecialchars($data['kategori']); ?>" required>

        <br><br>

        <button type="submit" name="update">Update</button>
        <a href="kategori.php">Kembali</a>

    </form>

</body>
</html>