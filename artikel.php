<?php
require_once 'koneksi.php';

// Mengambil semua data berita dan kategori
$sql = "SELECT 
            tb_berita.*,
            tb_kategori_berita.kategori
        FROM tb_berita
        INNER JOIN tb_kategori_berita 
        ON tb_berita.id_kategori = tb_kategori_berita.id_kategori
        ORDER BY tb_berita.id_berita DESC";

$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Artikel Berita</title>
</head>
<body>

    <h1>Artikel Berita</h1>
    <p>Informasi dan berita terbaru</p>
    <hr>

    <?php
    if (mysqli_num_rows($query) > 0) {
        while ($data = mysqli_fetch_assoc($query)) {
    ?>

        <div>
            <!-- Foto Berita -->
            <?php if (!empty($data['foto_berita'])) { ?>
                <img src="uploads/<?php echo htmlspecialchars($data['foto_berita']); ?>"
                     width="300"
                     alt="Foto Berita">
            <?php } ?>
            <br>

            <!-- Kategori -->
            <p>
                Kategori:
                <?php echo htmlspecialchars($data['kategori']); ?>
            </p>

            <!-- Judul -->
            <h2>
                <?php echo htmlspecialchars($data['judul']); ?>
            </h2>

            <!-- Tanggal -->
            <p>
                Tanggal:
                <?php echo date('d-m-Y', strtotime($data['created_at'])); ?>
            </p>

            <!-- Cuplikan Isi Berita -->
            <p>
                <?php
                echo nl2br(htmlspecialchars(substr(strip_tags($data['isi_berita']), 0, 200)));
                ?>...
                <!-- Baca Selengkapnya -->
                <a href="artikel-detail.php?id=<?php echo $data['id_berita']; ?>">
                    Baca Selengkapnya
                </a>
            </p>

        </div>

        <hr>

    <?php
        }

    } else {
        echo "<p>Belum ada berita yang tersedia.</p>";
    }
    ?>

</body>
</html>