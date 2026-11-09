<?php
require_once 'koneksi.php';

$id = $_POST['id_kategori'];
$kategori = mysqli_real_escape_string($conn, $_POST['kategori']);

$sql = "UPDATE tb_kategori_berita
        SET kategori = '$kategori'
        WHERE id_kategori = '$id'";

$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Kategori berhasil diperbarui!');
            window.location='kategori-berita.php';
          </script>";
} else {
    echo "<script>
            alert('Kategori gagal diperbarui!');
            window.location='kategori-berita.php';
          </script>";
}
?>


