<?php
require_once 'koneksi.php';

$kategori = $_POST['kategori'];

$sql = "INSERT INTO tb_kategori_berita (kategori)
        VALUES ('$kategori')";

$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Kategori berhasil ditambahkan!');
            window.location='kategori-berita.php';
          </script>";
} else {
    echo "<script>
            alert('Kategori gagal ditambahkan!');
            window.location='kategori-berita.php';
          </script>";
}
?>