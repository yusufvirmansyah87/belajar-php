<?php
require_once 'koneksi.php';

$id = $_POST['id_berita'];
$id_kategori = $_POST['id_kategori'];
$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$isi_berita = mysqli_real_escape_string($conn, $_POST['isi_berita']);

// Mengambil foto lama
$sql_foto = "SELECT foto_berita FROM tb_berita WHERE id_berita = '$id'";
$query_foto = mysqli_query($conn, $sql_foto);
$data_foto = mysqli_fetch_assoc($query_foto);

$foto_berita = $data_foto['foto_berita'];

// Jika ada foto baru yang diupload
if (!empty($_FILES['foto_berita']['name'])) {

    $foto_berita = $_FILES['foto_berita']['name'];
    $tmp = $_FILES['foto_berita']['tmp_name'];

    $folder = "uploads/";

    move_uploaded_file($tmp, $folder . $foto_berita);

    // Menghapus foto lama
    if (!empty($data_foto['foto_berita'])) {
        unlink($folder . $data_foto['foto_berita']);
    }
}

// Update data berita
$sql = "UPDATE tb_berita SET
        id_kategori = '$id_kategori',
        judul = '$judul',
        isi_berita = '$isi_berita',
        foto_berita = '$foto_berita'
        WHERE id_berita = '$id'";

$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Berita berhasil diperbarui!');
            window.location='berita.php';
          </script>";
} else {
    echo "<script>
            alert('Berita gagal diperbarui!');
            window.location='berita.php';
          </script>";
}
?>