<?php
require_once 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM tb_kategori_berita WHERE id_kategori = '$id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Kategori berhasil dihapus!');
            window.location='kategori-berita.php';
          </script>";
} else {
    echo "<script>
            alert('Kategori gagal dihapus!');
            window.location='kategori-berita.php';
          </script>";
}
?>
