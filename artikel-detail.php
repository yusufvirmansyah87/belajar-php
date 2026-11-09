<?php
require_once 'koneksi.php';

// Mengambil ID berita dari URL
$id = $_GET['id'];

// Mengambil data berita berdasarkan ID
$sql = "SELECT 
            tb_berita.*,
            tb_kategori_berita.kategori
        FROM tb_berita
        INNER JOIN tb_kategori_berita
        ON tb_berita.id_kategori = tb_kategori_berita.id_kategori
        WHERE tb_berita.id_berita = '$id'";

$query = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($query);

// Memeriksa data berita
if (!$data) {
    echo "<script>
            alert('Artikel berita tidak ditemukan!');
            window.location='artikel.php';
          </script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($data['judul']); ?></title>
</head>
<body>

    <h1>Detail Artikel Berita</h1>
    <hr>

    <!-- Kategori Berita -->
    <p>
        Kategori:
        <?php echo htmlspecialchars($data['kategori']); ?>
    </p>

    <!-- Judul Berita -->
    <h2>
        <?php echo htmlspecialchars($data['judul']); ?>
    </h2>

    <!-- Tanggal Berita -->
    <p>
        Tanggal:
        <?php echo date('d-m-Y', strtotime($data['created_at'])); ?>
    </p>

    <!-- Foto Berita -->
    <?php if (!empty($data['foto_berita'])) { ?>

        <img src="uploads/<?php echo htmlspecialchars($data['foto_berita']); ?>"
             width="500"
             alt="Foto Berita">

    <?php } ?>
    <br><br>

    <!-- Isi Berita Lengkap -->
    <div>
        <?php
        echo nl2br(htmlspecialchars($data['isi_berita']));
        ?>
    </div>
    <br>

    <!-- Tombol Kembali -->
    <a href="artikel.php">Kembali ke Daftar Artikel</a>

</body>
</html>