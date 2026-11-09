<?php
require_once 'koneksi.php';

$id = $_GET['id'];

// Mengambil foto berita
$sql_foto = "SELECT foto_berita FROM tb_berita WHERE id_berita = '$id'";
$query_foto = mysqli_query($conn, $sql_foto);

$data_foto = mysqli_fetch_assoc($query_foto);

if (!$data_foto) {
    echo "<script>
            alert('Data berita tidak ditemukan!');
            window.location='berita.php';
          </script>";
    exit;
}

// Menghapus data berita
$sql = "DELETE FROM tb_berita WHERE id_berita = '$id'";
$query = mysqli_query($conn, $sql);

if ($query) {

    // Menghapus foto dari folder uploads
    if (!empty($data_foto['foto_berita'])) {
        $file = "uploads/" . $data_foto['foto_berita'];

        if (file_exists($file)) {
            unlink($file);
        }
    }

    echo "<script>
            alert('Berita berhasil dihapus!');
            window.location='berita.php';
          </script>";

} else {

    echo "<script>
            alert('Berita gagal dihapus!');
            window.location='berita.php';
          </script>";

}
?>