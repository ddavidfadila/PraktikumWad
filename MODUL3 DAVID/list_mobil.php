<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
</head>
<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container">
            <h1>List Mobil</h1>

            <?php
            include("connect.php");

            // Buatlah query untuk mengambil data dari database (gunakan query SELECT)
            $query = mysqli_query($connect, "SELECT * FROM showroom_mobil");

            // Buatlah perkondisian dimana: 
            // 1. a. Apabila ada data dalam database, maka outputnya adalah semua data dalam database akan ditampilkan dalam bentuk tabel 
            //    (gunakan num_rows > 0, while, dan mysqli_fetch_assoc())
            //    b. Untuk setiap data yang ditampilkan, buatlah sebuah button atau link yang akan mengarahkan web ke halaman 
            //       form_detail_mobil.php dimana halaman tersebut akan menunjukkan seluruh data dari satu mobil berdasarkan id
            if (mysqli_num_rows($query) > 0) {
                echo '<table border="2" class= "table table-striped" cellpadding="10" style="width:100%">';
                echo '<tr><th>ID</th><th>Nama Mobil</th><th>Brand Mobil</th><th>Warna Mobil</th><th>Tipe Mobil</th><th>Harga Mobil</th><th>Detail</th></tr>';
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['nama_mobil'] . '</td>';
                    echo '<td>' . $row['brand_mobil'] . '</td>';
                    echo '<td>' . $row['warna_mobil'] . '</td>';
                    echo '<td>' . $row['tipe_mobil'] . '</td>';
                    echo '<td>' . $row['harga_mobil'] . '</td>';
                    echo '<td><a href="form_detail_mobil.php?id=' . $row['id'] . '">Detail</a></td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                // 2. Apabila tidak ada data dalam database, maka outputnya adalah pesan 'tidak ada data dalam tabel'
                echo '<p>Tidak ada data dalam tabel.</p>';
            }

            mysqli_close($connect);
            ?>
        </div>
    </center>
</body>
</html>

