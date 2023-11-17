<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include('connect.php');

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];

// (3) Buatkan fungsi "update" yang menerima data sebagai parameter
if (isset($_POST['update'])) {
    // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
    $nama_mobil = $_POST['nama_mobil'];
    $brand_mobil = $_POST['brand_mobil'];
    $warna_mobil = $_POST['warna_mobil'];
    $tipe_mobil = $_POST['tipe_mobil'];
    $harga_mobil = $_POST['harga_mobil'];
    
    // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
    $query = "UPDATE showroom_mobil 
              SET nama_mobil='$nama_mobil', brand_mobil='$brand_mobil', warna_mobil='$warna_mobil', tipe_mobil='$tipe_mobil', harga_mobil='$harga_mobil' 
              WHERE id=$id";
    
    // Eksekusi perintah SQL
    $result = mysqli_query($connect, $query);
    
    // Buatkan kondisi jika eksekusi query berhasil
    if ($result) {
        echo "<script>alert('Data berhasil diperbarui')</script>";
        header("Location: form_detail_mobil.php?id=$id");
        exit();
    } else {
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        echo "<script>alert('Gagal memperbarui data')</script>";
    }
}

// Panggil fungsi update dengan data yang sesuai
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        'id' => $id,
        'nama_mobil' => $_POST['nama_mobil'],
        'brand_mobil' => $_POST['brand_mobil'],
        'warna_mobil' => $_POST['warna_mobil'],
        'tipe_mobil' => $_POST['tipe_mobil'],
        'harga_mobil' => $_POST['harga_mobil']
    );

    update($connect, $data);
}

// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($connect);
?>
