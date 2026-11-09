<?php
require_once 'koneksi.php';

$id_kategori = $_POST['id_kategori'];
$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$isi_berita = mysqli_real_escape_string($conn, $_POST['isi_berita']);

// Upload foto berita
$foto_berita = $_FILES['foto_berita']['name'];
$tmp = $_FILES['foto_berita']['tmp_name'];

$folder = "uploads/";

move_uploaded_file($tmp, $folder . $foto_berita);

// Simpan data berita
$sql = "INSERT INTO tb_berita
        (id_kategori, judul, isi_berita, foto_berita)
        VALUES
        ('$id_kategori', '$judul', '$isi_berita', '$foto_berita')";

$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Berita berhasil ditambahkan!');
            window.location='berita.php';
          </script>";
} else {
    echo "<script>
            alert('Berita gagal ditambahkan!');
            window.location='berita-tambah.php';
          </script>";
}
?>
